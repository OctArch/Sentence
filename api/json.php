<?php
while($row = mysqli_fetch_array($result))
  {
      
      echo ('{
	"id":"'.$row['id'].'",
	"author":"'.$row['author'].'",
	"speaker":"'.$row['speaker'].'",
	"text":"'.$row['text'].'"
}');

  }
?>