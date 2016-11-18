<?php include ( "header.inc.php" );
$add = @$_POST['add'];
$nm="";
$nm=strip_tags(@$_POST['id']);
//header("Location: d.php");
if ($add) { 
	
	$sql1 = mysql_query("SELECT * FROM events WHERE id=".$nm."");
	$count = mysql_num_rows($sql1); //Count the number of rows returned
	$myfile = fopen("testfile.txt", "w");
	while ($count) {echo $nm;$count-=1;
		while($row = mysql_fetch_array($sql1)){ 
		fwrite($myfile, $row["name"]."\n".$row["venue"]."\n".$row["description"]."\n".$row["date"]." ".$row["stime"]."\n".$row["date"]." ".$row["stime"]);
		
	}}
fclose($myfile);
}

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
<th>Add to Calender</th>
<form action="#" method="POST">
						<input type="text" name="id" size="25" placeholder="Event ID"/><br><br>
<input type="submit" name="add" value="Add!"/>
					</form>
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
<th width="10%" id= "t1">EVENT ID</th>
</tr>

<?php
if(file_exists("thefinal.csv")){
$f = fopen("thefinal.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        echo '<tr>';
	$c=0;
        foreach ($line as $cell) {
                $col[$c++] = htmlspecialchars($cell) ;
       }
$query = mysql_query("INSERT INTO events VALUES (NULL ,'$col[0]','$col[1]', '$col[2]', '$col[3]', '$col[4]', '$col[5]')");

	}
fclose($f);

}
 $sql = mysql_query("SELECT * FROM `events` WHERE 1");
$count = mysql_num_rows($sql); //Count the number of rows returned
	while ($count) {$count-=1;
		while($row = mysql_fetch_array($sql)){ 
	echo '<tr>';
             echo '<td width="16%" id= "t1" style="font-size:14px">'. '' .$row['name'] . '</td>'; 
	echo '<td width="16%" id= "t1" style="font-size:14px">'. '' . $row['date'] . '</td>'; 
		echo '<td width="16%" id= "t1" style="font-size:14px">'. '' . $row['stime'] . '</td>'; 
		echo '<td width="16%" id= "t1" style="font-size:14px">'. '' . $row['etime'] . '</td>'; 
		echo '<td width="16%" id= "t1" style="font-size:14px">'. '' . $row['venue'] . '</td>'; 
		echo '<td width="16%" id= "t1" style="font-size:14px">'. '' . $row['description'] . '</td>'; 
		echo '<<td width="16%" id= "t1" style="font-size:14px">'. $row['id'] .' </td>';
        echo "</tr>\n";	
			
	}
}
?>


</div><br><br>



</td>
</tr>
</table>
</div>

<?php include("footer.inc.php"); ?>
