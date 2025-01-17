#!/usr/bin/env bash

# ------------------------------------------------------------------------------
# THIS SCRIPT WILL ONLY WORK ON *NIX SYSTEMS. SORRY WINDOWS USERS.
#
# Manual testing script that speeds things up by copying a "template"
# installation of Laravel rather than running the Laravel Installer every time.
# Useful when running lambo over and over during testing.
#
# NOTE: on first run since boot the script will install a fresh version of the
# Laravel template.
#
# 1. Comment out the following in app/Commands/NewCommand:
#    app(VerifyPathAvailable::class)()
#    app(InstallLaravel::class)()
#
# 2. run this script passing any regular lambo flags and/or options while
#    omitting new, Example:
#
#   /path/to/testLambo.sh my-project [other lambo flags]
# ------------------------------------------------------------------------------

DEBUG=false

if [ "$#" -lt "1" ]; then
  echo "usage: $0 name [regular lambo parameters]"
  exit
fi

START_DIR=$(pwd)
cd $(dirname $0)
SCRIPT_PATH=$(pwd)

NAME=$1
shift

TEST_DIR="/tmp/lambo"
TEMPLATE_NAME="template"
PROJECT_PATH="$TEST_DIR/$NAME"
TEMPLATE_PATH="$TEST_DIR/$TEMPLATE_NAME"

if [ "$DEBUG" = true ]; then
  echo " [INFO] Start directory: $START_DIR"
  echo " [INFO] Script path: $SCRIPT_PATH"
  echo " [INFO] Test directory: $TEST_DIR"
  echo " [INFO] Project name: $NAME"
  echo " [INFO] Project path: $PROJECT_PATH"
  echo " [INFO] Template name: $TEMPLATE_NAME"
  echo " [INFO] Template path: $TEMPLATE_PATH"
fi

# Create test directory
if [ ! -d "$TEST_DIR" ]; then
  echo "*[WARN] Test directory '$TEST_DIR' does not exist, creating it now…"
  mkdir $TEST_DIR
else
  echo " [INFO] Using test directory '$TEST_DIR'"
fi

# Create template Laravel installation
if [ ! -d "$TEMPLATE_PATH" ]; then
  echo "*[WARN] Laravel template '$TEMPLATE_PATH' does not exist, creating it now…"
  cd $TEST_DIR
  composer create-project laravel/laravel $TEMPLATE_NAME --remove-vcs --prefer-dist --quiet
  cd $START_DIR
  echo " [INFO] Created template '$TEMPLATE_PATH'"
else
  echo " [INFO] Using template '$TEMPLATE_PATH'"
fi

# remove previous run.
if [ -f "$TEST_DIR/.last-run" ]; then
  last_run=$(cat $TEST_DIR/.last-run)
  rm -rf $last_run
  echo " [INFO] Deleted previous run '$last_run'"
fi

cp -r $TEMPLATE_PATH $PROJECT_PATH
echo " [INFO] Copied laravel template '$TEMPLATE_PATH' to '$PROJECT_PATH'"

cd $TEST_DIR
echo $PROJECT_PATH > .last-run

cd $SCRIPT_PATH
echo " [INFO] Running Lambo…"
echo
echo "lambo new $NAME --path $TEST_DIR $*"
../lambo new $NAME --path $TEST_DIR $*
