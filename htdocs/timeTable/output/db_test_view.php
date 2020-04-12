<?php
require_once('../../config.php');

$url = new moodle_url('/output/db_test_view.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Listing all table records');
$PAGE->set_heading('Listing all table records');

echo $OUTPUT->header();

global $DB;
$DB->set_debug(true);
// day
$dayNumSQL = 'SELECT count(*) from mdl_ttbgen_config';
$numberOfDays = $DB->count_records_sql($dayNumSQL, $params=null);

$daySQL = 'SELECT * FROM mdl_ttbgen_config';
$dayResult = $DB->get_recordset_sql($daySQL, $params=null, $limitfrom=0, $limitnum=0);

$dayId=[];
$x_day_scheme_config=[];

if ($dayResult->valid()){
  foreach ($dayResult as $record) {
    // Do whatever you want with this record
    array_push($dayId, $record->id);
    array_push($x_day_scheme_config, $record->x_day_scheme_config);
  }
}


if ($numberOfDays == 0){
	echo 'No dayscheme is created.';
} else {
	echo "There are a total of $numberOfDays room(s) in the database. <br>";
	echo "<table border=\"1\">";
		echo '<tr>';
			echo '<th> ID </th>';
			echo '<th> Day Scheme </th>';

		echo '</tr>';

		for ($i = 0; $i < $numberOfDays; $i++){
			echo '<tr>';
				echo "<td> $dayId[$i] </td>";
				echo "<td> $x_day_scheme_config[$i] </td>";
			echo '</tr>';
		}

	echo '</table>';
}
//TimeSlot
$timeslotNumSQL = "SELECT count(*) from mdl_ttbgen_timeslot_in";
$numberOfTimeslot = $DB->count_records_sql($timeslotNumSQL, $params=null);

$timeslotSQL = "SELECT * FROM mdl_ttbgen_timeslot_in";
$timeslotResult = $DB->get_recordset_sql($timeslotSQL, $params=null, $limitfrom=0, $limitnum=0);

$timeslotId=[];
$start_time_hhmm=[];
$duration_mmm=[];
$day_of_week_dd=[];
$timeslot_type_id=[];


if ($timeslotResult->valid()){
  foreach ($timeslotResult as $record) {
    // Do whatever you want with this record
    array_push($timeslotId, $record->id);
    array_push($start_time_hhmm, $record->start_time_hhmm);
    array_push($duration_mmm, $record->duration_mmm);
    array_push($day_of_week_dd, $record->day_of_week_dd);
    array_push($timeslot_type_id, $record->timeslot_type_id);

  }
}

if ($numberOfTimeslot == 0){
	echo 'No timeslot is created.';
} else {
	echo "There are a total of $numberOfTimeslot timelot(s) in the database. <br>";
	echo "<table border=\"1\">";
		echo '<tr>';
			echo '<th> Timeslot ID </th>';
      echo '<th> Start Time </th>';
			echo '<th> Duration </th>';
      echo '<th> Day of week</th>';
      echo '<th> Timeslot Type ID </th>';
		echo '</tr>';

		for ($i = 0; $i < $numberOfTimeslot; $i++){
			echo '<tr>';
				echo "<td> $timeslotId[$i] </td>";
        echo "<td> $start_time_hhmm[$i] </td>";
				echo "<td> $duration_mmm[$i] </td>";
        echo "<td> $day_of_week_dd[$i] </td>";
        echo "<td> $timeslot_type_id[$i] </td>";
			echo '</tr>';
		}

	echo '</table>';
}

//teacher
// $tid=2;
// $teacherSQL = 'SELECT distinct c.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid  AND c.id=2 AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid';
$teacherSQL = 'SELECT distinct u.id as uid,c.id as cid, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid';  //roleid = 2 is teacher
// $teacherSQL = 'SELECT distinct c.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid';  //roleid = 2 is teacher

$teachers = $DB->get_recordset_sql($teacherSQL, $params=null, $limitfrom=0, $limitnum=0);
$cid = [];
$uid = [];
$firstname = [];
$lastname = [];
foreach ($teachers as $teacher) {
  array_push($cid, $teacher->cid);
  array_push($uid, $teacher->uid);
  array_push($firstname, $teacher->firstname);
  array_push($lastname, $teacher->lastname);
}

