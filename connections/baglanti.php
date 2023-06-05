<?php
#File Name= "Connection_php _mysql.htm"
#Type= "MYSQL"
#HTTP= "true"

$hostname = "localhost";
$database = "kutuphane";
$username = "root";
$password = "";

$baglanti = mysqli_connect($hostname, $username, $password, $database);

if (!$baglanti) {
    die("connection failed. " . mysqli_connect_error());
}

mysqli_query($baglanti, "SET NAMES UTF8");

$sql = "CREATE DATABASE IF NOT EXISTS $database";

if (mysqli_query($baglanti, $sql)) {
    // Veritabanı başarıyla oluşturuldu veya zaten mevcut
} else {
    echo "VERITABANI OLUSTURURKEN HATA OLUSTU: " . mysqli_error($baglanti);
}

if (!mysqli_select_db($baglanti, $database)) {
    echo "Veritabanı seçilemedi: " . mysqli_error($baglanti);
}

mysqli_query($baglanti, "SET NAMES UTF8");
// hata giderme bölümüdür
?>