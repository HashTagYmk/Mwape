<?php

$HOST = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE_NAME = 'ttsdb';

$db_connection = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE_NAME);
 
// Check connection
if($db_connection === false){
    die("ERROR: Could not connect. " . $db_connection->connect_error);
}

?>