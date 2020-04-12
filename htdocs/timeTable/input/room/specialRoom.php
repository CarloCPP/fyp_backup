`<?php
require_once('../../../config.php');
require_login();
$url = new moodle_url('/timeTable/input/room/specialRoom.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Special Rooms: ';
$PAGE->set_heading($heading);

echo $OUTPUT->header();

printTable();

function printTable(){
	global $DB;

	$specialRoomNumSQL = "SELECT count(*) from mdl_ttbgen_special_room_in";
	$numberOfSpecialRooms = $DB->count_records_sql($specialRoomNumSQL, $params=null);

	if ($numberOfSpecialRooms == 0){
		echo 'No special room has been created.';
	}
	else{
		echo "<table border=\"1\">";

		echo 'There are ' . $numberOfSpecialRooms . ' special rooms.';

		$speicalRoomSQL = 'SELECT * FROM mdl_ttbgen_special_room_in';
		$specialRooms = $DB->get_recordset_sql($speicalRoomSQL, $params=null, $limitfrom=0, $limitnum=0);

		$specialRoom_roomID = [];
		$specialRoom_subjectID = [];

		if ($specialRooms->valid()){
			foreach ($specialRooms as $specialRoom) {
		  		array_push($specialRoom_roomID, $specialRoom->room_id);
		  		array_push($specialRoom_subjectID, $specialRoom->subject_id);
		  	}
		}

		echo '<tr><th>RoomID: </th><th>SubjectID: </th></tr>';

		for($k = 0; $k < $numberOfSpecialRooms; $k++){
			echo '<tr><td>' . $specialRoom_roomID[$k] . '</td><td>' . $specialRoom_subjectID[$k] . '</td></tr>';
		}
	}

}

// echo $OUTPUT->heading('Insturction Text');
echo $OUTPUT->footer();