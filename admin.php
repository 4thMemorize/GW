<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="style.css?ver=1.0.0.2"/>
  <head>
    <meta charset="utf-8">
    <title>Master Page</title>
  </head>
  <body>
    <?php

    $link=mysqli_connect("localhost", "root", "4thMemorize", "GW");
    mysqli_set_charset($link, "utf8");

    $Grade = $_POST['Grade'];
    $Class = $_POST['Class'];
    $Number = $_POST['Number'];
    $Name = $_POST['Name'];

    date_default_timezone_set("Asia/Seoul");

    $month= date("n");
    $day = date("j");
    $hour = date("H");
    $min = date("i");
    $timestamp = date("H:i:s");

    if ($_GET['Password']=GW123) {
      if (!($_POST['Grade']&$_POST['Class']&$_POST['Number']&$_POST['Name'])) {
        $comment = "누락된 정보가 있습니다. 확인해 주세요.";
      }
      else {
        $sql = "SELECT * FROM ". $month."월 WHERE Grade='$Grade' AND Class='$Class' AND Number='$Number' AND Name='$Name';";
        $result = mysqli_query($link, $sql) or die ("Error:".mysqli_error($link));

        $record_sql = "UPDATE ".$month."월 SET ".$day."일 = '출석' WHERE Grade='$Grade' AND Class='$Class' AND Number='$Number' AND Name='$Name';";
        $record_result=mysqli_query($link, $record_sql) or die ("Error:".mysqli_error($link));
        if ($result=1) {
          $comment = "관리자 권한으로 입실 처리되었습니다.";
          $query = $Grade. "학년 ". $Class. "반 ". $Number. "번 ". $Name;
        }
      }
    }
    else {
      $comment = "권한이 올바르지 않습니다.";
    }
    ?>
    <h2 id="Student_ID">
      <?=$query?>
      <div id="query">
      <?=$comment?>
      <?=$result?>
      <div>
  </body>
</html>
