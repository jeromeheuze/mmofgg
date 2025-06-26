<?php

// this will avoid mysql_connect() deprecation error.
//error_reporting( ~E_DEPRECATED & ~E_NOTICE );
// but I strongly suggest you to use PDO or MySQLi.

define("DBHOST", "localhost");
define("DBUSER", "spectrum_mmo_u");
define("DBPASS", "c40{bR[s)bg742nr");
define("DBNAME", "spectrum_mmofishing");

$DBhost = "localhost";
//prod
$DBuser = "spectrum_mmo_u";
$DBpass = "c40{bR[s)bg742nr";
$DBname = "spectrum_mmofishing";

$DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);

if ($DBcon->connect_errno) {
    die("ERROR : -> ".$DBcon->connect_error);
}