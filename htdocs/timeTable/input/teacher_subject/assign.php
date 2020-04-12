<?php
require_once('../../../config.php');
// require_once($CFG->dirroot.'/timeTable/input/teacher_subject/assign_form.php');
require_login();
$url = new moodle_url('/timeTable/input/teacher_subject/assign.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Input: Modifying Subject Assignment List';
$PAGE->set_heading($heading);
$PAGE->requires->js('/timeTable/input/teacher_subject/jquery.js',true);
$PAGE->requires->js('/timeTable/input/teacher_subject/script.js',true);
$PAGE->requires->css('/timeTable/input/teacher_subject/style.css',true);
//from bootstrap and w3school
$PAGE->requires->js('/timeTable/input/teacher_subject/bootstrap.min.js',true);
$PAGE->requires->js('/timeTable/input/teacher_subject/bootstrap.min.css',true);











echo $OUTPUT->header();

echo $OUTPUT->heading('Subject assignment guide:');
echo"This is a page for you to assign subject(s) to a teacher. <br />";

printTeacherList();

echo $OUTPUT->footer();

function printTeacherList(){
  global $DB;
  $teacherSQL = 'SELECT distinct u.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid';  //roleid = 2 is teacher
  // $teacherSQL = 'SELECT distinct c.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid';  //roleid = 2 is teacher
  $teachersResult = $DB->get_recordset_sql($teacherSQL, $params=null, $limitfrom=0, $limitnum=0);
  $tid = array();

  $tname =array();

  foreach ($teachersResult as $record) {
    array_push($tid, $record->id);
    array_push($tname,$record->firstname." ".$record->lastname);
  }

  // unset($tid); // testing for no result
  // $tid = array();
  echo "<table border=\"1\" style='white-space:pre;'>";
  echo "<tr>";
  echo "<tr><th>Teacher ID</th>";
  echo "<th>Teacher Name</th>";
  echo "<th>Assigned Subject(s)</th>";
  echo "<th>Available Subject(s)</th>";

  echo "</tr>";
  if(empty($tid)){

    echo "<tr>";
    echo "<th>/</th>";
    echo "<th>/</th>";
    echo "<th>/</th>";
    echo "</tr>";
    echo "</table>";
    echo "<br/>No teacher created. Please go to cohort page to assign teacher in one cohort first.<br/>";

  }
  else{

    foreach ($tid as $key => $value) {
      echo "<tr>";
      echo "<td>$tid[$key]</td>";
      echo "<td>$tname[$key]</td>";
      assignedSubject($tid[$key]);
      //echo <td>Maths,Grade1</td>
      //echo <td>Chinese,Grade1</td>
      avaiableSubject($tid[$key]);
      // echo '<td><input style="color:white; background-color:green;" type="button" value="Assign Subject"
      // onclick="assignSubject(\''.$tid_js.'\')" /></td>';
      echo "</tr>";




    }


    echo "</table>";
  }

}
function avaiableSubject($teacher_in_id){
  global $DB;
  $sid=array();//need to be a arary, because there may be more than one subject
  $sname=array();//need to be a arary, because there may be more than one subject
  $sgrade=array();//need to be a arary, because there may be more than one subject
  $assignQuery="SELECT s.id AS sid,s.name AS sname,s.grade as sgrade
  FROM mdl_ttbgen_subject_in AS s
  where s.id NOT IN (SELECT subject_id from mdl_ttbgen_possible_teacher_in  as ts where teacher_id=$teacher_in_id)
  ORDER BY s.id";

  $assignResult=$DB->get_recordset_sql($assignQuery, $params=null, $limitfrom=0, $limitnum=0);
  if(!$assignResult->valid()){
    echo"<td>No more subject can be assigned</td>";

  }
  else{
    foreach ($assignResult as $inrecord) {
      array_push($sid,$inrecord->sid);
      array_push($sname,$inrecord->sname);
      array_push($sgrade,$inrecord->sgrade);
    }
    echo"<td>";
    //collapse
    echo '<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo-'.$teacher_in_id.'">Available Subject List (Click To Expand)</button>';
    echo"<br/>";
    echo'<span id="demo-'.$teacher_in_id.'" class="collapse">';

    foreach ($sid as $key => $value) {
      echo '<input style="color:white; background-color:green;" type="button" value="Assign"
      onclick="assignSubject(\''.$sid[$key]."','".$teacher_in_id.'\')" />';
      echo"Subject: ".$sname[$key]." of Grade: ".$sgrade[$key];

      echo"<br/>";
    }
    echo'</span>';



    echo"</td>";

  }
}

function assignedSubject($teacher_in_id){
  // testInsert();
  global $DB;
  $sid=array();//need to be a arary, because there may be more than one subject
  $assignQuery = "SELECT * from mdl_ttbgen_possible_teacher_in where teacher_id=$teacher_in_id";
  $assignResult=$DB->get_recordset_sql($assignQuery, $params=null, $limitfrom=0, $limitnum=0);
  if(!$assignResult->valid()){
    echo"<td>/</td>";

  }
  else{
    foreach ($assignResult as $inrecord) {
      array_push($sid,$inrecord->subject_id);
    }

    echo"<td>";
    foreach ($sid as $in_inrecord) {
      echo "<script> consoleFn(\"".$in_inrecord."\"); </script>";
      // echo $in_inrecord;
      echo '<input style="color:white; background-color:grey;" type="button" value="Unassign"
      onclick="unassignSubject(\''.$in_inrecord.'\')" />';
      querySubejctInfo($in_inrecord);
      echo "\r\n";

      // echo"<td>".$in_inrecord."</td>";
    }
    echo"</td>";

  }

}

function querySubejctInfo($sid){
  global $DB;
  $sname=array();
  $sgrade=array();
  $subjectInfoQuery = "SELECT * from mdl_ttbgen_subject_in where id=$sid";
  $subjectInfoResult=$DB->get_recordset_sql($subjectInfoQuery, $params=null, $limitfrom=0, $limitnum=0);
  if(!$subjectInfoResult->valid()){
    echo "Undefined Subject";//impossible, just for debugging
  }
  else{
    foreach ($subjectInfoResult as $key => $in_in_inrecord) {
      array_push($sname,$in_in_inrecord->name);
      array_push($sgrade,$in_in_inrecord->grade);

    }
    foreach ($sname as $key => $value) {
      echo $sname[$key]." for Grade ".$sgrade[$key];
    }
  }



}



function testInsert(){
  global $DB;
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
}
