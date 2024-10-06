<?php 
$host = 'localhost'; 
$user = 'root'; 
$password = '';  
$dbname = 'auth';  

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function query($sql) {
    global $conn;
    return $conn->query($sql);
}

function escape_string($value) {
    global $conn;
    return $conn->real_escape_string($value);
}

function close_db() {
    global $conn;
    $conn->close();
}
?>
