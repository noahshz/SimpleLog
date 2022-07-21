<?php
    require_once 'SimpleLog.php';

    $log = new SimpleLog();
    # $log->destination = "/";
    $log->filename = "test";

    $log->write("Recieved an PHP error", ["Warning"]);
    # $log->clear();
    # echo $log->getContent();
?>