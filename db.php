<?
$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$test = "CASE WHEN 1 THEN "2" END ";
$sql 	= "SELECT * FROM CHECKINOUT ";
			$query 	= $con->query($con, $sql);

			$row = mysqli_fetch_array($query);
			$text = $row[0];
echo $text;
			$row = mysqli_fetch_array($query);
			$text = $row[0];
			
			
echo $text;
//echo $text;
echo 'Connected to MySQL';

mysqli_close ($con);
