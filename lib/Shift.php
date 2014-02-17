<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Constants.php';
require_once 'Event.php';
/**
 * Description of Shift
 *
 * @author sebastianvogel
 */
class Shift {
    private $start;
    private $constants;
    public function __construct($start) {
        $this->start = $start;
        $this->constants = Constants::getInstance();
    }
    public function getStartDay() {
        return $this->start;
    }
    public function getLastWorkDay() {
        $date = clone $this->start;
        return $date->add($this->constants->getIntervalLastWorkDay());
    }
    public function getFirstFreeDay() {
        $date = clone $this->start;
        return $date->add($this->constants->getIntervalFirstFreeDay());
    }
    public function getLastDay() {
        $date = clone $this->start;
        return $date->add($this->constants->getIntervalLastDay());
    }
    public function getWorkDaysEvent() {
        return new JsonEvent(JsonEvent::TYPE_WORK_DAYS, $this->getStartDay(), $this->getLastWorkDay());
    }
    public function getFreeDaysEvent() {
        return new JsonEvent(JsonEvent::TYPE_FREE_DAYS, $this->getFirstFreeDay(), $this->getLastDay());
    }
}
