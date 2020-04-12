<?php
require_once('../../../config.php');

$url = new moodle_url('/timeTable/input/subject/subjectTest2.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('View subject record');
$PAGE->set_heading('View subject record');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);

//subject
$subjectNumSQL = "SELECT count(*) from mdl_ttbgen_subject_in";
$numberOfSubject = $DB->count_records_sql($subjectNumSQL, $params=null);

$subjectSQL = "SELECT * FROM mdl_ttbgen_subject_in";
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
	echo "There are a total of $numberOfSubject subject(s) in the database. <br>";
	echo "<table border=\"1\">";
		echo '<tr>';
			echo '<th> Subject ID </th>';
      echo '<th> Subject Grade </th>';
			echo '<th> Subject Name </th>';
      echo '<th> Quantity</th>';
      echo '<th> Need Speical Room </th>';



		echo '</tr>';

		for ($i = 0; $i < $numberOfSubject; $i++){
			echo '<tr>';
				echo "<td> $subjectId[$i] </td>";
        echo "<td> $subjectGrade[$i] </td>";
				echo "<td> $subjectName[$i] </td>";
        echo "<td> $quantity[$i] </td>";
        echo "<td> $require_special_room[$i] </td>";


			echo '</tr>';
		}

	echo '</table>';
}

echo $OUTPUT->footer();
