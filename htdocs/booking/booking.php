<?php
// the booking_form path
require_once('../config.php');
require_once($CFG->dirroot.'/booking/classes/booking_form.php');
require_login();
//$day = optional_param('booking_d', 0, PARAM_INT);
//$month = optional_param('booking_m', 0, PARAM_INT);
//$year = optional_param('booking_y', 0, PARAM_INT);

//no action first
$url = new moodle_url('/booking/booking.php');

$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Booking Form';
$PAGE->set_heading($heading);
//set data

// if (true) {
if (isset($_GET['roomid'])) {
    $urlRoomId = $_GET['roomid'];
} else {
    // $urlRoomId = '1';
    // $urlRoomId = '11';
    $urlRoomId = '12';
}

// $urlRoomId = (int)$_GET['roomid'];

$roomSQL = 'SELECT * FROM mdl_room WHERE roomid = ?';
$roomParams = array($urlRoomId);
$room = $DB->get_record_sql($roomSQL, $roomParams);

$bookingRoom = 'Creating a new booking for '.$room->roomnumber;

$mform = new booking_form();


//Form processing and displaying is done here
//$defaulthour = $hour;
//$defaultminute = $minute;
//$formdata = (object)array('startingTime[hour]' => 12);
////$mform->set_data($defaultminute);

//set
if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    $returnurl = new moodle_url('/booking/view.php');
    redirect($returnurl);
} else if ($fromform = $mform->get_data()) {
  //In this case you process validated data. $mform->get_data() returns data posted in form.

  $booking1 = new stdClass();
  $timpStamp = $fromform->startingTime;
  $booking1->startdateyyyy		= (int)date('Y', $timpStamp);
  $booking1->startdatemm			= (int)date('m', $timpStamp);
  $booking1->startdatedd			= (int)date('d', $timpStamp); //correct
  //$booking1->starttimehh			= $fromform->timestart[hour];
  $booking1->starttimehh			= (int)date('H', $timpStamp);
  $booking1->starttimemm			= (int)date('i', $timpStamp);
  $booking1->durationmm			= $fromform->bookingtimelimit/60; //disable the select of minute
  $booking1->description			= $fromform->purposeDescription;
  // $booking1->roomidforeignkey   = 11;
  // $booking1->roomidforeignkey		= (int)$_GET['roomid'];
  $booking1->roomidforeignkey		= $fromform->roomid;
  $booking1->bookingpersonid		= $fromform->userid;

  $lastinsertid = $DB->insert_record('booking', $booking1, $returnid=true, $bulk=false);
  

  $returnurl = new moodle_url("/booking/view.php?roomid=$fromform->roomid");
  redirect($returnurl);
} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.

  //Set default data (if any)
  //displays the form
}


echo $OUTPUT->header();
echo $OUTPUT->heading($bookingRoom);
$mform->display();
var_dump($urlRoomId);
// var_dump((int)$_GET['roomid']);

echo $OUTPUT->footer();
