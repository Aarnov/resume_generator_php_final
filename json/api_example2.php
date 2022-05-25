<?php
$url = 'https://data.askbhunte.com/api/v1/covid/timeline';
$data = file_get_contents($url);
$characters = json_decode($data);
//print_r($characters);

?>
<html>
<table border="1"  class="table table-dark">
    <tr>
        <th>Date</th>
        <th>Total Cases</th>
        <th>New Cases</th>
        <th>Total Recovered</th>
        <th>New Recovered</th>
        <th>Total Death</th>
        <th>New Death</th>
    </tr>
    <tr>
        <?php foreach($characters as $character){?>
        <tr>
        <td><?php echo $character->date ?> </td>
        <td><?php echo $character->totalCases ?> </td>
        <td><?php echo $character->newCases ?> </td>
        <td><?php echo $character->totalRecoveries ?> </td>
        <td><?php echo $character->newRecoveries ?></td>
        <td><?php echo $character->totalDeaths ?> </td>
        <td><?php echo $character->newDeaths ?> </td>
    </tr>
    <?php }?>
</table>
</html>
