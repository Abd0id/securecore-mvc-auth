<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SecureCore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
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

        <form id="loginForm" novalidate>
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

            <button type="submit" class="btn" id="submitBtn">
                <span>Login</span>
                <i class="fas fa-arrow-right"></i>
            </button>

            <div class="register-link">
                Don't have an account? <a href="register.php">Register here</a>
            </div>
        </form>
    </div>

    <script>
        // Existing logic
        const form = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');
        const submitBtn = document.getElementById('submitBtn');
        const alertBox = document.getElementById('alertBox');

        function showAlert(message, type) {
            alertBox.textContent = message;
            alertBox.className = `alert alert-${type} show`;
            setTimeout(() => alertBox.classList.remove('show'), 5000);
        }

        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (validateForm()) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';

                setTimeout(() => {
                    showAlert('Success! Redirecting...', 'success');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<span>Login</span><i class="fas fa-arrow-right"></i>';
                }, 1500);
            }
        });

        function validateForm() {
            let isValid = true;
            emailError.classList.remove('show');
            passwordError.classList.remove('show');

            if (!emailInput.value.trim() || !validateEmail(emailInput.value)) {
                emailError.classList.add('show');
                isValid = false;
            }
            if (!passwordInput.value.trim()) {
                passwordError.classList.add('show');
                isValid = false;
            }
            return isValid;
        }
    </script>
</body>

</html>