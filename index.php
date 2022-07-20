<?php
    require_once 'SimpleLog.php';

    $log = new SimpleLog();
    $log->destination = "/";
    $log->filename = "LOG";

    $log->write();
?>