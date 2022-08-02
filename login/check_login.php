<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>
   <?php
   session_start();
   $host = 'localhost';
   $user = 'chipkkang9';
   $pw = 'park02!ajou';
   $db_name = 'chipkkang9';
      $mysqli = new mysqli($host, $user, $pw, $db_name); //db 연결
      
      //login.php에서 입력받은 id, password
      $userid = $_POST['id'];
      $userpw = $_POST['pw'];
      
      $q = "SELECT * FROM user WHERE id = '$userid' AND pw = '$userpw'";
      $result = $mysqli->query($q);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      
      //결과가 존재하면 세션 생성
      if ($row != null) {
         $_SESSION['userID'] = $row['id'];
         $_SESSION['userName'] = $row['username'];
         echo "<script>alert('Welcome!')</script>";
         echo "<script>location.replace('/login/login_suc.php');</script>";
         exit;
      }
      
      //결과가 존재하지 않으면 로그인 실패
      if($row == null){
         echo "<script>alert('Invalid username or password')</script>";
         echo "<script>location.replace('/login.php');</script>";
         exit;
      }
      ?>
   </body>