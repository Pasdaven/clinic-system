<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>掛號紀錄</title>
</head>
<body>

<?php

require_once("../../database/db_con.php");
// test
if (isset($_GET["book_url"])) {
  $book_url = $_GET["book_url"];
  $sql = "SELECT * FROM `book` WHERE `book_url` = '$book_url'";
  $result = mysqli_query($link, $sql);
  while ($row = mysqli_fetch_array($result)) {
    
    // 找出掛號紀錄中的 doc_id 對應到 doctor table 中的 doc_name
    $doc_id = $row['doc_id'];
    $sql = "SELECT * FROM doctor WHERE doc_id = '$doc_id'";
    $doctor = mysqli_query($link, $sql);
    while ($doc_row = mysqli_fetch_array($doctor)) {
      $doc_name = $doc_row['doc_name'];
    }

    echo '<h3>即時資訊</h3>';
    echo '病患名稱：' . $row['patient_name'] . '<br>';
    echo '等候狀態：' . $row['book_state'] . '<br>';
    echo '看診時間：' . $row['consulation_time'] . '<br>';
    echo '醫生：' . $doc_name . '<br>';
  }
}

?>
  
</body>
</html>