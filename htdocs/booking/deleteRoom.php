<?php

require_once('../config.php');

$input = $_GET['input'];

$url = new moodle_url('/booking/deleteRoom.php');
$PAGE->set_url($url);
global $DB;
$DB->set_debug(false);
$return=[];
$return['input']=$input;
$return['status']="Not yet query/insert/delete";


$return['status']="Not yet deleted";

$deleteSelect=" roomid= '$input'";
$DB->delete_records_select('room',$deleteSelect, $params=null);

$return['status']="Deleted";
echo json_encode($return);
