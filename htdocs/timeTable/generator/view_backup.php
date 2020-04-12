<?php
require_once('../../config.php');
require_once('ICS.php');
require_login();
$url = new moodle_url('/timeTable/generator/view_backup.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Generator';
$PAGE->set_heading($heading);
echo $OUTPUT->header();
echo $OUTPUT->heading('Test');


$TotalNumberOfTeacher = 8;
$dayscheme = 3;
#$class = array('1A', '1B', '2A', '2B', '3A', '3B', '4A', '4B', '5A', '5B', '6A', '6B');
$classarray = array('1A', '1B', '2A', '2B');

$timeslotarray = array(
  array('starttime' => '0900', 'endtime' => '1000'),
  array('starttime' => '1000', 'endtime' => '1100'),
  array('starttime' => '1100', 'endtime' => '1200'),
  array('starttime' => '1300', 'endtime' => '1400'),
  array('starttime' => '1400', 'endtime' => '1500'),
);

$TotalnumberOftimeslot = $dayscheme * sizeof($timeslotarray) * sizeof($classarray);
echo "TotalnumberOftimeslot: ";
echo "$TotalnumberOftimeslot";
echo "<br>";

$roomarray = array(
  array('room' => '1A Classroom', 'type' => 'Fixed'),
  array('room' => '1B Classroom', 'type' => 'Fixed'),
  array('room' => '2A Classroom', 'type' => 'Fixed'),
  array('room' => '2B Classroom', 'type' => 'Fixed'),
  array('room' => 'Music Room', 'type' => 'Shared'),
  array('room' => 'Computer Room', 'type' => 'Shared')
);

$event = array(
array('class'=>'1A', 'subject' =>'Music', 'assignedteacherarray'=> array('Sam', 'Apple'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Music', 'assignedteacherarray'=> array('Sam', 'Apple'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Music', 'assignedteacherarray'=> array('Sam'), 'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Music', 'assignedteacherarray'=> array('Sam', 'Apple'),  'finalisedteacher'=>NULL, 'room'=>'Music Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'Computer', 'assignedteacherarray'=> array('Sam', 'Tom'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Computer', 'assignedteacherarray'=> array('Sam', 'Tom'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Computer', 'assignedteacherarray'=> array('Sam', 'Tom'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Computer', 'assignedteacherarray'=> array('Sam', 'Tom'),  'finalisedteacher'=>NULL, 'room'=>'Computer Room', 'type' =>'shared', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Sam', 'Ben'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Sam', 'Ben'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Sam', 'Ben'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Putonghua', 'assignedteacherarray'=> array('Sam', 'Ben'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed', 'timeslot'=>NULL, 'day'=>NULL,'maxnum'=>NULL, 'heuristic'=>0),

array('class'=>'1A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

array('class'=>'2A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2A', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2A Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

array('class'=>'1B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'May', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'1B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'1B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),

array('class'=>'2B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Chinese', 'assignedteacherarray'=> array('Amy', 'April', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'English', 'assignedteacherarray'=> array('Ben', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),
array('class'=>'2B', 'subject' =>'Maths', 'assignedteacherarray'=> array('Charlie', 'Sam'),  'finalisedteacher'=>NULL, 'room'=>'2B Classroom', 'type' =>'fixed','timeslot'=>NULL, 'day'=>NULL, 'maxnum'=>2, 'heuristic'=>0),



);


shuffle($event);
$i =0;
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
    echo $event[$i]['timeslot'];
    echo ",";
    echo $event[$i]['day'];
    echo ",";
    echo $event[$i]['finalisedteacher'];
    echo ",";
    echo $event[$i]['class'];
    echo ",";
    echo $event[$i]['subject'];
    echo "<br>";

}



#Then run the algorithm

$ics = new ICS(array(
  'location' => $event[0]['room'],
  'description' => $event[0]['class'].$event[0]['subject'],
  'dtstart' => '9000',
  'dtend' => '1000',
  'summary' => $event[0]['finalisedteacher'],
  'url' => '',
));

echo $ics->to_string();
















echo $OUTPUT->footer();
