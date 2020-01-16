<?php

namespace App;

use Facades\App\Environment;
use Illuminate\Support\Facades\File;

class LamboConfig
{
    public function configDir()
    {
        return config('home_dir') . '/.lambo';
    }

    public function configFile()
    {
        return $this->configDir() . '/config.json';
    }

    public function fileExists($fileName)
    {
        return File::exists($this->configDir() . '/' . $fileName);
    }

    public function createOrEditFile(string $fileName, string $fileTemplate)
    {
        $this->ensureFileExists($fileName, $fileTemplate);

        $this->editFile($this->getFilePath($fileName));
    }

    protected function ensureFileExists(string $fileName, string $fileTemplate)
    {
        $this->ensureConfigDirExists();

        if (!$this->fileExists($fileName)) {
            app('console')->info("File: {$this->getFilePath($fileName)} does not exist, creating it now.");
            File::put($this->getFilePath($fileName), $fileTemplate);
        }
    }

    public function getFilePath(string $fileName)
    {
        return  $this->configDir() . "/" . $fileName;
    }

    public function ensureConfigDirExists()
    {
        if (! File::exists($this->configDir())) {
            app('console')->info("Config directory: {$this->configDir()} does not exist, creating it now.");
            File::makeDirectory($this->configDir());
        }
    }

    protected function editFile(string $filePath)
    {
        if (!Environment::isMac()) {
            exec("xdg-open {$filePath}");
            return;
        }

        if ($this->editor()) {
            exec(sprintf('"%s" "%s"',
                $this->editor(),
                $filePath
            ));
            return;
        }

        exec("open {$filePath}");
    }

    public function editor()
    {
        return app('console')->option('editor');
    }
}