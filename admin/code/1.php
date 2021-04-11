<?php
$author=$_POST['author'];
$text=$_POST['text'];
$creator=$_POST['creator'];

$textsql = $dbprefix.'sentence';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "INSERT INTO ".$textsql." (creator,author,text)
VALUES (\"".$creator."\", \"".$author."\", \"".$text."\")";
 
if (mysqli_query($con, $sql)) {
    header('Location: ./insert.php?complete=1');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);


?>