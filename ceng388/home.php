<?php
    session_start();

    if(time() > $_SESSION['sessionTimeOut']){
        session_destroy();
    }
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
    $con = mysqli_connect('127.0.0.1','root','616216','ceng388') or die ("Bad Connect: ".mysqli_connect_error());

    $currUserName = $_SESSION['username'];
    $result= mysqli_query($con,"SELECT * FROM posts where username = '$currUserName'");

    function postDelete($postid){ 
        require_once('deletepost.php');
        deletePost($postid);
    }

    if(isset($_POST['deletePostButton'])){
        
        postDelete($_POST['deletePostButton']);
    }

    ?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Home Page</title>
</head>
<body>
    <a href="logout.php"> LOGOUT </a>
    <a href="accountInfo.php"> account info </a>
    <a href="newpost.html"> new post </a>
    <h1>Welcome <?php echo $_SESSION['username'];echo $_SESSION['password'] ?></h1> 
    <?php echo "<table border='1'>
    <tr>
    <th>Post</th>
    <th>Username</th>
    <th>Date</th>
    <th>Postid</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
        {  
            echo "<tr>";
            echo "<td>" . $row['text'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['postId'] . "</td>";
            $postid = $row['postId'];
        
        echo "<td><form action='' method='post'>
        <input type='submit' name='deletePostButton' value=$postid placeholder='delete'>
        </form></td>";
        echo "</tr>";
        }
        echo "</table>";
    ?>
<?php
    

    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
    
        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    } ?>
</body>
</html>