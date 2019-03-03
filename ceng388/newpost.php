<?php

    session_start();
    if(time() > $_SESSION['sessionTimeOut']){
        session_destroy();
    }
    header('location:home.php');
    //$users = mysqli_connect('localhost','root','616216');
    $posts = mysqli_connect('127.0.0.1','root','616216','ceng388');

    $text = $_POST['text'];
    $postsUserName = $_SESSION['username'];
    
    mysqli_query($posts,"select * from posts");
    
    $now = date("Y-m-d H:i:s");
    $postid = md5($postsUserName.$now);

    $reg = " insert into posts(text, username, date, postid) values ('$text', '$postsUserName' , '$now', '$postid')";
    mysqli_query($posts, $reg);


?>