<?
$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$sql 	= 'SELECT * FROM CHECKINOUT where USERID = '97'';
$query 	= mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($query))
{
	$text = $row['USERID'];
}

echo $text;
echo 'Connected to MySQL';

mysqli_close ($con);
