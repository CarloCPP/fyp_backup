<?php

require_once('../../config.php');
$q = $_GET['q'];
$f = $_GET['f'];

$field=null;
switch ($f){
  case 'class':
  $field='classID'; //change it when algorhtim done <<<<<-----------
  break;
  case 'teacher':
  $field='teacherID';//change it when algorhtim done <<<<<-----------
  break;
  case 'room':
  $field='roomID';//change it when algorhtim done <<<<<-----------
  break;
  default:
  $field='0'; //error detection

}

$url = new moodle_url('/output/process.php');
$PAGE->set_url($url);
global $DB;

$numOfDay=0; //Col
$dayIndex=[];

global $DB;
$dayNumSQL = 'SELECT count(distinct day_of_week_dd) from mdl_ttbgen_timeslot_in';
$numOfDay = $DB->count_records_sql($dayNumSQL, $params=null);
$timeslotSQL = 'SELECT * from mdl_ttbgen_timeslot_in';
$timeslotResult = $DB->get_recordset_sql($timeslotSQL, $params=null, $limitfrom=0, $limitnum=0);
$dayIndexSQL = 'SELECT distinct day_of_week_dd from mdl_ttbgen_timeslot_in order by day_of_week_dd asc';
$dayIndexResult = $DB->get_recordset_sql($dayIndexSQL, $params=null, $limitfrom=0, $limitnum=0);
$tsID=[];
$tsST=[];
$tsD=[]; //may have duplicate
$tsDOW=[];
if (!empty($timeslotResult)){
  foreach ($timeslotResult as $record) {
    // Do whatever you want with this record
    array_push($tsID, $record->id);
    array_push($tsST, $record->start_time_hhmm);
    array_push($tsD, $record->duration_mmm);
    array_push($tsD, $record->day_of_week_dd);
  }
}


if (!empty($dayIndexResult)){
  foreach ($dayIndexResult as $record) {
    // Do whatever you want with this record
    array_push($dayIndex, $record->day_of_week_dd);
    // echo $record->day_of_week_dd;
  }
}
// echo"<table style='float:left'></table>";

foreach ($dayIndex as $key => $value) {
  $printDayValue=$dayIndex[$key];
  echo "<table class='outTable' ";
  // echo "<table class='outTable' style='float:right'>";
  echo"<tr>";
  echo "<td class='td_day'> Day $printDayValue </td>";
  echo"<tr>";

  $startTime=array();
  $duration=array();
  $dummy=$dayIndex[$key];
  $intervalSQL = "SELECT  start_time_hhmm,duration_mmm from mdl_ttbgen_timeslot_in where day_of_week_dd ='$dummy'";
  $intervalResult = $DB->get_recordset_sql($intervalSQL, $params=null, $limitfrom=0, $limitnum=0);
  if (!empty($intervalResult)){
    foreach ($intervalResult as $record) {
      array_push($startTime, $record->start_time_hhmm);
      array_push($duration, $record->duration_mmm);
      // echo $record->day_of_week_dd;
    }
  }

  foreach ($startTime as $key => $value) {
    $printST=$startTime[$key];$printDur=$duration[$key];
    echo"<tr>";
    echo"<td style='border: 1px solid grey;text-align: center;height:120%;'>
    Starting from $printST \n
    for $printDur minutes\n
    Occupied by ... </td>";
    echo"</tr>";
  }

  // echo"<tr>";
  // echo"<td>testing, $dayIndex[$key]</td>";
  // echo"</tr>";
  echo "</table>";
}

if($field=='classID'){

}






  elseif($field=='teacherID'){
    // $teacherQL = "SELECT * FROM mdl_final_table_in where class='$q'";
    // $teacherResult = $DB->get_recordset_sql($teacherSQL, $params=null, $limitfrom=0, $limitnum=0);

  }
  elseif($field=='roomID'){
    // $roomSQL = "SELECT * FROM mdl_final_table_in where class='$q'";
    // $roomResult = $DB->get_recordset_sql($roomSQL, $params=null, $limitfrom=0, $limitnum=0);

  }




  echo"Console: q=$q and f=$field";

  ?>
