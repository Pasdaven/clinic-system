<?php

require_once("model.php");

class Schedule_mod extends Model {

    protected $table = 'schedule';
    protected $key = 'schedule_id';

    public function select($schedule_id) {
        return $this->getSingle($this->table, 'schedule_id', $schedule_id);
    }

}