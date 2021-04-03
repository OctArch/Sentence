<?php
while($row = mysqli_fetch_array($result))
  {
      
      echo (
      'function AMessage() {document.write("'.$row['author'].'曰:'.$row['text'].'");}');

  }
?>