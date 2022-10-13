<?php
    session_start();

    // 한글 꺠짐 방지를 위한 utf-8 인코딩
    header('Content-Type: text/html; charset=utf-8');

    $db = new mysqli("localhost:3306","root","asdf.3887.","bbs");
    $db->set_charset("utf8");

    function query($query)
    {
        global $db;
        return $db->query($query);
    }
?>