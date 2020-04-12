<?php

require_once('../../../config.php');


$url = new moodle_url('/timeTable/input/teacher_subject/db_teacher_subject_view.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('View all records: teacher_subject');
$PAGE->set_heading('View table records');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);

$id=array();
$tid=array();
$sid=array();

$assignQuery = "SELECT * from mdl_ttbgen_possible_teacher_in ";
$assignResult=$DB->get_recordset_sql($assignQuery, $params=null, $limitfrom=0, $limitnum=0);

if(!$assignResult->valid()){
  echo "No assigned records";
}
else{
  foreach ($assignResult as $record) {
    array_push($id,$record->id);
    array_push($tid,$record->teacher_id);
    array_push($sid,$record->subject_id);
  }

  echo "<table border=\"1\">";
  echo '<tr>';
  echo '<th> ID </th>';
  echo '<th> TID </th>';
  echo '<th> SID</th>';
  echo '</tr>';
  foreach ($id as $key => $value) {
    echo '<tr>';
    echo "<td> $id[$key] </td>";
    echo "<td> $tid[$key] </td>";
    echo "<td> $sid[$key] </td>";
    echo '</tr>';
  }
  	echo '</table>';
}



// $assignQuery = "SELECT  from mdl_ttbgen_subject_in as s, mdl_ttbgen_possible_teacher_in as ts where ts.teacher_id=204";

$tid2=array();
$sid2=array();
$sname2=array();
$sgrade2=array();
// $assign2Query="SELECT ts.teacher_id AS tid,s.id AS sid,s.name AS sname,s.grade as sgrade
// FROM mdl_ttbgen_subject_in AS s
// JOIN mdl_ttbgen_possible_teacher_in AS ts ON s.id = ts.subject_id
// where ts.teacher_id = 204
// ORDER BY s.id";
$assign2Query="SELECT s.id AS sid,s.name AS sname,s.grade as sgrade
FROM mdl_ttbgen_subject_in AS s
-- JOIN mdl_ttbgen_possible_teacher_in AS ts ON s.id = ts.subject_id
where s.id NOT IN (SELECT subject_id from mdl_ttbgen_possible_teacher_in  as ts where teacher_id=204)
ORDER BY s.id";

$assign2Result=$DB->get_recordset_sql($assign2Query, $params=null, $limitfrom=0, $limitnum=0);
if(!$assign2Result->valid()){
  echo "No unassigned records";
}
else{
  foreach ($assign2Result as $record) {
    // array_push($tid2,$record->tid);
    array_push($sid2,$record->sid);
    array_push($sname2,$record->sname);
    array_push($sgrade2,$record->sgrade);

  }

  echo "<table border=\"1\">";
  echo '<tr>';
  // echo '<th> TID </th>';
  echo '<th> SID </th>';
  echo '<th> SNAME</th>';
  echo '<th> SGRADE</th>';

  echo '</tr>';
  foreach ($tid2 as $key => $value) {
    echo '<tr>';
    // echo "<td> $tid2[$key] </td>";
    echo "<td> $sid2[$key] </td>";
    echo "<td> $sname2[$key] </td>";
    echo "<td> $sgrade2[$key] </td>";

    echo '</tr>';
  }
  	echo '</table>';
}





echo $OUTPUT->footer();
