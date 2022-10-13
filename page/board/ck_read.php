<?php
    include $_SERVER['DOCUMENT_ROOT']."/BBS/db.php";
?>
<link rel="stylesheet" href="/BBS/css/jquery-ui.css">
<script Type="text/javascript" src="/BBS/js/jquery-3.2.1.min.js"></script>    
<script Type="text/javascript" src="/BBS/js/jquery-ui.js"></script>    
<script Type="text/javascript">
    $(function(){
        $("#writepass").dialog({
            modal:true,
            title:'비밀글입니다.',
            width:400,
            close: function(event,ui){   /* close 눌러서 인덱스로 이동하게하는 기능 */
                location.href='/BBS/index.php';
            }
        });
    });
</script>
<?php

$bno = $_GET['idx'];
$sql = query("select * from board where idx='".$bno."'");
$board = $sql->fetch_array();

?>
<div id="writepass">
    <form action="" method="post">
        <p>비밀번호<input Type="password" name="pw_chk" /> <input Type="submit" value="확인" /></p>
    </form>
</div>
    <?php
    $bpw = $board['pw'];

    if(isset($_POST['pw_chk']))
    {
        $pwk = $_POST['pw_chk'];
        if(password_verify($pwk,$bpw))
        {
            $pwk == $bpw;
        ?>
            <script type="text/javascript">location.replace("read.php?idx=<?php echo $board["idx"]; ?>");</script>    
        <?php    
        }else{ ?>
            <script Type="text/javascript">alert('비밀번호가 틀립니다.');</script>
        <?php } } ?>