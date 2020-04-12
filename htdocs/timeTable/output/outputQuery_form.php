<?php
if (!defined('MOODLE_INTERNAL')) {
  die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/lib/formslib.php');

class outputQuery_form extends moodleform {
  public function definition(){
    global $CFG, $USER;
    $mform = $this->_form;

    //Get Classinfro from query
    $classId=[];
    $className=[];
    $classGrade=[];
    $max_per_day=[];
    $numberOfClass=0;

    $this->getClassInfo($classId,$className,$classGrade,$max_per_day,$numberOfClass);
    // $className = array('-','1A', '2A','3A', '4A', '5A','6A','7A');


    //UI:Choose Class
    $mform->addElement('select', 'classList', 'Output table with class:',$className);
    $mform->setType('classList', PARAM_TEXT);
    // echo $OUTPUT->single_button(new moodle_url('/timeTable/output/view_script.php', array('id' => 'button1')), 'Link text', 'get');
    // $mform->addElement('button', 'button1', 'Generate');
    $mform->addElement('html', "<input type='button' name='class_G' value='Generate' id='genButton_class' onclick='generateTable(\"class\")'>");
    $mform->addElement('html','<br>');



    //Get Teaceherinfro from query
    $numberOfTeacher=0;
    $teacherId=[];
    $teacherName=[];
    $this->getTeacherInfo($teacherId,$teacherName,$numberOfTeacher);
    // $teacherName = array('Ben Sir' , 'Wu Sir Sir');

    //UI:Choose Teacher
    $mform->addElement('select', 'teacherList', 'Output table with teacher:', $teacherName);
    $mform->setType('teacherList', PARAM_TEXT);
    $mform->addElement('html', "<input type='button' name='teacher_G' value='Generate' id='genButton_teacher' onclick='generateTable(\"teacher\")'>");
    $mform->addElement('html','<br>');

    //Get Roominfro from query
    $numberOfRoom=0;
    $roomId=[];
    $roomName=[];
    $subject_id=[];
    $this->getRoomInfo($roomId,$roomName,$subject_id,$numberOfRoom);
    //UI:Choose Room
    $mform->addElement('select', 'roomList', 'Output table with room:', $roomName);
    $mform->setType('roomList', PARAM_TEXT);
    $mform->addElement('html', "<input type='button' name='room_G' value='Generate' id='genButton_room' onclick='generateTable(\"room\")'>");
    $mform->addElement('html','<br>');








    $this->add_action_buttons(false, 'Export to ics.file');


  }

  function validation($data, $files){
    return array();
  }

  function getClassInfo(&$classId,&$className,&$classGrade,&$max_per_day,&$numberOfClass){
    //Get current class# and class list from DB
    global $DB;
    // $DB->set_debug(true);
    $classNumSQL = 'SELECT count(*) from mdl_ttbgen_class_in';
    $numberOfClass = $DB->count_records_sql($classNumSQL, $params=null);

    $classSQL = 'SELECT * FROM mdl_ttbgen_class_in';
    $classResult = $DB->get_recordset_sql($classSQL, $params=null, $limitfrom=0, $limitnum=0);

    if ($classResult->valid()){
      foreach ($classResult as $record) {
        // Do whatever you want with this record
        array_push($classId, $record->id);
        array_push($className, $record->class_name);
        array_push($classGrade, $record->class_grade);
        array_push($max_per_day, $record->max_per_day);


      }
    }

  }

  function getTeacherInfo(&$teacherId,&$teacherName,&$numberOfTeacher){
    //Get current teacher# and teacher list from DB
    global $DB;
    // $DB->set_debug(true);
    $teacherNumSQL = 'SELECT count(*) from mdl_ttbgen_teacher_in';
    $numberOfTeacher = $DB->count_records_sql($teacherNumSQL, $params=null);

    $teacherSQL = 'SELECT * FROM mdl_ttbgen_teacher_in';
    $teacherResult = $DB->get_recordset_sql($teacherSQL, $params=null, $limitfrom=0, $limitnum=0);

    if ($teacherResult->valid()){
      foreach ($teacherResult as $record) {
        // Do whatever you want with this record
        array_push($teacherId, $record->id);
        array_push($teacherName, $record->teacher_name);
      }
    }
  }

  function getRoomInfo(&$roomId,&$roomName,&$subject_id,&$numberOfRoom){
    //Get current room# and teacher list from DB
    global $DB;
    // $DB->set_debug(true);
    $roomNumSQL = 'SELECT count(*) from mdl_ttbgen_room_in';
    $numberOfroom = $DB->count_records_sql($roomNumSQL, $params=null);

    $roomSQL = 'SELECT * FROM mdl_ttbgen_room_in';
    $roomResult = $DB->get_recordset_sql($roomSQL, $params=null, $limitfrom=0, $limitnum=0);

    if ($roomResult->valid()){
      foreach ($roomResult as $record) {
        // Do whatever you want with this record
        array_push($roomId, $record->id);
        array_push($roomName, $record->room_name);
        array_push($subject_id, $record->subject_id);
      }
    }
  }
}
