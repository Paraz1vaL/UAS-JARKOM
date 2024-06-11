<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5cb85c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #f4f4f4;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"],
        .register-button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        input[type="submit"]:hover,
        .register-button:hover {
            background-color: #4cae4c;
        }
        .message {
            margin-top: 15px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Login">
        </form>
        <button class="register-button" onclick="window.location.href='register.php'">Register</button>
        <div class="message">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include 'db.php';
                
                session_start();

                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($password == $row['password']) { // Plain text password comparison
                        $_SESSION['username'] = $username;
                        header('Location: home.php');
                    } else {
                        echo "Invalid password";
                    }
                } else {
                    echo "No user found with that username";
                }

                $conn->close();
            }
            ?>
        </div>
    </div>
</body>
</html>
