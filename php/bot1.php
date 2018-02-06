<?php
$access_token = '50lIQBfp4lMHXijFOx4+AiCk1ZXAiu7GC6lZaBjsxaP2v8TQjt3WERrDzy4uOedRmNtxt+8nuT8oyV28keCfzYd9BzY25+7wamtalC5xFzxwQeFfB0QIblC6FBSYFFRPjTBZAO8a42/efYM+v/VP/AdB04t89/1O/w1cDnyilFU=';

// Validate parsed JSON data
			
			$text = "sssss";
			$user = 'Udc14115eb6c67983f1c7876c3007933a';

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to'  => $user,
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
