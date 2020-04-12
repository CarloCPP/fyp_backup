<?php
require_once('../config.php');

$url = new moodle_url('/blocks/view.php');
$PAGE->set_url($url);

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$PAGE->set_title('List all Bookings');
$PAGE->set_heading('Listing all Bookings');

echo $OUTPUT->header();

global $DB;

$countSQL = 'SELECT count(*) from mdl_booking';
$numberOfBookings = $DB->count_records_sql($countSQL, $params=null); 

$bookingsSQL = 'SELECT * FROM mdl_booking';
$bookings = $DB->get_recordset_sql($bookingsSQL, $params=null, $limitfrom=0, $limitnum=0);

$bookingId = [];
$startdateyyyy = [];
$startdatemm = [];
$startdatedd = [];
$starttimehh = [];
$starttimemm = [];
$durationmm = [];
$description = [];
$roomidforeignkey = [];
$bookingpersonid = [];


if (!empty($bookings)){
	foreach ($bookings as $booking) {
	    array_push($bookingId, $booking->id);
	    array_push($startdateyyyy, $booking->startdateyyyy);
	    array_push($startdatemm, $booking->startdatemm);
	    array_push($startdatedd, $booking->startdatedd);
	    array_push($starttimehh, $booking->starttimehh);
	    array_push($starttimemm, $booking->starttimemm);
	    array_push($durationmm, $booking->durationmm);
	    array_push($description, $booking->description);
	    array_push($roomidforeignkey, $booking->roomidforeignkey);
	    array_push($bookingpersonid, $booking->bookingpersonid);
	}
}

if ($numberOfBookings == 0){
	echo 'No rooms are created.';
} else {
	echo "There are a total of $numberOfBookings booking(s) in the database. <br>";
	echo "<table border=\"1\">";
		echo '<tr>';
			echo '<th> Booking ID </th>';
			echo '<th> Start Year </th>';
			echo '<th> Start Month </th>';
			echo '<th> Start Date </th>';
			echo '<th> Start Hour </th>';
			echo '<th> Start Minute </th>';
			echo '<th> Duration </th>';
			echo '<th> Description </th>';
			echo '<th> Room ID </th>';
			echo '<th> Person ID </th>';
		echo '</tr>';

		for ($i = 0; $i < $numberOfBookings; $i++){
			echo '<tr>';
				echo "<td> $bookingId[$i] </td>";
				echo "<td> $startdateyyyy[$i] </td>";
				echo "<td> $startdatemm[$i] </td>";
				echo "<td> $startdatedd[$i] </td>";
				echo "<td> $starttimehh[$i] </td>";
				echo "<td> $starttimemm[$i] </td>";
				echo "<td> $durationmm[$i] </td>";
				echo "<td> $description[$i] </td>";
				echo "<td> $roomidforeignkey[$i] </td>";
				echo "<td> $bookingpersonid[$i] </td>";
			echo '</tr>';
		}

	echo '</table>';
}


echo $OUTPUT->footer();