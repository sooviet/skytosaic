<?php
	$string1 = "MICHAEL";
	$string2 = "JACKSON";

	function mergeStr($string1, $string2) {
		// Convert strings to arrays first
		$string1 = str_split($string1, 1);
		$string2 = str_split($string2, 1);

		// Append the two strings
		for($x=0; $x < count($string2); $x++)
			$string1[$x] .= $string2[$x];

		return implode('', $string1); // Return combined array values as a single string
	}

	echo mergeStr($string1, $string2);