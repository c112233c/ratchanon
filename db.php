<?
$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$sql 	= "SELECT ( CASE 
WHEN CHECKTIME BETWEEN '2018-02-08 07:30:00' AND '2018-02-08 08:30:00' THEN 'Present'
WHEN CHECKTIME BETWEEN '2018-02-08 08:30:00' AND '2018-02-08 09:30:00' THEN 'Late'
ELSE '8' END) AS Type , COUNT(USERID)
FROM CHECKINOUT
GROUP BY Type ";
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
