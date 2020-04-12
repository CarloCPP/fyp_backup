<?php
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/lib/formslib.php');

class room_add_form extends moodleform {
    public function definition(){
        global $CFG, $USER;
        $mform = $this->_form;

        //To be configured
        if (isset($_GET['subjectid'])) {
            $subjectID = filter_input(INPUT_GET,"subjectid",FILTER_SANITIZE_STRING);
        }else {
            $subjectID = '1';
        }

        $mform->addElement('hidden', 'subjectid');
        $mform->setType('subjectid', PARAM_INT);
        $mform->setDefault('subjectid', $subjectID);


        $mform->addElement('text', 'nameOfRoom', 'Room Name:');
        $mform->setType('nameOfRoom', PARAM_TEXT);

        $this->add_action_buttons(true, 'Add');


    }

    function validation($data, $files){
        return array();
    }



}
