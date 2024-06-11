<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Mahasiswa</h1>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
            <label for="prodi">Prodi:</label>
            <input type="text" id="prodi" name="prodi" required>
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" required>
            <input type="submit" value="Submit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php';
            
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $prodi = $_POST['prodi'];
            $alamat = $_POST['alamat'];
            $foto = $_FILES['foto']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);

            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO mahasiswa (nama, nim, prodi, alamat, foto) VALUES ('$nama', '$nim', '$prodi', '$alamat', '$foto')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header('Location: index.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
