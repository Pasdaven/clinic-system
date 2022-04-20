<h3>醫生個人資料查詢</h3>
<form method="POST" action="./index.php">
    請輸入醫生身分證號碼：
    <input type="text" name="doc_id_num">
    <input type="submit" value="查詢" name="searchBtn" id="searchBtn"><br>
</form>
<?php
if (isset($_POST["doc_id_num"])) {
    $doc_id_num = $_POST["doc_id_num"];
    if ($Doctor->doctorExist($doc_id_num)) {
        $doctor_data = $Doctor->showDocInfo($doc_id_num);
        echo '醫生編號：' . $doctor_data['doc_id'] . '<br>';
        echo '醫生身分證號碼：' . $doctor_data['id_num'] . '<br>';
        echo '醫生名稱：' . $doctor_data['doc_name'] . '<br>';
        echo '性別：' . $doctor_data['sex'] . '<br>';
        echo '生日：' . $doctor_data['birth'] . '<br>';
        echo '手機號碼：' . $doctor_data['phone_num'] . '<br>';
        echo '工作情況：' . $doctor_data['doc_state'] . '<br><br>';
    } else {
        echo '無此醫生資料<br>';
    }
}
?>