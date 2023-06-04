<?php
#File Name= "Connection_php _mysql.htm"
#Type= "MYSQL"
#HTTP= "true"
$hostname_baglanti = "localhost";
$database_baglanti = "kutuphane";
$username_baglanti = "root";
$password_baglanti = "";

$baglanti = mysqli_connect($hostname_baglanti, $username_baglanti, $password_baglanti);

if (!$baglanti) {
    die("Veritabanına bağlanırken hata oluştu: " . mysqli_connect_error());
}

mysqli_query($baglanti, "SET NAMES UTF8");

$sql = "CREATE DATABASE IF NOT EXISTS $database_baglanti";

if (mysqli_query($baglanti, $sql)) {
    // Veritabanı başarıyla oluşturuldu veya zaten mevcut
} else {
    echo "VERITABANI OLUSTURURKEN HATA OLUSTU: " . mysqli_error($baglanti);
}

if (!mysqli_select_db($baglanti, $database_baglanti)) {
    echo "Veritabanı seçilemedi: " . mysqli_error($baglanti);
}

mysqli_query($baglanti, "SET NAMES UTF8");
// Hata giderme bölümü
?>