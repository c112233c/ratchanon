<?php
 
$access_token = '50lIQBfp4lMHXijFOx4+AiCk1ZXAiu7GC6lZaBjsxaP2v8TQjt3WERrDzy4uOedRmNtxt+8nuT8oyV28keCfzYd9BzY25+7wamtalC5xFzxwQeFfB0QIblC6FBSYFFRPjTBZAO8a42/efYM+v/VP/AdB04t89/1O/w1cDnyilFU=';

//Connect DB
$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');
if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}
// Some Query
$sql 	= "SELECT ( CASE 
WHEN CHECKTIME BETWEEN '2018-02-06 07:30:00' AND '2018-02-06 08:30:00' THEN '1'
WHEN CHECKTIME BETWEEN '2018-02-06 08:30:00' AND '2018-02-06 09:30:00' THEN '2'
ELSE '8' END) AS Type , COUNT(USERID)
FROM CHECKINOUT
WHERE USERID BETWEEN 155 AND 187
GROUP BY Type
ORDER BY Type ";
$query 	= mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
$present = $row[1];
$row = mysqli_fetch_array($query);
$late = $row[1];
mysqli_close ($con);
$sum = 32-$present-$late;

//Build Text
$text = "ยอดเข้าเรียนของนักเรียนหลักสูตรอาชีพเพื่อเลื่อนฐานะชั้นจ่าเอก มาเรียน ".$present." นาย มาสาย ".$late." นาย ขาด ".$sum." นาย";
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text,
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to' => "Ccd8f942bc758319015965a2da9cd068a",
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);


?>
