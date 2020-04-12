<?php
require_once('../config.php');

$url = new moodle_url('/blocks/view.php');
$PAGE->set_url($url);

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$PAGE->set_title('Insert new booking record');
$PAGE->set_heading('Insert new booking record');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);

$booking1 = new stdClass();
$booking1->startdateyyyy		= '2019';
$booking1->startdatemm			= '01';
$booking1->startdatedd			= '12';
$booking1->starttimehh			= '10';
$booking1->starttimemm			= '00';
$booking1->durationmm			= '60';
$booking1->description			= 'This is the first booking.';
$booking1->roomidforeignkey		= '1';
$booking1->bookingpersonid		= '1';	//Dummy value

$lastinsertid = $DB->insert_record('booking', $booking1, $returnid=true, $bulk=false);

echo "Added a new booking with ID: $lastinsertid";

echo $OUTPUT->footer();