<?php

require_once("../model/schedule_mod.php");
require_once("doctor_ctrl.php");

class Schedule_ctrl extends Schedule_mod {

    public function getDocName($schedule_id) {
        $Doctor = new Doctor_ctrl();

        $schedule_info = $this->select($schedule_id);
        return $Doctor->showDocName($schedule_info['doc_id']);
    }

    public function getSchedule($week_day) {
        return $this->selectWeekDay($week_day);
    }
}