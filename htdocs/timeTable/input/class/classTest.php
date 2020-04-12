<?php
require_once('../../../config.php');

$url = new moodle_url('/timeTable/input/class/classTest.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Insert new class record');
$PAGE->set_heading('Insert new class record');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);

//class
$DB->delete_records('ttbgen_class_in', $conditions=null);
echo "Record deleted";

for ($i=0;$i<=3;$i++){
 $class[$i] = new stdClass();
}
$class[0]->class_name='1A';
$class[0]->class_grade='1';
$class[0]->max_per_day='4';
$class[1]->class_name='1B';
$class[1]->class_grade='1';
$class[1]->max_per_day='2';
$class[2]->class_name='2A';
$class[2]->class_grade='2';
$class[2]->max_per_day='7';
$class[3]->class_name='3C';
$class[3]->class_grade='3';
$class[3]->max_per_day='5';


foreach ($class as $key => $value) {
  $DB->insert_record('ttbgen_class_in', $class[$key], $returnid=true, $bulk=false);
};




echo "Record added";
echo $OUTPUT->footer();
