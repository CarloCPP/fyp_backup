<?php
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/lib/formslib.php');
class timeslot_form extends moodleform {
    public function definition(){
        global $DB;
        global $CFG, $USER;
        $mform = $this->_form;


        $arrayhour = array('00', '01','02','03','04','05','06','07','08','09','10','11',
        '12','13','14','15','16','17','18','19','20','21','22','23',);
        $arrayminute = array('00','05','10','15','20','25','30','35','40','45','50','55');

        $starttimearray = array();
        $starttimearray[] =& $mform->createElement('select', 'startTimeHour', 'Start Time:',$arrayhour );
        $starttimearray[] =& $mform->createElement('select', 'startTimeMinute', 'Start Time:',$arrayminute );
        $mform->addGroup($starttimearray, 'starttimear', 'Start Time', array(' '), false);

        $endtimearray = array();
        $endtimearray[] =& $mform->createElement('select', 'endTimeHour', 'Start Time:',$arrayhour );
        $endtimearray[] =& $mform->createElement('select', 'endTimeMinute', 'Start Time:',$arrayminute );
        $mform->addGroup($endtimearray, 'endtimear', 'End Time', array(' '), false);
        
        //need to bound the choice based on the selection of dayscheme.php

        // $daysSQL = 'SELECT x_day_scheme_config FROM mdl_ttbgen_config';
        // $days = $DB->get_record_sql($daysSQL, $params=null, $limitfrom=0, $limitnum=0);

        $daySchemeSQL = 'SELECT * FROM mdl_ttbgen_config';
        $dayScheme = $DB->get_record_sql($daySchemeSQL, $params=null, $strictness=IGNORE_MISSING);        
        
        $arrayOfOptionsDay = range(1, $dayScheme->x_day_scheme_config);

        $mform->addElement('select', 'dayselected', 'Day:', $arrayOfOptionsDay);
        $mform->setType('dayselected', PARAM_INT);

        $arrayOfOptionsType = array('lesson','recess','lunch', 'break');
        $mform->addElement('select', 'typeselected', 'Type of Timeslot:',$arrayOfOptionsType);
        $mform->setType('typeselected', PARAM_TEXT);

        $this->add_action_buttons(true, 'Add');

    }

    function validation($data, $files){
        $errors= array();
        
        

        return $errors;
        // return array();
    }



}
