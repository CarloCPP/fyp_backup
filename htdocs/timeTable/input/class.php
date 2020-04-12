<?php
require_once('../../../config.php');
require_once($CFG->dirroot.'/timeTable/input/class/class_form.php');
require_login();
$url = new moodle_url('/timeTable/input/class/class.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Input: Modifying Class List';
$PAGE->set_heading($heading);
$PAGE->requires->js('/timeTable/input/class/jquery.js',true);
$PAGE->requires->js('/timeTable/input/class/script.js',true);
$PAGE->requires->css('/timeTable/input/class/style.css',true);



$mform = new class_form();

if ($mform->is_cancelled()) {

} else if ($fromform = $mform->get_data()) {
  $returnurl = new moodle_url('/timeTable/input/subject/subject.php');
  redirect($returnurl);

} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.
  //Set default data (if any)
  //displays the form
}

echo $OUTPUT->header();

echo $OUTPUT->heading('Class modifying guide:');
echo"This is a page for you to add a class. <br />
For 'Grade', enter an integer 1~12 depending on grading system of your school <br />
For 'Class Name', enter the name of the class. Please ensure class names are unique.<br />
For 'Maxium no. of a subject per day:', enter an integer to be the maximum sections of a single subject per day. Enter 0 if it does not matter to you.<br /><br />";
printTable();




$mform->display();
// echo"<input type='button' name='class_C' value='Create Class' id='creButton_class' onclick='createClass()'>";
echo $OUTPUT->footer();


function printTable(){
  global $DB;
  $DB->set_debug(false);
  $classNumSQL = "SELECT count(*) from mdl_ttbgen_class_in";
  $numberOfClass = $DB->count_records_sql($classNumSQL, $params=null);

  $classSQL = "SELECT * FROM mdl_ttbgen_class_in  order by class_grade, class_name asc";
  $classResult = $DB->get_recordset_sql($classSQL, $params=null, $limitfrom=0, $limitnum=0);

  $classId=[];
  $className=[];
  $classGrade=[];
  $max_per_day=[];


  if ($classResult->valid()){
    foreach ($classResult as $record) {
      array_push($classId, $record->id);
      array_push($className, $record->class_name);
      array_push($classGrade, $record->class_grade);
      array_push($max_per_day, $record->max_per_day);

    }
  }


  if ($numberOfClass == 0){
    echo 'No class are created.';
  } else {
    echo "There are a total of $numberOfClass room(s) existing. Please reload this page after successful input.<br>";
    echo "<table border=\"1\">";
    echo '<tr>';
    // echo '<th> Class ID </th>';
    echo '<th> Class Name </th>';
    echo '<th> Class Grade </th>';
    echo '<th> Max Per Day</th>';
    echo '<th> Delete Button:</th>';


    echo '</tr>';

    for ($i = 0; $i < $numberOfClass; $i++){
      echo '<tr>';

      $cid=$classId[$i];
      // echo "<td> $classId[$i] </td>";
      echo "<td> $className[$i] </td>";
      echo "<td> $classGrade[$i] </td>";
      echo "<td> $max_per_day[$i] </td>";
      echo "<td><input type='button' value='Delete' onclick='deleteClass($cid)'></td>";

      echo '</tr>';
    }

    echo '</table>';
  }

}
