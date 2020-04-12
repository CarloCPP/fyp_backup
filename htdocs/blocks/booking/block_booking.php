<?php

defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir . '/pagelib.php');

global $PAGE;
$PAGE->requires->css('/blocks/booking/style.css', false);
$PAGE->requires->js('/blocks/booking/script.js', false);

class block_booking extends block_base {
  public function init() {

    $this->title = get_string('pluginname', 'block_booking');
  }

  public function get_content() {
    if ($this->content !== null) {
      return $this->content;
    }

    //Scoping
    global $USER, $CFG, $DB, $OUTPUT;
    //Declaration
    $this->content         = new stdClass;
    $this->content->items  = array(); //not using

    /*To Do:
    Show All Room, sorted by Room ID
    Then show all field :
    roomid,roomnumber(~roomname),roomcapacity,roomtype
    */
    // (1) Initalise the table and (2) Generate table header (th)
    $roomTable = new html_table();

    // $roomTable->head = array('Room ID', 'Room Number', 'Room Capacity', 'Room Type');
    $roomTableTopRow = new html_table_row(); //param: array $cells
    // $roomTableTopCell[0] = new html_table_cell('Room ID'); //param: string $text
    $roomTableTopCell[0]= new html_table_cell('Room Name');
    $roomTableTopCell[1]= new html_table_cell('Room Capacity');
    $roomTableTopCell[2]= new html_table_cell('Room Type');
    $roomTableTopCell[3]= new html_table_cell();
    //Class assignment

    $roomTable->attributes['class'] = 'roomTableClass'; //<table class='roomTable'></table>
    $roomTableTopRow->attributes['class'] = 'roomTableTopRow';//<th class='roomTableTopRow'></th>
    for($i = 0; $i < 4; $i++){  //<td class='tableTopCell[i]'></td>
      $roomTableTopCell[$i]->attributes['class'] = 'roomTableTopCell'.$i;

    }
    /* Then do assignment of table cells */
    // foreach ($roomTableTopCell as $key => $value) {
    //   $roomTableTopRow[$key]=$value;
    // }

    for($i = 0; $i < 4; $i++){
      $roomTableTopRow->cells[$i]=$roomTableTopCell[$i];
    }

    //Same effect as below
    // $row->cells[0] = $topCell0;
    // $row->cells[1] = $topCell1;
    // $row->cells[2] = $topCell2;
    // $row->cells[3] = $topCell3;
    $roomTable->data[] = $roomTableTopRow;

    //DB
    // $roomNumber=[];$roomCapacity=[];
    $roomTableRow=[];
    
    // $now = new DateTime("now", core_date::get_server_timezone_object());

    // $bookingNumSQL = "SELECT count(*) from mdl_booking WHERE startdateyyyy = ? and startdatemm = ? and startdatedd = ? order by starttimehh, starttimemm";

    // $bookingParams = array($now->format('Y'), $now->format('m'), $now->format('d'));

    // $numberOfBookings = $DB->count_records_sql($bookingNumSQL, $bookingParams);

    // $bookingSQL = 'SELECT roomidforeignkey FROM mdl_booking WHERE startdateyyyy = ? and startdatemm = ? and startdatedd = ? order by starttimehh, starttimemm';

    // $bookingResults = $DB->get_recordset_sql($bookingSQL, $bookingParams, $limitfrom=0, $limitnum=0);

    // $bookingRoomID = [];

    // if ($bookingResults->valid()){
    // foreach ($bookingResults as $bookingResult) {
    //   // Do whatever you want with this record
    //   array_push($bookingRoomID, $bookingResult->roomidforeignkey);
    //   }
    // }
    
    // $roomListCountSQL = "SELECT count(*) from mdl_room"；

    // $roomListCount = $DB->count_records_sql($roomListCountSQL, $bookingRoomID = null);

    $roomListCount = $DB->count_records('room', $params=NULL);

    $roomListSQL = 'SELECT * FROM mdl_room order by roomnumber, roomid asc';

    $roomListResults = $DB->get_recordset_sql($roomListSQL, $bookingRoomID = null, $limitfrom=0, $limitnum=0);
    
    $roomIds = [];
    $roomNumbers = [];
    $roomCapacities = [];
    $roomTypes = [];

    if (!empty($roomListResults)){
      foreach ($roomListResults as $roomListResult) {
          array_push($roomIds, $roomListResult->roomid);
          array_push($roomNumbers, $roomListResult->roomnumber);
          array_push($roomCapacities, $roomListResult->roomcapacity);
          array_push($roomTypes, $roomListResult->roomtype);
      }
    }

    // echo $roomCount;
    for ($i=1;$i<=$roomListCount;$i++){

      $roomTableRow[$i]= new html_table_row();
      // $roomTableRow[$i]->cells[0]=new html_table_cell($roomIds[$i - 1]);
      $roomTableRow[$i]->cells[0]=new html_table_cell($roomNumbers[$i - 1]);
      $roomTableRow[$i]->cells[1]=new html_table_cell($roomCapacities[$i - 1]);
      $roomTableRow[$i]->cells[2]=new html_table_cell($roomTypes[$i - 1]);
      $roomTableRow[$i]->cells[3]=new html_table_cell('<a href="../../booking/view.php?roomid='.$roomIds[$i-1].'"> Book This Room </a>');

      $roomTable->data[] = $roomTableRow[$i];
    }

    //Repeat for booking
    $bookingTable = new html_table();
    $bookingTableTopRow = new html_table_row(); //param: array $cells
    // $bookingTableTopCell[0] = new html_table_cell('Booking ID'); //param: string $text
    $bookingTableTopCell[0]= new html_table_cell('Room');
    $bookingTableTopCell[1]= new html_table_cell('Date');
    $bookingTableTopCell[2]= new html_table_cell('Start Time');
    $bookingTableTopCell[3]= new html_table_cell('End Time');
    $bookingTableTopCell[4]= new html_table_cell('Booking Purpose');
    $bookingTableTopCell[5]= new html_table_cell('Person Booked');
    $bookingTable->attributes['class'] = 'bookingTable';
    $bookingTableTopRow->attributes['class'] = 'bookingTableTopRow';
    for($i=0;$i<=5;$i++){
      $bookingTableTopCell[$i]->attributes['class'] = 'bookingTableTopCell'.$i;

    }
    for($i=0;$i<=5;$i++){
      $bookingTableTopRow->cells[$i]=$bookingTableTopCell[$i];
    }
    $bookingTable->data[] = $bookingTableTopRow;
    //DB
    $bookingTableRow=[];

    $now = new DateTime("now", core_date::get_server_timezone_object());
    //Get number of bookings
    $countSQL = 'SELECT count(*) from mdl_booking where startdateyyyy = ? and startdatemm = ? and startdatedd = ?';
    $countParams = array($now->format('Y'), $now->format('m'), $now->format('d'));
    $bookingCount = $DB->count_records_sql($countSQL, $countParams); 


    // $bookingCount=$DB->count_records('booking', $params=NULL );
    // for ($i=1;$i<=$bookingCount;$i++){

      $now = new DateTime("now", core_date::get_server_timezone_object());

      $bookingSQL = 'SELECT * FROM mdl_booking WHERE startdateyyyy = ? and startdatemm = ? and startdatedd = ? order by starttimehh, starttimemm';
      $bookingParams = array($now->format('Y'), $now->format('m'), $now->format('d'));
      $bookingResults = $DB->get_recordset_sql($bookingSQL, $bookingParams, $limitfrom=0, $limitnum=0);

      // $result= $DB->get_record('booking',array('id'=>$i ),'id,startdateyyyy,startdatemm,startdatedd,starttimehh,starttimemm,durationmm,description,bookingpersonid');
      if (!empty($bookingResults)){
        foreach ($bookingResults as $result) {

          //New Row
          $bookingTableRow[$i]= new html_table_row();

          //Room
          $roomSQL = 'SELECT roomnumber from mdl_room where roomid = ?';
          $roomParams = array($result->roomidforeignkey);
          $roomName = $DB->get_field_sql($roomSQL, $roomParams, $strictness=IGNORE_MISSING);
          $bookingTableRow[$i]->cells[0]=new html_table_cell($roomName);

          //Start Date
          $startDateTime = new DateTime();
          $startDateTime->setDate($result->startdateyyyy, $result->startdatemm, $result->startdatedd);
          $startDateTime->setTime($result->starttimehh, $result->starttimemm);
          $bookingTableRow[$i]->cells[1]=new html_table_cell($startDateTime->format('d/m/Y'));

          // $bookingTableRow[$i]->cells[1]=new html_table_cell($result->startdateyyyy."/".$result->startdatemm."/".$result->startdatedd);
          // $trapZero=""; //convert 1->01,2->02...9->09
          // $trapTimemm=$result->starttimemm;
          // if($trapTimemm<10){
          //   $trapZero="0";
          // }


          //Start Time
          // $startDateTime = new DateTime();
          // $startDateTime->setTime($result->starttimehh, $result->starttimemm);
          $bookingTableRow[$i]->cells[2]=new html_table_cell($startDateTime->format('g:ia'));
          // $bookingTableRow[$i]->cells[2]=new html_table_cell($result->starttimehh.":".$trapZero.$result->starttimemm);

          // $bookingTableRow[$i]->cells[3]=new html_table_cell($result->durationmm);


          //End Time (Replace Duration)
          $endDateTime = new DateTime();
          $endDateTime->setTime($result->starttimehh, $result->starttimemm);
          $currentDurationMM = $result->durationmm;
          $dateIntervalString = 'PT'.$currentDurationMM.'M';
          $dateInterval = new DateInterval($dateIntervalString);
          $endDateTime->add($dateInterval);
          $bookingTableRow[$i]->cells[3]=new html_table_cell($endDateTime->format('g:ia'));

          //Description
          $bookingTableRow[$i]->cells[4]=new html_table_cell($result->description);

          //Get user profile from user db
          // $DB->set_debug(true);
          $userSQL = 'SELECT firstname from mdl_user where id = ?';
          $userParams = array($result->bookingpersonid);
          $userFirstName = $DB->get_field_sql($userSQL, $userParams, $strictness=IGNORE_MISSING);
          // $DB->set_debug(false);

          //Booking Person ID
          // $bookingTableRow[$i]->cells[4]=new html_table_cell($result->bookingpersonid);
          $bookingTableRow[$i]->cells[5]=new html_table_cell($userFirstName);

          $bookingTable->data[] = $bookingTableRow[$i];
        }
      }
    // }


    //Printing(Variable assignment)
    $this->content->text = html_writer::div(get_string('expandRoom','block_booking'),"expandRoom");
    
    $this->content->text .= html_writer::tag('button', get_string('clickShow','block_booking'), array('type' => 'button','onclick' => 'window.location="../../booking/listAllRooms.php"'));
    

    $this->content->text .= html_writer::table($roomTable,"",array('id' => 'roomTable'));

    $this->content->text .= html_writer::empty_tag('br', null);

    $this->content->text .= html_writer::div(get_string('expandBooking','block_booking'),"expandBooking");
    $this->content->text .= html_writer::table($bookingTable);

    // $this->content->text .= html_writer::div("Debuging Msg: "."0");
    // $this->content->text .= html_writer::div(get_string('textBelowTable','block_booking'));


    $this->content->footer= html_writer::link(new moodle_url(get_string('footerUrl','block_booking')), get_string('footer','block_booking'));

    //Below is for debugging/saved Code, DONT DELETE, COMMENT INSTEAD
    // $DB->set_debug(true);
    // $string['test1']='test1';
    // $string['test2']='test2';
    // get_string('footer')).' | ';



    return $this->content;
  }
  // The PHP tag and the curly bracket for the class definition
  // will only be closed after there is another function added in the next section.
}

?>
