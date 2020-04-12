<?php
require_once('../config.php');

$url = new moodle_url('/blocks/view.php');
$PAGE->set_url($url);

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$PAGE->set_title('List all rooms');
$PAGE->set_heading('Listing all Rooms');

$PAGE->requires->js('/booking/jquery.js',true);
$PAGE->requires->js('/booking/deleteRoom.js',true);

echo $OUTPUT->header();

global $DB;

$countSQL = 'SELECT count(*) from mdl_room';
$numberOfRooms = $DB->count_records_sql($countSQL, $params=null);

$roomSQL = 'SELECT * FROM mdl_room';
$rooms = $DB->get_recordset_sql($roomSQL, $params=null, $limitfrom=0, $limitnum=0);

$roomid = [];
$roomnumber = [];
$roomcapacity = [];
$roomtype = [];


if (!empty($rooms)){
	foreach ($rooms as $room) {
	    array_push($roomid, $room->roomid);
	    array_push($roomnumber, $room->roomnumber);
	    array_push($roomcapacity, $room->roomcapacity);
	    array_push($roomtype, $room->roomtype);
	}
}

if ($numberOfRooms == 0){
	echo 'No rooms are created.';
} else {
	echo "There are a total of $numberOfRooms room(s) in the database. <br>";
	echo "<table border=\"1\">";
		echo '<tr>';
			echo '<th> Room ID </th>';
			echo '<th> Room Number </th>';
			echo '<th> Room Capacity </th>';
			echo '<th> Room Type </th>';
			echo '<th></th>';
		echo '</tr>';

		for ($i = 0; $i < $numberOfRooms; $i++){
			echo '<tr>';
				echo "<td> $roomid[$i] </td>";
				echo "<td> $roomnumber[$i] </td>";
				echo "<td> $roomcapacity[$i] </td>";
				echo "<td> $roomtype[$i] </td>";

				echo "<td><input type='button' value='Delete' onclick='deleteRoom(\"".$roomid[$i]."\")'></td>";

				// echo "<td><input type='button' value='Delete' onclick='deleteRoom($roomid[$i])'></td>";

			echo '</tr>';
		}

	echo '</table>';
}

$addurl = new moodle_url('/booking/newRoom.php');
echo '<a href="' . $addurl . '">' . 'Add New Room' . '</a>';

echo '<br>';

$returnurl = new moodle_url('/my/');
echo '<a href="' . $returnurl . '">' . 'Return to the Dashboard' . '</a>';
echo '<br>';

echo $OUTPUT->footer();
