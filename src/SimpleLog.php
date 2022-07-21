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
     * @param string $message Message that will be written in the log file
     * @param array $optional Default Null - Appends optional prefixes to the log message
     */
    public function write(string $message, array $optional_prefixes = null) : bool
    {
        $filepath = $this->destination . $this->filename . ".log";

        if(!file_exists($filepath)) {
            $this->createFile();
        }

        $current = file_get_contents($filepath);

        $time = new DateTime('now');
        $time = $time->format("H:i:s d-m-Y");

        if($optional_prefixes != null) {
            $tmp = "";
            foreach($optional_prefixes as $item) {
                if(!empty($item)) {
                    $tmp .= "[" . $item . "]";
                }
            }
            $current .= "\n[" . $time . "]" . $tmp . " -> " . $message . ";";
        } else {
            $current .= "\n[" . $time . "] -> " . $message . ";";
        }

        try {
            file_put_contents($filepath, $current);
            return true;
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return false;
    }

    /**
     * Creates log file
     * @return bool
     */
    private function createFile() : bool
    {
        $create_message = "";
        $create_message .= "----------------------------------------------------------------\n";
        $art = "    .----..-..-.   .-..----. .-.   .----..-.    .----.  .---. \n   { {__  | ||  `.'  || {}  }| |   | {_  | |   /  {}  \/   __} \n   .-._} }| || |\ /| || .--' | `--.| {__ | `--.\      /\  {_ } \n   `----' `-'`-' ` `-'`-'    `----'`----'`----' `----'  `---'\n";
        $create_message .= $art;
        $create_message .= "----------------------------------------------------------------\n";
        $create_message .= "Log file created on: ";
        $date_created = new DateTime('now');
        $date_created = $date_created->format("H:i:s d-m-Y");
        $create_message .= $date_created;
        $create_message .= "\n\n";        


        if(!is_dir($this->destination)) {
            $this->createDirectory();
        }
        $filepath = $this->destination . $this->filename . ".log";
        try {
            fopen($filepath, "w");
            file_put_contents($filepath, $create_message);
            return true;
        } catch (Exception $e) {
            return false;
        }
        return false;
    }
    /**
     * Creates log directory
     * @return bool
     */
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

    /**
     * returns the log file
     *  @return string
     */
    public function getContent() : string 
    {
        $filepath = $this->destination . $this->filename . ".log";
        if(file_exists($filepath)) {
            return file_get_contents($filepath);
        }
        return "";
    }

    /**
     * deletes log file an creates new one
     * @return bool
     */
    public function clear() : bool
    {
        $filepath = $this->destination . $this->filename . ".log";
        if(file_exists($filepath)) {
            try {
                unlink($filepath);
                $this->createFile();
                return true;
            } catch(Exception $e) {
                return false;
            }
        }
        return false;
    }
}
?>