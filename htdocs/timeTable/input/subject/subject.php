<?php
require_once('../../../config.php');
require_once($CFG->dirroot.'/timeTable/input/subject/subject_form.php');
require_login();
$url = new moodle_url('/timeTable/input/subject/subject.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Input: Modifying subject List';
$PAGE->set_heading($heading);
$PAGE->requires->js('/timeTable/input/subject/jquery.js',true);
// echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'>\n";
$PAGE->requires->js('/timeTable/input/subject/script.js',true);
$PAGE->requires->css('/timeTable/input/subject/style.css',true);



$mform = new subject_form();

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

echo $OUTPUT->heading('Subject modifying guide:');
echo"This is a page for you to add a subject. <br />
For <span style='font-weight:bold;'>Grade</span>: <br />
-Choose an <span style='font-style:italic;'>integer</span> <span style='color:red;'>ranging from 1 to 12</span> depending on grading system of your school. <br />
For <span style='font-weight:bold;'>Subject Name</span>: <br />
-Enter the name of the subject. No duplicate <span style='font-weight:bold;'>Subject Name</span> for same <span style='font-weight:bold;'>Grade</span> is allowed.<br />
For <span style='font-weight:bold;'>Quantity</span>: <br />
-Enter an <span style='font-style:italic;'>integer</span> for the exact number of session for this subject per week.<br />
For <span style='font-weight:bold;'>Need Special Room (N/Y)</span>: <br />
-Choose <span style='color:red;'>Yes</span> for the subject(elective) that needs a speical room.<br />
e.g. Grade 1 Physcis needs Physics Laboratory. Choose <span style='color:red;'>Yes</span>.<br />
-Choose <span style='color:red;'>No</span> for the subject(core) that does not need a speical room.<br />
e.g. Grade 1 English doesn not need a special room, only home room is needed. Choose <span style='color:red;'>No</span>.<br />
<br />";

printTable();




$mform->display();
echo $OUTPUT->footer();


function printTable(){
  global $DB;
  $DB->set_debug(false);

  //subject
  $subjectNumSQL = "SELECT count(*) from mdl_ttbgen_subject_in";
  $numberOfSubject = $DB->count_records_sql($subjectNumSQL, $params=null);

  $subjectSQL = "SELECT * FROM mdl_ttbgen_subject_in order by grade, name asc";
  $subjectResult = $DB->get_recordset_sql($subjectSQL, $params=null, $limitfrom=0, $limitnum=0);

  $subjectId=[];
  $subjectName=[];
  $subjectGrade=[];
  $quantity=[];
  $require_special_room=[];


  if ($subjectResult->valid()){
    foreach ($subjectResult as $record) {
      // Do whatever you want with this record
      array_push($subjectId, $record->id);
      array_push($subjectName, $record->name);
      array_push($subjectGrade, $record->grade);
      array_push($quantity, $record->how_many_in_grade);
      array_push($require_special_room, $record->require_special_room);

    }
  }


  if ($numberOfSubject == 0){
    echo 'No subject are created.';
  } else {
    echo "There are a total of $numberOfSubject room(s) in the database. <br>";
    echo "<table border=\"1\" >";
    echo '<tr>';
    // echo '<th> Subject ID </th>';
    echo '<th> Subject Grade </th>';
    echo '<th> Subject Name </th>';
    echo '<th> Quantity</th>';
    echo '<th> Need Speical Room </th>';
    echo '<th></th>';

    // echo '<th> Delete Button</th>';




    echo '</tr>';

    for ($i = 0; $i < $numberOfSubject; $i++){
      echo '<tr>';

      $sid=$subjectId[$i];
      $sgrade=$subjectGrade[$i];
      $sname=$subjectName[$i];

      // echo "<td> $subjectId[$i] </td>";
      echo "<td> $subjectGrade[$i] </td>";
      echo "<td> $subjectName[$i] </td>";
      echo "<td> $quantity[$i] </td>";
      if($require_special_room[$i]==1){
        echo "<td>Yes</td>";
      }else{
        echo "<td>No</td>";

      }

      echo "<td><input type='button' value='Delete' onclick='deleteSubject(\"".$sid."\",\"".$sgrade."\",\"".addslashes($sname)."\")'></td>";


      echo '</tr>';
    }

    echo '</table>';
  }

}
