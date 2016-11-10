<?php include ( "header.inc.php" );
?>
<style>
table#t1 {
    border-collapse: collapse;
	 border: 1px solid black;
}

table#t1, th#t1, td#t1 {
	padding:20px;
	border: 1px solid black;
border-collapse: collapse;
  
	
}
tr:nth-child(even) {background-color: #000080;}
th {
    background-color: #4CAF50;
    color: white;
	font-size:22px;
}
</style>
<div id="home">
<table width="80%" border="0">
<tr>
<td width="15%" valign="top">
<div class="homeleft">
				<table>
<th>Add to Calander</th>
</table>
</div>

</td>
<td width="85%" valign="top">
<div class="homeright">
<br>

<div class="events" style="overflow-x:auto";>
<table id= "t1">
<tr>
<th width="10%" id= "t1">
NAME
</th>
<th width="10%" id= "t1">
DATE
</th>

<th width="10%" id= "t1">
START TIME
</th>
<th width="10%" id= "t1">
END TIME
</th>

<th width="10%" id= "t1">
VENUE
</th>
<th width="35%" id= "t1">
DESCRIPTION
</th>
<th width="10%" id= "t1">ADD TO CALENDAR</th>
</tr>

<?php
echo "\n\n";
$f = fopen("thefinal.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        echo '<tr>';
        foreach ($line as $cell) {
                echo '<td width="16%" id= "t1" style="font-size:14px">'. '' . htmlspecialchars($cell) . '</td>';
        }
	echo '<<td width="16%" id= "t1" style="font-size:14px">Add </td>';
        echo "</tr>\n";
}
fclose($f);
echo "\n";?>

</div><br><br>



</td>
</tr>
</table>
</div>

<?php include("footer.inc.php"); ?>
