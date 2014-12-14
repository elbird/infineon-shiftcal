<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Constants
 *
 * @author sebastianvogel
 */
class Constants {
    const EN_DATE_FORMAT = "Y.m.d  H:i";
    const DE_DATE_FORMAT = "d.m.Y H:i";
    const DEFAULT_TIMEZONE = "Europe/Vienna";
    const STATIC_TIME = " 00:00";
    
    private static $instance;
    private static $shiftsStart = array(
        "1" => "2013.12.31",
        "2" => "2014.01.03"
    );
    private $shiftInterval;
    private $intervalLastWorkDay;
    private $intervalFirstFreeDay;
    private $intervalLastDay;
    private $intervalOneDay;
    private $intialDatesForShifts = array();
    
    private function __construct() {
       /*$this->intialDatesForShifts["1"] = DateTime::createFromFormat(self::EN_DATE_FORMAT, self::SHIFT_1_START . self::STATIC_TIME_AND_ZONE);
       $this->intialDatesForShifts["2"] = DateTime::createFromFormat(self::EN_DATE_FORMAT, self::SHIFT_2_START . self::STATIC_TIME_AND_ZONE);*/
       $this->shiftInterval = new DateInterval("P9D");
       $this->intervalLastWorkDay = new DateInterval("P5D");
       $this->intervalFirstFreeDay = new DateInterval("P6D");
       $this->intervalLastDay = new DateInterval("P8D");
       $this->intervalOneDay = new DateInterval("P1D");
    }
    public static function getInstance() {
        if(empty(self::$instance)) {
            self::$instance = new Constants();
        }
        return self::$instance;
    }
    public function getShiftInterval() {
        return $this->shiftInterval;
    }

    public function getIntervalLastWorkDay() {
        return $this->intervalLastWorkDay;
    }

    public function getIntervalFirstFreeDay() {
        return $this->intervalFirstFreeDay;
    }

    public function getIntervalLastDay() {
        return $this->intervalLastDay;
    }
    
    public function getIntervalOneDay() {
        return $this->intervalOneDay;
    }

    public static function getInitialDateForShift($shiftNo) {
        if(empty(self::$shiftsStart[$shiftNo])) {
            throw new Exception("Unkown shift");
        }
        return DateTime::createFromFormat(self::EN_DATE_FORMAT, self::$shiftsStart[$shiftNo] . self::STATIC_TIME, new  DateTimeZone(self::DEFAULT_TIMEZONE));
    }

}
