<?php
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/lib/formslib.php');


class class_form extends moodleform {
    public function definition(){
        global $CFG, $USER;
        $mform = $this->_form;

        $arrayOfDays = range(1,12);

        $mform->addElement('select', 'grade', 'Grade:', $arrayOfDays);

        $mform->addrule('grade', 'Please select the grade', 'required' , 'client',false, false);
        $mform->setType('grade', PARAM_TEXT);
        $mform->addElement('html', "<br>");
        $mform->addElement('html', "<div id='responseText_G'>Waiting for input</div>");
        $mform->addElement('html', "<br>");

        
        $mform->addElement('text', 'nameOfClass', 'Class Name:');
        $mform->setType('nameOfClass', PARAM_TEXT);
        $mform->addrule('nameOfClass', 'Please enter a name', 'required' , 'client',false, false);
        $mform->addElement('html', "<div id='responseText_N'>Waiting for input</div>");
        $mform->addElement('html', "<br>");

        
        $mform->addElement('text', 'numOfSubj', 'Maxium no. of a subject per day:');
        $mform->setType('numOfSubj', PARAM_TEXT);
        $mform->addrule('numOfSubj', 'Please enter a number', 'required' , 'client',false, false);
        $mform->addElement('html', "<input type='hidden' >");
        $mform->addElement('html', "<br>");
        $mform->addElement('html', "<div id='responseText_M'>Waiting for input</div>");
        $mform->addElement('html', "<p>");
        $mform->addElement('html', "<p>");
        $mform->addElement('html', "<p>");
        $mform->addElement('html', "<p>");
        $mform->addElement('html', "<p>");
        $mform->addElement('html', "<p>");
        $mform->addElement('html', "<p>");

        $mform->addElement('html', "<input type='button' name='class_C' value='Create Class' id='creButton_class' onclick='createClass()'>");


        $this->add_action_buttons(false, 'Next');


    }

    function validation($data, $files){
        return array();
    }



}
