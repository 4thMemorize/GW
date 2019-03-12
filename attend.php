<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php
  $link_ID = mysqli_connect("localhost", "root", "4thMemorize", "Identify");
  if (mysqli_connect_errno())       //connection error ... end script
  {
    die("Connect Error: ".mysqli_connect_error());
  }
                     // Arduino HERE.
  $Serial = "$_GET[Serial]";     //Serial from arduino
  $get_student_id= "SELECT * FROM identify WHERE Serial = '$Serial'";
  $result = mysqli_query($link_ID, $get_student_id) or die ("Error: " .mysqli_error($link_ID));
  mysqli_set_charset($link_ID, "utf8");
  $Student_Inform = mysqli_fetch_array($result);
  $Inform =array(
    '1' => $Student_Inform['Grade'],
    '2' => $Student_Inform['Class'],
    '3' => $Student_Inform['Number'],
    '4' => $Student_Inform['Name']
  );
  mysqli_close($link_ID);

  $link=mysqli_connect("localhost", "root", "4thMemorize", "GW_Statistic");
  $sql="INSERT INTO attender (Grade, Class, Number, Name) values ($Inform[1], $Inform[2], $Inform[3], '$Inform[4]'); ";
  $result_insert = mysqli_query($link, $sql);
  ?>

  <?php
  $link_RE = mysqli_connect("localhost", "root", "4thMemorize", "Record");
  if (mysqli_connect_errno())       //connection error ... end script
  {
    die("Connect Error: ".mysqli_connect_error());
  }
  $date = date("d");
  $month = date("m");
  $Recording="UPDATE $month.'월' SET d$date='1' WHERE Grade=$Inform[1] AND Class=$Inform[2] AND Number=$Inform[3];";
  $result_record = mysqli_query($link_RE, $Recording);
  ?>



</body>
</html>
