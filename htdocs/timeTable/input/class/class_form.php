<?php
if (!defined('MOODLE_INTERNAL')) {
  die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/lib/formslib.php');


class class_form extends moodleform {
  public function definition(){
    global $CFG, $USER;
    $mform = $this->_form;

    global $DB;

    $arrayOfClasses=array();

    $cohortSQL='SELECT h.idnumber as id, h.name as name
    FROM mdl_cohort AS h
    ORDER BY h.name';
    $cohortResult=$DB->get_recordset_sql($cohortSQL, $params=null, $limitfrom=0, $limitnum=0);
    if($cohortResult->valid()){
      foreach ($cohortResult as $record) {
        // array_push($arrayOfClasses,$record->name);
        $arrayOfClasses[$record->name]=  $record->name;
      }

    }

    $mform->addElement('html', "<br>");
    $mform->addElement('html', "<br>");
    $arrayOfGrades = range(1,12);
    $mform->addElement('select', 'grade', 'Grade:', $arrayOfGrades);
    // $mform->addrule('grade', 'Please select the grade', 'required' , 'client',false, false);
    $mform->setType('grade', PARAM_TEXT);
    $mform->addElement('html', "<div id='responseText_G'>Waiting for input</div>");
    $mform->addElement('html', "<br>");
    $mform->addElement('select', 'nameOfClass', 'Class Name:', $arrayOfClasses);
    // $mform->addElement('text', 'nameOfClass', 'Class Name:');
    $mform->setType('nameOfClass', PARAM_TEXT);
    // $mform->addrule('nameOfClass', 'Please enter a name', 'required' , 'client',false, false);
    $mform->addElement('html', "<div id='responseText_N'>Waiting for input</div>");
    $mform->addElement('html', "<br>");
    $mform->addElement('text', 'numOfSubj', 'Maxium no. of a subject per day:');
    $mform->setType('numOfSubj', PARAM_TEXT);
    // $mform->addrule('numOfSubj', 'Please enter a number', 'required' , 'client',false, false);
    // $mform->addElement('html', "<input type='hidden' >");
    $mform->addElement('html', "<div id='responseText_M'>Waiting for input</div>");
    $mform->addElement('html', "<br>");
    $mform->addElement('html', "<div align='center' ><input style='color:white;background-color:#1177d1;border-color:#1177d1;' type='button' name='class_C' value='Create Class' id='creButton_class' onclick='createClass()'></div>");
    $mform->addElement('html', "<br>");
    // $mform->addElement('html', "<input style='color:white; background-color:blue;' type='submit' value='Subject Modification'
    // onclick='window.location= '../subject/subject.php'' /> ");

    // $this->add_action_buttons(false, 'Next');


  }

  function validation($data, $files){
    return array();
  }



}
