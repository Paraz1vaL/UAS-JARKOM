<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #45a049;
        }
        .add-button {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
        .action-buttons {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <div class="add-button">
        <a href="create.php">Tambah Mahasiswa</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'db.php';
        $sql = "SELECT * FROM mahasiswa ORDER BY id ASC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["nama"]. "</td>
                        <td>" . $row["nim"]. "</td>
                        <td>" . $row["prodi"]. "</td>
                        <td>" . $row["alamat"]. "</td>
                        <td><img src='uploads/" . $row["foto"]. "' width='100'></td>
                        <td>
                            <a href='update.php?id=" . $row["id"] . "'>Edit</a> 
                            <p></p>
                            <a href='delete.php?id=" . $row["id"] . "'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <div class="action-buttons">
        <a href="home.php">Kembali ke Home</a> 
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
