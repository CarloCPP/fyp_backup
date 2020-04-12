<?php
require_once('../config.php');

$url = new moodle_url('/booking/view.php');
$PAGE->set_url($url);

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$PAGE->set_title('Room Booking System');

global $DB;
// $DB->set_debug(true);

//Get data from URL
if (isset($_GET['roomid'])) {
    $urlRoomId = filter_input(INPUT_GET,"roomid",FILTER_SANITIZE_STRING);
} else {
    $urlRoomId = '1';
}

$now = new DateTime("now", core_date::get_server_timezone_object());

if (isset($_GET['bookingyyyy'])) {
    $urlBookingYYYY = filter_input(INPUT_GET,"bookingyyyy",FILTER_SANITIZE_STRING);
} else {
    $urlBookingYYYY = $now->format('Y');
}

if (isset($_GET['bookingmm'])) {
    $urlBookingMM = filter_input(INPUT_GET,"bookingmm",FILTER_SANITIZE_STRING);
} else {
    $urlBookingMM = $now->format('m');
}


if (isset($_GET['bookingdd'])) {
    $urlBookingDD = filter_input(INPUT_GET,"bookingdd",FILTER_SANITIZE_STRING);
} else {
    $urlBookingDD = $now->format('d');
}

$urlBookingDate = new DateTime();
$urlBookingDate->setDate($urlBookingYYYY, $urlBookingMM, $urlBookingDD);

//Temporary data to test logic - Replace with actual SQL later

// $table = 'room';
// $roomArraySelect = "roomid = $urlRoomId";
// $roomName = $DB->get_records_select($table, $roomArraySelect);

//SQL to get info regarding room
$roomSQL = 'SELECT * FROM mdl_room WHERE roomid = ?';
$roomParams = array($urlRoomId);
$room = $DB->get_record_sql($roomSQL, $roomParams);

//Default to roomid = 1 if cannot get room info
if (empty($room)){
	$roomParams = array(1);
	$room = $DB->get_record_sql($roomSQL, $roomParams);
}

$roomName = $room->roomnumber;
$roomCapacity = $room->roomcapacity;

$heading = $roomName.' on '.$urlBookingDate->format('d F Y (l)');
$PAGE->set_heading($heading);

echo $OUTPUT->header();

// SQL debug
// $DB->set_debug(true);

//Get number of bookings
$countSQL = 'SELECT count(*) from mdl_booking where roomidforeignkey = ? and startdateyyyy = ? and startdatemm = ? and startdatedd = ?';
$countParams = array($urlRoomId, $urlBookingYYYY, $urlBookingMM, $urlBookingDD);
$numberOfBookings = $DB->count_records_sql($countSQL, $countParams);

//Get actual bookings
$startTimeHH = [];
$startTimeMM = [];
$durationMM = [];
$bookingUserID = [];

$bookingSQL = 'SELECT * FROM mdl_booking WHERE roomidforeignkey = ? and startdateyyyy = ? and startdatemm = ? and startdatedd = ?';
$bookingParams = array($urlRoomId, $urlBookingYYYY, $urlBookingMM, $urlBookingDD);
$bookings = $DB->get_recordset_sql($bookingSQL, $bookingParams, $limitfrom=0, $limitnum=0);

//Current problem: don't know how to get data from $bookings. Don't know what $bookings return

foreach ($bookings as $booking) {
    array_push($startTimeHH, $booking->starttimehh);
    array_push($startTimeMM, $booking->starttimemm);
    array_push($durationMM, $booking->durationmm);
    array_push($bookingUserID, $booking->bookingpersonid);
}

$bookings->close(); // Don't forget to close the recordset!

$startDateYYYY = $urlBookingYYYY;
$startDateMM = $urlBookingMM;
$startDateDD = $urlBookingDD;

// echo '<h3>Basic Information of '.$roomName.'</h3><br>';
// echo $roomName.' has a maximum capacity of '.$roomCapacity.'.<br>';
// echo $roomName.' is of type '.$roomType.'.<br>';

echo '<h3>';
if ($numberOfBookings == 0){
	echo 'No bookings were';
} else if ($numberOfBookings == 1){
	echo $numberOfBookings.' booking was';
} else {
	echo $numberOfBookings.' bookings were';
}
echo ' made for '.$roomName.' on '.$startDateDD.'/'.$startDateMM.'/'.$startDateYYYY.'.<br></h3>';

echo '<div>';

