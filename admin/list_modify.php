<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/Project/style.css?ver=1.3.3.5"/>
    <title></title>
  </head>
  <body>
    <?php
    if (isset($_POST['Query'])) {

      echo "<h1>List Modify Page</h1>
      <h2>정보를 수정할 학생을 골라주세요.</h2>";

      $link=mysqli_connect("localhost", "root", "4thMemorize", "GW");
      mysqli_set_charset($link, "utf8");

      $name = $_POST['Name'];

      $Student_Inform = [];

      $sql="SELECT * FROM Identify WHERE Name='$name'";
      $result=mysqli_query($link, $sql) or die ("Error: " .mysqli_error($link));

      $i = 0;
      while ($row = mysqli_fetch_row($result)) {
        $Student_Inform[$i] = array(
          'ID' => $row[0],
          'Serial' => $row[1],
          'Grade' => $row[2],
          'Class' => $row[3],
          'Number' => $row[4],
          'Name' => $row[5]
        );
          $i++;
      }

      echo "<table>
        <thead>
          <tr>
            <th></th>
            <th>학년</th>
            <th>반</th>
            <th>번호</th>
            <th>이름</th>
            <th></th>
          </tr>
          </thead>
          <tbody>";

      $index = array('ID', "Serial", "Grade", "Class", "Number", "Name");

      for ($i=0; $i < count($Student_Inform); $i++) {
        echo "<tr> <th>";
        echo $i. "</th> <td>";
        echo $Student_Inform[$i]['Grade'], "</td> <td>";
        echo $Student_Inform[$i]['Class'], "</td> <td>";
        echo $Student_Inform[$i]['Number'], "</td> <td>";
        echo $Student_Inform[$i]['Name'], "</td> <td>";
        echo "<form action=\"list_modify.php\" method=\"post\">";
        for ($j=0; $j < count($index) ; $j++) {
          echo "<input type=\"hidden\" name=\"". $index[$j]. "\" value=\"";
          echo $Student_Inform[$i][$index[$j]]. "\">";
        }
        echo "<button type=\"submit\" name=\"button\">수정</button> </td> </form> </tr>";
      }
      echo "</thead>
      <tbody>";
    }
    if (isset($_POST['ID'])) {
      $ID = $_POST['ID'];
      $Serial = $_POST['Serial'];
      $Grade = $_POST['Grade'];
      $Class = $_POST['Class'];
      $Number = $_POST['Number'];
      $Name = $_POST['Name'];

      echo "<h1>List Modify Page</h1>
      <h2>". $Grade. "학년 ". $Class. "반 ". $Number. "번 ". $Name. "학생의 정보를 수정합니다.</h2>";
      echo "아래의 정보로 수정하기";
      echo file_get_contents("./list_modify_input.html");

      $index = array('ID', "Serial", "Grade", "Class", "Number", "Name");
      for ($j=0; $j < count($index) ; $j++) {
        echo "<input type=\"hidden\" name=\"". $index[$j]. "\" value=\"";
        echo $_POST[$index[$j]]. "\">";
      }
      echo "  <input type=\"text\" name=\"New_Name\" value=\"\" placeholder=\"이름\"> <br>
      <input type=\"text\" id=\"pw\" name=\"Password\" value=\"\" placeholder=\"교사용 인증번호\">
      <button type=\"submit\" name=\"button\">확인</button>";
    }

    if(!(isset($_POST['Query']) | isset($_POST['ID']))) {
      echo file_get_contents("./list_modify.html");
    }

     ?>

  </body>
</html>
