<?php
$username =$_POST['username'];
$passwd =$_POST['passwd'];

include '../config/database.php';

$usersql = $dbprefix.'user';

$con = mysqli_connect($dbhost, $dbuser, $dbpasswd, $dbname);
if (!$con) {
    die("连接失败:$dbpasswd " . mysqli_connect_error());
    echo $dbpasswd;
}
$sql = "SELECT * FROM `".$usersql.'` WHERE `username` LIKE ('.$username.')';
$sql = "SELECT * FROM `".$usersql."` WHERE `username` LIKE ('".$username."')";

$result = mysqli_query($con, $sql);
 
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if($row["passwd"]==sha1($passwd))
        {
            mysqli_close($con);
                session_start();
                $_SESSION["login"] = true;
                header('Location: ./?code=1');
        }
        else {mysqli_close($con); header('Location: ../login.php?code=1');}
    }
}
else echo $sql ;// header('Location: ../login.php?code=1');
 



?>