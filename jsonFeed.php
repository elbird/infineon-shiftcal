<?php
date_default_timezone_set('Europe/Vienna');
require_once ('lib/Constants.php');
require_once ('lib/ShiftCalculator.php');
$start = $_GET["start"];
$end = $_GET["end"];
if(empty($start) || empty($end)) {
    echo json_encode(array());
    die;
}
$start .= ' 00:01';
$end .= ' 23:59';

$startDate = DateTime::createFromFormat('Y-m-d H:i', $start, new DateTimeZone(Constants::DEFAULT_TIMEZONE));
$startDate->setTime(0, 0);

$endDate = DateTime::createFromFormat('Y-m-d H:i', $end, new DateTimeZone(Constants::DEFAULT_TIMEZONE));
$endDate->setTime(0, 0);

echo ShiftCalculator::getShiftPeriodJSON("2", $startDate, $endDate);
