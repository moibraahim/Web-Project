<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$link = new mysqli("localhost", "root", "", "project");

if (mysqli_error($link)) {
    die("Database Error: {$link->error}");
}