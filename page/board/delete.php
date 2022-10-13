<?php
    include $_SERVER['DOCUMENT_ROOT']."/BBS/db.php";

    $bno = $_GET['idx'];
    $sql = query("delete from board where idx='$bno';");
?>
<script Type="text/javascript">alert("삭제되었습니다.");</script>    
<meta http-equiv="refresh" content="0 url=/BBS/index.php">