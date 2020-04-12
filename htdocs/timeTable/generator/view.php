<?php
require_once('../../config.php');
require_once('generator.php');

require_once('ICS.php');
require_login();
$url = new moodle_url('/timeTable/generator/view.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Generator';
$PAGE->set_heading($heading);
echo $OUTPUT->header();
echo $OUTPUT->heading('Test');


generate();






echo $OUTPUT->footer();

#Then run the algorithm

















echo $OUTPUT->footer();
