<?php

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}

    function generate(){
        $TotalNumberOfTeacher = 20;
        $dayscheme = 5;
        $classarray = array('1A', '1B', '1C', '1D','2A', '2B','2C','2D','3A','3B','3C','3D');

        $timeslotarray = array(
          array('starttime' => '0900', 'endtime' => '1000'),
          array('starttime' => '1000', 'endtime' => '1100'),
          array('starttime' => '1100', 'endtime' => '1200'),
          array('starttime' => '1300', 'endtime' => '1400'),
          array('starttime' => '1400', 'endtime' => '1500'),
          array('starttime' => '1500', 'endtime' => '1600'),
        );

        $TotalnumberOftimeslot = $dayscheme * sizeof($timeslotarray) * sizeof($classarray);
        echo "TotalnumberOftimeslot: ";
        echo "$TotalnumberOftimeslot";
        echo "<br>";


        $event = array(
        array('class'=>'1A', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Jessica'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Jenny', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jenny', 'Jamie'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'1B', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Jessica'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Jenny', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jenny', 'Jamie'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'1C', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Jessica'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Jenny', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jenny', 'Jamie'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'1D', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Jessica'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Jenny', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jenny', 'Jamie'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'2A', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Jessica'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jamie', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'2B', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Jessica'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jamie', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'2C', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Jessica'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jamie', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'2D', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Jessica'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jamie', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'3A', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Lily','Jessica'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jamie', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Emily','Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'3B', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Lily','Jessica'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jamie', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Emily','Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'3C', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Lily','Jessica'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jamie', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Emily','Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        array('class'=>'3D', 'subject' =>'Chinese History', 'assignedteacherarray'=> array('Benny', 'Lily','Jessica'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Western History', 'assignedteacherarray'=> array('Joe', 'Evans'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'PE', 'assignedteacherarray'=> array('Jamie', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'Playground', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Music', 'assignedteacherarray'=> array('Jenny', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Jamie', 'Smith'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Home Economics', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'Home E Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Computer', 'assignedteacherarray'=> array('May', 'Emily','Smith'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'VA', 'assignedteacherarray'=> array('Harry', 'James'),  'finalisedteacher'=>NULL, 'room'=>'VA Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

        #'----'
        array('class'=>'1A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1A', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'1B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1B', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'1C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1C', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'1D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'LS', 'assignedteacherarray'=> array('Jenny', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'1D', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'1D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'2A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2A', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'2B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2B', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'2C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2C', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'2D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Maths', 'assignedteacherarray'=> array('Amy', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'2D', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'2D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'3A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3A', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'3B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3B', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'3C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3C', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3C Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        array('class'=>'3D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Ben', 'Benny', 'Jesscia','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'English', 'assignedteacherarray'=> array('Tom', 'Jacky', 'Jenny','Evans'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Maths', 'assignedteacherarray'=> array('May', 'Charlie', 'Emily','Tylor'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'LS', 'assignedteacherarray'=> array('Sam', 'Joe', 'Lily'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
        array('class'=>'3D', 'subject' =>'Science', 'assignedteacherarray'=> array('May', 'Simon', 'Emily'),  'finalisedteacher'=>NULL, 'room'=>'3D Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

        );

        /*
        for ($i=0; $i <sizeof($event);$i++){
          $teacherheuristic = $TotalNumberOfTeacher - sizeof($event[$i]['assignedteacherarray']);
          $roomheuristic = 0;

          if ($event[$i]['type']=='shared'){
            $value = $event[$i]['room'];
            $roomheuristic = array_count_values(array_column($event, 'room'))[$value];
          }
          $event[$i]['heuristic'] = $teacherheuristic + $roomheuristic;
        }

        uasort($event, function($a, $b){
            if ($a['heuristic'] == $b['heuristic']) {
                return 0;
            }
            return ($a['heuristic'] > $b['heuristic']) ? -1 : 1;
        });
        */
        shuffle($event);
        #-------------------------
        #After this, we have sorted the $event array

        echo "size of event: ";
        echo sizeof($event);
        echo "<br>";

        $i = 0;
        $legalsolution = '';
        #$TotalnumberOftimeslot

        while($event[$TotalnumberOftimeslot -1]['timeslot']==NULL && $event[$TotalnumberOftimeslot -1]['day']==NULL){

            #------ Check Available
            $availabletimeslots = array();
            for ($j = 1; $j <= sizeof($timeslotarray); $j++){
                for ($k = 1; $k <= $dayscheme; $k++){
                    $sametimeslotarray = array();
                    for ($l = 0; $l < sizeof($event) ; $l++){
                        if ($event[$l]['timeslot'] == $j && $event[$l]['day'] == $k ){
                              array_push($sametimeslotarray, $event[$l]);
                        }
                    }

                    #check whether same class has already
                    if (in_array($event[$i]['class'] , array_column($sametimeslotarray, 'class'))){
                    }
                    else{
                        if ( empty($sametimeslotarray)){
                            $availabletemp = array('timeslot' => $j, 'day' => $k, 'availableteachersarray' => $event[$i]['assignedteacherarray'] );
                            array_push($availabletimeslots, $availabletemp);
                        }
                        else{
                            if (in_array($event[$i]['room'] ,array_column($sametimeslotarray, 'room') )){
                            }
                            else{
                                $tmpteacherarray = $event[$i]['assignedteacherarray'];
                                foreach($sametimeslotarray as $l){
                                    $tmparry = array($l['finalisedteacher']);
                                    $tmpteacherarray = array_diff($tmpteacherarray ,$tmparry);
                                }
                                if(empty($tmpteacherarray)){
                                }
                                else{
                                    $availabletemp = array('timeslot' => $j, 'day' => $k, 'availableteachersarray' => $tmpteacherarray);
                                    array_push($availabletimeslots, $availabletemp);
                                }
                            }
                        }
                    }

                }
            }


            if (isset($event[$i]['maxnum'])){
                $count = 0;
                foreach($event as $les){
                    if ($les['day'] == $event[$i]['day'] and $les['class'] == $event[$i]['class'] and $les['subject'] == $event[$i]['subject']){
                        $count++;
                    }
                }
                if ($count == $event[$i]['maxnum']){
                    #delete
                    while(array_search($event[$i]['day'], array_column($availabletimeslots, 'day')) ){
                        unset($availabletimeslots[array_search($j, array_column($availabletimeslots, 'day'))]);
                    }
                }
            }
            #------ Check Available


            #----- Check whether it is a rollback node
            if (isset($event[$i]['timeslot']) && isset($event[$i]['day'])) {

                if ( empty($availabletimeslots) ){
                    if ($i == 0){
                        $legalsolution = 'No Legal solution';
                        echo "No Legal solution";
                        echo "<br>";
                        break;
                    }
                    else{
                        #call another rollback
                        $event[$i]['timeslot'] = NULL;
                        $event[$i]['day'] = NULL;
                        $event[$i]['finalisedteacher'] = NULL;
                        $i--;

                    }
                }
                else{
                    $rollbackindex = 0;
                    $newpathfound = false;
                    for ($j = 0; $j < sizeof($availabletimeslots); $j++){
                        if ($availabletimeslots[$j]['timeslot'] >= $event[$i]['timeslot'] && $availabletimeslots[$j]['day'] >= $event[$i]['day'] ){
                            $rollbackindex = $j;
                            $newpathfound = true;
                            break;
                        }
                    }
                    if($newpathfound == true){
                        $event[$i]['timeslot'] = $availabletimeslots[$rollbackindex]['timeslot'];
                        $event[$i]['day'] = $availabletimeslots[$rollbackindex]['day'];
                        $event[$i]['finalisedteacher'] = reset($availabletimeslots[$rollbackindex]['availableteachersarray']);
                        $i++;
                    }
                    else{
                        $event[$i]['timeslot'] = NULL;
                        $event[$i]['day'] = NULL;
                        $event[$i]['finalisedteacher'] = NULL;
                        $i--;
                    }

                }
            }
            else{
                #it is not rollback node
                #check whether there is available availabletimeslot
                if (empty($availabletimeslots)){
                    #there is no available
                    if ($i == 0){
                        $legalsolution = 'No Legal solution';
                        echo "No Legal solution";
                        echo "<br>";
                        break;
                    }
                    else{
                        $i--;
                    }
                }
                else{ #There is available, assign the first to the event
                    $event[$i]['timeslot'] = $availabletimeslots[0]['timeslot'];
                    $event[$i]['day'] = $availabletimeslots[0]['day'];
                    $event[$i]['finalisedteacher'] = reset($availabletimeslots[0]['availableteachersarray']);
                    $i++;
                }
            }

            #-----
        }

        echo "Generator Completed";
        echo "<br>";

        for ($i = 0; $i < sizeof($event); $i++){
            echo $i;
            echo " ";
            echo $event[$i]['day'];
            echo ",";
            echo $event[$i]['timeslot'];
            echo ",";
            echo $event[$i]['finalisedteacher'];
            echo ",";
            echo $event[$i]['class'];
            echo ",";
            echo $event[$i]['subject'];
            echo "<br>";

        }
    }
