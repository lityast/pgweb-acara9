<!DOCTYPE html> 
<html> 
<body> 
<h2>Form Edit Sebaran Faskes</h2> 
<?php 
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
     
    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
        // Menggunakan backtick karena nama tabel mengandung spasi
        $sql = "SELECT * FROM `sebaran faskes` WHERE id = $id"; 
        $result = $conn->query($sql); 
         
        if ($result && $result->num_rows > 0) { 
            echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>"; 
            while($row = $result->fetch_assoc()) { 
                echo "<input type='hidden' name='id' value='".$row['id']."'><br>"; 
                echo "<label for='nama_faskes'>Nama Faskes:</label><br>"; 
                echo "<input type='text' id='nama_faskes' name='nama_faskes' value='".$row['nama_faskes']."'><br>"; 
                echo "<label for='kalurahan'>Kalurahan:</label><br>"; 
                echo "<input type='text' id='kalurahan' name='kalurahan' value='".$row['kalurahan']."'><br>"; 
                echo "<label for='kecamatan'>Kecamatan:</label><br>"; 
                echo "<input type='text' id='kecamatan' name='kecamatan' value='".$row['kecamatan']."'><br>"; 
                echo "<label for='jam_buka'>Jam Buka:</label><br>"; 
                echo "<input type='text' id='jam_buka' name='jam_buka' value='".$row['jam_buka']."'><br>"; 
                echo "<label for='longitude'>Longitude:</label><br>"; 
                echo "<input type='text' id='longitude' name='longitude' value='".$row['longitude']."'><br>"; 
                echo "<label for='latitude'>Latitude:</label><br>"; 
                echo "<input type='text' id='latitude' name='latitude' value='".$row['latitude']."'><br><br>"; 
            } 
            echo "<input type='submit' value='Submit'>";    
            echo "</form>";  
        } else {
            echo "Data tidak ditemukan.";
        }
    } else {
        echo "ID tidak ditemukan. Silakan akses halaman ini melalui tombol edit dari tabel utama.";
    }

    $conn->close();
?> 
 
<p id="informasi" style="color: red;"></p> 
 
<script> 
    function validateForm() { 
        let longitude = document.getElementById("longitude").value; 
        let latitude = document.getElementById("latitude").value; 
        let text = ""; 

        // Validasi sederhana untuk memastikan koordinat berupa angka
        if (isNaN(longitude) || isNaN(latitude)) { 
            text = "Longitude dan Latitude harus berupa angka!"; 
            event.preventDefault(); 
        }  
        document.getElementById("informasi").innerHTML = text; 
    } 
</script> 
</body> 
</html>