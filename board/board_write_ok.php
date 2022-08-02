<?php

$conn = mysqli_connect(
    'localhost',
    'chipkkang9',
    'park02!ajou',
    'chipkkang9');

$username = $_POST['name'];
$userpw = $_POST['pw'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($username && $userpw && $title && $content){
    $sql = "INSERT INTO board(name, pw, title, content, date) values('$username', '$userpw', '$title', '$content', '$date')";
    $result = mysqli_query($conn, $sql);
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='/board/board.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>