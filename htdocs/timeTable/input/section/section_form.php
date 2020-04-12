<?php
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/lib/formslib.php');

class section_form extends moodleform {
    public function definition(){
        global $CFG, $USER;
        $mform = $this->_form;

        //To be configured
        $arrayOfOptionsday = array('1','2','3','4','5','6','7');
        $mform->addElement('select', 'day', 'Day:',$arrayOfOptionsday);
        $mform->setType('day', PARAM_TEXT);

        $arrayOfOptionsPer = array('To be Configured');
        $mform->addElement('select', 'numberPerDay', 'Number of Lessons per Day:', $arrayOfOptionsPer);
        $mform->setType('numberPerDay', PARAM_TEXT);

        $this->add_action_buttons(true, 'Add');


    }

    function validation($data, $files){
        return array();
    }



}
