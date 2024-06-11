<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
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
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
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
        <h1>Register</h1>
        <form action="register.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Register">
        </form>
        <div class="message">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include 'db.php';

                $username = $_POST['username'];
                $password = $_POST['password']; // Password is stored as plain text

                $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

                if ($conn->query($sql) === TRUE) {
                    echo "New user created successfully";
                    header('Location: login.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>
        </div>
    </div>
</body>
</html>
