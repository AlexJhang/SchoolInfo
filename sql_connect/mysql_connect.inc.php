<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$servername = "127.0.0.1";
$username = "DB_proj1";
$password = "AlexAlex";
$dbname = "DB_proj1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit;
} 

if (!$conn->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $conn->error);
        exit;
    } else {
        //printf("Current character set: %s\n", $conn->character_set_name());
    }

?> 