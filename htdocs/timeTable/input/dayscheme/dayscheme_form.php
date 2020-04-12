<?php
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/lib/formslib.php');

class dayscheme_form extends moodleform {
    public function definition(){
        global $CFG, $USER;
        $mform = $this->_form;

        $arrayOfOptionsDay = array('1', '2','3', '4', '5','6','7');
        $mform->addElement('select', 'numberOfDay', 'Number of Day in a Cycle:',$arrayOfOptionsDay);
        $mform->setType('numberOfDay', PARAM_TEXT);

        $arrayOfOptionsFlex = array('Fixed' , 'Floating');
        $mform->addElement('select', 'typeOfSchedule', 'Type of the Time Table:', $arrayOfOptionsFlex);
        $mform->setType('typeOfSchedule', PARAM_TEXT);

        $this->add_action_buttons(false, 'Next');


    }

    function validation($data, $files){
        return array();
    }



}
