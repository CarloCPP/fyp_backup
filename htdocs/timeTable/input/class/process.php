<?php

require_once('../../../config.php');

$input = $_GET['input'];
$input2 = $_GET['input2'];
$input3 = $_GET['input3'];

$action = $_GET['action'];

$url = new moodle_url('/timeTable/input/class/process.php');
$PAGE->set_url($url);
global $DB;
$DB->set_debug(false);
$return=[];
$return['input']=$input;
$return['input2']=$input2;
$return['input3']=$input3;
$return['status']="Not yet query/insert/delete";

if($action=="query"){

  $return['status']="Not yet query";
  $nameSQL = "SELECT COUNT(*) FROM mdl_ttbgen_class_in as class, mdl_cohort as cohort where cohort.id = class.cohort_id and cohort.name='$input'";
  // $nameSQL = "SELECT COUNT(*) FROM mdl_ttbgen_class_in where class_name='$input' and class_grade= '$input2'";
  $nameResult=$DB->count_records_sql($nameSQL,$params=null);
  // $nameResult = $DB->get_recordset_sql($nameSQL, $params=null, $limitfrom=0, $limitnum=0);
  if($nameResult>0){
    $return['status']="duplicate";
  }
  else{
    $return['status']="ready";
  }



  echo json_encode($return);

}
else if($action=="insert"){
  $return['status']="Not yet insert";
  $classToInsert = new stdClass();

  $classNameToCohortIdSQL = "SELECT id from mdl_cohort where name='$input2'";

  $cohortIdRecord = $DB->get_record_sql($classNameToCohortIdSQL, $params=null, $strictness=IGNORE_MISSING);
  // echo $cohortIdRecord->id;
  // $cohortId = $cohortIdRecord->cohort_name;

  $classToInsert->cohort_id=$cohortIdRecord->id;
  $classToInsert->class_grade=$input;
  $classToInsert->max_per_day=$input3;

  $DB->insert_record('ttbgen_class_in', $classToInsert, $returnid=true, $bulk=false);

  $return['status']="Inserted";


  echo json_encode($return);

}
else if($action=="delete"){
  $return['status']="Not yet delete";

  // $classIdToCohortIdSQL = "SELECT cohort.id as cohort_id from mdl_cohort as cohort, mdl_ttbgen_class_in as class where cohort.id = class.cohort_id and class.id = '$input'"；
  // $cohortIdRecord = $DB->get_record_sql($classIdToCohortIdSQL, $params=null, $strictness=IGNORE_MISSING);
  // $cohortId = $cohortIdRecord->cohort_id;


  // $deleteSelect="'id'=$input";
  // $deleteSelect="'id'=$input";
  $deleteSelect=" id= '$input'";


  $DB->delete_records_select('ttbgen_class_in', $deleteSelect, $params=null);

  $return['status']="Deleted";
  echo json_encode($return);



}
else{
  $return['status']="Undefined action";

  echo json_encode($return);


}






?>
