<?php 
 
require_once 'libs/csrf.php'; 

$csrf_token = generateCsrfToken(); 
 
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Registration system</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script> 
    <script src="assets/js/toaster.min.js"></script> 
    <style>
        .error {
            color: red; 
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form method="post" action="register.php" id="registerForm" autocomplete="off">
        <input  type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="user_name" id="user_name">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" id="password" autocomplete="new-password">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" autocomplete="new-password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user" >Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>  
    <script src="assets/js/toaster.js"></script>
    <script src="assets/js/register.js"></script> 
</body>
</html>