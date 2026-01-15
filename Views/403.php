<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied | SecureCore</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

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
            <a href="login.php" class="btn btn-primary">Go to Login</a>
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

    <script>
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = 'login.html';
            }
        }

        const urlParams = new URLSearchParams(window.location.search);
        const userRole = urlParams.get('role');
        const requiredRole = urlParams.get('required');

        if (userRole) {
            document.getElementById('userRole').textContent = userRole.charAt(0).toUpperCase() + userRole.slice(1);
        }

        if (requiredRole) {
            document.getElementById('requiredRole').textContent = requiredRole.charAt(0).toUpperCase() + requiredRole.slice(1);
        }

        // Generate floating warning icons
        const container = document.getElementById("floatingIcons");

        for (let i = 0; i < 20; i++) {
            const icon = document.createElement("div");
            icon.classList.add("icon");
            icon.textContent = "⚠️";
            icon.style.left = Math.random() * 100 + "%";
            icon.style.fontSize = 20 + Math.random() * 40 + "px";
            icon.style.animationDuration = 8 + Math.random() * 10 + "s";
            icon.style.animationDelay = Math.random() * 5 + "s";
            container.appendChild(icon);
        }
    </script>
</body>

</html>