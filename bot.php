<?php
$access_token = '50lIQBfp4lMHXijFOx4+AiCk1ZXAiu7GC6lZaBjsxaP2v8TQjt3WERrDzy4uOedRmNtxt+8nuT8oyV28keCfzYd9BzY25+7wamtalC5xFzxwQeFfB0QIblC6FBSYFFRPjTBZAO8a42/efYM+v/VP/AdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			
			if($text == "test"){
			$con = @mysqli_connect('db4free.net:3307', 'c112233v', 'C112233v', 'linenavy');
			if (!$con) {
			   // echo "Error: " . mysqli_connect_error();
				$text = "error";
				//exit();
			}
			else{
			// Some Query
			$sql 	= 'SELECT (
	                                CASE 
                                        WHEN CHECKTIME BETWEEN ('2018-02-06 08:00:00') and ('2018-02-06 08:30:00') then 'Present'
                                        WHEN CHECKTIME BETWEEN ('2018-02-06 08:30:00') and ('2018-02-06 09:30:00') then 'Late'
                                        ELSE '8' END) as Type
                                        ,count(USERID) as usercount
                                        FROM CHECKINOUT
					where CHECKTIME like '2018-02-06%'
					GROUP BY Type';
			$query 	= mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			
				$text = $text." จำนวนนักเรียนที่มาสาย ".$row['usercount']."  ".$row['Type'];
			
			}
			
			mysqli_close ($con);
			}
			
			//
			/*$test = filter_var($text, FILTER_SANITIZE_NUMBER_INT);
			if($test!=null){
				$a = explode(" ",$text);
				if($a[1]=='+'){
					$text = $a[0]+$a[2];
				}
				else if($a[1]=='-'){
					$text = $a[0]-$a[2];
				}
				else if($a[1]=='*'){
					$text = $a[0]*$a[2];
				}
				else if($a[1]=='/'){
					$text = $a[0]/$a[2];
				}
			}*/
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
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
			echo $result . "\r\n";
		}
	}
}
echo "OK";
