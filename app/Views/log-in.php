<?php
require_once __DIR__ . '/../Controllers/AuthController.php';
$form_errors = $_SESSION['form_errors'] ?? [];
unset($_SESSION['form_errors']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SecureCore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="src/style.css">
    <script src="src/script.js" defer></script>

</head>

<body class="login-page">
    <ul class="circles">
        <li style="left: 25%; width: 80px; height: 80px; animation-delay: 0s;"></li>
        <li style="left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s;"></li>
        <li style="left: 70%; width: 20px; height: 20px; animation-delay: 4s;"></li>
        <li style="left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s;"></li>
        <li style="left: 65%; width: 20px; height: 20px; animation-delay: 0s;"></li>
        <li style="left: 85%; width: 120px; height: 120px; animation-delay: 7s;"></li>
    </ul>

    <div class="container">
        <div class="logo">
            <i class="fas fa-shield-halved"></i>
            <h1>SecureCore</h1>
            <p>Welcome back! Please login.</p>
        </div>

        <div id="alertBox" class="alert"></div>

        <form id="loginForm" method="POST" action="../Controllers/AuthController.php" novalidate>
            <div class="form-group">
                <label for="email">Email Address</label>
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" placeholder="name@company.com" required>
                <span class="error" id="emailError">Please enter a valid email address</span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
                <span class="error" id="passwordError">Password is required</span>
            </div>

            <div class="remember-forgot">
                <label class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <span style="margin-left: 5px;">Remember me</span>
                </label>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" name="login" class="btn" id="submitBtn" value="login">
                <span>Login</span>
                <i class="fas fa-arrow-right"></i>
            </button>

            <div class="register-link">
                Don't have an account? <a href="register.php">Register here</a>
            </div>
        </form>
    </div>


</body>

</html>