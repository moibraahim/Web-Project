<?php

$CSS = null;
$IMAGES = null;
$VIDEOS = null;

function redirect($action) {
    $host = $_SERVER['HTTP_HOST'];
    $url = dirname($_SERVER['PHP_SELF']);
    // Note: I'm running on unix, so some of these paths
    // may not work on windows. If that's the case
    // replace the forward slashes with escaped backward slashes
    header("Location: http://$host$url/$action");
}