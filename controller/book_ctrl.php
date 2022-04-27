<?php

require_once("../model/book_mod.php");
require_once("doctor_ctrl.php");
require_once("schedule_ctrl.php");

class Book_ctrl extends Book_mod {

    // 將該筆記錄使用book id屬性md5生成的隨機獨立URL
    private function generateUrl($book_id) {
        $book_url = md5($book_id);
        $this->updateUrl($book_url, $book_id);
        return $book_url;
    }

    // 建立一筆掛號記錄，並回傳創建掛號產生的URL
    private function generateQueueNum($book_id, $date, $schedule_id) {
        $maxQueueNum = $this->getLastQueueNum($date, $schedule_id);
        $this->updateQueueNum($maxQueueNum + 1, $book_id);
    }

    private function getLastQueueNum($date, $schedule_id) {
        $list = $this->selectSameTime($date, $schedule_id);
        $max = 0;
        foreach ($list as $value) {
            if ($value['queue_num'] > $max) {
                $max = $value['queue_num'];
            }
        }
        return $max;
    }

    public function createBook($param) {
        $patient_name = $param['patient_name'];
        $id_num = $param['id_num'];
        $email_address = $param['email_address'];
        $schedule_id = $param['schedule_id'];
        $time = date("Y-m-d H:i:s");
        $date = date("Y-m-d");
        $this->insert($patient_name, $id_num, $email_address, $schedule_id, $time, $date);
        $row = $this->select($id_num, $time);
        $book_id = $row['book_id'];
        $this->generateQueueNum($book_id, $date, $schedule_id);
        return $this->generateUrl($book_id);
    }

    // 查找當前時間看診的醫生
    public function getAvailableDoc() {
        $Doctor = new Doctor_ctrl();
        $Schedule = new Schedule_ctrl();
        // 系統時間（時區預設為歐洲）
        $week_day = date("I");
        $date = date("Y-m-d");
        $doctor_list = $Schedule->getSchedule($week_day);
        for ($i = 0; $i < count($doctor_list); $i++) {
            $doctor_list[$i]['doc_name'] = $Doctor->showDocName($doctor_list[$i]['doc_id']);
            $doctor_list[$i]['last_queue_num'] = $this->getLastQueueNum($date, $doctor_list[$i]['schedule_id']);
        }
        return $doctor_list;
    }

    private function showCurrentQueueNum($date, $schedule_id) {
        $list = $this->selectSameTime($date, $schedule_id);
        $current = 0;
        foreach ($list as $value) {
            if ($value['book_state'] == 'inProgress') {
                $current = $value['queue_num'];
            }
        }
        return $current;
    }

    // 查詢傳入URL對應的掛號資訊
    public function getBookInfo($param) {
        $Schedule = new Schedule_ctrl();
        $book_url = $param['book_url'];
        $result = $this->selectUrl($book_url);
        $result['doc_name'] = $Schedule->getDocName($result['schedule_id']);
        $result['current_queue_num'] = $this->showCurrentQueueNum($result['create_date'], $result['schedule_id']);
        return $result;
    }
}
