<?php

	use Symfony\Component\Yaml\Dumper;
	use Symfony\Component\Yaml\Yaml;


	function parseXml($file) {
		$arrays = [];
		foreach ($file as $f) { // loops through the objects array in the file

			print_r($f); die;
			$priceObj = get_object_vars($f->price);

			if (isset($priceObj[0])) {

				$state = $f->address->state;
				$arrays["{$state}"][] = $priceObj[0];
			}
		}

		return $arrays;
	}

	$file = simplexml_load_file("../Q3/sample-reaxml.xml"); // load xml file

	$array = parseXml($file);

	$yaml = new Dumper();

	$dumped = $yaml->dump($file, 2, 4, Yaml::DUMP_OBJECT);

	file_put_contents('dumped.yaml', $dumped);
