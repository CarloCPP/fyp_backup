<?php
require_once('../../config.php');
require_once($CFG->dirroot.'/timeTable/input/dayscheme_form.php');
require_login();
$url = new moodle_url('/timeTable/input/dayscheme.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Dayscheme';
$PAGE->set_heading($heading);

$mform = new dayscheme_form();

if ($mform->is_cancelled()) {

} else if ($fromform = $mform->get_data()) {
    $returnurl = new moodle_url('/timeTable/input/teacher_edit.php');
    redirect($returnurl);

} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.
  //Set default data (if any)
  //displays the form
}

echo $OUTPUT->header();
echo $OUTPUT->heading('Select the number of days of cycle and type: ');
$mform->display();
echo $OUTPUT->footer();
