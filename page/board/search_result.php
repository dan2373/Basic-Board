<?php
    include $_SERVER['DOCUMENT_ROOT']."/BBS/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" href="/BBS/css/style.css" type=text/css>
</head>
<body>
    <div id="board_area">
        <!-- 검색 추가 -->
        <?php

            /* 검색 변수 */
            $category = $_GET['catgo'];
            $search_con = $_GET['search'];
        ?>
        <h1><?php echo $category; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>    
        <h4 style="margin-top:30px;"><a href="/BBS/index.php">홈으로</a></h4>
            <table class="list-table">
                <thead>
                    <tr>
                        <th width="70">번호</th>
                        <th width="500">제목</th>
                        <th width="120">글쓴이</th>
                        <th width="100">작성일</th>
                        <th width="100">조회수</th>
                    </tr>
                </thead>
                <?php
                    $sql2 = query("select * from board where $category like '%$search_con%' order by idx desc");
                    while($board = $sql2->fetch_array()){
                        $title=$board["title"];
                        if(strlen($title)>30)
                            {
                                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8"),"...",$board["tltle"]);
                            }
                        $sql3 = query("select * from reply where con_num='".$board['idx']."'");
                        $rep_count = mysqli_num_rows($sql3);
                ?>
                <tbody>
                    <tr>
                        <td width="70"><?php echo $board['idx']; ?></td>
                        <td width="500">
                            <?php
                                $lockimg = "<img src='/BBS/img/lock.png' alt='lock' title='lock' with='20' height='20'>";
                                if($board['lock_post']=="1")
                                    {
                                        ?><a href="/BBS/page/board/ck_read.php?idx=<?php echo $board['idx']; ?>"><?php echo $title, $lockimg;
                                    }else{?>
                                    
                                <!-- 추가부분 -->
                                <?php
                                    $boardtime = $board['date']; 
                                    $timenow = date("Y-m-d");

                                    if($boardtime==$timenow){
                                        $img = "<img src='/BBS/img/new.png' alt='new' title='new'>";
                                    }else{
                                        $img="";
                                    }
                                ?>
                                <!-- 추가부분 -->
                                <a href="/BBS/page/board/read.php?idx=<?php echo $board['idx']; ?>"><span style="background:yellow;"><?php echo $title; }?></span><span class="re_ct">[<?php echo $rep_count;?>]<?php echo $img; ?></span></a>
                        </td>
                        <td width="120"><?php echo $board['name']?></td>
                        <td width="100"><?php echo $board['date']?></td>
                        <td width="100"><?php echo $board['hit']?></td>
                    </tr>
                </tbody> 
                          
                <?php } ?>
            </table>
            <!-- 검색 추가 -->
            <div id="search_box2">
                <form action="/BBS/page/board/search_result.php" method="get">
                    <select name="catego">
                        <option value="title">제목</option>
                        <option value="name">글쓴이</option>
                        <option value="content">내용</option>
                    </select>
                    <input type="text" next="search" size="40" required="required">
                    <button>검색</button>
                </form>
            </div>
    </div>
</body>
</html>    