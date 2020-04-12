<?php
require_once('../../config.php');

$url = new moodle_url('/timeTable/output/outputTable.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('View all out table record');
$PAGE->set_heading('View all out table record');

echo $OUTPUT->header();

global $DB;
// $DB->set_debug(true);


//output

$outputNumSQL = "SELECT count(*) from mdl_ttbgen_output";
$numberOfOutput = $DB->count_records_sql($outputNumSQL, $params=null);

$outputSQL = "SELECT * FROM mdl_ttbgen_output";
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



// echo "Record added";
echo $OUTPUT->footer();
