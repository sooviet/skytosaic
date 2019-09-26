<?php
	$data = $_FILES['upload_file'];
	$file = simplexml_load_file($data['tmp_name']); // load xml file

	if ($file) {
		$csvFile = fopen("file.csv","w");


		$array = [];
		foreach ($file->children() as $line) {
			$array ['agentID'][] = $line->agentID;
			$array ['uniqueId'][] = $line->uniqueID;
			$array ['propertyType'][] = $line->getName();
			$array ['listingStatus'][] = $line->address->state;
			$array ['state'][] = $line->address->state;
			$array ['displayPrice'][] = $line->getName() === 'holidayRental' ? $line->rent : $line->price;
		}

		$i = 0;
		foreach ($array as $fields) {
			if($i == 0){
				fputcsv($csvFile, array_keys($array));
			}
			fputcsv($csvFile, array_values($fields));
			$i++;
		}

		fclose($csvFile);
	}


?>


<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
	Select a file: <input type="file" name="upload_file">
	<button type="submit">Submit</button>
</form>
</body>
</html>