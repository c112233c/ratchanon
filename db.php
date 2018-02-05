<?
      $objConnect = mysql_connect("85.10.205.173:3307","c112233v","C112233v");
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
