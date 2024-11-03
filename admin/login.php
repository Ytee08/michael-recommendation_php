<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/adminLogin-style.css">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>

    <form action="./handle_login.php" method="post">
        <label for="email">
            Email
            <input type="email" name="email" id="email" required>
        </label>
        <br>
        <label for="password">
            Password
            <input type="password" name="password" id="password" required>
        </label>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html> 