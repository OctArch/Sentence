<?php
include '../config/database.php';
$textsql = $dbprefix.'sentence';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "SELECT * FROM ".$textsql;
 /*
if (mysqli_query($con, $sql)) {
    echo "删除成功";
        echo '<meta http-equiv="refresh" content = "2;url=./delete.php">';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}*/

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo ('<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['speaker'].'</td>
        <td>'.$row['text'].'</td>
        <td>'.$row['author'].'</td>
      </tr>');
    }
} else 
{
    echo "";
}


mysqli_close($con);


?>