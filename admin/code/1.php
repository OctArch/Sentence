<?php
$author=$_POST['author'];
$text=$_POST['text'];
$creator=$_POST['creator'];

$textsql = $dbprefix.'sentence';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "INSERT INTO ".$textsql." (creator,author,text)
VALUES (\"".$creator."\", \"".$author."\", \"".$text."\")";
 
if (mysqli_query($con, $sql)) {
    echo "添加成功";
        echo '<meta http-equiv="refresh" content = "2;url=./insert.php">';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);


?>