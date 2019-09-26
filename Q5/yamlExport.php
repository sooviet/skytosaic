<?php

	use Symfony\Component\Yaml\Yaml;

	require_once __DIR__ . '/vendor/autoload.php';

	$file = simplexml_load_file("sample-reaxml.xml"); // load xml file

	# RUN XPATH QUERY

	foreach ($file->children() as $data) {
		$queryResult = $data->xpath('//address[display="yes"]');
	}

	$yaml = new \Symfony\Component\Yaml\Dumper();

	$dumped = $yaml->dump(json_decode(json_encode($queryResult), true), 2, 4);

	file_put_contents('dumped.yaml', $dumped);