<?php

class SimpleLog {
    /**
     * Defines the path, where the log file will be saved
     */
    public string $destination;

    /**
     * Defines the filename in which the log functions will be excecuted
     */
    public string $filename;


    public function __construct()
    {
        # initialize default parameters
        $this->destination = getcwd() . "/";   
        $this->filename = "simplelog";
    }

    /**
     * Writes to the log file
     * @return bool
     */
    public function write(string $message) : void
    {
        $filepath = $this->destination . $this->filename . ".log";

        if(!is_dir($this->destination)) {
            $this->createDirectory();
        }
        if(!file_exists($filepath)) {
            $this->createFile();
        }
    }


    private function createFile() : bool
    {
        $filepath = $this->destination . $this->filename . ".log";
        try {
            fopen($filepath, "w");
            return true;
        } catch (Exception $e) {
            return false;
        }
        return false;
    }
    private function createDirectory() : bool
    {
        try {
            mkdir($this->destination, 0777, true);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return false;
    }
}
?>