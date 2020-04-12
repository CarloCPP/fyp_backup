<?php

require_once('../../config.php');
require_once($CFG->dirroot.'/timeTable/output/outputQuery_form.php');
require_login();
$url = new moodle_url('/timeTable/output/view.php');
//Page set-up
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
// $PAGE->set_pagelayout('standard');
$PAGE->set_pagelayout('base');
$heading = 'Time Table Output-Page';
// $PAGE->set_title("Time Table Output-Page");
$PAGE->set_heading($heading);
$PAGE->requires->js('/timeTable/output/view_script.js',true);
$PAGE->requires->js('/timeTable/output/jquery.js',true);
$PAGE->requires->css('/timeTable/output/view_style.css',true);



//import form
$mform = new outputQuery_form();


if ($mform->is_cancelled()) {

} else if ($fromform = $mform->get_data()) {
  $returnurl = new moodle_url('/timeTable/output/redirect.php');
  redirect($returnurl);

} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.
  //Set default data (if any)
  //displays the form
}


echo $OUTPUT->header();
echo $OUTPUT->heading('Tables will be outputed upon your request');
$mform->display();

//OUTPUT TABLE
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
    echo"<td style='border: 1px solid grey;text-align: center;height:120%;'>Starting from $printST for $printDur minutes
    Occupied by ... </td>";
    echo"</tr>";
  }

  // echo"<tr>";
  // echo"<td>testing, $dayIndex[$key]</td>";
  // echo"</tr>";
  echo "</table>";
}


echo"<br style='clear:both;'>";
echo"<div id='response'>loading</div>";


echo $OUTPUT->footer();







?>
