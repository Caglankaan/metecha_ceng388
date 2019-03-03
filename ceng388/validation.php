<?php

    session_start();
    header('location:login.php');
    $con = mysqli_connect('127.0.0.1','root','616216','ceng388');


    $username = $_POST['username'];
    $pass = $_POST['password'];
    $hashedPassword = sha1($pass);


    $s = " select * from usertable where username = '$username' && password='$hashedPassword'";


    $result = mysqli_query($con, $s);


    $num = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)) {
        $image= $row['image'];
        $name = $row['name'];
        $surname = $row['surname'];
    }
    //echo mysql_reslt($result,0);
    if($num == 1){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $hashedPassword;
        $_SESSION['image']= $image;
        $_SESSION['name']= $name; 
        $_SESSION['surname']= $surname;
        $_SESSION['sessionTimeOut'] = time() + 1200;
        header('location:home.php');
        
    }
    else{
        header('location:accountInfo.php');
    
    }


    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
    
        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }
?>