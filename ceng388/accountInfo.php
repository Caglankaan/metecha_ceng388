<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
    if(time() > $_SESSION['sessionTimeOut']){
        session_destroy();
    }
    $username = $_SESSION['username'];
    $profilephoto=$_SESSION['image'];
    
    if(isset($_POST['submit'])){
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["file"]["tmp_name"],"pictures/".$newfilename);
        $con = mysqli_connect('127.0.0.1','root','616216','ceng388');
        $oldPhoto = $_SESSION['image'];
        if($oldPhoto != "default.jpeg"){
            unlink('pictures/'.$oldPhoto);
        }

        $_SESSION['image'] = $newfilename;
        $sql = "UPDATE usertable SET image = '".$_SESSION['image']."' WHERE username='$username'";
        mysqli_query($con,$sql);
        header("Refresh:0");
    }

    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
    
        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }
?>

<body>
<div class="container">
    <div class="row">
    <div class="col-md-6">
    <a href="logout.php"> LOGOUT </a>
        <h2> Username : <?php echo $_SESSION['username']; ?>  </h2>
        <h2> Name : <?php echo $_SESSION['name']; ?>  </h2>
        <h2> Surname : <?php echo $_SESSION['surname']; ?>  </h2>
        <h2> Picture : <?php 
            echo "<img width='100' height= '100' src=pictures/".$profilephoto." alt='Profile Pic'>"; 
         ?> </h2>
        <form action="changepassword.php" method="post">
            <div class= "form-group">
                <label> Old password </label>
                <input type="password" name="oldpassword" class="form-control" required>
                </div>
            <div class= "form-group">
                <label> New Password </label>
                <input type="password" name="newpassword" class="form-control" required>
                </div>
            <div class= "form-group">
                <label> Confirm New Password </label>
                <input type="password" name="confirmpassword" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary"> Change Password </button>
            </form>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" name="submit">
</form>
<form action="changefullname.php" method="post">
            <div class= "form-group">
                <label> Name </label>
                <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"class="form-control" required>
                </div>
            <div class= "form-group">
                <label> Surname </label>
                <input type="text" name="surname" value="<?php echo $_SESSION['surname']; ?>" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary"> Change Name - Surname </button>
            </form>
        

            </div>

            </div>

            </div>
</body>
        