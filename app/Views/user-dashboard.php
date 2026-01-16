<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Dashboard - SecureCore</title>
    <script src="src/script.js" defer></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
        }

        .navbar {
            background: linear-gradient(-45deg, #667eea, #764ba2, #6b8cff, #df5a5aff);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            font-weight: bold;
        }

        .logout-btn {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .welcome-banner {
            background: linear-gradient(-45deg, #667eea, #764ba2, #6b8cff, #8a5adf);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .welcome-banner h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
s
        .welcome-banner p {
            font-size: 16px;
            opacity: 0.9;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .card-icon.purple {
            background-color: #e8e4ff;
            color: #667eea;
        }

        .card-icon.green {
            background-color: #d4f4dd;
            color: #27ae60;
        }

        .card-icon.orange {
            background-color: #ffe8d4;
            color: #f39c12;
        }

        .card-icon.blue {
            background-color: #d4e9ff;
            color: #3498db;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .card-value {
            font-size: 32px;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
            font-size: 14px;
        }

        .recent-section {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h2 {
            font-size: 22px;
            color: #333;
        }

        .view-all-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .view-all-link:hover {
            text-decoration: underline;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f8f9fa;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #e1e8ed;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #e1e8ed;
            color: #666;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-badge.pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-badge.accepted {
            background-color: #d4edda;
            color: #155724;
        }

        .status-badge.rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .welcome-banner h1 {
                font-size: 24px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-brand">SecureCore</div>
        <div class="navbar-user">
            <div class="user-info">
                <div class="user-avatar">JD</div>
                <span>John Doe</span>
            </div>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-banner">
            <h1>Welcome back, John!</h1>
            <p>Here's an overview of your profile and applications</p>
        </div>

        <div class="dashboard-grid">
            <div class="card">
                <div class="card-icon purple">📝</div>
                <h3>Total Applications</h3>
                <div class="card-value">12</div>
                <p>Applications submitted</p>
            </div>

            <div class="card">
                <div class="card-icon orange">⏳</div>
                <h3>Pending Review</h3>
                <div class="card-value">5</div>
                <p>Awaiting response</p>
            </div>

            <div class="card">
                <div class="card-icon green">✓</div>
                <h3>Accepted</h3>
                <div class="card-value">4</div>
                <p>Applications accepted</p>
            </div>

            <div class="card">
                <div class="card-icon blue">👁️</div>
                <h3>Profile Views</h3>
                <div class="card-value">87</div>
                <p>In the last 30 days</p>
            </div>
        </div>

        <div class="recent-section">
            <div class="section-header">
                <h2>Recent Applications</h2>
                <a href="#" class="view-all-link">View All →</a>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Company</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Senior Frontend Developer</td>
                            <td>Tech Solutions Inc.</td>
                            <td>Jan 10, 2026</td>
                            <td><span class="status-badge pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Full Stack Engineer</td>
                            <td>Innovation Labs</td>
                            <td>Jan 8, 2026</td>
                            <td><span class="status-badge accepted">Accepted</span></td>
                        </tr>
                        <tr>
                            <td>React Developer</td>
                            <td>Digital Creatives</td>
                            <td>Jan 5, 2026</td>
                            <td><span class="status-badge pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>UI/UX Developer</td>
                            <td>Design Studio</td>
                            <td>Jan 3, 2026</td>
                            <td><span class="status-badge rejected">Rejected</span></td>
                        </tr>
                        <tr>
                            <td>Backend Developer</td>
                            <td>Cloud Systems</td>
                            <td>Dec 28, 2025</td>
                            <td><span class="status-badge accepted">Accepted</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="recent-section">
            <div class="section-header">
                <h2>Profile Completion</h2>
            </div>
            <div style="margin-bottom: 15px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                    <span style="color: #666;">Your profile is 75% complete</span>
                    <span style="color: #667eea; font-weight: 600;">75%</span>
                </div>
                <div style="background-color: #e1e8ed; height: 10px; border-radius: 5px; overflow: hidden;">
                    <div style="
                        background: linear-gradient(-45deg, #667eea, #764ba2, #6b8cff, #8a5adf);
                        background-size: 400% 400%;
                        animation: gradientShift 15s ease infinite;
                        height: 100%;
                        width: 75%;
                        transition: width 0.3s;">
                    </div>
                </div>
            </div>
            <p style="color: #666; font-size: 14px;">Complete your profile to increase your chances of getting hired.
            </p>
        </div>
    </div>
</body>

</html>