<?php
require_once ('lib/ShiftCalculator.php');
$start = intval($_GET["start"]);
$end = intval($_GET["end"]);
if(empty($start) || empty($end)) {
    echo json_encode(array());
    die;
}
$startDate = new DateTime();
$startDate->setTimestamp($start);
$startDate->setTime(0, 0);
$endDate = new DateTime();
$endDate->setTimestamp($end);
$endDate->setTime(0, 0);
echo ShiftCalculator::getShiftPeriodJSON("2", $startDate, $endDate);
