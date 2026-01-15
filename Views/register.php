<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SecureCore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>


</head>

<body class="register-page">
    <ul class="circles">
        <li style="left: 25%; width: 80px; height: 80px; animation-delay: 0s;"></li>
        <li style="left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s;"></li>
        <li style="left: 70%; width: 20px; height: 20px; animation-delay: 4s;"></li>
        <li style="left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s;"></li>
        <li style="left: 85%; width: 150px; height: 150px; animation-delay: 7s;"></li>
    </ul>

    <div class="container">
        <div class="logo">
            <i class="fas fa-user-plus"></i>
            <h1>SecureCore</h1>
            <p>Join our secure community</p>
        </div>

        <div id="alertBox" class="alert"></div>

        <form id="registerForm" novalidate>
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <i class="fas fa-user input-icon"></i>
                <input type="text" id="fullName" name="fullName" placeholder="John Doe" required>
                <span class="error" id="fullNameError">Full name is required</span>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" placeholder="john@example.com" required>
                <span class="error" id="emailError">Please enter a valid email address</span>
            </div>

            <div class="form-group">
                <label for="role">Register As</label>
                <i class="fas fa-briefcase input-icon"></i>
                <select id="role" name="role" required>
                    <option value="">Select your role</option>
                    <option value="candidate">Candidate</option>
                    <option value="company">Company</option>
                </select>
                <span class="error" id="roleError">Please select a role</span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
                <div class="password-requirements" id="passwordRequirements">
                    <p style="margin-bottom: 5px; font-weight: 600;">Security check:</p>
                    <ul>
                        <li id="reqLength" class="invalid">● At least 8 characters</li>
                        <li id="reqUppercase" class="invalid">● One uppercase letter</li>
                        <li id="reqLowercase" class="invalid">● One lowercase letter</li>
                        <li id="reqNumber" class="invalid">● One number</li>
                    </ul>
                </div>
                <span class="error" id="passwordError">Password does not meet requirements</span>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <i class="fas fa-shield-check input-icon"></i>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="••••••••" required>
                <span class="error" id="confirmPasswordError">Passwords do not match</span>
            </div>

            <div class="terms">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="#">Terms of Service</a> & <a href="#">Privacy
                        Policy</a></label>
            </div>

            <button type="submit" class="btn" id="submitBtn">
                <span>Create Account</span>
                <i class="fas fa-paper-plane"></i>
            </button>

            <div class="login-link">
                Already have an account? <a href="log-in.php">Login here</a>
            </div>
        </form>
    </div>


</body>

</html>