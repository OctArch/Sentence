<?php
while($row = mysqli_fetch_array($result))
  {
      
      echo ($row['froma'].'曰:'.$row['text']);

  }
?>