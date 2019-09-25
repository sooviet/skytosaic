<?php

	$file = simplexml_load_file("sample-reaxml.xml"); // load xml file


	function parseXml($file) {
		$arrays = [];
		foreach ($file as $f) { // loops through the objects array in the file

			if (isset($f->uniqueID)) {
				$arrays["$f->uniqueID"] = $f->getName();
			}
		}

		return $arrays;
	}

	print_r(parseXml($file));
?>
