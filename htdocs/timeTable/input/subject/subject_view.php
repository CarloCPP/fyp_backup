<?php
require_once('../../../config.php');
require_login();
$url = new moodle_url('/timeTable/input/subject/subject_view.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Input: Subject Configuration';
$PAGE->set_heading($heading);

echo $OUTPUT->header();
echo $OUTPUT->heading('Insturction Text');

$addnurl = new moodle_url('/timeTable/input/subject.php');
echo '<a href="' . $addnurl . '">' . 'Add' . '</a>';
echo '<br>';
$returnurl = new moodle_url('/timeTable/input/section_edit.php');
echo '<a href="' . $returnurl . '">' . 'Continue' . '</a>';
echo $OUTPUT->footer();
