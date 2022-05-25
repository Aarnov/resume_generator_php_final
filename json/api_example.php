<?php
$url='https://corona.askbhunte.com/api/v1/data/nepal';
$data =file_get_contents($url);
$characters=json_decode($data);
print_r($characters);
echo"<br>"."Total positive cases for today". "</br>";
echo($characters->tested_positive);
echo"<br>"."Total negative cases for today". "</br>";
echo($characters->tested_negative);
echo"<br>"."Link= ". "</br>";
echo($characters->latest_sit_report->url);
?>

<html>
<body>

<a href="<?php echo($characters->latest_sit_report->url);?>" >Click </a>

</body>
</html>
