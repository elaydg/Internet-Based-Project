<?php
session_start();
include('connections/baglanti.php');
ob_start();

$hostname = "localhost";
$database = "kutuphane";
$username = "root";
$password = "";

$baglanti = mysqli_connect($hostname, $username, $password, $database);

if (!$baglanti) {
    die("connection failed. " . mysqli_connect_error());
}


$myusername = $_REQUEST['user_name']; // POST İLE GELEN kullanici adi
$mypassword = $_REQUEST['user_password']; // POST İLE GELEN sifre

$query = "SELECT * FROM MEMBERS WHERE (user_name='" . $myusername . "' OR member_id='" . $myusername . "') AND user_password='" . $mypassword . "'";
$sorgu2 = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));

if (mysqli_num_rows($sorgu2)) {
    $kayit = mysqli_fetch_array($sorgu2);

    $_SESSION['super_admin'] = "1";
    $_SESSION['login'] = "true";
    $_SESSION['user_name'] = $kayit['user_name'];
    $_SESSION['user_email'] = $kayit['user_email'];
    $_SESSION['member_id'] = $kayit['member_id'];
    $_SESSION['registration_date'] = $kayit['registration_date'];
    $_SESSION['user_pp'] = $kayit['user_pp'];

    // eger giris yapan id no 1 ise yetkisi ne olursa olsun onu Otomat superadmin olarak yetkilendiriyoruz.
    if ($kayit['member_id'] == 1) {
        $_SESSION['authority'] = "3";
    } else {
        $_SESSION['authority'] = $kayit['authority'];
    }

    $url = "index.php";
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=" . str_replace('&amp;', '&', $url) . " \">";
    exit();
} else {
    $_SESSION['login'] = "false";

    $url = "log_out.php";
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=" . str_replace('&amp;', '&', $url) . " \">";
    exit();
}











/*
        $myusername=$_REQUEST['user_name']; // POST İLE GELEN kullanici adi
        $mypassword=$_REQUEST['user_password']; // POST İLE GELEN sifre

$sorgu2 = @mysqli_query("select * from members where  (user_name='".$_REQUEST['user_name']." ' or 
id='". $_REQUEST['user_name']." ')and user_password =' ".$_REQUEST['user_password']."'")or die(mysqli_error());


if(mysqli_num_rows($sorgu2)) {

    $kayit=mysqli_fetch_array($sorgu2);


            $_SESSION['super_admin'] ="3";
            $_SESSION['login']="true";
            $_SESSION['user_email'] =$kayit['user_email'];
            $_SESSION['member_id'] =$kayit['member_id'];;
            $_SESSION['registration_date'] =$kayit['registration_date'];;
            $_SESSION['user_pp'] =$kayit['user_pp'];;

    // eger giris yapan id no 1 ise yetkisi ne olursa olsun onu Otomat superadmin olarak yetkilendiriyoruz.

    if ($kayit['member_id']== 1 ) {
        $_SESSION['authority'] = "3";

    } else {
        $_SESSION['authority'] = $kayit['authority'];
    }

    $url= "index.php";
    echo"<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=".str_replace('&amp;','&',$url)." \">";
    exit();

        } else{

    $_SESSION['login']="false";

    $url = "log_out.php";
    echo"<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=".str_replace('&amp;','&',$url)." \">";
    exit();

} */


