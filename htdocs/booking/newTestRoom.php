<?php
require_once('../config.php');

$url = new moodle_url('/blocks/view.php');
$PAGE->set_url($url);

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$PAGE->set_title('Insert new room record');
$PAGE->set_heading('Insert new room record');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);

$room1 = new stdClass();
$room1->roomnumber			= 'Hall-1';
$room1->roomcapacity		= '200';
$room1->roomavailability	= 'a';
$room1->roomtype			= 'Hall';

$lastinsertid = $DB->insert_record('room', $room1, $returnid=true, $bulk=false);

echo "Added the room named $room1->roomnumber with ID: $lastinsertid";

echo $OUTPUT->footer();
