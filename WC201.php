<html>
<head>
	<title>Chat</title>
	<?php if($_GET['name'] == null){
	header("Location:ER001.php");
	}
	function SendMessage(){
	$fp = fopen("log.dat","a");
	fwrite($fp, implode("\t",[
	($_GET['name'],implode(',',$chat)),
	date('Y-m-d H:i:s')
	]));
	fwrite($fp, "\n");
	fclose($fp);
	}
	?>
	
</head>

<body>
<form action="WC201.php">
<table border="0" width="50%">
<tr>
<td height="30" align="right"><?php print $_GET['name']; ?></td>
<td align="center"><input type="text" name="chat" size="50" maxlength="50"></td>
<td align="left"><input type="button" value="Write" onclick="<?php SendMessage() ?>"></td>
</tr>
</table>
<form/>
<hr>
<form action="WC201.php">
<p style="padding-left: 20px;">
<button type="submit">Refresh</button>
</p>
</form>
<?php
$fp = fopen("log.dat","r");
while ($line = fgets($fp)) {
  echo "$line<br />";
}
fclose($fp);
?>
<hr>
<form action="WC101.php">
<table border="0" width="50%">
<tr>
<td><a href="WC301.php" target="_blank">History</a></td>
<td align="right"><input type="submit" value="Logout"></td>
</tr>
</table>
</form>
</body>

</html>

