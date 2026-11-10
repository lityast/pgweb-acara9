<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "pgweb8";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_faskes = $_POST['nama_faskes'];
        $kalurahan   = $_POST['kalurahan'];
        $kecamatan   = $_POST['kecamatan'];
        $jam_buka    = $_POST['jam_buka'];
        $longitude   = $_POST['longitude'];
        $latitude    = $_POST['latitude'];

        $sql = "INSERT INTO `sebaran faskes` (nama_faskes, kalurahan, kecamatan, jam_buka, longitude, latitude) 
                VALUES ('$nama_faskes', '$kalurahan', '$kecamatan', '$jam_buka', $longitude, $latitude)";

        if ($conn->query($sql) === TRUE) {
            // Arahkan kembali ke index.php di folder utama (root)
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>