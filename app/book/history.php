<?php

require_once("../../database/db_con.php");

if (isset($_GET["book_id"])) {
  $book_id = $_GET["book_id"];
  $sql = "SELECT * FROM `book` WHERE `book_id`='$book_id'";
  $result = mysqli_query($link, $sql);
  while ($row = mysqli_fetch_array($result)) {
    echo '<h3>即時資訊</h3>';
    echo '病患名稱：' . $row['patient_name'] . '<br>';
    echo '等候狀態：' . $row['book_state'] . '<br>';
    echo '看診時間：' . $row['consulation_time'] . '<br>';
    echo '醫生：' . $row['doc_id'] . '<br>';
  }

}