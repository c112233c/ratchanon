<?
$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$test = "( CASE WHEN USERID = "97" then 'Present' WHEN USERID = "98" then 'Late' ELSE '8' END) as Type , COUNT(USERID) as usercount";
$sql 	= 'SELECT '.$test.' FROM CHECKINOUT  GROUP BY USERID';
			$query 	= mysqli_query($con, $sql);

			$row = mysqli_fetch_array($query);
			$text = $row[0];
echo $text;
			$row = mysqli_fetch_array($query);
			$text = $row[0];
			
			
echo $text;
//echo $text;
echo 'Connected to MySQL';

mysqli_close ($con);
