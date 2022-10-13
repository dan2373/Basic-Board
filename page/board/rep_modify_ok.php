<?php
    include $_SERVER['DOCUMENT_ROOT']."/BBS/db.php";
    $rno = $_POST['rno']; //댓글번호
    $sql = query("select * from reply where idx='".$rno."'"); //reply 테이블에서 idx 가 rno 변수에 저장된 값을 찾음
    $reply = $sql->fetch_array();

    $bno = $_POST['b_no']; //게시글 번호
    $sql2 = query("select * from board where idx='".$bno."'"); //board 테이블에서 id가 bno 변수에 저장된 값을 찾음
    $board = $sql2->fetch_array();

    $input_pw = $_POWT['pw'];
    $db_pw = $reply['pw'];

    if (password_verify($input_pw, $db_pw)) {
        $sql3 = query("UPDATE reply SET content='".$_POST['content']."'WHERE idx = '".$rno."'"); ?>
        <script type="text/javascript">alert('수정되었습니다.');
        location.replace("/BBS/read.php?idx=<?php echo $bno; ?>");
        </script>
        <?php
        }else{ ?>
            <script type="text/javascript">alert('비밀번호가 틀립니다.');
            history.back();
            </script>
        <?php } ?>
