<?php include("header.inc.php"); ?>
</div>
<?php
if (isset($_GET['u'])) {
	$username = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = mysql_query("SELECT username, first_name FROM users WHERE username='$username'");
	if (mysql_num_rows($check)===1) {
	$get = mysql_fetch_assoc($check);
	$username = $get['username'];
	$firstname = $get['first_name'];	
	}
	else
	{
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/myindex.php\">";	
	exit();
	}
	}
}
?>
<div id="profile">
<table>
<tr>
<td width="20%" valign="top">
<div class="profileLeftSideContent">
<img src="profile.jpg" height="250" width="200" alt="<?php echo $username; ?>'s Profile" title="<?php echo $username; ?>'s Profile" />
<div class="textHeader"> <h2><?php echo $firstname; ?>'s Profile </h2></div>
<div class="profile">Some content about this persons profile... </div><br><br>

<div class="textHeader"> <h2><?php echo $firstname; ?>'s Friends </h2></div>

<img src="profile.jpg" height="50" width="40"/>&nbsp;&nbsp; 
<img src="profile.jpg" height="50" width="40"/>&nbsp;&nbsp; 
<img src="profile.jpg" height="50" width="40"/>&nbsp;&nbsp; 
<img src="profile.jpg" height="50" width="40"/>&nbsp;&nbsp; 
<img src="profile.jpg" height="50" width="40"/>&nbsp;&nbsp; 
<img src="profile.jpg" height="50" width="40"/>&nbsp;&nbsp; 
<img src="profile.jpg" height="50" width="40"/>&nbsp;&nbsp; 
<img src="profile.jpg" height="50" width="40"/>&nbsp;&nbsp; 

</div>
</td>
<td width="40%" valign="top">
<div class="postForm">
<form action="<? echo $username; ?>" method="POST">
<textarea id="post" name="post" rows="4" cols="66"></textarea>
<input type="submit" name="send"  />
</form>
</div><br><br>
<div class="profilePosts">Your posts will go here... </div>




</td>
</tr>
</table>
</div>

<?php include("footer.inc.php"); ?>
