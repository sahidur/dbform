<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #343a40;
            color: #fff;
            padding: 15px;
        }
        #sidebar .nav-link {
            color: #fff;
        }
        #sidebar .nav-link.active {
            background: #007bff;
        }
        #content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }
        #topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div id="sidebar" class="bg-dark">
        <h2 class="text-center">Admin Panel</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#settings">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#reports">Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#help">Help</a>
            </li>
        </ul>
    </div>

    <div id="content">
        <div id="topbar">
            <div class="navbar-nav">
                <span class="nav-item nav-link">Welcome, Admin</span>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#profile">Profile</a>
                <a class="nav-item nav-link" href="#logout">Logout</a>
            </div>
        </div>
        <div id="canvas">
            <!-- Dynamic content will be loaded here -->
            <h1>Dashboard</h1>
            <p>This is the dashboard area where you can see an overview of your admin panel.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
