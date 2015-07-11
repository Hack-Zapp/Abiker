<?php
/**
 * This will get all data from a MySQL database and print it using JSON
 */
// Show all errors (if any)
error_reporting(-1);
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mysql_host = ""; // <-- MySQL Database URL
$mysql_database = ""; // <-- MySQL database name
$mysql_user = ""; // <-- MySQL user
$mysql_password = ""; // <-- Password for that MySQL user
header("Content-Type: text/html;charset=utf-8");
$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
// Check if all is OK.
if ($mysqli->connect_errno) {
    printf("Connection FAIL: %s\n", $mysqli->connect_error);
    exit();
}
// $sql = "SELECT "; <-- Remove comment, put SQL SELECT query here

//echo $sql; <-- May be useful if something fails
if ($resultado = $mysqli->query($sql)) {
    $output = array();
    
    // Obtain data
    while ($fila = $resultado->fetch_assoc()) {
        $output[]=$fila;
    }
    // Show all data as JSON Array
    print(json_encode($output));
    // Done!
    $resultado->free();
}
$mysqli->close();
?>
