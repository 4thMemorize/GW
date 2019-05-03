<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/Project/style.css?ver=1.1.3.4"/>
  <head>
    <meta charset="utf-8">
    <title>Reset Database</title>
    <h1>Reset Databse</h1>
  </head>
  <body>
    <?php
    $link=mysqli_connect("localhost", "root", "4thMemorize", "GW");
    mysqli_set_charset($link, "utf8");

    $file = fopen(__DIR__.'/../log/record.conf', "r");
    $text = fread($file, 1000);
    fclose($file);

    $record = explode("/", $text);
    $array = count($record)-1;

    if ($_POST['Password']=GW123) {
      $sql = "TRUNCATE Identify;";
      $result = mysqli_query($link, $sql) or die ("Error:".mysqli_error($link));

      for ($i=0; $i < $array; $i++) {
        $reset_sql = "DROP TABLE ". chop($record[$i])."월;";
        $reset_result = mysqli_query($link, $reset_sql) or die ("Error:".mysqli_error($link));
      }
    }

    if ($result&$reset_result=1) {
      echo "<h2 id = 'red'>";
      for ($i=0; $i < $array ; $i++) {
        echo $record[$i]." ";
      }
      echo "월 출석기록과 학생 명단을 전부 초기화했습니다.</h2>";
    }


     ?>

  </body>
</html>
