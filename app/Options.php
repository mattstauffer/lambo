<?php

namespace App;

class Options
{
    protected $options = [
        /** Parameters first, then flags */
        [
            'short' => 'e',
            'long' => 'editor',
            'param_description' => 'EDITOR',
            'cli_description' => "Specify an editor to run <info>'EDITOR .'</info> with after",
        ],
        [
            'short' => 'm',
            'long' => 'message',
            'param_description' => '"message"',
            'cli_description' => "Customize the initial commit message (wrap with quotes!)",
        ],
        [
            'short' => 'p',
            'long' => 'path',
            'param_description' => 'PATH',
            'cli_description' => "Customize the path in which the new project will be created",
        ],
        [
            'short' => 'b',
            'long' => 'browser',
            'param_description' => '"BROWSER"',
            'cli_description' => "Open the site in the specified <info>BROWSER</info>. E.g. <info>'Google Chrome'</info> or <info>'Safari'</info> (macOS)",
        ],
        [
            'short' => 'f',
            'long' => 'frontend',
            'param_description' => '"FRONTEND"',
            'cli_description' => "Specify the <info>FRONTEND</info> framework to use. Must be one of bootstrap, react or vue",
        ],
        [
            'long' => 'dbtype',
            'param_description' => 'DBTYPE',
            'cli_description' => "Specify the database type. Must be one of mysql or pgsql",
        ],
        [
            'long' => 'dbname',
            'param_description' => 'DBNAME',
            'cli_description' => "Specify the database name",
        ],
        [
            'long' => 'dbport',
            'param_description' => 'DBPORT',
            'cli_description' => "Specify the database port",
        ],
        [
            'long' => 'dbuser',
            'param_description' => 'USERNAME',
            'cli_description' => "Specify the database user",
        ],
        [
            'long' => 'dbpassword',
            'param_description' => 'PASSWORD',
            'cli_description' => "Specify the database password",
        ],
        [
            'long' => 'create-db',
            'cli_description' => "Create a new database",
        ],
        [
            'short' => 'd',
            'long' => 'dev',
            'cli_description' => "Install Laravel using the develop branch",
        ],
        [
            'short' => 'a',
            'long' => 'auth',
            'cli_description' => "Scaffold the routes and views for basic Laravel auth",
        ],
        [
            // 'short' => 'n',
            'long' => 'node',
            'cli_description' => "Run <info>'npm install'</info> after creating the project",
        ],
        [
            'short' => 'x',
            'long' => 'mix',
            'cli_description' => "Run <info>'npm run dev'</info> after creating the project",
        ],
        [
            'short' => 'l',
            'long' => 'link',
            'cli_description' => "Create a Valet link to the project directory",
        ],
        [
            'short' => 's',
            'long' => 'secure',
            'cli_description' => "Generate and use an HTTPS cert with Valet",
        ],
        [
            'long' => 'full',
            'cli_description' => "Shortcut of --create-db --link --secure --auth --node --mix",
        ],
        [
            'long' => 'with-output',
            'cli_description' => "Show command line output from shell commands",
        ],
        [
            'short' => 'q',
            'long' => 'quiet',
            'cli_description' => "Use quiet mode to hide most messages from lambo",
        ],
    ];

    public function all()
    {
        return $this->options;
    }
}
