<?php

require_once("../db_con.php");

// 顯示表頭

if (isset($_GET['c'])) { // 如果有搜尋文字顯示搜尋結果

    $s = mysqli_real_escape_string($link, $_GET['c']);
    $t = mysqli_real_escape_string($link, $_GET['t']);
    $sql = "SELECT * FROM `$t` WHERE `case_id` = '$c'";
    $result = mysqli_query($link, $sql);

    // SQL 搜尋錯誤訊息
    if (!$result) {
        echo ("錯誤：" . mysqli_error($link));
        exit();
    }

    // 搜尋無資料時顯示「查無資料」
    if (mysqli_num_rows($result) <= 0) {
        echo '查無此患者資料';
    }

    // if ($result) {
    //     if (mysqli_num_rows($result) > 0) {
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $datas[] = $row;
    //         }

    //         for ($i = 0; $i < count($datas); $i++) {
    //             echo '看診紀錄編號：' . $row['record_id'] . '病例號碼：' . $row['case_id'] . '<br>';
    //             echo '醫生編號：' . $row['doc_id'] . '看診日期：' . $row['consulation_date'] . '疾病名稱：' . $row['disease_name'] . '用藥天數：' . $row['med_days'] . '備註：' . $row['comment'] . '<br>';
    //         }
    //     }
    //     mysqli_free_result($result);
    // }


    // 搜尋有資料時顯示搜尋結果

    while ($row = mysqli_fetch_array($result)) {
        echo '看診紀錄編號：' . $row['record_id'] . '病例號碼：' . $row['case_id'] . '<br>';
        echo '醫生編號：' . $row['doc_id'] . '看診日期：' . $row['consulation_date'] . '疾病名稱：' . $row['disease_name'] . '用藥天數：' . $row['med_days'] . '備註：' . $row['comment'] . '<br>';
    }
}

mysqli_close($link); // 連線結束
?>