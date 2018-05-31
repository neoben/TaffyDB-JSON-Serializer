<?php

/* Not empty POST */
if (isset($_POST['tag']) && $_POST['tag'] != "") {

	/* Get POST tag */
	$tag = $_POST['tag'];
	
	/* Build json response root */
	$json_response = Array('tag' => $tag, 'success' => 0, 'error' => 0, 'content' => 'null');

	if ($tag == 'write') {
		$filename = $_POST['filename'];
		$json_records = $_POST['json_records'];
			
		/* Encode db json records */
		$json = json_encode($json_records);

		/* Write json to file */
		if (file_put_contents($filename, $json)) {
			$json_response['success'] = 1;
			$json_response['error'] = 0;
		} else {
			$json_response['success'] = 0;
			$json_response['error'] = 1;
		}

		echo json_encode($json_response);
	} else if ($tag == 'read') {
		// XXX
	}
}

?>
