<?php include 'admin_data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        header, footer {
            background: #c0392b;
            color: white;
            text-align: center;
            padding: 1rem;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 1rem;
            padding: 0;
        }

        nav a {
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 2rem;
        }

        .stat-item {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

<header>
    <h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <!-- <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="manage_donors.php">Manage Donors</a></li>
            <li><a href="manage_requests.php">Manage Requests</a></li>
            <li><a href="blood_stock.php">Blood Stock</a></li>
            <li><a href="purchase_history.php">Purchase History</a></li>
            <li><a href="logout.php">Logout</a></li> -->
        </ul>
    </nav>
</header>

<main>
    <h2>Overview</h2>
    <div class="dashboard-stats">
        <div class="stat-item">
            <h3>Total Requests</h3>
            <p>🔴 <?php echo $total_requests; ?></p>
        </div>
        <div class="stat-item">
            <h3>Total Donors</h3>
            <p>❤️ <?php echo $total_donors; ?></p>
        </div>
        <div class="stat-item">
            <h3>Total Blood Sold</h3>
            <p>🛒 <?php echo $total_sold ?? 0; ?> units</p>
        </div>
        <div class="stat-item">
            <h3>Blood Stock</h3>
            <?php if (!empty($blood_stock)): ?>
                <table>
                    <tr>
                        <th>Blood Group</th>
                        <th>Stock (Units)</th>
                    </tr>
                    <?php foreach ($blood_stock as $stock): ?>
                        <tr>
                            <td><?= $stock['blood_group']; ?></td>
                            <td><?= $stock['stock_quantity']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No stock data available.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2025 LifeSaver Blood Bank</p>
</footer>

</body>
</html>
