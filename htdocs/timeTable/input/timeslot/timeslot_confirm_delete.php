<?php

require_once('../../../config.php');

global $DB;
require_login();

//Check if timeslot_id is set
if (!isset($_GET['timeslot_id'])){
	$returnurl = new moodle_url('/timeTable/input/timeslot/timeslot_view.php');
	redirect($returnurl);
}

$url = new moodle_url('/timeTable/input/timeslot/timeslot_delete.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Timeslot Deletion';
$PAGE->set_heading($heading);

echo $OUTPUT->header();

$sql = 'SELECT * from mdl_ttbgen_timeslot_in where ID = ?';
$urlTimeslotID = filter_input(INPUT_GET,"timeslot_id",FILTER_SANITIZE_STRING);
$param = array((int)($urlTimeslotID));
$rawTimeSlot = $DB->get_record_sql($sql, $param, $strictness=IGNORE_MISSING);

if ($rawTimeSlot){
	$timeSlot = getTime($rawTimeSlot);

	$startTime = $timeSlot['startTime'];
	$endTime = $timeSlot['endTime'];

	echo 'Are you sure you want the delete the time slot ';
	echo $startTime;
	echo ' to ';
	echo $endTime;
	echo ' on day ';
	echo $rawTimeSlot->day_of_week_dd;
	echo '?<br />';
	echo "<input type='button' value='Delete' onclick=''>";
	$returnurl = new moodle_url('/timeTable/input/timeslot/timeslot_view.php');
	echo "\t";
	echo "<input type='button' value='Cancel' onclick=\"location.href = '$returnurl'\">";
	echo "<br>";
} else {
	//No such ID
	echo "No such ID";

	$returnurl = new moodle_url('/timeTable/input/timeslot/timeslot_view.php');
    echo '<a href="' . $returnurl . '">' . 'Back' . '</a>';
}

function getTime($rawTimeSlot){
	$startmm = $rawTimeSlot->start_time_hhmm % 100;
	$starthh = (int)($rawTimeSlot->start_time_hhmm / 100);
	$endhh = (int)($rawTimeSlot->duration_mmm/ 60 + $starthh);
	$endmm = $rawTimeSlot->duration_mmm % 60 + $startmm;
	if ($endmm >= 60){
		$endhh += 1;
		$endmm -= 60;
	}

	$startTime = mktime($starthh, $startmm);
	$endTime = mktime($endhh, $endmm);

	$startTime = date("H:i", $startTime);
	$endTime = date("H:i", $endTime);

	$returnArray = array('startTime'=>$startTime, 'endTime'=>$endTime);
	return $returnArray;
}