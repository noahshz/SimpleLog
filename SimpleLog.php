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
        $this->destination = "/";   
        $this->filename = "simplelog";
    }

    /**
     * Writes to the log file
     * @return bool
     */
    public function write(string $message) : void
    {
        
    }


    private function createFile() : bool
    {
        return false;
    }
}
?>