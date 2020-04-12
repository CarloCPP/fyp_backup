<?php
require_once('../../../config.php');

$url = new moodle_url('/timeTable/input/class/classTest2.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('View class record');
$PAGE->set_heading('View class record');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);

//class
$classNumSQL = "SELECT count(*) from mdl_ttbgen_class_in";
// $classNumSQL = 'SELECT count(*) from mdl_ttbgen_class_in where class_name="1A"';
$numberOfClass = $DB->count_records_sql($classNumSQL, $params=null);

$classSQL = "SELECT * FROM mdl_ttbgen_class_in";
// $classSQL = 'SELECT * FROM mdl_ttbgen_class_in where class_name="1A"';
$classResult = $DB->get_recordset_sql($classSQL, $params=null, $limitfrom=0, $limitnum=0);

$classId=[];
$className=[];
$classGrade=[];
$max_per_day=[];


if ($classResult->valid()){
  foreach ($classResult as $record) {
    // Do whatever you want with this record
    array_push($classId, $record->id);
    array_push($className, $record->class_name);
    array_push($classGrade, $record->class_grade);
    array_push($max_per_day, $record->max_per_day);

  }
}


if ($numberOfClass == 0){
	echo 'No class are created.';
} else {
	echo "There are a total of $numberOfClass class(es) in the database. <br>";
	echo "<table border=\"1\">";
		echo '<tr>';
			echo '<th> Class ID </th>';
			echo '<th> Class Name </th>';
			echo '<th> Class Grade </th>';
      echo '<th> Max Per Day</th>';


		echo '</tr>';

		for ($i = 0; $i < $numberOfClass; $i++){
			echo '<tr>';
				echo "<td> $classId[$i] </td>";
				echo "<td> $className[$i] </td>";
				echo "<td> $classGrade[$i] </td>";
        echo "<td> $max_per_day[$i] </td>";

			echo '</tr>';
		}

	echo '</table>';
}

echo $OUTPUT->footer();
