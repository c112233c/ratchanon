<?
$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$sql 	= 'SELECT *
	FROM CHECKINOUT
	where CHECKTIME like '2018-02-06%'';
$query 	= mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($query))
{
	$text = $row['sn'];
}

echo $text;
echo 'Connected to MySQL';

mysqli_close ($con);
