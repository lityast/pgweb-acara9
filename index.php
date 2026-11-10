<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgweb8"; // Disesuaikan dengan nama database baru

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menggunakan backtick karena nama tabel mengandung spasi
$sql = "SELECT * FROM `sebaran faskes`"; 
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input</a><br><br>";

if ($result && $result->num_rows > 0) {
    echo "<table border='1px' cellpadding='5' cellspacing='0'><tr> 
    <th>Nama Faskes</th> 
    <th>Kalurahan</th> 
    <th>Kecamatan</th> 
    <th>Jam Buka</th> 
    <th>Longitude</th> 
    <th>Latitude</th> 
    <th colspan='2'>Aksi</th></tr>"; 
   
  // output data of each row 
  while($row = $result->fetch_assoc()) { 
    echo "<tr>".
         "<td>".$row["nama_faskes"]."</td>". 
         "<td>".$row["kalurahan"]."</td>". 
         "<td>".$row["kecamatan"]."</td>". 
         "<td>".$row["jam_buka"]."</td>". 
         "<td>".$row["longitude"]."</td>". 
         "<td>".$row["latitude"]."</td>". 
         "<td><a href='delete.php?id=".$row["id"]."'>hapus</a></td>". 
         "<td><a href='edit/index.php?id=".$row["id"]."'>edit</a></td>". 
         "</tr>"; 
  } 
  echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>