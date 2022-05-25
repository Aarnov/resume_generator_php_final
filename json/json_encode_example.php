<?php
// An associative array
$marks=array("Peter"=>65,"Harry"=>80,"John"=>78,"Clark"=>90);
echo json_encode($marks)."<br>";
echo json_encode($marks['Peter'])."<br>";
// An indexed array
$colors=array("Red","Green","Blue","Orange","Yellow");
echo json_encode($colors);
?>