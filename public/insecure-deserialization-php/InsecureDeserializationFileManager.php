<?php

class InsecureDeserializationFileManager
{
    public $path = "/tmp/test/";

    public function __construct() {
        shell_exec("mkdir /tmp/test/");
        file_put_contents("{$this->path}log.txt", "Session initialized!");
    }

    public function writeLog($content) {
        file_put_contents("{$this->path}log.txt", $content);
    }
    public function readLog() {
        return file_get_contents($this->path . "log.txt");
    }

    public function __destruct() {
        shell_exec("rm -rf {$this->path}*");
    }
}
