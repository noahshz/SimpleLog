<?php
    require_once 'SimpleLog.php';

    $log = new SimpleLog();
    # $log->destination = "/";
    $log->filename = "test";

    $log->write("Recieved an PHP error", ["scholzno"]);
    # $log->clear();
    # echo $log->get();
?>