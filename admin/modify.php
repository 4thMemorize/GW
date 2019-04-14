<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/Project/style.css?ver=1.3.3.5"/>
    <title>ListModify</title>
  </head>
  <body>
    <h1>List Modify Page</h1>
    <?php
    $link=mysqli_connect("localhost", "root", "4thMemorize", "GW");
    mysqli_set_charset($link, "utf8");

    if ($_POST['Password']='GW123') {
      $Serial = $_POST['Serial'];
      $Grade = $_POST['Grade'];
      $Class = $_POST['Class'];
      $Number = $_POST['Number'];
      $Name = $_POST['Name'];
      $New_Grade = $_POST['New_Grade'];
      $New_Class = $_POST['New_Class'];
      $New_Number = $_POST['New_Number'];
      $New_Name = $_POST['New_Name'];

      $sql = "UPDATE Identify SET Grade='". $New_Grade. "', Class='". $New_Class. "', Number='". $New_Number. "', Name='". $New_Name. "' WHERE Serial='". $Serial. "';";
      $result = mysqli_query($link, $sql) or die ("Error:".mysqli_error($link));

      if ($result=1) {
        echo "<h2>";
        echo $Grade. "학년 ". $Class. "반 ". $Number. "번 ". $Name. "학생의 정보를 <br>";
        echo $New_Grade. "학년 ". $New_Class. "반 ". $New_Number. "번 ". $New_Name. "(으)로 수정했습니다. </h2>";
      }
    }
    else {
      echo "인증번호가 일치하지 않습니다.";
    }

     ?>

  </body>
</html>
