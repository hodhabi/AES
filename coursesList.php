

<?php

        require_once('header.php');
 ?>


<head>
  <title>SIS</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  

  <style>
.table{
    width:90%;
    margin-left:5%;
    margin-right:5%;
    margin-top:20px;
}

</style>

<script>

function delete_id(id)
{

     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='coursesDelete.php?Course='+id;
     }
}

</script>


</head>
<?php
include('dbconnect.php');
$sql = "select * from courses order by day ASC";
$result = dbcon('fwa',$sql);
if($result->num_rows > 0){
echo "<table class='table'>";
$i = 0;
while($row = $result->fetch_assoc()){
$idv = $row['Course'];
if($i==0){
echo "<tr class='success'>";
echo "<th> Exam Date and Time</th>";
echo " <th> Course  </th>";
echo " <th> Duration  </th>";
echo " <th>AAMC</th>";
echo " <th>AAWC</th>";
echo " <th>ADMC</th>";
echo " <th>ADWC</th>";
echo " <th>DMC</th>";
echo " <th>DWC</th>";
echo " <th>FMC</th>";
echo " <th>FWC</th>";
echo " <th>MZMC</th>";
echo " <th>MZWC</th>";
echo " <th>RKMC</th>";
echo " <th>RKWC</th>";
echo " <th>RUMC</th>";
echo " <th>RUWC</th>";
echo " <th>SMC</th>";
echo " <th>SWC</th>";
echo " <th> semester  </th>";
echo " <th> nStudents  </th>";
echo " <th> Deliverytype  </th>";
echo " <th> ExamMethod  </th>";




echo "</tr>";
}
$i = $i + 1;
echo "<tr>";
echo "<td>" . findDate($row['day']) . "</td>";
echo "<td>" . $row['Course'] . "</td>";
echo "<td>" . $row['Duration'] . "</td>";
echo "<td>" . countCampus($row['Course'],'AAMC') . "</td>";
echo "<td>" . countCampus($row['Course'],'AAWC') . "</td>";
echo "<td>" . countCampus($row['Course'],'ADMC') . "</td>";
echo "<td>" . countCampus($row['Course'],'ADWC') . "</td>";
echo "<td>" . countCampus($row['Course'],'DMC') . "</td>";
echo "<td>" . countCampus($row['Course'],'DWC') . "</td>";
echo "<td>" . countCampus($row['Course'],'FMC') . "</td>";
echo "<td>" . countCampus($row['Course'],'FWC') . "</td>";
echo "<td>" . countCampus($row['Course'],'MZMC') . "</td>";
echo "<td>" . countCampus($row['Course'],'MZWC') . "</td>";
echo "<td>" . countCampus($row['Course'],'RKMC') . "</td>";
echo "<td>" . countCampus($row['Course'],'RKWC') . "</td>";
echo "<td>" . countCampus($row['Course'],'RUMC') . "</td>";
echo "<td>" . countCampus($row['Course'],'RUWC') . "</td>";
echo "<td>" . countCampus($row['Course'],'SMC') . "</td>";
echo "<td>" . countCampus($row['Course'],'SWC') . "</td>";

echo "<td>" . $row['semester'] . "</td>";
echo "<td>" . $row['nStudents'] . "</td>";
echo "<td>" . $row['Deliverytype'] . "</td>";
echo "<td>" . $row['ExamMethod'] . "</td>";



echo "</tr>";
}
}
echo '</table>';

function findDate($slot){
  $sql = "select * from examsession where slot = '$slot'";
  $results = dbcon("fwa",$sql);
  $rowS = $results->fetch_assoc();
  return ($rowS['Date'] . ", " . $rowS['Start'] . "-" . $rowS['End']);

}

function countCampus($course,$campus){
  $sqlCampus = "select * from registeration where Campus = '$campus' and Course = '$course'";
  $rs = dbcon("fwa",$sqlCampus);
  $rowC = $rs->num_rows;
  return($rowC);
}
?>
