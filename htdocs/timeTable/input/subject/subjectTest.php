<?php
require_once('../../../config.php');

$url = new moodle_url('/timeTable/input/subject/subjectTest.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Insert new subject record');
$PAGE->set_heading('Insert new subject record');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);

//subject
$DB->delete_records('ttbgen_subject_in', $conditions=null);
echo "Record deleted";

for ($i=0;$i<=4;$i++){
 $subject[$i] = new stdClass();
}
// id	int (10) not null seq
// name	text () not null	Name of subject
// grade	int (2) not null	Grade of subject with this number of classes (2 digits)
// how_many_in_grade	int (2) not null	Number of subjects in this grade (2 Digits).
// require_special_room	binary () not null
$subject[0]->name='Physics';
$subject[0]->grade='1';
$subject[0]->how_many_in_grade='9';
$subject[0]->require_special_room=true;
$subject[1]->name='Chemistry';
$subject[1]->grade='1';
$subject[1]->how_many_in_grade='5';
$subject[1]->require_special_room=true;
$subject[2]->name='Chinese Advanced';
$subject[2]->grade='1';
$subject[2]->how_many_in_grade='3';
$subject[2]->require_special_room=false;
$subject[3]->name='English';
$subject[3]->grade='1';
$subject[3]->how_many_in_grade='5';
$subject[3]->require_special_room=false;
$subject[4]->name='Chinese';
$subject[4]->grade='2';
$subject[4]->how_many_in_grade='3';
$subject[4]->require_special_room=false;





foreach ($subject as $key => $value) {
  $DB->insert_record('ttbgen_subject_in', $subject[$key], $returnid=true, $bulk=false);
};




echo "Record added";
echo $OUTPUT->footer();
