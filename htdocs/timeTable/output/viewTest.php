<?php
require_once('../../config.php');

// die();
$url = new moodle_url('/timeTable/output/viewTest.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Test output record');
$PAGE->set_heading('Test output record');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);


//output

$outputNumSQL = "SELECT count(*)
FROM mdl_ttbgen_output as o
JOIN mdl_ttbgen_class_in as c ON c.id = o.classid
where c.cohort_id=11";
// FROM mdl_cohort AS h
// JOIN mdl_ttbgen_class_in as c ON h.id = c.cohort_id';

// $outputNumSQL = "SELECT count(*) from mdl_ttbgen_output where classid=11";
$numberOfOutput = $DB->count_records_sql($outputNumSQL, $params=null);

$outputSQL = "SELECT *
FROM mdl_ttbgen_output as o
JOIN mdl_ttbgen_class_in as c ON c.id = o.classid
where c.cohort_id=11";
// $outputSQL = "SELECT * FROM mdl_ttbgen_output where classid=11";
$outputResult = $DB->get_recordset_sql($outputSQL, $params=null, $limitfrom=0, $limitnum=0);

$output=array();
$timeslot=array();
$subject=array();
$class=array();
$teacher=array();
$room=array();
if ($outputResult->valid()){
  foreach ($outputResult as $record) {
    // Do whatever you want with this record
    array_push($output, $record->id);
    array_push($timeslot, $record->timeslotid);
    array_push($subject, $record->subjectid);
    array_push($class, $record->classid);
    array_push($teacher, $record->teacherid);
    array_push($room, $record->roomid);


  }
}

if ($numberOfOutput == 0){
  echo 'No output is created.';
} else {
  echo "There are a total of $numberOfOutput output(s) in the database. <br>";
  echo "<table border=\"1\">";
  echo '<tr>';
  echo '<th> id </th>';
  echo '<th> timeslotid </th>';
  echo '<th> subjectid </th>';
  echo '<th> classid </th>';
  echo '<th> teacherid </th>';
  echo '<th> roomid </th>';
  echo '</tr>';

  for ($i = 0; $i < $numberOfOutput; $i++){
    echo '<tr>';
    echo "<td> $output[$i] </td>";
    echo "<td> $timeslot[$i] </td>";
    echo "<td> $subject[$i] </td>";
    echo "<td> $class[$i] </td>";
    echo "<td> $teacher[$i] </td>";
    echo "<td> $room[$i] </td>";


    echo '</tr>';
  }

  echo '</table>';
}

$allUser_id=array();
// $allUserNumSQL = "SELECT count(id) from mdl_user"; //alluser
$allUserNumSQL = "SELECT count(id) from mdl_user";
$allUserNum= $DB->count_records_sql($allUserNumSQL, $params=null);
$allUserSQL= "SELECT id from mdl_user";
$allUserResult = $DB->get_recordset_sql($allUserSQL, $params=null, $limitfrom=0, $limitnum=0);


foreach ($allUserResult as $key => $record) {
  array_push($allUser_id,$record->id);
}

if($allUserNum==0){
  echo "No User in DB";
}
else{
  echo "There are a total of $allUserNum user(s) in the database. <br>";
  echo "<table border=\"1\">";
  echo '<tr>';
  echo '<th> id </th>';
  echo '</tr>';

  foreach ($allUser_id as $key => $value) {
    echo '<tr>';
    echo "<td> $allUser_id[$key] </td>";
    echo '</tr>';

  }
  echo "</table>";

}

$studentId=array();
$studentIdSQL = 'SELECT distinct u.id as uid, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid AND ra.roleid <>2 AND ra.userid = u.id AND ct.id = ra.contextid';  //roleid = 2 is teacher
$studentIdResult = $DB->get_recordset_sql($studentIdSQL, $params=null, $limitfrom=0, $limitnum=0);

foreach ($studentIdResult as $record) {
  array_push($studentId,$record->uid);
}
if(sizeof($studentId)==0){
  echo "No student in DB";
}
else{
  echo "There are a total of ".sizeof($studentId)." students(s) in the database. <br>";
  echo "<table border=\"1\">";
  echo '<tr>';
  echo '<th> id </th>';
  echo '</tr>';

  foreach ($studentId as $key => $value) {
    echo '<tr>';
    echo "<td> $studentId[$key] </td>";
    echo '</tr>';

  }
  echo "</table>";

}


echo "Record added";
echo $OUTPUT->footer();