//Show all bookings
for ($i = 0; $i < $numberOfBookings; $i++){

	/*
	 * https://docs.moodle.org/dev/Time_API
	 * http://php.net/manual/en/class.datetime.php
	 * http://php.net/manual/en/datetime.add.php
	 * http://php.net/manual/en/class.dateinterval.php
	 * http://php.net/manual/en/class.dateinterval.php
	 */

	$startDateTime = new DateTime();
	$startDateTime->setDate($startDateYYYY, $startDateMM, $startDateDD);
	$startDateTime->setTime($startTimeHH[$i], $startTimeMM[$i]);

	$endDateTime = new DateTime();
	$endDateTime->setDate($startDateYYYY, $startDateMM, $startDateDD);
	$endDateTime->setTime($startTimeHH[$i], $startTimeMM[$i]);

	/*
	 * P stands for period; T stands for time.
	 * Without T, M will be interpreted as month instead of minutes.
	 */

	$currentDurationMM = $durationMM[$i];
	$dateIntervalString = 'PT'.$currentDurationMM.'M';
	// echo $dateIntervalString;
	$dateInterval = new DateInterval($dateIntervalString);
	$endDateTime->add($dateInterval);

	$displayBookingCounter = $i + 1;

	$userSQL = 'SELECT firstname from mdl_user where id = ?';
	$userParams = array($bookingUserID[$i]);
	$userFirstName = $DB->get_field_sql($userSQL, $userParams, $strictness=IGNORE_MISSING);

	echo "$userFirstName: \t";
	echo $startDateTime->format('g:ia');
	echo ' to ';
	echo $endDateTime->format('g:ia');
	echo "<br>";

}

echo '<br>';

// for ($i = 0; $i < $numberOfBookings; $i++){
// 	echo $i;
// 	echo '<br>';
// }

// $testDateTime = new DateTime();
// $testDateTime->setDate(2019, 01, 10);
// $testDateTime->setTime(23, 59);
// echo $testDateTime->format('H:i');

//Start time
$tableDateTime = new DateTime();
$tableDateTime->setDate($startDateYYYY, $startDateMM, $startDateDD);
$tableDateTime->setTime(07, 00);

// $tableEndDateTime = new DateTime();
// $tableEndDateTime->setDate(2019, 01, 03);
// $tableEndDateTime->setTime(19, 00);

//Show booking table
echo "<table border=\"1\">";

$numberOfUnbookableSlots = 0;
for ($j = 0; $j <= 22; $j++){
	echo "<tr>";

		echo "<th>";
		//echo $tableDateTime->format('H:i');
    echo date('H:i', $tableDateTime->getTimestamp());
		echo "</th>";
		echo "<td>";

		if ($numberOfBookings == 0){
      $returnurl = html_writer::link(new moodle_url('/booking/booking.php',
      array('booking_h'=> (int)date('H', $tableDateTime->getTimestamp()), 'booking_mi' => (int)date('i', $tableDateTime->getTimestamp()) , 'roomid' => $room->roomid)), 'Book this slot');
      echo $returnurl;
			//echo "<a href = 'booking.php' >Book this slot</a>";
		} else

		//Loop through bookings and block slots
		for ($k = 0; $k < $numberOfBookings; $k++){

			if ($numberOfUnbookableSlots > 0){
				echo "<i>Booked by $userFirstName</i>";
				// echo "<i>Unbookable</i>";
				$numberOfUnbookableSlots--;
				break;
			}

			$bookingDateTime = new DateTime();
			$bookingDateTime->setDate($startDateYYYY, $startDateMM, $startDateDD);
			$bookingDateTime->setTime($startTimeHH[$k], $startTimeMM[$k]);

			if ($tableDateTime == $bookingDateTime){
				
				$userSQL = 'SELECT firstname from mdl_user where id = ?';
		        $userParams = array($bookingUserID[$k]);
		        $userFirstName = $DB->get_field_sql($userSQL, $userParams, $strictness=IGNORE_MISSING);
				echo "<i>Booked by $userFirstName</i>";
				// echo "<i>Unbookable</i>";
				$numberOfUnbookableSlots = $durationMM[$k] / 30 - 1;
				// echo $numberOfUnbookableSlots;
				break;

			} if ($k == $numberOfBookings - 1) {
        $returnurl = html_writer::link(new moodle_url('/booking/booking.php',
        array('booking_h'=> (int)date('H', $tableDateTime->getTimestamp()), 'booking_mi' => (int)date('i', $tableDateTime->getTimestamp()) , 'roomid' => $room->roomid)), 'Book this slot');
        echo $returnurl;
					//echo "<a href = 'booking.php'>Book this slot</a>";
					// echo $numberOfUnbookableSlots;
			}
		}
		echo "</td>";
	echo "</tr>";
	$tableDateTime->add(new DateInterval('PT30M'));
}
echo "</table>";


echo $OUTPUT->footer();
