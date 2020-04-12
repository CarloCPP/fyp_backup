<?php
if (!defined('MOODLE_INTERNAL')) {
  die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/lib/formslib.php');

class subject_form extends moodleform {
  public function definition(){
    global $CFG, $USER;
    $mform = $this->_form;


    $mform->addElement('html', "<br>");
    $mform->addElement('html', "<br>");

    $arrayOfGrade = range(1,12);
    $mform->addElement('select', 'grade', 'Grade:', $arrayOfGrade);
    // $mform->addrule('grade', 'Please select the grade', 'required' , 'client',false, false);
    $mform->addElement('html', "<div id='responseText_G'>Waiting for input</div>");
    $mform->addElement('html', "<br>");

    $mform->addElement('text', 'name', 'Subject Name:');
    $mform->setType('name', PARAM_TEXT);
    // $mform->addrule('name', 'Please select the name', 'required' , 'client',false, false);
    $mform->addElement('html', "<div id='responseText_N'>Waiting for input</div>");
    $mform->addElement('html', "<br>");

    $mform->addElement('text', 'quantity', 'Quantity:');
    $mform->setType('quantity', PARAM_TEXT);
    // $mform->addrule('quantity', 'Please select the Quantity', 'required' , 'client',false, false);
    $mform->addElement('html', "<div id='responseText_Q'>Waiting for input</div>");
    $mform->addElement('html', "<br>");

    $arrayOfRequire = array("No","Yes");
    $mform->addElement('select', 'require', 'Need Special Room (N/Y):', $arrayOfRequire);
    $mform->setType('require', PARAM_TEXT);
    $mform->addElement('html', "<div id='responseText_R'>Waiting for input</div>");
    $mform->addElement('html', "<br>");



    // $this->add_action_buttons(true, 'Add');
    $mform->addElement('html', "<div align='center' ><input style='color:white;background-color:#1177d1;border-color:#1177d1;' type='button' name='subject_C' value='Create Subject' id='creButton_subject' onclick='createSubject()'></div>");
    $mform->addElement('html', "<br>");

    // $mform->addElement('html', "<input style='color:white; background-color:blue;' type='submit' value='Room Modification'
    // onclick='window.location= '../room/room.php'' /> ");
  }

  function validation($data, $files){
    return array();
  }



}
