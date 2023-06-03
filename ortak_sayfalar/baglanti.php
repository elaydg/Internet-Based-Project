<?php
# File Name= "Connection_php _mysql.htm"
# Type= "MYSQL"
# HTTP= "true"

$hostname_baglanti = "localhost";
$database_baglanti = "kutuphane";
$username_baglanti= "root";
$password_baglanti= "";

$baglanti = @mysql_pconnect($hostname_baglanti, $username_baglanti, $password_baglanti) or
trigger_error(mysqL_error(),E_USER_ERROR);
mysql_query("SET NAMES UTF8");
$sql = "CREATE DATABASE IF NOT EXISTS $database_baglanti";
if (mysgl_query($sql, $baglanti)) {


} else{
    echo "VERITABANI OLUSUTURURKEN HATA OLUSTU, mysql_error(), <br>";

}
if(@mysql_connect($hostname_baglanti,$username_baglanti,$password_baglanti)==false){
    echo "Veri tabanına baglanmadi!.. .mysql_error(). <br>";
}   else{

}
if (@mysql_select_db($database_baglanti)== false){
    echo "Veritabanına_seçilemedi!. mysql_error().<br>";

}else{
        mysql_query("SET NAMES UTF8");
}
//hata giderme bölümü
?>
