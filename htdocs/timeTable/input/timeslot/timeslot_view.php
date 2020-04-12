<?php
require_once('../../../config.php');
require_login();
$url = new moodle_url('/timeTable/input/timeslot/timeslot_view.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$heading = 'Timeslot';
$PAGE->set_heading($heading);
$PAGE->requires->js('/timeTable/input/timeslot/jquery.js',true);
$PAGE->requires->js('/timeTable/input/timeslot/delete.js',true);


echo $OUTPUT->header();
// echo $OUTPUT->heading('Insturction Text');

printTable();

// Show all added timeslots
// day, timeslot(starttime-end-time), type
function printTable(){
	global $DB;

	$daySchemeSQL = 'SELECT * FROM mdl_ttbgen_config';
    $dayScheme = $DB->get_record_sql($daySchemeSQL, $params=null, $strictness=IGNORE_MISSING); 

    if ($dayScheme == false){
    	echo "Timeslot is undefined!";
    	echo $OUTPUT->footer();
    	exit();

    }
    else if($dayScheme->x_day_scheme_config == 0){
    	$numberOfDays = 7;

    }
    else{
    $numberOfDays = $dayScheme->x_day_scheme_config;

    }

  	$timeslotNumSQL = "SELECT count(*) from mdl_ttbgen_timeslot_in";
  	$numberOfTimeslots = $DB->count_records_sql($timeslotNumSQL, $params=null);

    if ($numberOfTimeslots == 0)
    	echo 'No timeslot is created. <br>';
    else{
    	if ($numberOfTimeslots == 1)
    		echo "$numberOfTimeslots timeslot is created. <br>";
    	else
    		echo "$numberOfTimeslots timeslots are created. <br>";

    	echo "<table border=\"1\">";

    	$timeslotSQL = "SELECT * FROM mdl_ttbgen_timeslot_in";
  		$timeslots = $DB->get_recordset_sql($timeslotSQL, $params=null, $limitfrom=0, $limitnum=0);

  		$timeslotID = [];
  		$startT =[];
  		$duration = [];
  		$day = [];
  		$typeID = [];

  		if ($timeslots->valid()){
  			foreach ($timeslots as $timeslot) {
  				array_push($timeslotID , $timeslot->id);
  				array_push($startT, $timeslot->start_time_hhmm);
      			array_push($duration, $timeslot->duration_mmm);
      			array_push($day, $timeslot->day_of_week_dd);
      			array_push($typeID, $timeslot->timeslot_type_id);
  			}
  		}

  		for ($i = 1; $i <= $numberOfDays; $i++){
  			echo '<tr>';
    		echo "<th>Day $i </th>";

    		$timeslotID_day = [];
  			$startTime_day = [];
  			$duration_day = [];
	  		$typeID_day = [];

	  		for($j = 0; $j < $numberOfTimeslots; $j++){
	  			if($day[$j] == $i){
	  				array_push($timeslotID_day, $timeslotID[$j]);
	  				array_push($startTime_day, $startT[$j]);
	  				array_push($duration_day, $duration[$j]);
	  				array_push($typeID_day, $typeID[$j]);
	  			}
	  		}

  			if (sizeof($startTime_day) != 0){
  				$startTime_count = 9999;
	  			$index = -1;
	  			while(sizeof($startTime_day) != 0){
	  				for ($j = 0; $j < sizeof($startTime_day); $j++){
	  					if ($startTime_day[$j] < $startTime_count){
	  						$startTime_count = $startTime_day[$j];
	  						$index = $j;
	  					}
	  				}

	  				$startmm = $startTime_day[$index] % 100;
	  				$starthh = (int)($startTime_day[$index]/ 100);
	  				$endhh = (int)($duration_day[$index]/ 60 + $starthh);
	  				$endmm = $duration_day[$index] % 60 + $startmm;
	  				if ($endmm >= 60){
	  					$endhh += 1;
	  					$endmm -= 60;
	  				}

	  				$startTime = mktime($starthh, $startmm);
	  				$endTime = mktime($endhh, $endmm);

	  				$type = null;
	  				if($typeID_day[$index] == 0){
	  					$type = "Lesson";
	  				}
	  				elseif ($typeID_day[$index] == 1) {
	  					$type = "Recess";
	  				}
	  				elseif ($typeID_day[$index] == 2) {
	  					$type = "Lunch";
	  				}
	  				elseif ($typeID_day[$index] == 3) {
	  					$type = "Break";
	  				}

	  				$deleteID = $timeslotID_day[$index];

	  				// delete not working
	  				echo "<td>". date("H:i", $startTime) . " - ". date("H:i", $endTime) ."<br> $type <br><input type='button' value='Delete' onclick='deleteTimeslot($deleteID)'></td>";

	  				array_splice($startTime_day, $index , 1);
	  				array_splice($duration_day, $index , 1);
	  				array_splice($typeID_day, $index, 1);

	  				// type missing
	  			}
	  		}

  			echo "</tr>";
  		}

    	echo '</table>';
    }

}

$addnurl = new moodle_url('/timeTable/input/timeslot/timeslot.php');
echo '<a href="' . $addnurl . '">' . 'Add' . '</a>';
echo '<br>';

$returnurl = new moodle_url('/timeTable/input/class/class.php');
echo '<a href="' . $returnurl . '">' . 'Continue' . '</a>';
echo $OUTPUT->footer();



