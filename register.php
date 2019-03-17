<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="style.css?ver=1.0.0.3"/>
  <head>
    <meta content="text/html" charset="utf-8">
    <title>Register</title>
  </head>
  <body>
    <?php
    $Serial = "$_GET[Serial]";
    $Grade = "$_GET[Grade]";
    $Class = "$_GET[Class]";
    $Number = "$_GET[Number]";
    $Name = "$_GET[Name]";

    date_default_timezone_set("Asia/Seoul");
    $month= date("n");
    $day = date("j");

    function Modify_table($Grade, $Class, $Number, $Name) {
      $link=mysqli_connect("localhost", "root", "4thMemorize", "GW");
      mysqli_set_charset($link, "utf8");
      $sql = "INSERT INTO $month.월 (Grade, Class, Number, Name, $day.일) VALUES ($Grade, $Class, $Number, $Name, 등록일)";
      $result=mysqli_query($link, $sql) or die ("Error:".mysqli_error($link));
    }



    $link=mysqli_connect("localhost", "root", "4thMemorize", "GW");
    mysqli_set_charset($link, "utf8");


    if (!($_GET['Serial']&$_GET['Grade']&$_GET['Class']&$_GET['Number']&$_GET['Name'])) {
      $comment = "누락된 정보가 있습니다. 확인해 주세요.";
    }
    else {
      $sql = "INSERT INTO Identify (Serial, Grade, Class, Number, Name) VALUES ('$Serial', $Grade, $Class, $Number, '$Name')";
      $check_sql = "SELECT * FROM Identify order by ID DESC limit 1;";
      $result=mysqli_query($link, $sql) or die ("Error:".mysqli_error($link));

      if ($result==1) {
        $check_result = mysqli_query($link, $check_sql) or die ("Error:".mysqli_error($link));

        Modify_table($Grade, $Class, $Number, $Name);
        $Inform = mysqli_fetch_array($check_result);
        $ID = $Inform['ID'];
        $Student_Inform =array(
          '1' => $Inform['Grade'],
          '2' => $Inform['Class'],
          '3' => $Inform['Number'],
          '4' => $Inform['Name']
        );
        $comment = "<h2>등록되었습니다<br>정보를 확인해 주세요</h2>";
        $information = $Grade. "학년 ". $Class. "반 ". $Number. "번 ". $Name. "   ID = ". $ID;
      }
    }
     ?>
     <div id="Student_ID">
     <?=$comment?>
      </div>
     <div id="information">
       <?=$information?>
     </div>
  </body>
</html>
