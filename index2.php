<?php
ini_set('max_execution_time', 1200); //300 seconds = 5 minutes
include("dbconnect.php");
$sch = "";

$sql1 = "UPDATE registeration SET day = 0 WHERE Course <> ''";
dbcon("fwa",$sql1);

$sql2 = "UPDATE courses SET day = 0 WHERE Course <> '' ";
dbcon("fwa",$sql2);


$sqlcourse ="select * from courses ORDER BY nStudents DESC, Course ASC";
$resultc = dbcon("fwa",$sqlcourse);
echo "Welcome</br>";

while($row = $resultc->fetch_assoc()){
  
    $cc = $row['Course'];
    for($sday=1;$sday<50;$sday++){
    if(searchStudent($cc,$sday)==1){
        break 1;
    }

    }
}

echo "<p>FWA timetable is generated.</p>";

function findConflict($day,$studentid){

    $sqlf="SELECT * FROM registeration WHERE day = $day and StudentId='$studentid'";
    $resultf = dbcon("fwa",$sqlf);
    if($resultf->num_rows > 0){
        return true;
    }

}

function searchStudent($cc,$day)
{
  
  $sqlSearch ="Select * from registeration where Course = '$cc'";
  $resultS = dbcon("fwa",$sqlSearch);
  while($rowS = $resultS->fetch_assoc()){
      if(findConflict($day,$rowS['StudentId'])==true){
         return 0;
      }
  }
  
   scheduleFWA($cc,$day);
   return 1;

  
}

function scheduleFWA($course,$sday){
  $nrs = callNumberOfStudents($course);
  $sqlCourses = "UPDATE courses SET day = '$sday', nStudents='$nrs' WHERE Course = '$course'";
  dbcon("fwa",$sqlCourses);
  
  $sqlSch = "UPDATE registeration SET day = '$sday' WHERE Course = '$course'";
  dbcon("fwa",$sqlSch);

  callNumberOfStudents($course);

  echo "<p>" . $course . " Scheduled on day : " . $sday;

}

function callNumberOfStudents($course){
$sqln = "select Course from registeration where Course = '$course'";
$nr = dbcon("fwa",$sqln);
$row_c = $nr->num_rows;

return $row_c;


}

?>

<div id="stat"></div>

<style>

#stat{
    border: 2px solid;
    background: lightgreen;
}

</style>