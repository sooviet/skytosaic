<?php

	$file = simplexml_load_file("../Q3/sample-reaxml.xml"); // load xml file

	function parseXml($file) {
		$arrays = [];
		foreach ($file as $f) { // loops through the objects array in the file

			$priceObj = get_object_vars($f->price);

			if (isset($priceObj[0])) {

				$state = $f->address->state;
				$arrays["{$state}"][] = $priceObj[0];
			}
		}

		return $arrays;
	}

	$arr = parseXml($file);

	foreach ($arr  as $index => &$val) {
		$arr[$index] = array_sum($val) / count($arr[$index]);
	}

	print_r($arr);
?>
