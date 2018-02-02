<?php
$str = '1 + 1';
$int = filter_var($str, FILTER_SANITIZE_NUMBER_INT);
			$a = expolde(" ",$str);
				$text = $a[0]+$a[3];
echo $int;
echo $text;

