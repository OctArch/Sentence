<?php
while($row = mysqli_fetch_array($result))
  {
      
      echo ('{
	"id":"'.$row['id'].'",
	"author":"'.$row['author'].'",
	"from":"'.$row['froma'].'",
	"text":"'.$row['text'].'"
}');

  }
?>