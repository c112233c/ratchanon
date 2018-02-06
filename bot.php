<?php
// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php
include ('php/line-bot.php');
$channelSecret = 'c2c62e7d395681a2eae042937aded03f';
$access_token  = '50lIQBfp4lMHXijFOx4+AiCk1ZXAiu7GC6lZaBjsxaP2v8TQjt3WERrDzy4uOedRmNtxt+8nuT8oyV28keCfzYd9BzY25+7wamtalC5xFzxwQeFfB0QIblC6FBSYFFRPjTBZAO8a42/efYM+v/VP/AdB04t89/1O/w1cDnyilFU=';
$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
		echo "aaa";
}
