<?php
/*global $baglanti;
include "connections/baglanti.php";

// TABLO VE ÖRNEK KAYIT OLUŞTURMA

$zaman = date("Y-m-d h:i:s");

$sql = "CREATE TABLE IF NOT EXISTS members (
    member_id int unsigned NOT NULL AUTO_INCREMENT,
    authority int(11) DEFAULT 1,
    user_name varchar(30) COLLATE utf8_general_ci DEFAULT NULL,
    user_email varchar(30) COLLATE utf8_general_ci DEFAULT NULL,
    registration_date timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    user_pp varchar(30) COLLATE utf8_general_ci DEFAULT NULL,
    user_password varchar(30) COLLATE utf8_general_ci DEFAULT NULL,
    member_status int(11) DEFAULT 0,
    PRIMARY KEY (member_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE=utf8_general_ci;";

$b = mysqli_query($baglanti, $sql);

if ($b) {
    $kayittarihi = date("d-m-Y h:i:s");
    $sorgu1 = mysqli_query($baglanti, "INSERT INTO members (user_name, user_email, user_pp, user_password, authority) VALUES
    ('user1', 'user1@hotmail.com', '1.png', '111', 1),
    ('user2', 'user2@hotmail.com', '2.png', '222', 2),
    ('user3', 'user3@hotmail.com', '3.png', '333', 3)");
} else {
    echo "Failed to create members table. " . mysqli_error($baglanti) . "<br>";
}
?>*/




