<?php
$code =$_POST['code'];
$passwd =$_POST['passwd'];
$newpasswd = $_POST['newpasswd'];

include '../config/database.php';

$usersql = $dbprefix.'user';

$con = mysqli_connect($dbhost, $dbuser, $dbpasswd, $dbname);
if (!$con) {
    die("连接失败:$dbpasswd " . mysqli_connect_error());
    echo $dbpasswd;
}
$sql = "SELECT * FROM ".$usersql;
$result = mysqli_query($con, $sql);
 
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if($row["passwd"]==sha1($passwd))
        {
            mysqli_close($con);
            $url = './code/'.$code . '.php';
            include $url;
        }
        else {mysqli_close($con); echo 'Access denied';echo '<meta http-equiv="refresh" content = "1;url=./">';}
    }
}
 



?>