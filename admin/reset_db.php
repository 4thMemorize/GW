<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/style.css?ver=1.1.3.4"/>
  <head>
    <meta charset="utf-8">
    <title>Reset Database</title>
    <h1>Reset Database</h1>
  </head>
  <body>
    <?php
    $link=mysqli_connect("localhost", "root", "4thMemorize", "GW");
    mysqli_set_charset($link, "utf8");

    if ($_POST['Password']=GW123) {
      $sql = "TRUNCATE Identify;";
      $result = mysqli_query($link, $sql) or die ("Error:".mysqli_error($link));

    }
    $file = fopen("/log/record.conf", "w+");
    $text = fgets($file);
    fclose($file);




     ?>

  </body>
  <?=$file?>
</html>
