![Lambo](https://raw.githubusercontent.com/tightenco/lambo/master/lambo.jpg)

Super-powered `laravel new` for Laravel and Valet.


![](https://raw.githubusercontent.com/tightenco/lambo/master/lambo.gif)


## Installation

```bash
composer global require tightenco/lambo
```

## Upgrading 

```bash
composer global update tightenco/lambo
```

## Usage

Make sure `~/.composer/vendor/bin` is in your terminal's path.

```bash
cd ~/Sites
lambo superApplication
```

This will `composer create-project laravel/laravel superApplication`, change into that directory, make an initial Git commit, and open your web browser to that app.

### What exactly does it do?

- `composer create-project laravel/laravel $PROJECTNAME`
- `cd $PROJECTNAME`
- Initialize a git repo, add all of the files, and make a commit with the text "Initial commit."
- Replace the `.env` database credentials with the default Mac MySQL credentials: database of `$PROJECTNAME`, user `root`, and empty password
- Open `$PROJECTNAME.dev` in your browser

## Requirements

- Mac-only.
- Requires [Laravel Valet](https://laravel.com/docs/valet) to be globally installed.

## Acknowledgements

Inspired by Taylor Otwell and Adam Wathan's work on Valet.

Name from TJ Miller, inspired by Taylor's love for the lambo.

![](https://i.imgur.com/CrS803Y.gif)
