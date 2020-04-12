<?php
require_once('../../config.php');

$url = new moodle_url('/output/db_test_insert.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Insert new table records');
$PAGE->set_heading('Insert new table records');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);



//dayscheme: used built page
// //TimeSlot
// $DB->delete_records('ttbgen_timeslot_in', $conditions=null);
// echo "Record deleted";
//
// for ($i=0;$i<=8;$i++){
//  $timeslot[$i] = new stdClass();
// }
//
// //day1
// $timeslot[0]->start_time_hhmm='0900';
// $timeslot[0]->duration_mmm='030';
// $timeslot[0]->day_of_week_dd='01';
// $timeslot[0]->timeslot_type='01';
// $timeslot[1]->start_time_hhmm='0930';
// $timeslot[1]->duration_mmm='030';
// $timeslot[1]->day_of_week_dd='01';
// $timeslot[1]->timeslot_type='01';
// //day2
// $timeslot[2]->start_time_hhmm='0900';
// $timeslot[2]->duration_mmm='030';
// $timeslot[2]->day_of_week_dd='02';
// $timeslot[2]->timeslot_type='01';
// $timeslot[3]->start_time_hhmm='0930';
// $timeslot[3]->duration_mmm='030';
// $timeslot[3]->day_of_week_dd='02';
// $timeslot[3]->timeslot_type='01';
// //day3
// $timeslot[4]->start_time_hhmm='0900';
// $timeslot[4]->duration_mmm='030';
// $timeslot[4]->day_of_week_dd='03';
// $timeslot[4]->timeslot_type='01';
// $timeslot[5]->start_time_hhmm='0930';
// $timeslot[5]->duration_mmm='030';
// $timeslot[5]->day_of_week_dd='03';
// $timeslot[5]->timeslot_type='01';
// $timeslot[6]->start_time_hhmm='0900';
// $timeslot[6]->duration_mmm='030';
// $timeslot[6]->day_of_week_dd='03';
// $timeslot[6]->timeslot_type='01';
// $timeslot[7]->start_time_hhmm='1330';
// $timeslot[7]->duration_mmm='060';
// $timeslot[7]->day_of_week_dd='03';
// $timeslot[7]->timeslot_type='01';
// //day4
// $timeslot[8]->start_time_hhmm='0900';
// $timeslot[8]->duration_mmm='045';
// $timeslot[8]->day_of_week_dd='04';
// $timeslot[8]->timeslot_type='01';
//
// foreach ($timeslot as $key => $value) {
//   $DB->insert_record('ttbgen_timeslot_in', $timeslot[$key], $returnid=true, $bulk=false);
// };

//class
$DB->delete_records('ttbgen_class_in', $conditions=null);
echo "Record deleted";

for ($i=0;$i<=3;$i++){
 $class[$i] = new stdClass();
}
$class[0]->class_name='1A';
$class[0]->class_grade='1';
$class[0]->max_per_day='4';
$class[1]->class_name='1B';
$class[1]->class_grade='1';
$class[1]->max_per_day='2';
$class[2]->class_name='2A';
$class[2]->class_grade='2';
$class[2]->max_per_day='7';
$class[3]->class_name='3C';
$class[3]->class_grade='3';
$class[3]->max_per_day='5';


foreach ($class as $key => $value) {
  $DB->insert_record('ttbgen_class_in', $class[$key], $returnid=true, $bulk=false);
};


echo "Record added";

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




//Room
$DB->delete_records('ttbgen_all_room_in', $conditions=null);
echo "Record deleted";

for ($i=0;$i<=6;$i++){
 $room[$i] = new stdClass();
}
$room[0]->name='Room1001';
$room[0]->special_room=false;
$room[1]->name='Room2001';
$room[1]->special_room=false;
$room[2]->name='Phy Lab';
$room[2]->special_room=true;
$room[3]->name='Chem Lab';
$room[3]->special_room=true;
$room[3]->name='Chem Lab';
$room[3]->special_room=true;
$room[4]->name='Literature Room';
$room[4]->special_room=true;
$room[5]->name='Science Lab';
$room[5]->special_room=true;
$room[6]->name='Multi-functional Room';
$room[6]->special_room=true;



foreach ($room as $key => $value) {
  $DB->insert_record('ttbgen_all_room_in', $room[$key], $returnid=true, $bulk=false);
};







echo "Record added";
echo $OUTPUT->footer();
