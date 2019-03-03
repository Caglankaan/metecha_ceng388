<?php

session_start();
header('location:home.php');

function deletePost($postid){ 
    $con = mysqli_connect('127.0.0.1','root','616216','ceng388');
    $result = mysqli_query($con,"DELETE FROM posts WHERE postId = '$postid'") or die ("Error delete: ".mysqli_query_error());
    if($result){
        debug_to_console("deleted");
    }
    else{
        debug_to_console("not deleted");
    }
    header('location:home.php');    
}
?>