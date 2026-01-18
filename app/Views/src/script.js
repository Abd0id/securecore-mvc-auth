/* ===============================
   GLOBAL UTILITIES
================================ */

function logout() {
  if (confirm("Are you sure you want to logout?")) {
        window.location.href = "log-in.php";
  }
}

function goBack() {
  if (window.history.length > 1) {
    window.history.back();
  } else {
    window.location.href = "log-in.php";
  }
}

/* ===============================
   ERROR PAGE LOGIC
================================ */

if (document.body.classList.contains("error-page")) {
  const urlParams = new URLSearchParams(window.location.search);
  const userRole = urlParams.get("role");
  const requiredRole = urlParams.get("required");

  if (userRole && document.getElementById("userRole")) {
    document.getElementById("userRole").textContent =
      userRole.charAt(0).toUpperCase() + userRole.slice(1);
  }

  if (requiredRole && document.getElementById("requiredRole")) {
    document.getElementById("requiredRole").textContent =
      requiredRole.charAt(0).toUpperCase() + requiredRole.slice(1);
  }

  const container = document.getElementById("floatingIcons");
  if (container) {
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
  }
}

/* ===============================
   DASHBOARD LOGIC
================================ */

if (document.body.classList.contains("dashboard-page")) {
  document.querySelectorAll(".tab").forEach(tab => {
    tab.addEventListener("click", function () {
      document.querySelectorAll(".tab").forEach(t => t.classList.remove("active"));
      this.classList.add("active");
    });
  });

  const menuToggle = document.createElement("button");
  menuToggle.textContent = "☰";
  menuToggle.style.cssText =
    "position: fixed; top: 20px; left: 20px; z-index: 1000; background: #2c3e50; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; display: none;";

  if (window.innerWidth <= 1024) {
    menuToggle.style.display = "block";
  }

  document.body.appendChild(menuToggle);

  menuToggle.addEventListener("click", function () {
    const sidebar = document.querySelector(".sidebar");
    if (sidebar) sidebar.classList.toggle("open");
  });

  window.addEventListener("resize", function () {
    const sidebar = document.querySelector(".sidebar");
    if (window.innerWidth <= 1024) {
      menuToggle.style.display = "block";
    } else {
      menuToggle.style.display = "none";
      if (sidebar) sidebar.classList.remove("open");
    }
  });
}

function createJob() {
  alert("Create job functionality will be implemented");
}

/* ===============================
   LOGIN PAGE
================================ */

if (document.body.classList.contains("login-page")) {
  const form = document.getElementById("loginForm");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const emailError = document.getElementById("emailError");
  const passwordError = document.getElementById("passwordError");
  const submitBtn = document.getElementById("submitBtn");
  const alertBox = document.getElementById("alertBox");

  function showAlert(message, type) {
    alertBox.textContent = message;
    alertBox.className = `alert alert-${type} show`;
    setTimeout(() => alertBox.classList.remove("show"), 5000);
  }

  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function validateForm() {
    let isValid = true;
    emailError.classList.remove("show");
    passwordError.classList.remove("show");

    if (!emailInput.value.trim() || !validateEmail(emailInput.value)) {
      emailError.classList.add("show");
      isValid = false;
    }

    if (!passwordInput.value.trim()) {
      passwordError.classList.add("show");
      isValid = false;
    }

    return isValid;
  }

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    if (validateForm()) {
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';

      setTimeout(() => {
        showAlert("Success! Redirecting...", "success");
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<span>Login</span><i class="fas fa-arrow-right"></i>';
      }, 1500);
    }
  });
}

/* ===============================
   REGISTER PAGE
================================ */

if (document.body.classList.contains("register-page")) {
  const form = document.getElementById("registerForm");
  const passwordInput = document.getElementById("password");
  const passRequirements = document.getElementById("passwordRequirements");
  const submitBtn = document.getElementById("submitBtn");

  passwordInput.addEventListener("focus", () => {
    passRequirements.classList.add("show");
  });

  passwordInput.addEventListener("input", function () {
    const val = this.value;
    const checks = {
      reqLength: val.length >= 8,
      reqUppercase: /[A-Z]/.test(val),
      reqLowercase: /[a-z]/.test(val),
      reqNumber: /[0-9]/.test(val)
    };

    for (const [id, passed] of Object.entries(checks)) {
      const el = document.getElementById(id);
      if (!el) continue;
      el.className = passed ? "valid" : "invalid";
      el.innerHTML = (passed ? "✓ " : "● ") + el.innerText.substring(2);
    }
  });

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating...';

    setTimeout(() => {
      // alert("Account Created Successfully!");
      submitBtn.disabled = false;
      submitBtn.innerHTML =
        '<span>Create Account</span><i class="fas fa-paper-plane"></i>';
    }, 2000);
  });
}
