<?php
// the booking_form path
require_once('../config.php');
require_once($CFG->dirroot.'/booking/classes/newRoomForm.php');
require_login();
//$day = optional_param('booking_d', 0, PARAM_INT);
//$month = optional_param('booking_m', 0, PARAM_INT);
//$year = optional_param('booking_y', 0, PARAM_INT);

//no action first
$url = new moodle_url('/booking/booking.php');

$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'New Room';
$PAGE->set_heading($heading);
//set data

$mform = new newRoomForm();

//Form processing and displaying is done here
//$defaulthour = $hour;
//$defaultminute = $minute;
//$formdata = (object)array('startingTime[hour]' => 12);
////$mform->set_data($defaultminute);

//set
if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    $returnurl = new moodle_url('/booking/listAllRooms.php');
    redirect($returnurl);
} else if ($fromform = $mform->get_data()) {
  //In this case you process validated data. $mform->get_data() returns data posted in form.

  $newRoom = new stdClass();

  $newRoom->roomnumber			= $fromform->roomName;
  
  switch ($fromform->roomType) {
    case '0':
      $roomType = "Classroom";
      break;
    
    case '1':
      $roomType = "Hall";
      break;
  }

  $newRoom->roomcapacity		= $fromform->roomCapacity;
  $newRoom->roomtype		= $roomType;

  $lastinsertid = $DB->insert_record('room', $newRoom, $returnid=true, $bulk=false);
  $returnurl = new moodle_url('/booking/listAllRooms.php');
  redirect($returnurl);
} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.

  //Set default data (if any)
  //displays the form
}

echo $OUTPUT->header();
echo $OUTPUT->heading($heading);
$mform->display();
echo $OUTPUT->footer();
