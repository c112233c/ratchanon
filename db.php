<?
$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$sql 	= 'SELECT * FROM test';
			$query 	= mysqli_query($con, $sql);

			$row = mysqli_fetch_array($query);
			$text = $row[1];
			$row = mysqli_fetch_array($query);
			$text = $row[1];
			
			
echo $text;
//echo $text;
echo 'Connected to MySQL';

mysqli_close ($con);
