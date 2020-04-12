<?php

require_once('../../../config.php');

$input = $_GET['input'];

$url = new moodle_url('/timeTable/input/timeslot/delete.php');
$PAGE->set_url($url);
global $DB;
$DB->set_debug(false);
$return=[];
$return['input']=$input;
$return['status']="Not yet query/insert/delete";


$return['status']="Not yet deleted";

$deleteSelect=" id= '$input'";
$DB->delete_records_select('ttbgen_timeslot_in',$deleteSelect, $params=null);

$return['status']="Deleted";
echo json_encode($return);
