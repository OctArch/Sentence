<?php
while($row = mysqli_fetch_array($result))
  {
      
      echo ($row['author'].'曰:'.$row['text']);

  }
?>