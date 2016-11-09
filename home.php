<?php include ( "header.inc.php" );
?>

<div id="home">
<table width="50%">
<tr>
<td width="40%" valign="top">
<div class="homeleft">
				<div id="menu1"><br><br><br><a href="#" />Inbox</a><br><br><br>
				<a href="#" />Today</a><br><br><br>
				<a href="#" />Next 7 days</a><br><br><br></div>
</div>

</td>
<td width="60%" valign="top">
<div class="homeright">
<br><br><br><br><br><br>

<div class="postForm">
<form action="home.php" method="POST">
<textarea id="post" name="post" rows="4" cols="66"></textarea>
<input type="submit" />
</form>
</div><br><br>



</td>
</tr>
</table>
</div>

<?php include("footer.inc.php"); ?>
