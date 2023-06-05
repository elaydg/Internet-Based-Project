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

// POST verilerini alma
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$authority = $_POST['authority'];
$user_password = $_POST['user_password'];

// Yeni üye ekleme
$sql = "INSERT INTO members (user_name, user_email, authority, user_password) VALUES ('$user_name', '$user_email', '$authority','$user_password')";

if ($baglanti->query($sql) === TRUE) {
    echo "New member added successfully.";
    header("Location: index.php"); // Kullanıcıları listeleme sayfasına yönlendirme
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $baglanti->error;
}

// Veritabanı bağlantısını kapatma
$baglanti->close();

?>

