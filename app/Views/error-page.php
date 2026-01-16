<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied | SecureCore</title>
    <link rel="stylesheet" href="src/style.css">
    <script src="src/script.js" defer></script>

</head>

<body class="error-page">

    <!-- Floating warning background -->
    <div class="floating-icons" id="floatingIcons"></div>

    <div class="error-container">
        <div class="error-icon">🔒</div>
        <div class="error-code">403</div>
        <h1 class="error-title">Access Denied</h1>
        <p class="error-message">
            You don't have permission to access this resource. This area is restricted to authorized users only.
        </p>

        <div class="error-details">
            <p><strong>Reason:</strong> Insufficient permissions</p>
            <p><strong>Your Role:</strong> <span id="userRole">Not authenticated</span></p>
            <p><strong>Required Role:</strong> <span id="requiredRole">Administrator</span></p>
        </div>

        <div class="button-group">
            <a href="log-in.php" class="btn btn-primary">Go to Login</a>
            <button onclick="goBack()" class="btn btn-secondary">Go Back</button>
        </div>

        <div class="info-list">
            <h3>What can I do?</h3>
            <ul>
                <li>Check if you're logged in with the correct account</li>
                <li>Contact your administrator for access permission</li>
                <li>Return to the homepage and try a different section</li>
                <li>If you believe this is an error, report it to support</li>
            </ul>
        </div>
    </div>

</body>

</html>