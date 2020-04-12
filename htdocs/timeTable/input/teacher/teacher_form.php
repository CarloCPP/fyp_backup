<?php
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/lib/formslib.php');

class teacher_form extends moodleform {
    public function definition(){
        global $CFG, $USER;
        $mform = $this->_form;

        $mform->addElement('text', 'numberOfTeacher', 'Teacher Name:');
        $mform->setType('numberOfTeacher', PARAM_TEXT);


        $this->add_action_buttons(true, 'Add');


    }

    function validation($data, $files){
        return array();
    }



}
