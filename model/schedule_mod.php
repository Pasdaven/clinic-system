<?php

require_once("model.php");

class Schedule_mod extends Model {

    protected $table = 'schedule';
    protected $key = 'schedule_id';

    public function select($schedule_id) {
        return $this->getSingle($this->table, 'schedule_id', $schedule_id);
    }

    public function selectWeekDay($week_day) {
        return $this->getMultiple($this->table, 'week_day', $week_day);
    }

    public function selectWeekAndTimePeriod($week_day, $time_period) {
        $sql = "SELECT * FROM $this->table WHERE week_day = '$week_day' AND time_period = '$time_period'";
        $result = $this->execute($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        return $list;
    }
}
