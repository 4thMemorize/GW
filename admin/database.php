<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/Project/style.css?ver=1.1.3.5"/>
  <head>
    <meta charset="utf-8">
    <title>DB Management Page</title>
    <h1>DB Management Page</h1>
  </head>
  <body>
    <h2>통합 관리</h2>
    <ol>
      <input id="link_button_pma" type="button" value="PhpMyAdmin" onclick="location.href='/phpmyadmin'">
    </ol>

    <h2>개별 관리</h2>
    <ol>
      <input id="link_button_pma" type="button" value="학생정보 삭제" onclick="location.href='./list_management.php'">
    </ol>
    <ol>
      <input id="link_button_pma" type="button" value="학생정보 수정" onclick="location.href='./list_modify.php'">
    </ol>
    <ol>
      <input type="button" value="DB 초기화" onclick="location.href='./reset.php'">
    </ol>





  </body>
</html>
