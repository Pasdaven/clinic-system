<?php

require_once("../model/book_mod.php");
require_once("doctor_ctrl.php");

class Book_ctrl extends Book_mod {

    // 將該筆記錄使用book id屬性md5生成的隨機獨立URL
    private function generateUrl($id_num, $time) {
        $sql = $this->select($id_num, $time);
        $result = $this->execute($sql);
        $row = mysqli_fetch_assoc($result);
        $book_id = $row['book_id'];
        $book_url = md5($book_id);
        $this->update($book_url, $book_id);
        return $book_url;
    }

    // 建立一筆掛號記錄，並回傳創建掛號產生的URL
    public function createBook($param) {
        $patient_name = $param['patient_name'];
        $id_num = $param['id_num'];
        $email_address = $param['email_address'];
        $doc_id = $param['doc_id'];
        $time = date("Y-m-d H:i:s");
        $this->insert($patient_name, $id_num, $email_address, $doc_id, $time);
        return $this->generateUrl($id_num, $time);
    }

    // 查找當前時間看診的醫生
    public function getAvailableDoc() {
        $Doctor = new Doctor_ctrl();

        // 系統時間（時區預設為歐洲）
        // $week_day = date("I");
        // $time = date("H");

        // 自訂時間，$week_day為星期，使用數字表示，$time為時間（小時），使用24小時制
        $week_day = "1";
        $time = "9";

        switch ($time) {
            case 9:
            case 10:
            case 11:
                $time_period = "morning";
                break;
            case 12:
            case 13:
            case 14:
            case 15:
                $time_period = "evening";
                break;
            case 17:
            case 18:
            case 19:
            case 20:
                $time_period = "noon";
                break;
            default:
                $time_period = "wrong";
                break;
        }

        $doctor_list = $Doctor->getAvailableDocList($week_day, $time_period);

        for ($i = 0; $i < count($doctor_list); $i++) {
            $doctor_list[$i]['doc_name'] = $Doctor->showDocName($doctor_list[$i]['doc_id']);
        }

        return $doctor_list;
    }

    // 查詢傳入URL對應的掛號資訊
    public function getBookInfo($param) {
        $book_url = $param['book_url'];
        $sql = $this->selectUrl($book_url);
        $result = $this->execute($sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}
