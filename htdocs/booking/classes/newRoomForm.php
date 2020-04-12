<?php

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->dirroot.'/lib/formslib.php');

class newRoomForm extends moodleform {
    public function definition(){
        global $CFG, $USER;
        $mform = $this->_form; // Don't forget the underscore!


        $mform->addElement('hidden', 'userid');
        $mform->setType('userid', PARAM_INT);
        $mform->setDefault('userid', $USER->id);

        //$mform->setDefault('roomid', $USER->id);

        //Room Name
        $string['Description'] = 'Room Name:';
        //description
        $mform->addElement('text', 'roomName', 'Room Name:');
        $mform->setType('roomName', PARAM_TEXT);
        $mform->addRule('roomName', 'You must provide a name.', 'required');
        //5 words check is not completed
        $mform->addRule('roomName', 'The room name must not exceed 32 characters.', 'maxlength', '32');
        
        //Room Types
        $roomTypeArray = array("Classroom", "Hall");
        $mform->addElement('select', 'roomType', 'Room Type:', $roomTypeArray);
        $mform->setType('roomType', PARAM_INT);
        $mform->addRule('roomType', 'You must provide a room type.', 'required');


        //Room Capacity
        $mform->addElement('text', 'roomCapacity', 'Max Capacity:');
        $roomCapacityRange = [1, 500];
        $mform->setType('roomCapacity', PARAM_INT);
        $mform->addRule('roomCapacity', 'You must provide a number.', 'numeric');
        $mform->addRule('roomCapacity', 'You must provide a room capacity.', 'required');




        $this->add_action_buttons(true, 'submit');
    }


    //Custom validation should be added here
    //Check the date and time whether there are matched
    //Check the duration
    //Check whether the timeslot is valid to book
    function validation($data, $files) {
        return array();
    }



}
