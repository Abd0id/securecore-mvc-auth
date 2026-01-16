<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard - SecureCore</title>
    <script src="src/script.js" defer></script>

        <style>
            * {
                margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

            body {
                font - family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
        }

            .navbar {
                background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

            .navbar-brand {
                font - size: 24px;
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
            color: #27ae60;
            font-weight: bold;
        }

            .logout-btn {
                background - color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

            .logout-btn:hover {
                background - color: rgba(255, 255, 255, 0.3);
        }

            .container {
                max - width: 1400px;
            margin: 30px auto;
            padding: 0 20px;
        }

            .welcome-banner {
                background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

            .welcome-content h1 {
                font - size: 28px;
            margin-bottom: 10px;
        }

            .welcome-content p {
                font - size: 16px;
            opacity: 0.9;
        }

            .action-btn {
                background - color: white;
            color: #27ae60;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }

            .action-btn:hover {
                transform: translateY(-2px);
        }

            .dashboard-grid {
                display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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

            .card-icon.green {
                background - color: #d4f4dd;
            color: #27ae60;
        }

            .card-icon.blue {
                background - color: #d4e9ff;
            color: #3498db;
        }

            .card-icon.orange {
                background - color: #ffe8d4;
            color: #f39c12;
        }

            .card-icon.purple {
                background - color: #e8e4ff;
            color: #667eea;
        }

            .card h3 {
                font - size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

            .card-value {
                font - size: 32px;
            font-weight: bold;
            color: #27ae60;
            margin-bottom: 10px;
        }

            .card p {
                color: #666;
            font-size: 14px;
        }

            .content-row {
                display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

            .section {
                background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

            .section-header {
                display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

            .section-header h2 {
                font - size: 22px;
            color: #333;
        }

            .view-all-link {
                color: #27ae60;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }

            .view-all-link:hover {
                text - decoration: underline;
        }

            .table-container {
                overflow - x: auto;
        }

            table {
                width: 100%;
            border-collapse: collapse;
        }

            th {
                background - color: #f8f9fa;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #e1e8ed;
            font-size: 14px;
        }

            td {
                padding: 15px 12px;
            border-bottom: 1px solid #e1e8ed;
            color: #666;
            font-size: 14px;
        }

            tr:hover {
                background - color: #f8f9fa;
        }

            .status-badge {
                display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

            .status-badge.active {
                background - color: #d4edda;
            color: #155724;
        }

            .status-badge.closed {
                background - color: #f8d7da;
            color: #721c24;
        }

            .status-badge.draft {
                background - color: #e2e3e5;
            color: #383d41;
        }

            .action-buttons {
                display: flex;
            gap: 10px;
        }

            .btn-sm {
                padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: opacity 0.2s;
        }

            .btn-sm:hover {
                opacity: 0.8;
        }

            .btn-view {
                background - color: #3498db;
            color: white;
        }

            .btn-edit {
                background - color: #f39c12;
            color: white;
        }

            .activity-item {
                padding: 15px;
            border-bottom: 1px solid #e1e8ed;
        }

            .activity-item:last-child {
                border - bottom: none;
        }

            .activity-time {
                font - size: 12px;
            color: #999;
            margin-bottom: 5px;
        }

            .activity-text {
                color: #666;
            font-size: 14px;
        }

            .activity-text strong {
                color: #333;
        }

            @media (max-width: 1024px) {
            .content - row {
                grid - template - columns: 1fr;
            }
        }

            @media (max-width: 768px) {
            .navbar {
                flex - direction: column;
            gap: 15px;
            }

            .welcome-banner {
                flex - direction: column;
            gap: 20px;
            text-align: center;
            }

            .welcome-banner h1 {
                font - size: 24px;
            }

            .dashboard-grid {
                grid - template - columns: 1fr;
            }

            table {
                font - size: 12px;
            }

            th, td {
                padding: 10px 8px;
            }

            .action-buttons {
                flex - direction: column;
            }
        }
        </style>
</head >
            <body>
                <nav class="navbar">
                    <div class="navbar-brand">SecureCore</div>
                    <div class="navbar-user">
                        <div class="user-info">
                            <div class="user-avatar">TC</div>
                            <span>Tech Company Inc.</span>
                        </div>
                        <button class="logout-btn" onclick="logout()">Logout</button>
                    </div>
                </nav>

                <div class="container">
                    <div class="welcome-banner">
                        <div class="welcome-content">
                            <h1>Welcome, Tech Company Inc.!</h1>
                            <p>Manage your job postings and review candidates</p>
                        </div>
                        <button class="action-btn" onclick="createJob()">+ Post New Job</button>
                    </div>

                    <div class="dashboard-grid">
                        <div class="card">
                            <div class="card-icon green">💼</div>
                            <h3>Active Jobs</h3>
                            <div class="card-value">8</div>
                            <p>Currently hiring</p>
                        </div>

                        <div class="card">
                            <div class="card-icon blue">📨</div>
                            <h3>Total Applications</h3>
                            <div class="card-value">127</div>
                            <p>All time</p>
                        </div>

                        <div class="card">
                            <div class="card-icon orange">⏳</div>
                            <h3>Pending Review</h3>
                            <div class="card-value">23</div>
                            <p>Needs attention</p>
                        </div>

                        <div class="card">
                            <div class="card-icon purple">👥</div>
                            <h3>Hired</h3>
                            <div class="card-value">15</div>
                            <p>This month</p>
                        </div>
                    </div>

                    <div class="content-row">
                        <div class="section">
                            <div class="section-header">
                                <h2>Active Job Postings</h2>
                                <a href="#" class="view-all-link">View All →</a>
                            </div>

                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Applications</th>
                                            <th>Posted</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Senior Frontend Developer</td>
                                            <td>34</td>
                                            <td>Jan 5, 2026</td>
                                            <td><span class="status-badge active">Active</span></td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Backend Engineer</td>
                                            <td>28</td>
                                            <td>Jan 3, 2026</td>
                                            <td><span class="status-badge active">Active</span></td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Full Stack Developer</td>
                                            <td>41</td>
                                            <td>Dec 28, 2025</td>
                                            <td><span class="status-badge active">Active</span></td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>DevOps Engineer</td>
                                            <td>19</td>
                                            <td>Dec 20, 2025</td>
                                            <td><span class="status-badge active">Active</span></td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>UI/UX Designer</td>
                                            <td>0</td>
                                            <td>Jan 12, 2026</td>
                                            <td><span class="status-badge draft">Draft</span></td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="section">
                            <div class="section-header">
                                <h2>Recent Activity</h2>
                            </div>

                            <div class="activity-list">
                                <div class="activity-item">
                                    <div class="activity-time">2 hours ago</div>
                                    <div class="activity-text">
                                        <strong>John Smith</strong> applied for Senior Frontend Developer
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-time">5 hours ago</div>
                                    <div class="activity-text">
                                        <strong>Sarah Johnson</strong> applied for Backend Engineer
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-time">1 day ago</div>
                                    <div class="activity-text">
                                        You posted <strong>UI/UX Designer</strong> position
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-time">1 day ago</div>
                                    <div class="activity-text">
                                        <strong>Mike Davis</strong> applied for Full Stack Developer
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-time">2 days ago</div>
                                    <div class="activity-text">
                                        <strong>Emily Brown</strong> applied for DevOps Engineer
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-time">3 days ago</div>
                                    <div class="activity-text">
                                        You updated <strong>Backend Engineer</strong> requirements
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </body>
</html >