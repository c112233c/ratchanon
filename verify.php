<?php
$access_token = '50lIQBfp4lMHXijFOx4+AiCk1ZXAiu7GC6lZaBjsxaP2v8TQjt3WERrDzy4uOedRmNtxt+8nuT8oyV28keCfzYd9BzY25+7wamtalC5xFzxwQeFfB0QIblC6FBSYFFRPjTBZAO8a42/efYM+v/VP/AdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
