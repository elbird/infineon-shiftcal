<?php
require_once 'Shift.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShiftCalculator
 *
 * @author sebastianvogel
 */
class ShiftCalculator {
    private static function getShiftPeriod($shiftNo, $fromDate, $toDate) {
        $constants = Constants::getInstance();
        $intialDate = $constants->getInitialDateForShift($shiftNo);
        $firstShiftDate = clone $fromDate;
        $mod = $intialDate->diff($firstShiftDate)->days % 9;
        if($mod > 0) {
            $firstShiftDate->sub(new DateInterval("P" . $mod . "D"));
        }
        return new DatePeriod($firstShiftDate, $constants->getShiftInterval(), $toDate);
    }
    
    public static function getShiftPeriodJSON($shiftNo, $fromDate, $toDate) {
        $result = array();
        foreach (self::getShiftPeriod($shiftNo, $fromDate, $toDate) as $date) {
            $shift = new Shift($date);
            array_push($result, $shift->getWorkDaysEvent());
            array_push($result, $shift->getFreeDaysEvent());
        }
        return json_encode($result);
    }

}
