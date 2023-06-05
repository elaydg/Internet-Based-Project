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
$book_name = $_POST['book_name'];
$writer = $_POST['writer'];
$publisher = $_POST['publisher'];


// Yeni üye ekleme
$sql = "INSERT INTO books (book_name, writer, publisher) VALUES ('$book_name', '$writer', '$publisher')";

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
