<?php

$input = $_GET['input'];
$input2 = $_GET['input2'];
$action = $_GET['action'];
$return=array();
$return['input']=$input;
$return['input2']=$input2;
$return['status']="Input Received";

require_once('../../../config.php');
$url = new moodle_url('/timeTable/input/teacher_subject/process.php');
$PAGE->set_url($url);
global $DB;
$DB->set_debug(true);
// $DB->set_debug(false);



if($action=="delete"){
  $return['status']="Not yet delete; ";

  $deleteSelect=" subject_id= '$input'";
  $DB->delete_records_select('ttbgen_possible_teacher_in', $deleteSelect, $params=null);

  $return['status']="Delete subject_id=".$input;
  echo json_encode($return);
}
elseif($action=="insert"){
  $return['status']="Not yet inserted=";

  $teacher_subject = new stdClass();
  $teacher_subject->subject_id=$input;
  $teacher_subject->teacher_id=$input2;
  $DB->insert_record('ttbgen_possible_teacher_in', $teacher_subject, $returnid=true, $bulk=false);



  $return['status']="Inserted subject_id=".$input." and teacher_id= ".$input2;
  echo json_encode($return);



}
else{

  $return['status']="Undefined action.";
  echo json_encode($return);
}
