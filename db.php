<?
      $objConnect = mysql_connect("db4free.net:3307","c112233v","C112233v");
			if($objConnect)
			{
				echo "Database Connected.";
			}
			else
			{
				echo "Database Connect Failed.";
			}
			mysql_close($objConnect);
?>
