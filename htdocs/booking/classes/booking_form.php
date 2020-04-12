<?php

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->dirroot.'/lib/formslib.php');

class booking_form extends moodleform {
    public function definition(){
        global $CFG, $USER;
        $mform = $this->_form; // Don't forget the underscore!


        $mform->addElement('hidden', 'userid');
        $mform->setType('userid', PARAM_INT);
        $mform->setDefault('userid', $USER->id);

        if (isset($_GET['roomid'])) {
            $roomID = filter_input(INPUT_GET,"roomid",FILTER_SANITIZE_STRING);
        }else {
            $roomID = '1';
        }

        $mform->addElement('hidden', 'roomid');
        $mform->setType('roomid', PARAM_INT);
        $mform->setDefault('roomid', $roomID);

        //$mform->setDefault('roomid', $USER->id);


        $string['Description'] = 'Description: Write down the purpose of using the room. (min 5 words)';
        //description
        $mform->addElement('textarea', 'purposeDescription', 'Description:      Write down the purpose of using the room. (min 5 words)', 'wrap="virtual" rows="5" cols="30"');
        $mform->addRule('purposeDescription', 'You must state the purpose', 'required');
        //5 words check is not completed
        $mform->addRule('purposeDescription', 'Minimum 5 words', 'minlength');
        //Set only today and after can be chosen.

        //starttime
        //$defaulthour = 10;
        //$defaultminute = 00;
        if (isset($_GET['booking_h'])) {
            //$hour = filter_input(INPUT_GET,"booking_h",FILTER_SANITIZE_STRING);
            $hour = $_GET['booking_h'];
        }else {
            $hour = '0';
        }
        if (isset($_GET['booking_mi'])) {
            $minute = filter_input(INPUT_GET,"booking_mi",FILTER_SANITIZE_STRING);
        }else {
            $minute = '0';
        }
        $optionStartArray = array('startyear' => 2019, 'timezone' => 99, 'step' => 30);
        $mform->addElement('date_time_selector', 'startingTime','Time Start', $optionStartArray);
        $mform->setDefault('startingTime', array('hour'=> $hour, 'minute' => $minute));

        //endtime
        $mform->addElement('duration', 'bookingtimelimit', 'duration');



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
