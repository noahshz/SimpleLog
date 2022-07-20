<?php
    require_once 'SimpleLog.php';

    $log = new SimpleLog();
    # $log->destination = "/";
    $log->filename = "test";

    $log->write("test") ? "uhsd" : "isuahd";
?>