if(empty($firstname)){
  echo "No Teacher in the Database<br>";
}
else{
  echo "<table border=\"1\">";
  echo "<tr>";
  echo "<td>UID</td>";
  echo "<td>CID</td>";
  echo "<th>Teacher Name</th>";
  echo "</tr>";

  for ($j = 0; $j < sizeof($firstname); $j++){
    echo "<tr>";
    echo "<td>$uid[$j]</td>";
    echo "<td>$cid[$j]</td>";
    echo "<td>$firstname[$j]". " $lastname[$j]</td>";
    echo "</tr>";

  }
  echo "</table>";
}

//class
$classNumSQL='SELECT count(c.id) as count_id,c.cohort_id as cohortid, h.name as class_name, c.class_grade as class_grade, c.max_per_day as max_per_day
FROM mdl_cohort AS h
JOIN mdl_ttbgen_class_in as c ON h.id = c.cohort_id';
// $classNumSQL = "SELECT class.id as id, cohort.name as class_name, class.class_grade as class_grade, class.max_per_day as max_per_day FROM mdl_ttbgen_class_in as class, mdl_cohort as cohort where class.cohort_id = cohort.id order by class_grade, class_name asc";
$numberOfClass = $DB->count_records_sql($classNumSQL, $params=null);

$classSQL='SELECT c.id as id,c.cohort_id as cohortid, h.name as class_name, c.class_grade as class_grade, c.max_per_day as max_per_day
FROM mdl_cohort AS h
JOIN mdl_ttbgen_class_in as c ON h.id = c.cohort_id';
// $classSQL = "SELECT class.id as id, cohort.name as class_name, class.class_grade as class_grade, class.max_per_day as max_per_day FROM mdl_ttbgen_class_in as class, mdl_cohort as cohort where class.cohort_id = cohort.id order by class_grade, class_name asc";
$classResult = $DB->get_recordset_sql($classSQL, $params=null, $limitfrom=0, $limitnum=0);
$classId=[];
$cohort_id=[];
$className=[];
$classGrade=[];
$max_per_day=[];


