<?php
$server = false;

if ($server) {
    // SERVER //
    define('host', 'localhost');
    define('user', '202410101122');
    define('pass', 'secret');
    define('db', 'uas202410101122');
} else {
    // LOCAL //
    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');
    define('db', 'sakila');
}

$conn = mysqli_connect(host, user, pass, db);
