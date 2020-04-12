<?php
require_once('../../../config.php');
require_once($CFG->dirroot.'/timeTable/input/timeslot/timeslot_form.php');
global $DB;
require_login();
$url = new moodle_url('/timeTable/input/timeslot/timeslot.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Timeslot';
$PAGE->set_heading($heading);

$mform = new timeslot_form();

if ($mform->is_cancelled()) {
	$returnurl = new moodle_url('/timeTable/input/timeslot/timeslot_view.php');
    redirect($returnurl);
} else if ($fromform = $mform->get_data()) {
	$timeslot1 = new stdClass();
	$timeslot1->start_time_hhmm	 = $fromform->startTimeHour * 100 + $fromform->startTimeMinute * 5;
	$duration_hh = $fromform->endTimeHour - $fromform->startTimeHour;
	$duration_mm = ($fromform->endTimeMinute - $fromform->startTimeMinute) * 5;
	if ($fromform->endTimeMinute < $fromform->startTimeMinute){
		$duration_hh -= 1;
		$duration_mm += 60;
	}
	$timeslot1->duration_mmm	 = $duration_hh * 60 + $duration_mm;
	$timeslot1->day_of_week_dd   = $fromform->dayselected + 1;
	$timeslot1->timeslot_type_id = $fromform->typeselected;

	$lastinsertid = $DB->insert_record('ttbgen_timeslot_in', $timeslot1, $returnid=true, $bulk=false);

    $returnurl = new moodle_url('/timeTable/input/timeslot/timeslot_view.php');
    redirect($returnurl);
} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.
  //Set default data (if any)
  //displays the form
}

echo $OUTPUT->header();
echo $OUTPUT->heading('Add New Timeslot');
$mform->display();
echo $OUTPUT->footer();