if ($classResult->valid()){
  foreach ($classResult as $record) {
    // Do whatever you want with this record
    array_push($classId, $record->id);
    array_push($cohort_id, $record->cohortid);
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
			echo '<th> ID </th>';
      echo '<th> Cohort ID</th>';
			echo '<th> Class Name </th>';
			echo '<th> Class Grade </th>';
      echo '<th> Max Per Day</th>';


		echo '</tr>';

		for ($i = 0; $i < $numberOfClass; $i++){
			echo '<tr>';
				echo "<td> $classId[$i] </td>";
        echo "<td> $cohort_id[$i] </td>";
				echo "<td> $className[$i] </td>";
				echo "<td> $classGrade[$i] </td>";
        echo "<td> $max_per_day[$i] </td>";

			echo '</tr>';
		}

	echo '</table>';
}



//Subject
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

//room

$roomNumSQL = "SELECT count(*) from mdl_ttbgen_all_room_in";
$numberOfRoom = $DB->count_records_sql($roomNumSQL, $params=null);

$roomSQL = "SELECT * FROM mdl_ttbgen_all_room_in";
$roomResult = $DB->get_recordset_sql($roomSQL, $params=null, $limitfrom=0, $limitnum=0);

$roomId=[];
$roomName=[];
$special_room=[];
if ($roomResult->valid()){
  foreach ($roomResult as $record) {
    // Do whatever you want with this record
    array_push($roomId, $record->id);
    array_push($roomName, $record->name);
    array_push($special_room, $record->special_room);

  }
}

if ($numberOfRoom == 0){
	echo 'No room is created.';
} else {
	echo "There are a total of $numberOfRoom room(s) in the database. <br>";
	echo "<table border=\"1\">";
		echo '<tr>';
			echo '<th> Room ID </th>';
      echo '<th> Room Name </th>';
      echo '<th> Speical Room </th>';
		echo '</tr>';

		for ($i = 0; $i < $numberOfRoom; $i++){
			echo '<tr>';
				echo "<td> $roomId[$i] </td>";
				echo "<td> $roomName[$i] </td>";
        echo "<td> $special_room[$i] </td>";
			echo '</tr>';
		}

	echo '</table>';
}

//cohort
$cohortCountSQL='SELECT count(u.firstname), u.lastname, h.idnumber, h.name,u.id
FROM mdl_cohort AS h
JOIN mdl_cohort_members AS hm ON h.id = hm.cohortid
JOIN mdl_user AS u ON hm.userid = u.id
-- where u.id = 2
ORDER BY hm.cohortid';
$numOfMember= $DB->count_records_sql($cohortCountSQL, $params=null);


$cohortSQL='SELECT u.firstname, u.lastname, h.idnumber, h.name,u.id
FROM mdl_cohort AS h
JOIN mdl_cohort_members AS hm ON h.id = hm.cohortid
JOIN mdl_user AS u ON hm.userid = u.id
-- where u.id = 2
ORDER BY hm.cohortid';


$cohortResult=$DB->get_recordset_sql($cohortSQL, $params=null, $limitfrom=0, $limitnum=0);
$cohortFirstname=[];
$cohortLastname=[];
$cohortID=[];
$cohortName=[];
$cohortUID=[];

if ($cohortResult->valid()){
  foreach ($cohortResult as $record) {
    // Do whatever you want with this record
    array_push($cohortFirstname, $record->firstname);
    array_push($cohortLastname, $record->lastname);
    array_push($cohortID, $record->idnumber);
    array_push($cohortName, $record->name);
    array_push($cohortUID, $record->id);




  }
}

if ($numOfMember == 0){
	echo 'No records is created.';
} else {
	echo "There are a total of $numOfMember record(s) in the database. <br>";
	echo "<table border=\"1\">";
		echo '<tr>';
			echo '<th> First Name </th>';
      echo '<th> Last Name </th>';
      echo '<th> ID </th>';
      echo '<th> Cohort Name </th>';
      echo '<th> UID </th>';

		echo '</tr>';

		for ($i = 0; $i < $numOfMember; $i++){
			echo '<tr>';
				echo "<td> $cohortFirstname[$i] </td>";
				echo "<td> $cohortLastname[$i] </td>";
        echo "<td> $cohortID[$i] </td>";
        echo "<td> $cohortName[$i] </td>";
        echo "<td> $cohortUID[$i] </td>";


			echo '</tr>';
		}

	echo '</table>';
}


$teacherListNumSQL = 'SELECT count(distinct u.id) as count_uid,c.id as cid, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid';  //roleid = 2 is teacher
// $teacherListNumSQL = 'SELECT count(distinct u.id) as count_uid,c.id as cid, u.firstname as firstname, u.lastname as lastname ';
// $teacherListNumSQL.='FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct ';
// $teacherListNumSQL.='WHERE c.id = ct.instanceid AND ra.roleid = 2 AND ra.userid = u.id AND ct.id = ra.contextid';
$numOfteacherList= $DB->count_records_sql($teacherListNumSQL, $params=null);

$teacherListSQL = 'SELECT distinct u.id as uid,c.id as cid, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid';  //roleid = 2 is teacher
// $teacherListSQL = 'SELECT distinct u.id as uid,c.id as cid, u.firstname as firstname, u.lastname as lastname ';
// $teacherListSQL.='FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct ';
// $teacherListSQL.='WHERE c.id = ct.instanceid AND ra.roleid = 2 AND ra.userid = u.id AND ct.id = ra.contextid';
$teacherListResult=$DB->get_recordset_sql($teacherListSQL, $params=null, $limitfrom=0, $limitnum=0);

$listUid=[];
$ListCid=[];
if ($teacherListResult->valid()){
  foreach ($teacherListResult as $record) {
    // Do whatever you want with this record
    array_push($listUid, $record->uid);
    array_push($ListCid, $record->cid);
  }
}

if ($numOfteacherList == 0){
	echo 'No teacher is created.';
} else {
	echo "There are a total of $numOfMember teacher(s) in the database. <br>";
	echo "<table border=\"1\">";
		echo '<tr>';
			echo '<th> uid </th>';
      echo '<th> cid </th>';

		echo '</tr>';

		for ($i = 0; $i < $numOfteacherList; $i++){
			echo '<tr>';
				echo "<td> $listUid[$i] </td>";
				echo "<td> $ListCid[$i] </td>";


			echo '</tr>';
		}

	echo '</table>';
}


$outputNumSQL = "SELECT count(*) from mdl_ttbgen_output where teacherid=278";
$numOfRecord = $DB->count_records_sql($outputNumSQL, $params=null);
echo $numOfRecord;



echo $OUTPUT->footer();
