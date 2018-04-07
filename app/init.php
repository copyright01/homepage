<?php

/**
 * Plik inicjalizujacy
 */
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
$AbsoluteURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$AbsoluteURL .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$slash = substr($AbsoluteURL, -1);
$NewURL = $slash != '/' ? $AbsoluteURL . '/' : $AbsoluteURL;
/**
 * Podstawowy adres https portalu.
 */
define('SERVER_ADDRESS', $NewURL);

set_include_path(get_include_path() . PATH_SEPARATOR . 'app/class');

function __autoload($name) {
    include_once ($name . ".php");
}
