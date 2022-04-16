<?php
require_once("../db_con.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Search</title>
</head>
<body>
    <h3>藥品資訊查詢</h3>
    <form method="POST" action="./medicine_search.php">
        藥品編號：
        <input type="text" name="med_id">
        <input type="submit" value="查詢">
    </form>

    <?php
    if (isset($_POST['med_id'])) {
        $med_id = trim($_POST["med_id"]);
        $sql = "SELECT * FROM `medicine` WHERE `med_id`='$med_id'";
        $result = mysqli_query($link, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '藥品編號：' . $row['med_id'] . ' 藥品名稱：' . $row['med_name'] . ' 藥品學術名稱：' . $row['med_academic_name'] . ' 藥品作用：' . $row['med_effect'] . '<br><br>';
                }
            } else {
                echo '無此藥品資料<br>';
            }
            mysqli_free_result($result);
        }
        mysqli_close($link);
    }
    ?>
</body>
</html>