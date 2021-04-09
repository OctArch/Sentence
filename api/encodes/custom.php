<?php
$custom=$_GET['custom'];
$outpuit=$custom;
if(empty($custom))
{
    $outpuit='{ "id":"[uid]", "author":"[author]", "from":"[creator]", "text":"[text]" }';
}
while($row = mysqli_fetch_array($result))
  {
      $outpuit=str_replace('[author]',$row['author'],$outpuit);
      $outpuit=str_replace('[uid]',$row['id'],$outpuit);
      $outpuit=str_replace('[creator]',$row['creator'],$outpuit);
      $outpuit=str_replace('[text]',$row['text'],$outpuit);
      echo ($outpuit);

  }
?>