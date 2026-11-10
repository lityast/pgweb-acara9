<?php 
    $id = $_POST['id']; 
    $nama_faskes = $_POST['nama_faskes']; 
    $kalurahan = $_POST['kalurahan']; 
    $kecamatan = $_POST['kecamatan']; 
    $jam_buka = $_POST['jam_buka']; 
    $longitude = $_POST['longitude']; 
    $latitude = $_POST['latitude']; 
 
    // Sesuaikan dengan setting MySQL 
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "pgweb8"; 
 
    // Create connection 
    $conn = new mysqli($servername, $username, $password, $dbname); 
 
    // Check connection 
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 
 
    $sql = "UPDATE `sebaran faskes` SET nama_faskes='$nama_faskes', kalurahan='$kalurahan', kecamatan='$kecamatan', jam_buka='$jam_buka', longitude=$longitude, latitude=$latitude WHERE id=$id"; 
 
    if ($conn->query($sql) === TRUE) { 
        // Langsung pindah ke halaman utama tabel
        header("Location: ../index.php"); 
        exit();
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
    } 
 
    $conn->close(); 
?>