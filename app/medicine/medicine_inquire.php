<h3>藥品資訊查詢</h3>
<form method="POST" action="./index.php">
    藥品編號：
    <input type="text" name="med_id">
    <input type="submit" value="查詢">
</form>

<?php
if (isset($_POST['med_id'])) {
    $med_id = $_POST["med_id"];
    $result = $Medicine->showMedInfo($med_id);
    
    if ($result != NULL) {
        echo '藥品編號：' . $result['med_id'] . ' 藥品名稱：' . $result['med_name'] . ' 藥品學術名稱：' . $result['med_academic_name'] . ' 藥品作用：' . $result['med_effect'] . '<br><br>';
    } else {
        echo '無此藥品資料<br>';
    }
}
?>