<?php
    session_start();
    
    $con = mysqli_connect('127.0.0.1','root','616216','ceng388');


    $username = $_SESSION['username'];
    $oldpass = $_POST['oldpassword'];
    $newpass = $_POST['newpassword'];
    $confirmpass = $_POST['confirmpassword'];
    $hashedPassword = sha1($newpass);
    $s = " select * from usertable where name = '$username'";


    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    
    $sql = "UPDATE usertable SET password='$hashedPassword' WHERE username='$username'";
    if(strcmp($newpass,$confirmpass)==0){
        if(strcmp(sha1($oldpass),$_SESSION['password'])==0){
            if(mysqli_query($con,$sql)){
                debug_to_console("PW Changed");
                header('location:login.php');}
            }
        else{
            echo 'snackbar({content: "Your download link has been sent, thanks!", timeout: 10000})';
            debug_to_console("Old password is incorrect");
            //header('location:home.php');
        }
    }
    else{
        debug_to_console("new password and confirm password are not same!");
        header('location:newpost.php');
    }


    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
    
        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }
?>