<?php
#File Name= "Connection_php _mysql.htm"
#Type= "MYSQL"
#HTTP= "true"

$hostname = "localhost";
$database = "kutuphane";
$username = "root";
$password = "";

$baglanti = mysqli_connect($hostname, $username, $password, $database);


// sil.php

if (isset($_GET['user_name'])) {
    $userName = $_GET['user_name'];

    $sql = "DELETE FROM members WHERE user_name = '" . $baglanti->real_escape_string($userName) . "'";

    // Sorguyu çalıştırma
    if ($baglanti->query($sql)) {
        echo "Kullanıcı başarıyla silindi.";
    } else {
        echo "Silme işlemi başarısız: " . $baglanti->error;
    }


    // Silme işlemi tamamlandıktan sonra kullanıcıyı başka bir sayfaya yönlendirebilirsiniz
    header("Location: index.php"); // Kullanıcıları listeleme sayfasına yönlendirme
    exit;
}

if (isset($_GET['book_name'])) {
    $bookName = $_GET['book_name'];

    $sql = "DELETE FROM books WHERE book_name = '" . $baglanti->real_escape_string($bookName) . "'";

    // Sorguyu çalıştırma
    if ($baglanti->query($sql)) {
        echo "Kullanıcı başarıyla silindi.";
    } else {
        echo "Silme işlemi başarısız: " . $baglanti->error;
    }


    // Silme işlemi tamamlandıktan sonra kullanıcıyı başka bir sayfaya yönlendirebilirsiniz
    header("Location: index.php"); // Kullanıcıları listeleme sayfasına yönlendirme
    exit;
}

