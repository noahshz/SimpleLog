<?php
    require_once 'SimpleLog.php';

    $log = new SimpleLog();
    $log->destination = "C:/Users/scholzno/Documents/SimpleLog/";
    $log->filename = "test";

    $log->write("test");
?>