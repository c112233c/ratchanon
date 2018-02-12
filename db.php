<?
$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$sql 	= "SELECT ( CASE 
WHEN CHECKTIME BETWEEN "2018-02-08 08:00:00" AND "2018-02-08 09:00:00" THEN '3'
ELSE '8' END) AS Type
FROM CHECKINOUT ";
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
