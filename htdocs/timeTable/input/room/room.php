<?php
require_once('../../../config.php');
require_login();
$url = new moodle_url('/timeTable/input/room.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Room';
$PAGE->set_heading($heading);
$PAGE->requires->js('/timeTable/input/room/jquery.js',true);
$PAGE->requires->js('/timeTable/input/room/room.js',true);


echo $OUTPUT->header();
// echo $OUTPUT->heading('Insturction Text');

printTable();

function printTable(){
	global $DB;

	$subjectNumSQL = "SELECT count(*) from mdl_ttbgen_subject_in";
  $numberOfSubjects = $DB->count_records_sql($subjectNumSQL, $params=null);

  if($numberOfSubjects == 0)
    echo 'No subject has been created. <br>';
  else{
    echo "<table border=\"1\">";

    $subjectSQL = 'SELECT * FROM mdl_ttbgen_subject_in';
  	$subjects = $DB->get_recordset_sql($subjectSQL, $params=null, $limitfrom=0, $limitnum=0);

  	$subject_ID = [];
  	$subject_names = [];
  	$subject_grades = [];
  	$isSpecial = [];

  	if ($subjects->valid()){
    		foreach ($subjects as $subject) {
    			array_push($subject_ID, $subject->id);
    			array_push($subject_names , $subject->name);
    			array_push($subject_grades, $subject->grade);
    			array_push($isSpecial, $subject->require_special_room);

    		}
    	}

    // find no.of grades
    $grade = -1;
    for ($i = 0; $i <= $numberOfSubjects-1; $i++){
    	// error
    	if($subject_grades[$i] > $grade)
    		$grade = $subject_grades[$i];
    }

    $speicalRoomSQL = 'SELECT * FROM mdl_ttbgen_special_room_in';
  	$specialRooms = $DB->get_recordset_sql($speicalRoomSQL, $params=null, $limitfrom=0, $limitnum=0);

  	$specialRoomNumSQL = "SELECT count(*) from mdl_ttbgen_special_room_in";
    $numberOfSpecialRooms = $DB->count_records_sql($specialRoomNumSQL, $params=null);

    $specialRoom_roomID = [];
    $specialRoom_subjectID = [];

    if ($specialRooms->valid()){
    	foreach ($specialRooms as $specialRoom) {
    		array_push($specialRoom_roomID, $specialRoom->room_id);
    		array_push($specialRoom_subjectID, $specialRoom->subject_id);
      }
    }

    if ($numberOfSpecialRooms == 0){
    	echo 'No special room has been created.';
    }
    else{
      echo 'There are ' . $numberOfSpecialRooms . ' special rooms.';
    }

    echo '<tr><th>Grade: </th><th>Subject: </th><th>Room Name: </th></tr>';
    for ($i = 1; $i <= $grade; $i++){
    	for($j = 0; $j < $numberOfSubjects; $j++){
    		if ($subject_grades[$j] == $i){
    			if($isSpecial[$j] == 1){
    				echo '<tr><td>Grade ' . $i. '</td>';
    				echo '<td>' . $subject_names[$j] . '</td>';

    				$room_assigned = false;
    				$roomName = null;
    				$roomID = -1;
    				for($k = 0; $k < $numberOfSpecialRooms; $k++){
    					if ($subject_ID[$j] == $specialRoom_subjectID[$k]){
    						$room_assigned = true;
    						$roomID = $specialRoom_roomID[$k];

    						$roomSQL = 'SELECT * FROM mdl_ttbgen_all_room_in WHERE id = ?';
    						$roomParams = array($roomID);
  							$room = $DB->get_record_sql($roomSQL, $roomParams);

                $roomName = $room->name;

  							break;
    					}

    				}

    				if ($room_assigned == false){
  	  				echo '<td>Not Assigned</td>';

  	  				$addurl = html_writer::link(new moodle_url('/timeTable/input/room/room_add.php',
        				array('subjectid' => $subject_ID[$j])), 'Add');
        				echo '<td>' . $addurl . '</td>';

        		}
  	  			else{
  	  				echo '<td>' . $roomName. '</td>';
  	  				echo "<td><input type='button' value='Delete' onclick='deleteRoom($roomID)'></td>";
  	  			}

    				echo '</tr>';

    			}
    		}
    	}
    }
    echo '</table>';
  }
}

echo $OUTPUT->footer();
