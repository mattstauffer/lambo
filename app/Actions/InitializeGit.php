<?php

namespace App\Actions;

use App\Support\BaseAction;

class InitializeGit extends BaseAction
{
    public function __invoke()
    {
        $showOutput = false;

        $message = config('lambo.message');
        $directory = config('lambo-store.project_path');

        $this->shell->inDirectory($directory, 'git init', $showOutput);
        $this->shell->inDirectory($directory, 'git add .', $showOutput);
        $this->shell->inDirectory($directory, "git commit -m \"{$message}\"", $showOutput);

        $this->console->info('Git repository initialized.');
    }
}