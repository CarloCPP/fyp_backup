`<?php
require_once('../../../config.php');
require_once($CFG->dirroot.'/timeTable/input/room/room_add_form.php');

require_login();
$url = new moodle_url('/timeTable/input/room/room_add.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Enter Room Name: ';
$PAGE->set_heading($heading);

// $sid=$_GET['subjectid']; //modifed
//
// if (isset($_GET['subjectid'])) {
//     $SubjectID = filter_input(INPUT_GET,"subjectid",FILTER_SANITIZE_STRING);
// }else {
//     $SubjectID = '1';
// }

$mform = new room_add_form();

if ($mform->is_cancelled()) {
	$returnurl = new moodle_url('/timeTable/input/room/room.php');
    redirect($returnurl);

} else if ($fromform = $mform->get_data()) {
  // $sid=$_GET['subjectid']; //modifed


	$room1 = new stdClass();
	$room1->name = $fromform->nameOfRoom;
	$room1->special_room = 1;

	$lastinsertid = $DB->insert_record('ttbgen_all_room_in', $room1, $returnid=true, $bulk=false);

	$roomSQL = 'SELECT * FROM mdl_ttbgen_all_room_in WHERE name = ?';
	$roomParams = array($fromform->nameOfRoom);
	$rooms = $DB->get_recordset_sql($roomSQL, $roomParams, $limitfrom=0, $limitnum=0);

	$roomID = [];
	if ($rooms->valid()){
  		foreach ($rooms as $room) {
  			array_push($roomID, $room->id);
  		}
  	}

  	$roomid = $roomID[0];
	$specialRoom1 = new stdClass();
	$specialRoom1->room_id = $roomid;
  $specialRoom1->subject_id=$fromform->subjectid;
  // $specialRoom1->subject_id = $fromform->sid;
	// $specialRoom1->subject_id = $SubjectID;

	$insertid = $DB->insert_record('ttbgen_special_room_in', $specialRoom1, $returnid=true, $bulk=false);

	$returnurl = new moodle_url('/timeTable/input/room/room.php');
  	redirect($returnurl);

} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.
  //Set default data (if any)
  //displays the form
}

echo $OUTPUT->header();
// echo $OUTPUT->heading('Insturction Text');
// echo "<br>DEBUG: ".$SubjectID."<br>";
$mform->display();
echo $OUTPUT->footer();
