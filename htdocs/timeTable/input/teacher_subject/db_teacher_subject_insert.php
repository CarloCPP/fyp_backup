<?php

require_once('../../../config.php');


$url = new moodle_url('/timeTable/input/teacher_subject/db_teacher_subject_insert.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Insert new records: teacher_subject');
$PAGE->set_heading('Insert new table records');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);

$DB->delete_records('ttbgen_possible_teacher_in', $conditions=null);
echo "Record deleted";

for ($i=0;$i<=3;$i++){
 $teacher_subject[$i] = new stdClass();
}
$teacher_subject[0]->subject_id='10';
$teacher_subject[0]->teacher_id='204';
$teacher_subject[1]->subject_id='2';
$teacher_subject[1]->teacher_id='204';
$teacher_subject[2]->subject_id='3';
$teacher_subject[2]->teacher_id='210';
$teacher_subject[3]->subject_id='4';
$teacher_subject[3]->teacher_id='230';



foreach ($teacher_subject as $key => $value) {
  $DB->insert_record('ttbgen_possible_teacher_in', $teacher_subject[$key], $returnid=true, $bulk=false);
};





echo "Record added";
echo $OUTPUT->footer();
