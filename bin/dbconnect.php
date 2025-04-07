<?php

// this will avoid mysql_connect() deprecation error.
//error_reporting( ~E_DEPRECATED & ~E_NOTICE );
// but I strongly suggest you to use PDO or MySQLi.

$DBhost = "localhost";
//prod
$DBuser = "spectrum_mmo_u";
$DBpass = "q(Aw4(8O?CIu";
$DBname = "spectrum_mmofishing";

$DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);

if ($DBcon->connect_errno) {
    die("ERROR : -> ".$DBcon->connect_error);
}