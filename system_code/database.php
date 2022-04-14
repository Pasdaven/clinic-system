<?php
$host = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'Clinic_System';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($link){
    echo "資料庫連接成功</br>";
    // echo "正確連接資料庫";
}
else {
    echo "資料庫連接失敗</br>" . mysqli_connect_error();
}
?>
