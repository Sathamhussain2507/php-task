<?php
require_once '../libs/database.php';
require_once '../libs/csrf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!validateCsrfToken($_POST['csrf_token'])) {
        $response['status'] = false;
        $response['message'] = 'Invalid CSRF token'; 
    }

    $email = escape_string($_POST['email']);
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']) ? true : false;

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_name'] = $user['user_name'];
            if ($remember_me) { 
                setcookie('email', $email, time() + (30 * 24 * 60 * 60), "/");
            } else { 
                setcookie('email', '', time() - 3600, "/"); 
            }
            $response['status'] = true;
            $response['message'] = 'Login successful!'; 
        } else {
            $response['status'] = false;
            $response['message'] = 'Invalid email or password.';
        }
    } else {
        $response['status'] = false;
        $response['message'] = 'Invalid email or password.';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>