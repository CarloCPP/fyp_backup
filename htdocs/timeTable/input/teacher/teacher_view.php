<?php
require_once('../../../config.php');
global $DB;
require_login();
$url = new moodle_url('/timeTable/input/teacher/teacher_view.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Input: Teacher Configuration';
$PAGE->set_heading($heading);

echo $OUTPUT->header();
echo $OUTPUT->heading('Listing all Teachers');
echo "<br >";

echo "To add a new teacher, create a new user and assign him/her as a teacher of a class. <br />";
echo "To remove a teacher, unassign the teacher role of that user from all courses. <br />";
echo "<br />";

//https://moodlefyp.com/admin/roles/manage.php
$teacherSQL = 'SELECT distinct c.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid';  //roleid = 2 is teacher 

$teachers = $DB->get_recordset_sql($teacherSQL, $params=null, $limitfrom=0, $limitnum=0);
$id = [];
$firstname = [];
$lastname = [];
foreach ($teachers as $teacher) {
  array_push($id, $teacher->id);
  array_push($firstname, $teacher->firstname);
  array_push($lastname, $teacher->lastname); 
}

// $firstname = array('Amy','Ben','Charlie');
// $firstname = array_filter($firstname);
if(empty($firstname)){
  echo "No Teacher in the Database<br>";
}
else{
  echo "<table border=\"1\">";
  echo "<tr><th>Teacher Name</th></tr>";

  for ($j = 0; $j < sizeof($firstname); $j++){
    echo "<tr><td>$firstname[$j]". " $lastname[$j]</td>";

    // echo "<td>";
    // $editurl = new moodle_url('/timeTable/input/teacher/teacher.php');
    // echo '<a href="' . $editurl . '">' . 'Edit' . '</a>';
    // echo "</td>";

    // echo "<td>";
    // echo '<a href="' . $url . '">' . 'Delete' . '</a>';
    // echo "</td>";

    echo "</tr>";

  }
  echo "</table>";
}

//Select the ID and name of teacher
//Show the name only, when pressing delete, pass the id also in case there are same names

// $addnurl = new moodle_url('/timeTable/input/teacher/teacher.php');
// echo '<a href="' . $addnurl . '">' . 'Add' . '</a>';
// echo '<br>';
// $returnurl = new moodle_url('/timeTable/input/timeslot/timeslot_view.php');
// echo '<a href="' . $returnurl . '">' . 'Continue' . '</a>';
echo $OUTPUT->footer();
