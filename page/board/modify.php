<!-- 게시글 수정 -->
<?php
    include $_SERVER['DOCUMENT_ROOT']."/BBS/db.php";

    $bno = $_GET['idx'];
    $sql = query("select * from board where idx='$bno';");
    $board = $sql->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/BBS/css/style.css" type="text/css">
    <title>게시판</title>
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
        <div id="wirte_area">
        <form action="modify_ok.php?idx=<?php echo $bno; ?>" method="post">
            <div id="in_title">
                <textarea name="title" id="utitle" cols="55" rows="1" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
            </div>
            <div class="wi_line"></div>
            <div id="in_name">
                <textarea name="name" id="uname" cols="55" rows="1" placeholder="글쓴이" maxlength="100" required><?php echo $board['name']; ?></textarea>
            </div>
            <div class="wi_line"></div>
            <div id="in_content">
                <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
            </div>
            <div id="in_pw">
                <input type="password" name="pw" id="upw" placeholder="비밀번호" required>
            </div>
            <div class="bt_se">
                <button type="submit">글 작성</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>