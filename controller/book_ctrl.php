<?php

require_once("/clinic-system/model/book_mod.php");
require_once("doctor_ctrl.php");

class Book_ctrl extends Book_mod {

    private function generateUrl($id_num, $time) {
        $sql = $this->select($id_num, $time);
        $result = $this->execute($sql);
        $row = mysqli_fetch_assoc($result);
        $book_id = $row['book_id'];
        $book_url = md5($book_id);
        $sql = $this->update($book_url, $book_id);
        $this->execute($sql);
        return $book_url;
    }
    public function createBook($param) {
        $patient_name = $param['patient_name'];
        $id_num = $param['id_num'];
        $email_address = $param['email_address'];
        $doc_id = $param['doc_id'];
        $time = date("Y-m-d H:i:s");
        $sql = $this->insert($patient_name, $id_num, $email_address, $doc_id, $time);
        $this->execute($sql);
        return $this->generateUrl($id_num, $time);
    }

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
}