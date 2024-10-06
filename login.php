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
</head>

<body>
    <div class="header">
        <h2>Login</h2>
    </div>

    <form method="post" id="loginForm">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" id="email" value="<?php echo isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" id="password" autocomplete="new-password">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember_me" value="1" id="remember_me" <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="remember_me">
                Remember me
            </label>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>
    <script src="assets/js/toaster.min.js"></script> 
    <script src="assets/js/toaster.js"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>