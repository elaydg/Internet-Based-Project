<?php
session_start();
ob_start();
include('connections/baglanti.php');

        $myusername=$_REQUEST['user_name']; // POST İLE GELEN kullanici adi
        $mypassword=$_REQUEST['user_password']; // POST İLE GELEN sifre

$sorgu2=@mysql_query("select * from uyeler where  (eposta='".$_REQUEST['kullanici']." ' or 
id='". $_REQUEST['kullanici']." ')and sifre =' ".$_REQUEST['sifre']."'")or die(mysql_error());


if(mysql_num_rows($sorgu2)) {

    $kayit=mysql_fetch_array($sorgu2);


            $_SESSION['super_admin'] ="3";
            $_SESSION['login']="true";


            $_SESSION['user_mail'] =$kayit['user_mail'];
            $_SESSION['member_id'] =$kayit['member_id'];;
            $_SESSION['registration_date'] =$kayit['registration_date'];;
            $_SESSION['user_pp'] =$kayit['user_pp'];;

    // eger giris yapan id no 1 ise yetkisi ne olursa olsun onu Otomat superadmin olarak yetkilendiriyoruz.

    if ($kayit['member_id']== 1 ) {
        $_SESSION['yetki'] = "3";

    } else {
        $_SESSION['yetki'] = $kayit['authority'];
    }

    $url= "index.php";
    echo"<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=".str_replace('&amp;','&',$url)." \">";
    exit();

        } else{

    $_SESSION['login']="false";

    $url = "log_out.php";
    echo"<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=".str_replace('&amp;','&',$url)." \">";
    exit();

}

ob_end_flush();
?>


