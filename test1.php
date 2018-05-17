<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>
<?php
if($_GET["txtKeyword"] != "")
	{
	$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
	$objDB = mysql_select_db("mydatabase");
	// Search By Name or Email
	$strSQL = "SELECT * FROM customer WHERE (Name LIKE '%".$_GET["txtKeyword"]."%' or Email LIKE '%".$_GET["txtKeyword"]."%' )";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
	<table width="600" border="1">
	  <tr>
		<th width="91"> <div align="center">CustomerID </div></th>
		<th width="98"> <div align="center">Name </div></th>
		<th width="198"> <div align="center">Email </div></th>
		<th width="97"> <div align="center">CountryCode </div></th>
		<th width="59"> <div align="center">Budget </div></th>
		<th width="71"> <div align="center">Used </div></th>
	  </tr>
	<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
		<td><?php echo $objResult["Name"];?></td>
		<td><?php echo $objResult["Email"];?></td>
		<td><div align="center"><?php echo $objResult["CountryCode"];?></div></td>
		<td align="right"><?php echo $objResult["Budget"];?></td>
		<td align="right"><?php echo $objResult["Used"];?></td>
	  </tr>
	<?php
	}
	?>
	</table>
	<?php
	mysql_close($objConnect);
}
?>
</body>
</html>
