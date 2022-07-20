<?php

use LDAP\Result as LDAPResult;

class SimpleLog {
    /**
     * Defines the path, where the log file will be saved
     */
    public string $destination;

    /**
     * Defines the filename in which the log functions will be excecuted
     */
    public string $filename;

    /**
     * Defines the Result Object, which is returned by many functions
     */
    public Result $result;


    public function __construct()
    {
        # initialize default parameters
        $this->destination = "/";   
        $this->filename = "simplelog";
        $this->result = new Result;
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

class Result {
    private bool $success;
    private string $message;

    public function __construct()
    {
        
    }
}
?>