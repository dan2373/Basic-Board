<?php

include $_SERVER['DOCUMENT_ROOT']."/BBS/db.php";

// 각 변수에 write.php에서 input name 값들을 지정한다
// $username = $_POST['name'];
// $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
// $title = $_POST['title'];
// $content = $_POST['content'];
$date = date('Y-m-d');
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

if(isset($_POST['lockpost'])) {
    $lo_post = '1';
}else {
    $lo_post = '0';
}

$tmpfile = $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("utf-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "../../upload".$filename;
move_uploaded_file($tmpfile,$folder);

$mqq = query("alter table board auto_increment =1"); //auto_increment 값 초기화

$sql= query("insert into board(name,pw,title,content,date,lock_post,file) values('".$_POST['name']."','".$userpw."','".$_POST['title']."','".$_POST['content']."','".$date."','".$lo_post."','".$o_name."')");
echo "<script>alert('글쓰기가 완료되었습니다.');</script>";
?>

<meta http-equiv="refresh" content="0 url=/BBS/index.php">