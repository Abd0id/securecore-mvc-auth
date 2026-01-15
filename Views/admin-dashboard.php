<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SecureCore</title>
    <script src="script.js" defer></script>

        <style>
            * {
                margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

            body {
                font - family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            display: flex;
        }

            .sidebar {
                width: 250px;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            color: white;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
        }

            .sidebar-header {
                padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

            .sidebar-header h1 {
                font - size: 24px;
            margin-bottom: 5px;
        }

            .sidebar-header p {
                font - size: 12px;
            opacity: 0.7;
        }

            .sidebar-menu {
                padding: 20px 0;
        }

            .menu-item {
                padding: 15px 25px;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

            .menu-item:hover,
            .menu-item.active {
                background - color: rgba(255, 255, 255, 0.1);
        }

            .menu-item-icon {
                font - size: 20px;
            width: 24px;
        }

            .main-content {
                margin - left: 250px;
            flex: 1;
        }

            .navbar {
                background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

            .navbar-title {
                font - size: 24px;
            color: #2c3e50;
            font-weight: 600;
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
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

            .logout-btn {
                background - color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

            .logout-btn:hover {
                background - color: #c0392b;
        }

            .container {
                padding: 30px;
        }

            .stats-grid {
                display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

            .stat-card {
                background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-left: 4px solid #3498db;
        }

            .stat-card.users {
                border - left - color: #3498db;
        }

            .stat-card.companies {
                border - left - color: #2ecc71;
        }

            .stat-card.candidates {
                border - left - color: #9b59b6;
        }

            .stat-card.jobs {
                border - left - color: #f39c12;
        }

            .stat-header {
                display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

            .stat-title {
                color: #666;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

            .stat-icon {
                width: 45px;
            height: 45px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

            .stat-card.users .stat-icon {
                background - color: #e3f2fd;
            color: #3498db;
        }

            .stat-card.companies .stat-icon {
                background - color: #e8f5e9;
            color: #2ecc71;
        }

            .stat-card.candidates .stat-icon {
                background - color: #f3e5f5;
            color: #9b59b6;
        }

            .stat-card.jobs .stat-icon {
                background - color: #fff3e0;
            color: #f39c12;
        }

            .stat-value {
                font - size: 36px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }

            .stat-change {
                font - size: 13px;
            color: #27ae60;
        }

            .stat-change.negative {
                color: #e74c3c;
        }

            .section {
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

            .section-title {
                font - size: 20px;
            color: #2c3e50;
            font-weight: 600;
        }

            .filter-tabs {
                display: flex;
            gap: 10px;
        }

            .tab {
                padding: 8px 16px;
            border: 1px solid #e1e8ed;
            border-radius: 5px;
            background: white;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

            .tab:hover,
            .tab.active {
                background - color: #2c3e50;
            color: white;
            border-color: #2c3e50;
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
            color: #2c3e50;
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

            .role-badge {
                display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

            .role-badge.admin {
                background - color: #ffebee;
            color: #c62828;
        }

            .role-badge.company {
                background - color: #e8f5e9;
            color: #2e7d32;
        }

            .role-badge.candidate {
                background - color: #f3e5f5;
            color: #6a1b9a;
        }

            .status-indicator {
                width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

            .status-indicator.active {
                background - color: #27ae60;
        }

            .status-indicator.inactive {
                background - color: #95a5a6;
        }

            .action-buttons {
                display: flex;
            gap: 8px;
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

            .btn-edit {
                background - color: #3498db;
            color: white;
        }

            .btn-delete {
                background - color: #e74c3c;
            color: white;
        }

            .btn-view {
                background - color: #95a5a6;
            color: white;
        }

            @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            transition: transform 0.3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin - left: 0;
            }

            .stats-grid {
                grid - template - columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

            @media (max-width: 768px) {
            .navbar - title {
                font - size: 18px;
            }

            .stats-grid {
                grid - template - columns: 1fr;
            }

            .filter-tabs {
                flex - wrap: wrap;
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
                <div class="sidebar">
                    <div class="sidebar-header">
                        <h1>SecureCore</h1>
                        <p>Admin Panel</p>
                    </div>
                    <nav class="sidebar-menu">
                        <div class="menu-item active">
                            <span class="menu-item-icon">📊</span>
                            <span>Dashboard</span>
                        </div>
                        <div class="menu-item">
                            <span class="menu-item-icon">👥</span>
                            <span>Users</span>
                        </div>
                        <div class="menu-item">
                            <span class="menu-item-icon">🏢</span>
                            <span>Companies</span>
                        </div>
                        <div class="menu-item">
                            <span class="menu-item-icon">👤</span>
                            <span>Candidates</span>
                        </div>
                        <div class="menu-item">
                            <span class="menu-item-icon">💼</span>
                            <span>Job Postings</span>
                        </div>
                        <div class="menu-item">
                            <span class="menu-item-icon">⚙️</span>
                            <span>Settings</span>
                        </div>
                        <div class="menu-item">
                            <span class="menu-item-icon">📝</span>
                            <span>Reports</span>
                        </div>
                    </nav>
                </div>

                <div class="main-content">
                    <nav class="navbar">
                        <div class="navbar-title">Dashboard Overview</div>
                        <div class="navbar-user">
                            <div class="user-info">
                                <div class="user-avatar">AD</div>
                                <span>Admin</span>
                            </div>
                            <button class="logout-btn" onclick="logout()">Logout</button>
                        </div>
                    </nav>

                    <div class="container">
                        <div class="stats-grid">
                            <div class="stat-card users">
                                <div class="stat-header">
                                    <div>
                                        <div class="stat-title">Total Users</div>
                                        <div class="stat-value">1,284</div>
                                        <div class="stat-change">↑ 12% from last month</div>
                                    </div>
                                    <div class="stat-icon">👥</div>
                                </div>
                            </div>

                            <div class="stat-card companies">
                                <div class="stat-header">
                                    <div>
                                        <div class="stat-title">Companies</div>
                                        <div class="stat-value">187</div>
                                        <div class="stat-change">↑ 8% from last month</div>
                                    </div>
                                    <div class="stat-icon">🏢</div>
                                </div>
                            </div>

                            <div class="stat-card candidates">
                                <div class="stat-header">
                                    <div>
                                        <div class="stat-title">Candidates</div>
                                        <div class="stat-value">1,089</div>
                                        <div class="stat-change">↑ 15% from last month</div>
                                    </div>
                                    <div class="stat-icon">👤</div>
                                </div>
                            </div>

                            <div class="stat-card jobs">
                                <div class="stat-header">
                                    <div>
                                        <div class="stat-title">Active Jobs</div>
                                        <div class="stat-value">342</div>
                                        <div class="stat-change negative">↓ 3% from last month</div>
                                    </div>
                                    <div class="stat-icon">💼</div>
                                </div>
                            </div>
                        </div>

                        <div class="section">
                            <div class="section-header">
                                <h2 class="section-title">Recent Users</h2>
                                <div class="filter-tabs">
                                    <button class="tab active">All</button>
                                    <button class="tab">Candidates</button>
                                    <button class="tab">Companies</button>
                                    <button class="tab">Admins</button>
                                </div>
                            </div>

                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Registered</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Smith</td>
                                            <td>john.smith@email.com</td>
                                            <td><span class="role-badge candidate">Candidate</span></td>
                                            <td>
                                                <span class="status-indicator active"></span>
                                                Active
                                            </td>
                                            <td>Jan 12, 2026</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                    <button class="btn-sm btn-delete">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tech Solutions Inc.</td>
                                            <td>hr@techsolutions.com</td>
                                            <td><span class="role-badge company">Company</span></td>
                                            <td>
                                                <span class="status-indicator active"></span>
                                                Active
                                            </td>
                                            <td>Jan 11, 2026</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                    <button class="btn-sm btn-delete">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sarah Johnson</td>
                                            <td>sarah.j@email.com</td>
                                            <td><span class="role-badge candidate">Candidate</span></td>
                                            <td>
                                                <span class="status-indicator active"></span>
                                                Active
                                            </td>
                                            <td>Jan 10, 2026</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                    <button class="btn-sm btn-delete">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Innovation Labs</td>
                                            <td>contact@innovationlabs.com</td>
                                            <td><span class="role-badge company">Company</span></td>
                                            <td>
                                                <span class="status-indicator active"></span>
                                                Active
                                            </td>
                                            <td>Jan 9, 2026</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                    <button class="btn-sm btn-delete">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Michael Brown</td>
                                            <td>m.brown@email.com</td>
                                            <td><span class="role-badge candidate">Candidate</span></td>
                                            <td>
                                                <span class="status-indicator inactive"></span>
                                                Inactive
                                            </td>
                                            <td>Jan 8, 2026</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn-sm btn-view">View</button>
                                                    <button class="btn-sm btn-edit">Edit</button>
                                                    <button class="btn-sm btn-delete">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>System Admin</td>
                                            <td>admin@securecore.com</td>
                                            <td><span class="role-badge admin">Admin</span></td>
                                            <td>
                                                <span class="status-indicator active"></span>
                                                Active
                                            </td>
                                            <td>Dec 1, 2025</td>
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
                    </div>
                </div>

            </body>
</html >