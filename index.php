<?php 
session_start();
 
if (isset($_SESSION['csrf_token'])) { 
    header("Location: home.php");
    exit();
} else { 
    header("Location: login.php");
    exit();
}
?>