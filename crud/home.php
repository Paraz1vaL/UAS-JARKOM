<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #45a049;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: whitesmoke;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 100px;
            width: 600px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
        }
        .welcome-message {
            color: #666;
            margin-bottom: 30px;
        }
        a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin: 0 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
    ?>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p class="welcome-message">You are now logged in to the system.</p>
        <a href="index.php">Manage Student Data</a>
        <p></p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
