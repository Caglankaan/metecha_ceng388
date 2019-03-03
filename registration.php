<?php

    session_start();
    header('location:login.php');
    $con = mysqli_connect('127.0.0.1','root','616216','ceng388');

    

    $username = $_POST['username'];
    $pass = $_POST['password'];
    $hashedPassword = sha1($pass);
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    $s = " select * from usertable where username = '$username'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if (preg_match('/[^\x00-\x7F]/',$username)) {

    }
    else{
        if(strlen($username)<16 && strlen($username)>4){
            if(strlen($pass)<21 && strlen($pass)>5){
                if($num == 1){
                    debug_to_console("username already taken!");
                }
                else{
                    $reg = " insert into usertable(username, password, image, name, surname) values ('$username', '$hashedPassword', 'default.jpeg', '$name', '$surname')";
                    mysqli_query($con, $reg);
                    echo" Registration successfull";              
                }
            }
            else{
                debug_to_console("username length must be between 5 and 15 !");
            }
        }
        else{
            debug_to_console("password length must be between 6 and 20 !");
        }
    }  

    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
    
        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }
?>