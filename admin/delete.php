<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/Project/style.css?ver=1.1.3.4"/>
  <head>
    <meta charset="utf-8">
    <title>List Management</title>
  </head>
  <body>
    <?php
    $link=mysqli_connect("localhost", "root", "4thMemorize", "GW");
    mysqli_set_charset($link, "utf8");

    date_default_timezone_set("Asia/Seoul");
    $month= date("n");
    $day = date("j");

    $Grade = $_POST['Grade'];
    $Class = $_POST['Class'];
    $Number = $_POST['Number'];
    $Name = $_POST['Name'];

    if ($_POST['Password']=='GW123') {
      if (!($_POST['Grade']&$_POST['Class']&$_POST['Number']&$_POST['Name'])) {
        $comment = "누락된 정보가 있습니다. 확인해 주세요.";
      }
      else {
        $sql = "SELECT ID FROM Identify WHERE Grade='$Grade' AND Class='$Class' AND Number='$Number' AND Name='$Name';";
        $result = mysqli_query($link, $sql) or die ("Error:".mysqli_error($link));
        $Inform = mysqli_fetch_array($result);
        $ID = $Inform['ID'];

        if ($ID) {
          $record_sql = "DELETE FROM Identify WHERE Grade='$Grade' AND Class='$Class' AND Number='$Number' AND Name='$Name';";
          $record_result=mysqli_query($link, $record_sql) or die ("Error:".mysqli_error($link));
          $delete_sql = "UPDATE ".$month."월 SET ".$day."일 = '삭제됨' WHERE Grade='$Grade' AND Class='$Class' AND Number='$Number' AND Name='$Name';";
          $result_delete = mysqli_query($link, $delete_sql) or die ("Error:".mysqli_error($link));

          if ($result&$result_delete=1) {
            $comment = "관리자 권한으로 명단에서 삭제되었습니다.";
            $query = $Grade. "학년 ". $Class. "반 ". $Number. "번 ". $Name;
          }
        }
        else {
          $comment = "등록된 정보와 일치하지 않습니다.";
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
        <div id="red">
        <?=$comment?>
    </div>
      <div>
  </body>
</html>
