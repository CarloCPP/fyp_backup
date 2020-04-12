<?php

require_once('../../config.php');
require_once(__DIR__.'/ics/zapcallib.php');

require_once($CFG->dirroot.'/timeTable/output/outputQuery_form.php');
require_login();
$url = new moodle_url('/timeTable/output/view.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('base');
$heading = 'Time Table Output-Page';
$PAGE->set_heading($heading);
$PAGE->requires->js('/timeTable/output/jquery.js',true);
$PAGE->requires->js('/timeTable/output/view_script.js',true);
$PAGE->requires->js('/timeTable/output/script.js',true);
$PAGE->requires->css('/timeTable/output/view_style.css',true);


echo $OUTPUT->header();
echo $OUTPUT->heading('Calendar can be downloaded through the button below.');
echo "<br/>";
global $USER;
$userID=$USER->id;

// $userID=297; //for debug

if($userID==2){


	// <form action='./view.php' method='post'>
	$SELF=$_SERVER['PHP_SELF'];
	echo"<form method='post' name='test' action='".$SELF."'>";
	echo"Enter a userID to query:";
	echo"<input type='text' name='userID' value=''>";
	echo"<br>";
	echo"<input type='submit' value='Submit'>";
	echo"</form>";
	echo"<br>";


}

if(isset($_POST['userID'])){
	$userID=$_POST['userID'];
	echo "<script> consoleFn('Post Set'); </script>";

}
else{
	echo "<script> consoleFn('Post Not Set'); </script>";

}

$teacherListSQL = 'SELECT distinct u.id as uid,c.id as cid, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid';  //roleid = 2 is teacher
$teacherListResult = $DB->get_recordset_sql($teacherListSQL, $params=null, $limitfrom=0, $limitnum=0);
$listUid=[];
$ListCid=[];


if ($teacherListResult->valid()){
	foreach ($teacherListResult as $record) {
		// Do whatever you want with this record
		array_push($listUid, $record->uid);
		array_push($ListCid, $record->cid);
	}
}
//0 for admin ;1 for teacher 2 student
if($userID==2){
	$role_id=0;
	echo "<script> consoleFn('Admin detected (Before printing).'); </script>";

}
else{
	if(in_array($userID,$listUid)){
		$role_id=1;
		echo "<script> consoleFn('Teacher detected (Before printing).'); </script>";

	}
	else{
		$role_id=2;
		echo "<script> consoleFn('Student detected (Before printing).'); </script>";


	}
}

//
// foreach ($listUid as $uid) {
// 	echo "<script> consoleFn(".$uid."); </script>";
//
// }

//Debuging:
// $role_id=0;		//foce change to admin
// $role_id=1;				//foce change to teacher
// $role_id=2;		//foce change to student
// $UserID=2;				//foce change to admin
// $UserID=249;			//foce change to teacher
// $UserID=297;			//foce change to student


printOutputTable($userID,$role_id);

printICSTable($userID,$role_id);

// echo "<br/>";
// echo "Current User ID:=".$userID;
echo $OUTPUT->footer();


function printOutputTable($userID,$role_id){

	if($role_id==0){




		global $DB;
		// $DB->set_debug(true);
		$DB->set_debug(false);



		//get id from output table
		$output=array();
		$timeslot=array();
		$subject=array();
		$class=array();
		$teacher=array();
		$room=array();

		$outputNumSQL = "SELECT count(*) from mdl_ttbgen_output";
		$numOfRecord = $DB->count_records_sql($outputNumSQL, $params=null);
		$outputSQL = "SELECT * FROM mdl_ttbgen_output";
		$outputResult = $DB->get_recordset_sql($outputSQL, $params=null, $limitfrom=0, $limitnum=0);

		if ($outputResult->valid()){
			foreach ($outputResult as $key=>$record) {
				array_push($output, $record->id);

				$timeslot[$key]=array();
				$timeslot[$key]["id"]= $record->timeslotid;
				$subject[$key]=array();
				$subject[$key]["id"]= $record->subjectid;
				$class[$key]=array();
				$class[$key]["id"]= $record->classid;
				$teacher[$key]=array();
				$teacher[$key]["id"]= $record->teacherid;
				$room[$key]=array();
				$room[$key]["id"]= $record->roomid;
			}
		}



		foreach ($timeslot as $key => $record) {
			$tid=$timeslot[$key]['id'];
			$timeslotSQL = "SELECT * FROM mdl_ttbgen_timeslot_in where id=$tid";
			$timeslotResult = $DB->get_recordset_sql($timeslotSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($timeslotResult as $inrecord) {
				$timeslot[$key]["start_time_hhmm"]= $inrecord->start_time_hhmm;
				$timeslot[$key]["duration_mmm"]= $inrecord->duration_mmm;
				$timeslot[$key]["day_of_week_dd"]= $inrecord->day_of_week_dd;
				$timeslot[$key]['timeslot_type_id']=$inrecord->timeslot_type_id;

				if($timeslot[$key]['start_time_hhmm']<1000){
					// echo "<script> consoleFn('<1000'); </script>";
					// $consoleInput=$timeslot[$key]["duration_mmm"];
					// echo "<script> consoleFn(\"".$consoleInput."\"); </script>";
					$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
					$timeslot[$key]['base_time']="0".$timeslot[$key]['base_time'];
					// $timeslot[$key]['base_time']=str_pad($timeslot[$key]['base_time'], 4, '0', STR_PAD_LEFT);
					$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
					$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
					$timeslot[$key]['start_time']=date("H:i", $timeslot[$key]['start_time']);
					$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;

					$timeslot[$key]['end_time']=date("H:i", $timeslot[$key]['end_time']);

				}
				else{
					// echo "<script> consoleFn('not <1000'); </script>";
					// $consoleInput=$timeslot[$key]["duration_mmm"];
					// echo "<script> consoleFn(\"".$consoleInput."\"); </script>";
					$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
					$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
					$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
					$timeslot[$key]['start_time']=date("H:i", $timeslot[$key]['start_time']);
					$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;

					$timeslot[$key]['end_time']=date("H:i", $timeslot[$key]['end_time']);
				}
			}
		}
		foreach ($subject as $key => $record) {
			$sid=$subject[$key]['id'];
			$subjectSQL = "SELECT * FROM mdl_ttbgen_subject_in where id=$sid";
			$subjectResult = $DB->get_recordset_sql($subjectSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($subjectResult as $inrecord) {
				$subject[$key]["name"]= $inrecord->name;
				$subject[$key]["grade"]= $inrecord->name;
				$subject[$key]["how_many_in_grade"]= $inrecord->name;
				$subject[$key]["require_special_room"]= $inrecord->name;

			}
		}

		foreach ($class as $key => $record) {
			$cid=$class[$key]['id'];
			// $classSQL = "SELECT name FROM mdl_cohort where id=$cid";
			$classSQL="SELECT c.id as id,c.cohort_id as cohortid, h.name as class_name, c.class_grade as class_grade, c.max_per_day as max_per_day
			FROM mdl_cohort AS h
			JOIN mdl_ttbgen_class_in as c ON h.id = c.cohort_id
			where c.id=$cid";
			$classResult = $DB->get_recordset_sql($classSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($classResult as $inrecord) {
				// $class[$key]["name"]= $inrecord->name;
				$class[$key]["name"]= $inrecord->class_name;
			}
		}

		foreach ($teacher as $key => $record) {
			$tid=$teacher[$key]['id'];
			$teacherSQL = "SELECT distinct u.id as uid,c.id as cid, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE u.id='$tid' AND c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid";  //roleid = 2 is teacher
			// $teacherSQL = "SELECT distinct u.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid  AND u.id='$tid' AND ra.roleid = 2 AND ra.userid = u.id AND ct.id = ra.contextid";
			$teacherResult = $DB->get_recordset_sql($teacherSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($teacherResult as $inrecord) {
				$teacher[$key]["name"]= $inrecord->firstname."&nbsp;".$inrecord->lastname;
			}
		}

		foreach ($room as $key => $record) {
			$rid=$room[$key]['id'];
			if(is_null($rid)){

				$room[$key]["name"]="Home room";
			}
			else{
				$rooomSQL ="SELECT name FROM mdl_ttbgen_all_room_in where id=$rid";
				$roomResult = $DB->get_recordset_sql($rooomSQL, $params=null, $limitfrom=0, $limitnum=0);
				foreach ($roomResult as $inrecord) {
					// if(empty($inrecord->name)){

					$room[$key]["name"]= $inrecord->name;

				}

			}
		}



		//	print outTable
		if ($numOfRecord == 0){
			echo 'No record from output table.';
		} else {
			echo "There are a total of $numOfRecord record(s) in the database. <br>";
			echo "<table border=\"1\">";
			echo '<tr>';
			echo '<th> Day of Week </th>';
			echo '<th> Start Time (hh:mm)</th>';
			echo '<th> Duration (mmm) </th>';
			echo '<th> End Time (hh:mm)</th>';
			echo '<th> Subject Name </th>';
			echo '<th> Class</th>';
			echo '<th> Teacher </th>';
			echo '<th> Room Name</th>';


			echo '</tr>';

			foreach (	$output as $index => $i) {
				// for ($i = 1; $i < $numOfRecord+1; $i++){
				// $index=$output[$i];
				echo '<tr>';
				// $day_of_week=$timeslot[$i]['day_of_week'];
				// $starttime=$timeslot[$i]['starttime'];
				// $duration=$timeslot[$i]['duration'];

				echo "<td> {$timeslot[$i]['day_of_week_dd']} </td>";
				echo "<td> {$timeslot[$i]['start_time']} </td>";
				echo "<td> {$timeslot[$i]['duration_mmm']} </td>";
				echo "<td> {$timeslot[$i]['end_time']} </td>";

				if($timeslot[$i]['timeslot_type_id']==0){
					echo "<td> {$subject[$i]['name']}</td>";
					echo "<td> {$class[$i]['name']}</td>";
					echo "<td> {$teacher[$i]["name"]} </td>";
					echo "<td> {$room[$i]["name"]} </td>";
				}
				elseif($timeslot[$i]['timeslot_type_id']==1){
					echo "<td> Recess</td>";
					echo "<td> {$class[$i]['name']}</td>";
					echo "<td> / </td>";
					echo "<td> / </td>";
				}
				elseif($timeslot[$i]['timeslot_type_id']==2){
					echo "<td> Lunch</td>";
					echo "<td> {$class[$i]['name']}</td>";
					echo "<td> / </td>";
					echo "<td> / </td>";
				}

				// echo "<td> {$teacher[$i]["id"]} </td>";


				echo '</tr>';
			}

			echo '</table>';
		}

	}//end of "if admin"
	else if($role_id==2){
		//if student




		global $DB;
		$classToOutput=array();
		$classToOutputSQL="SELECT h.id as id FROM mdl_cohort AS h JOIN mdl_cohort_members AS hm ON h.id = hm.cohortid JOIN mdl_user AS u ON hm.userid = u.id where u.id=$userID";
		$classToOutputResult=$DB->get_recordset_sql($classToOutputSQL, $params=null, $limitfrom=0, $limitnum=0);

		if(!$classToOutputResult->valid()){
			echo "You have no class. You have no table to output.";
			echo"<br/>";

			return;
		}
		else{
			foreach ($classToOutputResult as $record) {
				array_push($classToOutput,$record->id);
			}
		}
		// echo $classToOutput[0];
		// echo "You have class.";

		//get id from output table
		$output=array();
		$timeslot=array();
		$subject=array();
		$class=array();
		$teacher=array();
		$room=array();

		echo "<script> consoleFn(\"Class to out ID".$classToOutput[0]."\"); </script>";

		// $cto=$classToOutput[0];
		// $outputNumSQL = "SELECT count(*) from mdl_ttbgen_output where classid=$classToOutput[0]";
		// $outputNumSQL = "SELECT count(*) from mdl_ttbgen_output as out JOIN mdl_ttbgen_class_in as c ON c.id=out.classid where c.cohortid=$classToOutput[0]";
		// $outputSQL = "SELECT o.id as id

		$outputNumSQL = "SELECT count(o.id) as count_id
		FROM mdl_ttbgen_output as o
		JOIN mdl_ttbgen_class_in as c ON c.id = o.classid
		where c.cohort_id=$classToOutput[0]";

		// $outputNumSQL = "SELECT count(*) from mdl_ttbgen_output where classid=$classToOutput[0]";
		$numOfRecord = $DB->count_records_sql($outputNumSQL, $params=null);

		echo "<script> consoleFn(\"Num to out".$numOfRecord."\"); </script>";

		// $outputSQL = "SELECT * from mdl_ttbgen_output as out JOIN mdl_ttbgen_class_in as c ON c.id=out.classid where c.cohortid=$classToOutput[0]";
		$outputSQL = "SELECT o.id as id, o.timeslotid as timeslotid,o.subjectid as subjectid, o.classid as classid,o.teacherid as teacherid,o.roomid as roomid
		FROM mdl_ttbgen_output as o
		JOIN mdl_ttbgen_class_in as c ON c.id = o.classid
		where c.cohort_id=$classToOutput[0]";
		// $outputSQL = "SELECT * FROM mdl_ttbgen_output where classid=$classToOutput[0]";
		$outputResult = $DB->get_recordset_sql($outputSQL, $params=null, $limitfrom=0, $limitnum=0);

		if ($outputResult->valid()){
			foreach ($outputResult as $key=>$record) {
				array_push($output, $record->id);
				// echo "<script> consoleFn(\"".$record->id."\"); </script>";

				$timeslot[$key]=array();
				$timeslot[$key]["id"]= $record->timeslotid;
				$subject[$key]=array();
				$subject[$key]["id"]= $record->subjectid;
				$class[$key]=array();
				$class[$key]["id"]= $record->classid;
				$teacher[$key]=array();
				$teacher[$key]["id"]= $record->teacherid;
				$room[$key]=array();
				$room[$key]["id"]= $record->roomid;
			}
		}


		foreach ($timeslot as $key => $record) {
			$tid=$timeslot[$key]['id'];
			echo "<script> consoleFn('Line393: ".$tid."'); </script>";

			$timeslotSQL = "SELECT * FROM mdl_ttbgen_timeslot_in where id=$tid";
			$timeslotResult = $DB->get_recordset_sql($timeslotSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($timeslotResult as $inrecord) {
				$timeslot[$key]["start_time_hhmm"]= $inrecord->start_time_hhmm;
				$timeslot[$key]["duration_mmm"]= $inrecord->duration_mmm;
				$timeslot[$key]["day_of_week_dd"]= $inrecord->day_of_week_dd;
				$timeslot[$key]['timeslot_type_id']=$inrecord->timeslot_type_id;

				if($timeslot[$key]['start_time_hhmm']<1000){
					// echo "<script> consoleFn('<1000'); </script>";
					// $consoleInput=$timeslot[$key]["duration_mmm"];
					// echo "<script> consoleFn(\"".$consoleInput."\"); </script>";
					$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
					$timeslot[$key]['base_time']="0".$timeslot[$key]['base_time'];
					// $timeslot[$key]['base_time']=str_pad($timeslot[$key]['base_time'], 4, '0', STR_PAD_LEFT);
					$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
					$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
					$timeslot[$key]['start_time']=date("H:i", $timeslot[$key]['start_time']);
					$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;

					$timeslot[$key]['end_time']=date("H:i", $timeslot[$key]['end_time']);

				}
				else{
					// echo "<script> consoleFn('not <1000'); </script>";
					// $consoleInput=$timeslot[$key]["duration_mmm"];
					// echo "<script> consoleFn(\"".$consoleInput."\"); </script>";
					$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
					$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
					$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
					$timeslot[$key]['start_time']=date("H:i", $timeslot[$key]['start_time']);
					$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;

					$timeslot[$key]['end_time']=date("H:i", $timeslot[$key]['end_time']);
				}
			}
		}
		foreach ($subject as $key => $record) {
			$sid=$subject[$key]['id'];
			$subjectSQL = "SELECT * FROM mdl_ttbgen_subject_in where id=$sid";
			$subjectResult = $DB->get_recordset_sql($subjectSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($subjectResult as $inrecord) {
				$subject[$key]["name"]= $inrecord->name;
				$subject[$key]["grade"]= $inrecord->name;
				$subject[$key]["how_many_in_grade"]= $inrecord->name;
				$subject[$key]["require_special_room"]= $inrecord->name;

			}
		}

		foreach ($class as $key => $record) {
			$cid=$class[$key]['id'];
			// $classSQL = "SELECT name FROM mdl_cohort where id=$cid";
			$classSQL="SELECT c.id as id,c.cohort_id as cohortid, h.name as class_name, c.class_grade as class_grade, c.max_per_day as max_per_day
			FROM mdl_cohort AS h
			JOIN mdl_ttbgen_class_in as c ON h.id = c.cohort_id
			where c.id=$cid";
			$classResult = $DB->get_recordset_sql($classSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($classResult as $inrecord) {
				$class[$key]["name"]= $inrecord->class_name;
			}
		}

		foreach ($teacher as $key => $record) {
			$tid=$teacher[$key]['id'];
			$teacherSQL = "SELECT distinct u.id as uid,c.id as cid, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE u.id='$tid' AND c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid";  //roleid = 2 is teacher
			// $teacherSQL = "SELECT distinct u.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid  AND u.id='$tid' AND ra.roleid = 2 AND ra.userid = u.id AND ct.id = ra.contextid";
			$teacherResult = $DB->get_recordset_sql($teacherSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($teacherResult as $inrecord) {
				$teacher[$key]["name"]= $inrecord->firstname."&nbsp;".$inrecord->lastname;
			}
		}

		foreach ($room as $key => $record) {
			$rid=$room[$key]['id'];
			if(is_null($rid)){

				$room[$key]["name"]="Home room";
			}
			else{
				$rooomSQL ="SELECT name FROM mdl_ttbgen_all_room_in where id=$rid";
				$roomResult = $DB->get_recordset_sql($rooomSQL, $params=null, $limitfrom=0, $limitnum=0);
				foreach ($roomResult as $inrecord) {
					// if(empty($inrecord->name)){

					$room[$key]["name"]= $inrecord->name;

				}

			}
		}



		//	print outTable
		if ($numOfRecord == 0){
			echo 'No record from output table.';
		} else {
			echo "There are a total of $numOfRecord record(s) in the database. <br>";
			echo "<table border=\"1\">";
			echo '<tr>';
			echo '<th> Day of Week </th>';
			echo '<th> Start Time (hh:mm)</th>';
			echo '<th> Duration (mmm) </th>';
			echo '<th> End Time (hh:mm)</th>';
			echo '<th> Subject Name </th>';
			echo '<th> Class</th>';
			echo '<th> Teacher </th>';
			echo '<th> Room Name</th>';


			echo '</tr>';

			foreach (	$output as $index => $i) {

				// for ($i = 1; $i < $numOfRecord+1; $i++){
				// $index=$output[$i];
				echo '<tr>';
				// $day_of_week=$timeslot[$i]['day_of_week'];
				// $starttime=$timeslot[$i]['starttime'];
				// $duration=$timeslot[$i]['duration'];

				echo "<td> {$timeslot[$i]['day_of_week_dd']} </td>";
				echo "<td> {$timeslot[$i]['start_time']} </td>";
				echo "<td> {$timeslot[$i]['duration_mmm']} </td>";
				echo "<td> {$timeslot[$i]['end_time']} </td>";

				if($timeslot[$i]['timeslot_type_id']==0){
					echo "<td> {$subject[$i]['name']}</td>";
					echo "<td> {$class[$i]['name']}</td>";
					echo "<td> {$teacher[$i]["name"]} </td>";
					echo "<td> {$room[$i]["name"]} </td>";
				}
				elseif($timeslot[$i]['timeslot_type_id']==1){
					echo "<td> Recess</td>";
					echo "<td> {$class[$i]['name']}</td>";
					echo "<td> / </td>";
					echo "<td> / </td>";
				}
				elseif($timeslot[$i]['timeslot_type_id']==2){
					echo "<td> Lunch</td>";
					echo "<td> {$class[$i]['name']}</td>";
					echo "<td> / </td>";
					echo "<td> / </td>";
				}

				// echo "<td> {$teacher[$i]["id"]} </td>";


				echo '</tr>';
			}

			echo '</table>';
		}


	}//end of if student
	else{

		//teacher
		global $DB;
		//get id from output table
		$output=array();
		$timeslot=array();
		$subject=array();
		$class=array();
		$teacher=array();
		$room=array();

		$outputNumSQL = "SELECT count(*) from mdl_ttbgen_output where teacherid=$userID";
		$numOfRecord = $DB->count_records_sql($outputNumSQL, $params=null);
		$outputSQL = "SELECT * FROM mdl_ttbgen_output where teacherid=$userID";
		$outputResult = $DB->get_recordset_sql($outputSQL, $params=null, $limitfrom=0, $limitnum=0);

		if ($outputResult->valid()){
			foreach ($outputResult as $key=>$record) {
				array_push($output, $record->id);
				// echo "<script> consoleFn(\"".$record->id."\"); </script>";

				$timeslot[$key]=array();
				$timeslot[$key]["id"]= $record->timeslotid;
				$subject[$key]=array();
				$subject[$key]["id"]= $record->subjectid;
				$class[$key]=array();
				$class[$key]["id"]= $record->classid;
				$teacher[$key]=array();
				$teacher[$key]["id"]= $record->teacherid;
				$room[$key]=array();
				$room[$key]["id"]= $record->roomid;
			}
		}
		foreach ($timeslot as $key => $record) {
			$tid=$timeslot[$key]['id'];
			$timeslotSQL = "SELECT * FROM mdl_ttbgen_timeslot_in where id=$tid";
			$timeslotResult = $DB->get_recordset_sql($timeslotSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($timeslotResult as $inrecord) {
				$timeslot[$key]["start_time_hhmm"]= $inrecord->start_time_hhmm;
				$timeslot[$key]["duration_mmm"]= $inrecord->duration_mmm;
				$timeslot[$key]["day_of_week_dd"]= $inrecord->day_of_week_dd;
				$timeslot[$key]['timeslot_type_id']=$inrecord->timeslot_type_id;

				if($timeslot[$key]['start_time_hhmm']<1000){
					// echo "<script> consoleFn('<1000'); </script>";
					// $consoleInput=$timeslot[$key]["duration_mmm"];
					// echo "<script> consoleFn(\"".$consoleInput."\"); </script>";
					$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
					$timeslot[$key]['base_time']="0".$timeslot[$key]['base_time'];
					// $timeslot[$key]['base_time']=str_pad($timeslot[$key]['base_time'], 4, '0', STR_PAD_LEFT);
					$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
					$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
					$timeslot[$key]['start_time']=date("H:i", $timeslot[$key]['start_time']);
					$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;

					$timeslot[$key]['end_time']=date("H:i", $timeslot[$key]['end_time']);

				}
				else{
					// echo "<script> consoleFn('not <1000'); </script>";
					// $consoleInput=$timeslot[$key]["duration_mmm"];
					// echo "<script> consoleFn(\"".$consoleInput."\"); </script>";
					$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
					$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
					$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
					$timeslot[$key]['start_time']=date("H:i", $timeslot[$key]['start_time']);
					$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;

					$timeslot[$key]['end_time']=date("H:i", $timeslot[$key]['end_time']);
				}
			}
		}
		foreach ($subject as $key => $record) {
			$sid=$subject[$key]['id'];
			$subjectSQL = "SELECT * FROM mdl_ttbgen_subject_in where id=$sid";
			$subjectResult = $DB->get_recordset_sql($subjectSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($subjectResult as $inrecord) {
				$subject[$key]["name"]= $inrecord->name;
				$subject[$key]["grade"]= $inrecord->name;
				$subject[$key]["how_many_in_grade"]= $inrecord->name;
				$subject[$key]["require_special_room"]= $inrecord->name;

			}
		}

		foreach ($class as $key => $record) {
			$cid=$class[$key]['id'];
			// $classSQL = "SELECT name FROM mdl_cohort where id=$cid";
			$classSQL="SELECT c.id as id,c.cohort_id as cohortid, h.name as class_name, c.class_grade as class_grade, c.max_per_day as max_per_day
			FROM mdl_cohort AS h
			JOIN mdl_ttbgen_class_in as c ON h.id = c.cohort_id
			where c.id=$cid";
			$classResult = $DB->get_recordset_sql($classSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($classResult as $inrecord) {
				$class[$key]["name"]= $inrecord->class_name;
			}
		}

		foreach ($teacher as $key => $record) {
			$tid=$teacher[$key]['id'];
			$teacherSQL = "SELECT distinct u.id as uid,c.id as cid, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE u.id='$tid' AND c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid";  //roleid = 2 is teacher
			// $teacherSQL = "SELECT distinct u.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid  AND u.id='$tid' AND ra.roleid = 2 AND ra.userid = u.id AND ct.id = ra.contextid";
			$teacherResult = $DB->get_recordset_sql($teacherSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($teacherResult as $inrecord) {
				$teacher[$key]["name"]= $inrecord->firstname."&nbsp;".$inrecord->lastname;
			}
		}

		foreach ($room as $key => $record) {
			$rid=$room[$key]['id'];
			if(is_null($rid)){

				$room[$key]["name"]="Home room";
			}
			else{
				$rooomSQL ="SELECT name FROM mdl_ttbgen_all_room_in where id=$rid";
				$roomResult = $DB->get_recordset_sql($rooomSQL, $params=null, $limitfrom=0, $limitnum=0);
				foreach ($roomResult as $inrecord) {
					// if(empty($inrecord->name)){

					$room[$key]["name"]= $inrecord->name;

				}

			}
		}



		//	print outTable
		if ($numOfRecord == 0){
			echo 'No record from output table.';
		} else {
			echo "There are a total of $numOfRecord record(s) in the database. <br>";
			echo "<table border=\"1\">";
			echo '<tr>';
			echo '<th> Day of Week </th>';
			echo '<th> Start Time (hh:mm)</th>';
			echo '<th> Duration (mmm) </th>';
			echo '<th> End Time (hh:mm)</th>';
			echo '<th> Subject Name </th>';
			echo '<th> Class</th>';
			echo '<th> Teacher </th>';
			echo '<th> Room Name</th>';


			echo '</tr>';

			foreach (	$output as $index => $i) {

				// for ($i = 1; $i < $numOfRecord+1; $i++){
				// $index=$output[$i];
				echo '<tr>';
				// $day_of_week=$timeslot[$i]['day_of_week'];
				// $starttime=$timeslot[$i]['starttime'];
				// $duration=$timeslot[$i]['duration'];

				echo "<td> {$timeslot[$i]['day_of_week_dd']} </td>";
				echo "<td> {$timeslot[$i]['start_time']} </td>";
				echo "<td> {$timeslot[$i]['duration_mmm']} </td>";
				echo "<td> {$timeslot[$i]['end_time']} </td>";

				if($timeslot[$i]['timeslot_type_id']==0){
					echo "<td> {$subject[$i]['name']}</td>";
					echo "<td> {$class[$i]['name']}</td>";
					echo "<td> {$teacher[$i]["name"]} </td>";
					echo "<td> {$room[$i]["name"]} </td>";
				}
				elseif($timeslot[$i]['timeslot_type_id']==1){
					echo "<td> Recess</td>";
					echo "<td> {$class[$i]['name']}</td>";
					echo "<td> / </td>";
					echo "<td> / </td>";
				}
				elseif($timeslot[$i]['timeslot_type_id']==2){
					echo "<td> Lunch</td>";
					echo "<td> {$class[$i]['name']}</td>";
					echo "<td> / </td>";
					echo "<td> / </td>";
				}

				// echo "<td> {$teacher[$i]["id"]} </td>";


				echo '</tr>';
			}

			echo '</table>';
		}








	}//end of if teacher




}


//ICS
function printICSTable($userID,$role_id){
	global $DB;


	if($role_id==2){
		//if user is student
		echo "<script> consoleFn('User=Student, starting to print ICS '); </script>";

//old
		// get user:class-id
		// $userSQL = "SELECT distinct u.id as uid,c.id as cid, u.firstname as firstname, u.lastname as lastname ";
		// $userSQL = $userSQL."FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct ";
		// $userSQL = $userSQL."WHERE u.id=2 AND c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid ";
		// $userSQL="SELECT cohortid
		// FROM mdl_cohort AS h
		// JOIN mdl_cohort_members AS hm ON h.id = hm.cohortid
		// JOIN mdl_user AS u ON hm.userid = u.id
		// where u.id = $userID
		// -- where u.id = 296
		// ORDER BY hm.cohortid";
		$classToOutput=array();
		$classToOutputSQL="SELECT h.id as id
		FROM mdl_cohort AS h
		JOIN mdl_cohort_members AS hm ON h.id = hm.cohortid
		JOIN mdl_user AS u ON hm.userid = u.id
		where u.id=$userID";
		$classToOutputResult=$DB->get_recordset_sql($classToOutputSQL, $params=null, $limitfrom=0, $limitnum=0);

		// $userResult = $DB->get_recordset_sql($userSQL, $params=null, $limitfrom=0, $limitnum=0);
		if (!$classToOutputResult->valid()){
			echo"You have no class. You have no ics file to output."; //debug
			echo"<br/>";

			return;
		}
		else{
			foreach ($classToOutputResult as $record) {
				array_push($classToOutput,$record->id);

				// $classToOutput=$record->id;
			}
			// echo"You are in class of ID: "."$user_cid"." ."; //debug



			//get id from output table
			$output=array();
			$timeslot=array();
			$subject=array();
			$class=array();
			$teacher=array();
			$room=array();

			// $user_cid
			//$classToOutput[0]

			$outputNumSQL = "SELECT count(o.id) as count_id
			FROM mdl_ttbgen_output as o
			JOIN mdl_ttbgen_class_in as c ON c.id = o.classid
			where c.cohort_id=$classToOutput[0]";
			// $outputNumSQL = "SELECT count(*) from mdl_ttbgen_output where classid=$user_cid";
			$numOfRecord = $DB->count_records_sql($outputNumSQL, $params=null);


			$outputSQL = "SELECT o.id as id, o.timeslotid as timeslotid,o.subjectid as subjectid, o.classid as classid,o.teacherid as teacherid,o.roomid as roomid
			FROM mdl_ttbgen_output as o
			JOIN mdl_ttbgen_class_in as c ON c.id = o.classid
			where c.cohort_id=$classToOutput[0]";
			// $outputSQL = "SELECT * FROM mdl_ttbgen_output where classid=$user_cid";
			$outputResult = $DB->get_recordset_sql($outputSQL, $params=null, $limitfrom=0, $limitnum=0);

			if ($outputResult->valid()){
				foreach ($outputResult as $key=>$record) {
					array_push($output, $record->id);

					echo "<script> consoleFn('Line 819: ".$record->id."'); </script>";

					$timeslot[$key]=array();
					$timeslot[$key]["id"]= $record->timeslotid;
					$subject[$key]=array();
					$subject[$key]["id"]= $record->subjectid;
					$class[$key]=array();
					$class[$key]["id"]= $record->classid;
					$teacher[$key]=array();
					$teacher[$key]["id"]= $record->teacherid;
					$room[$key]=array();
					$room[$key]["id"]= $record->roomid;
				}
			}
			// $timeslot[$key]["start_time"]= date('Ymd\THis', $timeslot[$key]['start_time']);


			foreach ($timeslot as $key => $record) {
				$tid=$timeslot[$key]['id'];
				$timeslotSQL = "SELECT * FROM mdl_ttbgen_timeslot_in where id=$tid";
				$timeslotResult = $DB->get_recordset_sql($timeslotSQL, $params=null, $limitfrom=0, $limitnum=0);
				foreach ($timeslotResult as $inrecord) {
					$timeslot[$key]["start_time_hhmm"]= $inrecord->start_time_hhmm;
					$timeslot[$key]["duration_mmm"]= $inrecord->duration_mmm;
					$timeslot[$key]["day_of_week_dd"]= $inrecord->day_of_week_dd;
					$timeslot[$key]['timeslot_type_id']=$inrecord->timeslot_type_id;
					if($timeslot[$key]['timeslot_type_id']==0){
						$timeslot[$key]['timeslot_type']="Lesson";
					}
					elseif($timeslot[$key]['timeslot_type_id']==1){
						$timeslot[$key]['timeslot_type']="Recess";

					}
					else{
						$timeslot[$key]['timeslot_type']="Lunch";

					}

					if($timeslot[$key]['start_time_hhmm']<1000){
						// echo "<script> consoleFn('<1000 (ics)'); </script>";
						$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
						$timeslot[$key]['base_time']="0".$timeslot[$key]['base_time'];
						// $timeslot[$key]['base_time']=str_pad($timeslot[$key]['base_time'], 4, '0', STR_PAD_LEFT);
						$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
						$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
						// $timeslot[$key]['start_time']=date('Ymd\THis', $timeslot[$key]['start_time']);
						$timeslot[$key]['start_time']=date('Hi', $timeslot[$key]['start_time']);
						$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;
						// $timeslot[$key]['end_time']=date('Ymd\THis', $timeslot[$key]['end_time']);
						$timeslot[$key]['end_time']=date('Hi', $timeslot[$key]['end_time']);

					}
					else{
						// echo "<script> consoleFn('not <1000 (ics)'); </script>";
						$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
						$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
						$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
						$timeslot[$key]['start_time']=date('Hi', $timeslot[$key]['start_time']);
						$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;
						$timeslot[$key]['end_time']=date('Hi', $timeslot[$key]['end_time']);

					}
				}
			}

			foreach ($subject as $key => $record) {
				$sid=$subject[$key]['id'];
				$subjectSQL = "SELECT * FROM mdl_ttbgen_subject_in where id=$sid";
				$subjectResult = $DB->get_recordset_sql($subjectSQL, $params=null, $limitfrom=0, $limitnum=0);
				foreach ($subjectResult as $inrecord) {
					$subject[$key]["name"]= $inrecord->name;
					// $subject[$key]["grade"]= $inrecord->name;
					// $subject[$key]["how_many_in_grade"]= $inrecord->name;
					// $subject[$key]["require_special_room"]= $inrecord->name;

				}
			}

			foreach ($teacher as $key => $record) {
				$tid=$teacher[$key]['id'];
				$teacherSQL = "SELECT distinct u.id as uid,c.id as cid, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE u.id='$tid' AND c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid";  //roleid = 2 is teacher
				// $teacherSQL = "SELECT distinct u.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid  AND u.id='$tid' AND ra.roleid = 2 AND ra.userid = u.id AND ct.id = ra.contextid";
				$teacherResult = $DB->get_recordset_sql($teacherSQL, $params=null, $limitfrom=0, $limitnum=0);
				foreach ($teacherResult as $inrecord) {
					$teacher[$key]["name"]= $inrecord->firstname."&nbsp;".$inrecord->lastname;
				}
			}

			foreach ($room as $key => $record) {
				$rid=$room[$key]['id'];
				if(is_null($rid)){

					$room[$key]["name"]="Home room";
				}
				else{
					$rooomSQL ="SELECT name FROM mdl_ttbgen_all_room_in where id=$rid";
					$roomResult = $DB->get_recordset_sql($rooomSQL, $params=null, $limitfrom=0, $limitnum=0);
					foreach ($roomResult as $inrecord) {
						// if(empty($inrecord->name)){

						$room[$key]["name"]= $inrecord->name;

					}

				}
			}


			// $dayNumSQL = "SELECT count(*) from mdl_ttbgen_config";
			// $numOfDayRecord = $DB->count_records_sql($dayNumSQL, $params=null);
			$numOfDay=7;
			// $daySQL = "SELECT * FROM mdl_ttbgen_config";
			// $dayResult = $DB->get_recordset_sql($daySQL, $params=null, $limitfrom=0, $limitnum=0);
			// foreach ($dayResult as $inrecord) {
			// 	$numOfDay= $inrecord->x_day_scheme_config;
			// 	if($numOfDay=="00"){
			// 	$numOfDay=7;
			// 	}
			//
			// }

			// echo "outputNum: ".$numOfRecord;
			date_default_timezone_set('Asia/Hong_Kong');
			$currentDate = date('Ymd');
			$currentWDay = date('w');
			$currentTime = date('Ymd\THis', time());
			// echo "<script> consoleFn('".$currentDate."'); </script>";

			$nextTime= date('Ymd\THis',strtotime($currentTime . " + 365 day"));

			$icsString="BEGIN:VCALENDAR~";
			$icsString.="VERSION:2.0~";
			$icsString.="PRODID:-//SERN//INDICO//EN~";

			// for ($i=0; $i <$numOfRecord ; $i++) {


				foreach (	$output as $index => $i) {

				// foreach (	$timeslot as $index => $i) {

				// foreach (	$output as $index => $i) {

				echo "<script> consoleFn('Line 956: ".$i."'); </script>";

				// foreach ($output as $i) {
				// foreach ($outputResult as $i=>$record) {
				// for($i=1;$i<$numOfRecord+1;$i++){


				// $numOfDay_add=$numOfDay;

				if($timeslot[$i]["day_of_week_dd"]==1){
					$BYDAY="MO;";
					$base=1;
				}
				elseif($timeslot[$i]["day_of_week_dd"]==2){
					$BYDAY="TU;";
					$base=2;

				}
				elseif($timeslot[$i]["day_of_week_dd"]==3){
					$BYDAY="WE;";
					$base=3;
				}
				elseif($timeslot[$i]["day_of_week_dd"]==4){
					$BYDAY="TH;";
					$base=4;

				}
				elseif($timeslot[$i]["day_of_week_dd"]==5){
					$BYDAY="FR;";
					$base=5;

				}

				$shift=(7-($currentWDay-$base))%7;
				$shift="+"." ".$shift." days";
				$startDay=date('Ymd', strtotime($currentDate. $shift));
				// $startDay=$currentDate+$shift;

				$startMerge=$startDay." ". $timeslot[$i]['start_time'];
				$endMerge=$startDay." ". $timeslot[$i]['end_time'];
				// $startResult=date("Ymd His", strtotime($startMerge));
				$startResult=date("Ymd\THis", strtotime($startMerge));
				// echo "<script> consoleFn('".$startResult."'); </script>";

				$endResult=date("Ymd\THis", strtotime($endMerge));



				$icsString.="BEGIN:VEVENT~";
				$icsString.="DTSTART;VALUE=DATE-TIME:";
				$icsString.=$startResult;
				$icsString.="~";
				$icsString.="DTEND;VALUE=DATE-TIME:";
				$icsString.=$endResult;
				$icsString.="~";
				$icsString.="RRULE:FREQ=WEEKLY;";
				// $icsString.="INTERVAL=1;";
				// $icsString.=$numOfDay_add;
				$icsString.="UNTIL=";
				$icsString.=$nextTime;
				$icsString.=";";
				$icsString.="BYDAY=";
				$icsString.=$BYDAY;
				$icsString.="~";
				$icsString.="DTSTAMP;VALUE=DATE-TIME:";
				$icsString.=$currentTime;
				$icsString.="~";
				$icsString.="UID:";
				$icsString.=$i;
				$icsString.="~";
				if($timeslot[$i]["timeslot_type"]!="Lesson"){

					$icsString.="SUMMARY:";
					if($timeslot[$i]["timeslot_type"]=="Recess"){
						$icsString.="Recess Period";
					}
					else{ //if($timeslot[$i]["timeslot_type"]=="Lunch")
						$icsString.="Lunch Period";
					}
					$icsString.="~";
					$icsString.="LOCATION:";
					$icsString.="/";
					$icsString.="~";
					$icsString.="DESCRIPTION:";
					$icsString.="/";
					$icsString.="~";
					$icsString.="END:VEVENT~";
					continue;
				}

				$icsString.="SUMMARY:";
				$icsString.=$subject[$i]["name"];
				$icsString.="~";
				$icsString.="LOCATION:";
				$icsString.=$room[$i]["name"];
				$icsString.="~";
				$icsString.="DESCRIPTION:";
				$icsString.=$timeslot[$i]["timeslot_type"];
				$icsString.=", Teacher is ";
				$icsString.=$teacher[$i]["name"];
				$icsString.="~";
				$icsString.="END:VEVENT~";
			}
			$icsString.="END:VCALENDAR";
		}
		printTimeTable($userID,$role_id,$output,$timeslot,$subject,$class,$teacher,$room);

	}
	else if($role_id==1){
		// if user is teacher
		echo "<script> consoleFn('User=Teacher, starting to print ICS '); </script>";

		$user_cid=$userID;




		//get id from output table
		$output=array();
		$timeslot=array();
		$subject=array();
		$class=array();
		$teacher=array();
		$room=array();

		$outputNumSQL = "SELECT count(*) from mdl_ttbgen_output where teacherid=$user_cid";
		$numOfRecord = $DB->count_records_sql($outputNumSQL, $params=null);
		$outputSQL = "SELECT * FROM mdl_ttbgen_output where teacherid=$user_cid";
		$outputResult = $DB->get_recordset_sql($outputSQL, $params=null, $limitfrom=0, $limitnum=0);

		if ($outputResult->valid()){

			foreach ($outputResult as $key=>$record) {
				array_push($output, $record->id);
				$timeslot[$key]=array();
				$timeslot[$key]["id"]= $record->timeslotid;
				$subject[$key]=array();
				$subject[$key]["id"]= $record->subjectid;
				$class[$key]=array();
				$class[$key]["id"]= $record->classid;
				// $teacher[$key]=array();
				// $teacher[$key]["id"]= $record->teacherid;
				$room[$key]=array();
				$room[$key]["id"]= $record->roomid;
			}
		}
		// $timeslot[$key]["start_time"]= date('Ymd\THis', $timeslot[$key]['start_time']);


		foreach ($timeslot as $key => $record) {
			$tid=$timeslot[$key]['id'];
			$timeslotSQL = "SELECT * FROM mdl_ttbgen_timeslot_in where id=$tid";
			$timeslotResult = $DB->get_recordset_sql($timeslotSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($timeslotResult as $inrecord) {
				$timeslot[$key]["start_time_hhmm"]= $inrecord->start_time_hhmm;
				$timeslot[$key]["duration_mmm"]= $inrecord->duration_mmm;
				$timeslot[$key]["day_of_week_dd"]= $inrecord->day_of_week_dd;
				$timeslot[$key]['timeslot_type_id']=$inrecord->timeslot_type_id;
				if($timeslot[$key]['timeslot_type_id']==0){
					$timeslot[$key]['timeslot_type']="Lesson";
					echo "<script> consoleFn('lesson found'); </script>";
					echo "<script> consoleFn('".$key."'); </script>";


				}
				elseif($timeslot[$key]['timeslot_type_id']==1){
					$timeslot[$key]['timeslot_type']="Recess";
					echo "<script> consoleFn('recess found'); </script>";

				}
				else{
					$timeslot[$key]['timeslot_type']="Lunch";
					echo "<script> consoleFn('lunch found'); </script>";


				}

				if($timeslot[$key]['start_time_hhmm']<1000){
					echo "<script> consoleFn('<1000 (ics)'); </script>";
					$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
					$timeslot[$key]['base_time']="0".$timeslot[$key]['base_time'];
					// $timeslot[$key]['base_time']=str_pad($timeslot[$key]['base_time'], 4, '0', STR_PAD_LEFT);
					$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
					$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
					// $timeslot[$key]['start_time']=date('Ymd\THis', $timeslot[$key]['start_time']);
					$timeslot[$key]['start_time']=date('Hi', $timeslot[$key]['start_time']);
					$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;
					// $timeslot[$key]['end_time']=date('Ymd\THis', $timeslot[$key]['end_time']);
					$timeslot[$key]['end_time']=date('Hi', $timeslot[$key]['end_time']);

				}
				else{
					echo "<script> consoleFn('not <1000 (ics)'); </script>";
					$timeslot[$key]['base_time']=$timeslot[$key]["start_time_hhmm"];
					$timeslot[$key]['base_time']=strtotime($timeslot[$key]['base_time']);
					$timeslot[$key]['start_time']=$timeslot[$key]['base_time']+"0";
					$timeslot[$key]['start_time']=date('Hi', $timeslot[$key]['start_time']);
					$timeslot[$key]['end_time']=$timeslot[$key]['base_time']+$timeslot[$key]["duration_mmm"]*60;
					$timeslot[$key]['end_time']=date('Hi', $timeslot[$key]['end_time']);
				}
			}
		}

		foreach ($subject as $key => $record) {
			$sid=$subject[$key]['id'];
			$subjectSQL = "SELECT * FROM mdl_ttbgen_subject_in where id=$sid";
			$subjectResult = $DB->get_recordset_sql($subjectSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($subjectResult as $inrecord) {
				$subject[$key]["name"]= $inrecord->name;
				// $subject[$key]["grade"]= $inrecord->name;
				// $subject[$key]["how_many_in_grade"]= $inrecord->name;
				// $subject[$key]["require_special_room"]= $inrecord->name;

			}
		}

		foreach ($class as $key => $record) {
			$cid=$class[$key]['id'];
			// $classSQL = "SELECT distinct h.name as name FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id='$classid' AND c.id = ct.instanceid AND ra.roleid = 3 AND ra.userid = u.id AND ct.id = ra.contextid";  //roleid = 2 is teacher
			// $classSQL ="SELECT u.firstname, u.lastname, h.idnumber, h.name,u.id
			// FROM mdl_cohort AS h
			// JOIN mdl_cohort_members AS hm ON h.id = hm.cohortid
			// JOIN mdl_user AS u ON hm.userid = u.id
			// where h.id='$classid'
			// ORDER BY hm.cohortid";
			$classSQL="SELECT c.id as id,c.cohort_id as cohortid, h.name as class_name, c.class_grade as class_grade, c.max_per_day as max_per_day
			FROM mdl_cohort AS h
			JOIN mdl_ttbgen_class_in as c ON h.id = c.cohort_id
			where c.id=$cid";
			// $teacherSQL = "SELECT distinct u.id as id, u.firstname as firstname, u.lastname as lastname FROM mdl_course as c, mdl_role_assignments AS ra, mdl_user AS u, mdl_context AS ct WHERE c.id = ct.instanceid  AND u.id='$tid' AND ra.roleid = 2 AND ra.userid = u.id AND ct.id = ra.contextid";
			$classResult = $DB->get_recordset_sql($classSQL, $params=null, $limitfrom=0, $limitnum=0);
			foreach ($classResult as $inrecord) {
				$class[$key]["name"]= $inrecord->class_name;
			}
		}


		foreach ($room as $key => $record) {
			$rid=$room[$key]['id'];
			if(is_null($rid)){

				$room[$key]["name"]="Home room";
			}
			else{
				$rooomSQL ="SELECT name FROM mdl_ttbgen_all_room_in where id=$rid";
				$roomResult = $DB->get_recordset_sql($rooomSQL, $params=null, $limitfrom=0, $limitnum=0);
				foreach ($roomResult as $inrecord) {
					// if(empty($inrecord->name)){

					$room[$key]["name"]= $inrecord->name;

				}

			}
		}


		// $dayNumSQL = "SELECT count(*) from mdl_ttbgen_config";
		// $numOfDayRecord = $DB->count_records_sql($dayNumSQL, $params=null);
		$numOfDay=7;
		// $daySQL = "SELECT * FROM mdl_ttbgen_config";
		// $dayResult = $DB->get_recordset_sql($daySQL, $params=null, $limitfrom=0, $limitnum=0);
		// foreach ($dayResult as $inrecord) {
		// 	$numOfDay= $inrecord->x_day_scheme_config;
		// 	if($numOfDay=="00"){
		// 	$numOfDay=7;
		// 	}
		//
		// }

		// echo "outputNum: ".$numOfRecord;
		date_default_timezone_set('Asia/Hong_Kong');
		$currentDate = date('Ymd');
		$currentWDay = date('w');
		$currentTime = date('Ymd\THis', time());
		$nextTime= date('Ymd\THis',strtotime($currentTime . " + 365 day"));

		$icsString="BEGIN:VCALENDAR~";
		$icsString.="VERSION:2.0~";
		$icsString.="PRODID:-//SERN//INDICO//EN~";

		foreach (	$output as $index => $i) {
			// foreach ($outputResult as $i=>$record) {
			// for($i=1;$i<$numOfRecord+1;$i++){
			echo "<script> consoleFn('in ics loop'); </script>";
			$input=$timeslot[$i]['timeslot_type'];
			echo "<script> consoleFn('".$input."'); </script>";
			echo "<script> consoleFn('".$i."'); </script>";



			if($timeslot[$i]["timeslot_type"]!="Lesson"){
				echo "<script> consoleFn('non-lesson'); </script>";
				continue;
			}
			// $numOfDay_add=$numOfDay;

			if($timeslot[$i]["day_of_week_dd"]==1){
				$BYDAY="MO;";
				$base=1;
			}
			elseif($timeslot[$i]["day_of_week_dd"]==2){
				$BYDAY="TU;";
				$base=2;

			}
			elseif($timeslot[$i]["day_of_week_dd"]==3){
				$BYDAY="WE;";
				$base=3;
			}
			elseif($timeslot[$i]["day_of_week_dd"]==4){
				$BYDAY="TH;";
				$base=4;

			}
			elseif($timeslot[$i]["day_of_week_dd"]==5){
				$BYDAY="FR;";
				$base=5;

			}
			$shift=(7-($currentWDay-$base))%7;
			$shift="+"." ".$shift." days";
			$startDay=date('Ymd', strtotime($currentDate. $shift));
			$startMerge=$startDay." ". $timeslot[$i]['start_time'];
			$endMerge=$startDay." ". $timeslot[$i]['end_time'];
			$startResult=date("Ymd\THis", strtotime($startMerge));
			$endResult=date("Ymd\THis", strtotime($endMerge));

			$icsString.="BEGIN:VEVENT~";
			$icsString.="DTSTART;VALUE=DATE-TIME:";
			$icsString.=$startResult;
			$icsString.="~";
			$icsString.="DTEND;VALUE=DATE-TIME:";
			$icsString.=$endResult;
			$icsString.="~";
			$icsString.="RRULE:FREQ=WEEKLY;";
			// $icsString.="INTERVAL=1;";
			// $icsString.=$numOfDay_add;
			$icsString.="UNTIL=";
			$icsString.=$nextTime;
			$icsString.=";";
			$icsString.="BYDAY=";
			$icsString.=$BYDAY;
			$icsString.="~";
			$icsString.="DTSTAMP;VALUE=DATE-TIME:";
			$icsString.=$currentTime;
			$icsString.="~";
			$icsString.="UID:";
			$icsString.=$i;
			$icsString.="~";
			if($timeslot[$i]["timeslot_type"]!="Lesson"){

				$icsString.="SUMMARY:";
				if($timeslot[$i]["timeslot_type"]=="Recess"){
					$icsString.="Recess Period";
				}
				else{ //if($timeslot[$i]["timeslot_type"]=="Lunch")
					$icsString.="Lunch Period";
				}
				$icsString.="~";
				$icsString.="LOCATION:";
				$icsString.="/";
				$icsString.="~";
				$icsString.="DESCRIPTION:";
				$icsString.="/";
				$icsString.="~";
				$icsString.="END:VEVENT~";
				continue;
			}
			$icsString.="SUMMARY:";
			$icsString.=$class[$i]["name"];
			$icsString.=" of ";
			$icsString.=$subject[$i]["name"];
			$icsString.="~";
			$icsString.="LOCATION:";
			$icsString.=$room[$i]["name"];
			$icsString.="~";
			$icsString.="DESCRIPTION:";
			$icsString.=$timeslot[$i]["timeslot_type"];

			$icsString.="~";
			$icsString.="END:VEVENT~";
		}
		$icsString.="END:VCALENDAR";

		printTimeTable($userID,$role_id,$output,$timeslot,$subject,$class,$teacher,$room);




	}
	else{

		echo "You are admin, you have no ics file to output.";
		echo"<br/>";
		return;
	}


	// echo '<input style="color:white; background-color:blue;" type="submit" value="Export .ics"
	// onclick="downloadICS(\''.$icsString.'\')" />';
	echo '<input style="color:white; background-color:blue;" type="submit" value="Export .ics"
	onclick="downloadICS(\''.$icsString.'\')" />';

}


function printTimeTable($userID,$role_id,$output,$timeslot,$subject,$class,$teacher,$room){
	if($role_id==0){
		echo"You have no Time-Table to print.";
		echo"<br> ";
		return;}

		echo"You time-table is as follow: ";
		echo"<br> ";

		global $DB;
		$orderedtimeslot=array();
		$orderedtimeslot['start_time']=array();
		$orderedtimeslot['end_time']=array();
		for($day=1;$day<=5;$day++){

			$orderedtimeslotSQL = "SELECT * from mdl_ttbgen_timeslot_in where day_of_week_dd=$day Order by start_time_hhmm";
			$orderedtimeslotResult = $DB->get_recordset_sql($orderedtimeslotSQL, $params=null, $limitfrom=0, $limitnum=0);

			$orderedtimeslot[$day]=array();
			$orderedtimeslot[$day]['id']=array();
			$orderedtimeslot[$day]['fkid']=array();
			$orderedtimeslot[$day]['teacher']=array();
			$orderedtimeslot[$day]['subjectname']=array();
			$orderedtimeslot[$day]['classname']=array();
			$orderedtimeslot[$day]['print']=array();






			if ($orderedtimeslotResult->valid()){
				$counter=0;
				$counter2=0;

				foreach ($orderedtimeslotResult as $outkey=>$record) {

					array_push($orderedtimeslot[$day]['id'],$record->id);
					if($day==1){
						if($record->start_time_hhmm<1000){


							$orderedtimeslot['base_time']="0".$record->start_time_hhmm;
							$orderedtimeslot['start_time'][$counter2]=strtotime($orderedtimeslot['base_time']);
							$orderedtimeslot['start_time'][$counter2]=date("H:i", $orderedtimeslot['start_time'][$counter2]);
							$orderedtimeslot['base_time']=strtotime($orderedtimeslot['base_time']);
							$orderedtimeslot['end_time'][$counter2]=$orderedtimeslot['base_time']+$record->duration_mmm*60;
							$consoleInput=	$orderedtimeslot['end_time'][$counter2];
							echo "<script> consoleFn('printTable line 1368:".$consoleInput."'); </script>";
							$orderedtimeslot['end_time'][$counter2]=date("H:i", $orderedtimeslot['end_time'][$counter2]);
							$consoleInput=	$orderedtimeslot['end_time'][$counter2];
							echo "<script> consoleFn('printTable line 1368:".$consoleInput."'); </script>";
						}
						else{
							$orderedtimeslot['base_time']=$record->start_time_hhmm;
							$orderedtimeslot['start_time'][$counter2]=strtotime($orderedtimeslot['base_time']);
							$orderedtimeslot['start_time'][$counter2]=date("H:i", $orderedtimeslot['start_time'][$counter2]);
							$orderedtimeslot['base_time']=strtotime($orderedtimeslot['base_time']);
							$orderedtimeslot['end_time'][$counter2]=$orderedtimeslot['base_time']+$record->duration_mmm*60;
							$consoleInput=	$orderedtimeslot['end_time'][$counter2];
							echo "<script> consoleFn('printTable line 1378:".$consoleInput."'); </script>";
							$orderedtimeslot['end_time'][$counter2]=date("H:i", $orderedtimeslot['end_time'][$counter2]);
							$consoleInput=	$orderedtimeslot['end_time'][$counter2];
							echo "<script> consoleFn('printTable line 1378:".$consoleInput."'); </script>";

						}
					}




					$orderedtimeslot[$day]['fkid'][$counter]=-1;
					$orderedtimeslot[$day]['print'][$counter]="/";
					foreach ($output as $key => $value) {
						// echo $timeslot[$value]['id'].","."<br> Out Key:";
						// echo $outkey.","."<br>";;
						if($orderedtimeslot[$day]['id'][$counter]==$timeslot[$value]['id']){
							$orderedtimeslot[$day]['fkid'][$counter]=$value;
							// $orderedtimeslot[$day]['time'][$counter]=$timeslot[$value]['start_time'];

							// $orderedtimeslot[$day]['subjectname'][$counter]=$subject[$value]['name'];
							// $orderedtimeslot[$day]['teacher'][$counter]=$teacher[$value]["name"];
							// $orderedtimeslot[$day]['classname'][$counter]=$class[$value]["name"];
							// $orderedtimeslot[$day]['roomname'][$counter]=$room[$value]["name"];
							if($role_id==1){
								$orderedtimeslot[$day]['print'][$counter]="Subject: ".$subject[$value]['name']."<br>"." Teaching for Class: ".$class[$value]["name"]."<br>"." in Room: ".$room[$value]["name"];

							}
							else{
								$orderedtimeslot[$day]['print'][$counter]="Subject: ".$subject[$value]['name']."<br>"." Teaching is: ".$teacher[$value]["name"]."<br>"." in Room: ".$room[$value]["name"];

							}

							// $orderedtimeslot[$day]['fkid'][$counter]=$timeslot[$value]['id'];

						}
					}




					$counter2++;
					$counter++;
				}
			}
		}



		$orderedtimeslotNumSQL = "SELECT count(*) from mdl_ttbgen_timeslot_in where day_of_week_dd=1 Order by start_time_hhmm";
		$orderednumberOfTimeslot = $DB->count_records_sql($orderedtimeslotNumSQL, $params=null);
		if ($orderednumberOfTimeslot == 0){
			echo 'No timeslot is found.';
		} else {
			// echo "There are a total of $orderednumberOfTimeslot timelot(s) per day in the database. <br>";
			echo "<table border=\"1\">";
			echo '<tr>';
			echo '<th> 			</th>';
			echo '<th> Day1 </th>';
			echo '<th> Day2 </th>';
			echo '<th> Day3 </th>';
			echo '<th> Day4 </th>';
			echo '<th> Day5 </th>';
			echo '</tr>';



			for ($i = 0; $i<$orderednumberOfTimeslot; $i++){
				echo '<tr>';

				$print="From ".$orderedtimeslot['start_time'][$i]."<br>"."To ".$orderedtimeslot['end_time'][$i];
				echo "<td> $print </td>";
				// $print=$orderedtimeslot[1]['id'][$i];
				$print=$orderedtimeslot[1]['print'][$i];

				echo "<td> $print </td>";
				// $print=$orderedtimeslot[2]['id'][$i];
				$print=$orderedtimeslot[2]['print'][$i];
				echo "<td> $print</td>";
				// $print=$orderedtimeslot[3]['id'][$i];
				$print=$orderedtimeslot[3]['print'][$i];
				echo "<td> $print </td>";
				// $print=$orderedtimeslot[4]['id'][$i];
				$print=$orderedtimeslot[4]['print'][$i];
				echo "<td> $print </td>";
				// $print=$orderedtimeslot[5]['id'][$i];
				$print=$orderedtimeslot[5]['print'][$i];
				echo "<td> $print </td>";
				echo '</tr>';
			}

			echo '</table>';
		}





		echo"<br/>";
	}




	?>
