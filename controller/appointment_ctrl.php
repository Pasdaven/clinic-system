<?php

require_once("../model/appointment_mod.php");
require_once("doctor_ctrl.php");
require_once("schedule_ctrl.php");

class Appointment_ctrl extends Appointment_mod {

    // 將該筆記錄使用appointment id屬性md5生成的隨機獨立URL
    private function generateUrl($appointment_id) {
        $appointment_url = md5($appointment_id);
        $this->updateUrl($appointment_url, $appointment_id);
        return $appointment_url;
    }

    // 建立一筆掛號記錄，並回傳創建掛號產生的URL
    private function generateQueueNum($appointment_id, $date, $schedule_id) {
        $maxQueueNum = $this->getLastQueueNum($date, $schedule_id);
        $this->updateQueueNum($maxQueueNum + 1, $appointment_id);
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

    public function createAppointment($param) {
        $patient_name = $param['patient_name'];
        $id_num = $param['id_num'];
        $email_address = $param['email_address'];
        $schedule_id = $param['schedule_id'];
        $time = date("Y-m-d H:i:s");
        $date = date("Y-m-d");
        $this->insert($patient_name, $id_num, $email_address, $schedule_id, $time, $date);
        $row = $this->select($id_num, $time);
        $appointment_id = $row['appointment_id'];
        $this->generateQueueNum($appointment_id, $date, $schedule_id);
        return $this->generateUrl($appointment_id);
    }

    // 查找當前時間看診的醫生
    public function getAvailableDoc() {
        $Doctor = new Doctor_ctrl();
        $Schedule = new Schedule_ctrl();
        $week_day = date("w");
        $date = date("Y-m-d");
        $doctor_list = $Schedule->getSchedule($week_day);
        for ($i = 0; $i < count($doctor_list); $i++) {
            $doctor_list[$i]['doc_name'] = $Doctor->showDocName($doctor_list[$i]['doc_id']);
            $doctor_list[$i]['last_queue_num'] = $this->getLastQueueNum($date, $doctor_list[$i]['schedule_id']);
        }
        return $doctor_list;
    }

    // 尋找特定日期及特定班表醫生的當前叫號號碼
    private function getSpecificCurrentQueueNum($date, $schedule_id) {
        $list = $this->selectSameTime($date, $schedule_id);
        $current = 0;
        foreach ($list as $value) {
            if ($value['appointment_state'] == 'inProgress') {
                $current = $value['queue_num'];
            }
        }
        return $current;
    }

    // 計算預估的看診時間
    private function calcEstimatedTime($appointment_id, $queue_num, $time_period) {
        $list = $this->selectSameDateSameSchId($appointment_id);
        $count = 0;
        for ($i = 0; $i < count($list); $i++) {
            if ($list[$i]['queue_num'] < $queue_num && $list[$i]['appointment_state'] != "cancel" && $list[$i]['appointment_state'] != "finish") {
                $count++;
            }
        }
        $hour = date("H");
        // $hour = 8;
        if ($hour < 10) {
            if ($time_period == "morning") {
                $minutes_to_add = $count * 3;
                $time = new DateTime('10:00');
                $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                $stamp = $time->format('H:i');
            }
            if ($time_period == "evening") {
                $minutes_to_add = $count * 3;
                $time = new DateTime('14:00');
                $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                $stamp = $time->format('H:i');
            }
            if ($time_period == "noon") {
                $minutes_to_add = $count * 3;
                $time = new DateTime('18:00');
                $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                $stamp = $time->format('H:i');
                return $stamp;
            }
        } else if ($hour < 14) {
            if ($time_period == "morning") {
                $duration = "+" . ($count * 3) . " minutes";
                $stamp = date("H:i", strtotime($duration));
            }
            if ($time_period == "evening") {
                $minutes_to_add = $count * 3;
                $time = new DateTime('14:00');
                $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                $stamp = $time->format('H:i');
                return $stamp;
            }
            if ($time_period == "noon") {
                $minutes_to_add = $count * 3;
                $time = new DateTime('18:00');
                $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                $stamp = $time->format('H:i');
                return $stamp;
            }
        } else if ($hour < 18) {
            if ($time_period == "morning") {
                $duration = "+" . ($count * 3) . " minutes";
                $stamp = date("H:i", strtotime($duration));
            }
            if ($time_period == "evening") {
                $duration = "+" . ($count * 3) . " minutes";
                $stamp = date("H:i", strtotime($duration));
            }
            if ($time_period == "noon") {
                $minutes_to_add = $count * 3;
                $time = new DateTime('18:00');
                $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                $stamp = $time->format('H:i');
            }
        } else {
            if ($time_period == "morning") {
                $duration = "+" . ($count * 3) . " minutes";
                $stamp = date("H:i", strtotime($duration));
            }
            if ($time_period == "evening") {
                $duration = "+" . ($count * 3) . " minutes";
                $stamp = date("H:i", strtotime($duration));
            }
            if ($time_period == "noon") {
                $duration = "+" . ($count * 3) . " minutes";
                $stamp = date("H:i", strtotime($duration));
            }
        }

        return $stamp;
    }

    // 查詢傳入URL對應的掛號資訊
    public function getAppointmentInfo($param) {
        $Schedule = new Schedule_ctrl();
        $appointment_url = $param['appointment_url'];
        $result = $this->selectUrl($appointment_url);
        if ($result == '') return 'error';
        $result['doc_name'] = $Schedule->getDocName($result['schedule_id']);
        $result['current_queue_num'] = $this->getSpecificCurrentQueueNum($result['create_date'], $result['schedule_id']);
        $result['time_period'] = $this->getAppointmentTimePeriod($result['appointment_id']);
        $result['room'] = $this->getAppointmentRoom($result['appointment_id']);
        $result['estimated_time'] = $this->calcEstimatedTime($result['appointment_id'], $result['queue_num'], $result['time_period']);
        return $result;
    }

    // 尋找特定日期中某時段的當前叫號號碼
    public function getCurrentQueueNum($param) {
        $date = $param['date'];
        $week_day = $param['week_day'];
        $time_period = $param['time_period'];
        $Schedule = new Schedule_ctrl();
        $list = $Schedule->getScheduleId($week_day, $time_period);
        for ($i = 0; $i < count($list); $i++) {
            $list[$i]['doc_name'] = $Schedule->getDocName($list[$i]['schedule_id']);
            $list[$i]['current_queue_num'] = $this->getSpecificCurrentQueueNum($date, $list[$i]['schedule_id']);
        }
        return $list;
    }

    private function getAppointmentPatientName($appointment_id) {
        $result = $this->getSingle($this->table, $this->key_name, $appointment_id);
        return $result['patient_name'];
    }

    private function getAppointmentTimePeriod($appointment_id) {
        $data = $this->selectTimePeriod($appointment_id);
        return $data['time_period'];
    }
    
    private function getAppointmentRoom($appointment_id) {
        $data = $this->selectTimePeriod($appointment_id);
        return $data['room'];
    }

    private function getAppointmentDocName($schedule_id) {
        $Schedule = new Schedule_ctrl();

        return $Schedule->getDocName($schedule_id);
    }

    public function updateAppointmentState($param) {
        $appointment_id = $param['appointment_id'];
        $appointment_state = $param['appointment_state'];

        $this->updateState($appointment_id, $appointment_state);
        return array("name" => $this->getAppointmentPatientName($appointment_id), "state" => $appointment_state);
    }

    public function getTodayAppointmentInfo() {
        $date = date("Y-m-d");
        $list = array();
        $list['waiting'] = $this->selectDateState($date, 'waiting');
        $list['inProgress'] = $this->selectDateState($date, 'inProgress');
        $list['finish'] = $this->selectDateState($date, 'finish');

        for ($i = 0; $i < count($list['waiting']); $i++) {
            $appointment_id = $list['waiting'][$i]['appointment_id'];
            $schedule_id = $list['waiting'][$i]['schedule_id'];
            $list['waiting'][$i]['time_period'] = $this->getAppointmentTimePeriod($appointment_id);
            $list['waiting'][$i]['room'] = $this->getAppointmentRoom($appointment_id);
            $list['waiting'][$i]['doc_name'] = $this->getAppointmentDocName($schedule_id);
        }
        for ($i = 0; $i < count($list['inProgress']); $i++) {
            $appointment_id = $list['inProgress'][$i]['appointment_id'];
            $schedule_id = $list['inProgress'][$i]['schedule_id'];
            $list['inProgress'][$i]['time_period'] = $this->getAppointmentTimePeriod($appointment_id);
            $list['inProgress'][$i]['room'] = $this->getAppointmentRoom($appointment_id);
            $list['inProgress'][$i]['doc_name'] = $this->getAppointmentDocName($schedule_id);
        }
        for ($i = 0; $i < count($list['finish']); $i++) {
            $appointment_id = $list['finish'][$i]['appointment_id'];
            $schedule_id = $list['finish'][$i]['schedule_id'];
            $list['finish'][$i]['time_period'] = $this->getAppointmentTimePeriod($appointment_id);
            $list['finish'][$i]['room'] = $this->getAppointmentRoom($appointment_id);
            $list['finish'][$i]['doc_name'] = $this->getAppointmentDocName($schedule_id);
        }

        return $list;
    }
}
