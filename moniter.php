<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css?ver=1.0.0.2"/>
  <head>
    <meta content="text/html" charset="utf-8">
    <title>Moniter</title>
  </head>
  <body>
    <?php
    $Serial = "$_GET[Serial]";

    date_default_timezone_set("Asia/Seoul");
    $month= date("n");
    $day = date("j");
    $hour = date("H");
    $min = date("i");
    $timestamp = date("H:i:s");

    $link=mysqli_connect("localhost", "root", "4thMemorize", "GW");
    mysqli_set_charset($link, "utf8");


      $sql="SELECT * FROM Identify WHERE Serial='$Serial'";
      $result=mysqli_query($link, $sql) or die ("Error: " .mysqli_error($link));

      $Inform = mysqli_fetch_array($result);
      $ID = $Inform['ID'];
      $Student_Inform =array(
        '1' => $Inform['Grade'],
        '2' => $Inform['Class'],
        '3' => $Inform['Number'],
        '4' => $Inform['Name']
      );

      if(!(isset($ID))) {
        $comment = "카드 고유번호와 일치하는 정보가 없습니다.";
      }

      else {

        if ($hour>=8 & $min>1) {
          $query = "지각 처리되었습니다.";
          $log_txt = $timestamp."     ". $Student_Inform['1']."학년 ". $Student_Inform['2']."반 ". $Student_Inform['3']."번 ". $Student_Inform['4']. "   ". "불출석 처리 (사유 : 지각)";
        }
        else {
          $query = '입실 처리되었습니다.';
          $record_sql = "UPDATE ".$month."월 SET ".$day."일 = '출석' WHERE ID='$ID';";
          $record_result=mysqli_query($link, $record_sql) or die ("Error:".mysqli_error($link));

          $log_txt = $timestamp."     ". $Student_Inform['1']."학년 ". $Student_Inform['2']."반 ". $Student_Inform['3']."번 ". $Student_Inform['4']."   ". "입실 처리";
          
        }
	$comment = $Student_Inform['1']."학년".$Student_Inform['2']."반".$Student_Inform['3']."번".$Student_Inform['4'];

        $log_file = fopen($log_dir."/var/www/html/log/php.log", "a");
        fwrite($log_file, $log_txt."\r\n");
        fclose($log_file);
      }

    ?>
    <h2 id = 'Student_ID'>
      <?=$comment?>
      <div id='query'>
        <?=$query?>
      </div>
    </h2>

    <p id='timestamp'>Recorded at
      <?php
        echo date("H:i:s");
      ?>
    </p>
  </body>
</html>
