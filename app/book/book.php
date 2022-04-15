<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>
  首頁：
  <input type="button" value="前往" onclick="location.href='../../'">
  <h3>掛號</h3>
  <form method="post" action="book.php">
    請輸入姓名：
    <input type="text" name="register[]">
    請輸入身分證號碼：
    <input type="text" name="register[]">
    請輸入電子信箱：
    <input type="email" name="register[]">
    <input type="submit" value="預約" name="submitBtn">
  </form>
</body>
</html>

<?php

require_once("../../database/db_con.php");

if (isset($_POST["register"])) {
  $register = $_POST["register"];
  $patient_name = $register[0];
  $id_num = $register[1];
  $email_address = $register[2];
  
  // random id test
  function generateRandomString($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  $book_id = generateRandomString();

  $sql = "INSERT INTO `book` VALUES ('$book_id', 'waiting', NULL, '1004', '$id_num', '$email_address', '$patient_name')";
  if (mysqli_query($link, $sql)) {
    echo 'Your ID is: ' . $book_id . '<br>';
    echo '掛號成功';
  } else {
    echo '掛號失敗';
  }
}

?>