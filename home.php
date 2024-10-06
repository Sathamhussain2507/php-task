<?php 
session_start(); 

if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');  
    exit();
}

$user_name = htmlspecialchars($_SESSION['user_name']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/home.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $user_name; ?>!</h1>
        <nav>
            <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </header>
    <main>
        <p style="text-align: center;">This is your dashboard.</p> 
    </main> 
</body>
</html>
