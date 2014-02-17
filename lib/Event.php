<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author sebastianvogel
 */
class JsonEvent {
    const TYPE_WORK_DAYS = "workdays";
    const TYPE_FREE_DAYS = "freedays";
    const TITLE_WORK_DAYS = "Arbeitstage";
    const TITLE_FREE_DAYS = "Freie Tage";
    const CLASS_WORK_DAYS = "work-day-event";
    const CLASS_FREE_DAYS = "free-day-event";
    /*
     * Make members public to be visible in JSON-data
     */
    public $title;
    public $start;
    public $end;
    public $allDay = true;
    public $className;
    
    public function __construct($type, $start, $end) {
        if($type == self::TYPE_WORK_DAYS) {
            $this->setTitle(self::TITLE_WORK_DAYS);
            $this->setClassName(self::CLASS_WORK_DAYS);
        } else {
            $this->setTitle(self::TITLE_FREE_DAYS);
            $this->setClassName(self::CLASS_FREE_DAYS);
        }
        $this->setStart($start);
        $this->setEnd($end);
    }

    public function getTitle() {
        return $this->title;
    }

    public function getStart() {
        return $this->start;
    }

    public function getEnd() {
        return $this->end;
    }

    public function getAllDay() {
        return $this->allDay;
    }

    public function getClassName() {
        return $this->className;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setStart($start) {
        $this->start = $start->format("Y-m-d");
    }

    public function setEnd($end) {
        $this->end = $end->format("Y-m-d");
    }

    public function setClassName($className) {
        $this->className = $className;
    }
}
