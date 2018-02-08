<?
$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$sql 	= 'SELECT (
 CASE 
WHEN CHECKTIME BETWEEN ('2018-02-06 08:00:00') and ('2018-02-06 08:30:00') then 'Present'
WHEN CHECKTIME BETWEEN ('2018-02-06 08:30:00') and ('2018-02-06 09:30:00') then 'Late'
ELSE '8' END) as Type
,count(USERID) as usercount FROM CHECKINOUT WHERE USERID ="97"';
			$query 	= mysqli_query($con, $sql);

			$row = mysqli_fetch_array($query);
			$text = $row[1];
echo $text;
			$row = mysqli_fetch_array($query);
			$text = $row[1];
			
			
echo $text;
//echo $text;
echo 'Connected to MySQL';

mysqli_close ($con);
