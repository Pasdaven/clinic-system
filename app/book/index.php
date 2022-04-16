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
  <form method="post" action="index.php">
    請輸入姓名：
    <input type="text" name="register[]">
    請輸入身分證號碼：
    <input type="text" name="register[]">
    請輸入電子信箱：
    <input type="email" name="register[]">
    請選擇醫生：<br>
    <?php
    require_once("available_doctor.php");
    for ($i = 0; $i < count($doctor_list); $i++) {
      echo '<input type="radio" name="register[]" value="' . $doctor_list[$i]['doc_id'] . '">' . $doctor_name[$i];
    }
    ?>
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
  $doc_name = 
  $time = date("Y-m-d H:i:s");

  $sql = "INSERT INTO book (patient_name, id_num, email_address, doc_id) VALUES ('$patient_name', '$id_num', '$email_address', '1004')";
  if (mysqli_query($link, $sql)) {
    $sql = "SELECT * FROM book WHERE book_url IS NULL";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
      $book_id = $row['book_id'];
      $book_url = md5($book_id);
      $sql = "UPDATE book SET book_url = '$book_url' WHERE book_id = $book_id";
      mysqli_query($link, $sql);
    }
    echo 'link: ';
    echo 'localhost/clinic-system/app/book/history.php?book_url=' . $book_url . '<br>';
    echo '掛號成功';
  } else {
    echo '掛號失敗';
  }
}

?>