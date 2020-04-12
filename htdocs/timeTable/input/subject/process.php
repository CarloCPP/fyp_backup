<?php

require_once('../../../config.php');

$input = $_GET['input'];
$input2 = $_GET['input2'];
$input3 = $_GET['input3'];
$input4 = $_GET['input4'];

$action = $_GET['action'];

$url = new moodle_url('/timeTable/input/subject/process.php');
$PAGE->set_url($url);
global $DB;
$DB->set_debug(false);
$return=[];
$return['input']=$input;
$return['input2']=$input2;
$return['input3']=$input3;
$return['input4']=$input4;

$return['status']="Not yet query/insert/delete";

if($action=="query"){

  $return['status']="Not yet query";


  $nameAndGradeSQL = "SELECT COUNT(*) FROM mdl_ttbgen_subject_in where grade='$input' and  name='$input2'";
  $nameAndGradeResult=$DB->count_records_sql($nameAndGradeSQL,$params=null);

  if($nameAndGradeResult>0){
    $return['status']="duplicate";
  }
  else{
    $return['status']="ready";
  }



  echo json_encode($return);

}
else if($action=="insert"){
  $return['status']="Not yet insert";
  $subjectToInsert = new stdClass();
  $subjectToInsert->grade=$input;
  $subjectToInsert->name=$input2;
  $subjectToInsert->how_many_in_grade=$input3;
  $subjectToInsert->require_special_room=$input4;


  $DB->insert_record('ttbgen_subject_in', $subjectToInsert, $returnid=true, $bulk=false);

  $return['status']="Inserted";


  echo json_encode($return);

}
else if($action=="delete"){
  $return['status']="Not yet delete";


  $deleteSelect=" id= '$input'";
  $DB->delete_records_select('ttbgen_subject_in', $deleteSelect, $params=null);

  $return['status']="Deleted";
  echo json_encode($return);



}
else{
  $return['status']="Undefined action";

  echo json_encode($return);


}






?>
