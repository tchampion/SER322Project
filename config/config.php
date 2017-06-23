<?php

/* 
 * SER 322 Team 03 Pantry Project
 * Terin Champion
 * Hajar Boughoula
 * Nergal Givarkes
 */
/**
 * Author:  Terin
 * Created: Jun 18, 2017
 */

$GLOBALS['servername'] = "localhost";
$GLOBALS['username'] = "root";
$GLOBALS['password'] = "";

// Create connection
$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Run Create and Insert Scripts
$sql = file_get_contents('__DIR__/../db/mySQL.sql');
$conn->multi_query($sql);

