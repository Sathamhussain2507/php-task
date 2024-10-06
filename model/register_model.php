<?php

require_once '../libs/database.php';
require_once '../libs/csrf.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!validateCsrfToken($_POST['csrf_token'])) {
        $response['success'] = false;
        $response['message'] = 'Invalid CSRF token.';
    } else {

        $user_name = escape_string($_POST['user_name']);
        $email = escape_string($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


        $unique_user_name = "SELECT * FROM users WHERE user_name = '$user_name'";
        $unique_user_name_result = query($unique_user_name);

        $unique_email = "SELECT * FROM users WHERE email = '$email'";
        $unique_result = query($unique_email);

        if ($unique_user_name_result->num_rows > 0) {
            $response['success'] = false;
            $response['message'] = 'Username already exists.';
        } elseif ($unique_result->num_rows > 0) {
            $response['success'] = false;
            $response['message'] = 'Email already exists.';
        } else {
            $sql = "INSERT INTO users (user_name,email, password) VALUES ('$user_name','$email','$password')";
            if (query($sql)) {
                $response['status'] = true; //success 
                $response['message'] = 'Registration successful.';
            } else {
                $response['status'] = false; //failure
                $response['message'] = 'Registration failed.';
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);

?>
