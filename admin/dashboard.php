<?php
// session_start();

// // Check if user is logged in
// if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
//     header("Location: login.php");
//     exit();
// }


    
require_once '../includes/conn.php';
$query ="SELECT * FROM recommendee";
$stmt = $conn->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/ad-dashboard.css">
    <title>Admin Dashboard</title>
    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .logout-btn {
            background-color: #ff4444;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <a href="../index.php" class="logout-btn">Logout</a>
        </div>
        
        <!-- Add your dashboard content here -->
        <div class="dashboard-content">
            <h2>Welcome, Admin!</h2>
            <p>This is your dashboard. You can add various admin features here such as:</p>

            <table>
                <thead>
                <tr>
                    <th>id</th>
                    <th>NAME</th>
                    <th>SKILL</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                $id = 0;
                foreach($results as $recommendee){  
                   $id++; 
                ?>
                   <tr>
                       <td><?php echo $id ?></td>
                       <td><?php echo $recommendee['name'] ?></td>
                       <td><?php echo $recommendee['skill'] ?></td>
                       <td><?php echo $recommendee['email'] ?></td>
                       <td><?php echo $recommendee['phone'] ?></td>
                       <td>
                         <a href="update.php?id=<?php echo $recommendee['id'] ?>">
                            <button class="edit">Edit</button>
                        </a>

                         <a href="delete.php?id=<?php echo $recommendee['id'] ?>" >
                            <button class="delete">Delete</button>
                        </a>
                       </td>
                   </tr>
                <?php }?>
                </tbody>
            </table>    
            <!-- 
            <ul>
                <li>User Management</li>
                <li>Content Management</li>
                <li>Statistics and Analytics</li>
                <li>Settings</li>
            </ul> -->
        </div>
    </div>
</body>
</html> 