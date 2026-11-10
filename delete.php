<?php 
    $id = $_GET['id']; 
     
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
     
    // Query delete dengan backtick karena nama tabel mengandung spasi
    $sql = "DELETE FROM `sebaran faskes` WHERE id = $id"; 
     
    if ($conn->query($sql) === TRUE) { 
        $conn->close(); 
        header("Location: index.php"); 
        exit();
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
        $conn->close();
    } 
?>