<?php

/* Not empty POST */
if (isset($_POST['tag']) && $_POST['tag'] != "") {

	/* Get POST tag */
	$tag = $_POST['tag'];
	
	/* Build json response root */
	$json_response = Array('tag' => $tag, 'success' => 0, 'error' => 0, 'msg' => 'null', 'json_content' => Array());

	if ($tag == 'write') {		/* Perform write to file operation */
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

		/* Return json reponse to js API (handled using write_callback) */
		echo json_encode($json_response);

	} else if ($tag == 'read') { 	/* Perform read from file operation */
		$filename = $_POST['filename'];

		/* Read json from file */
		$content = file_get_contents($filename);

		if ($content === false) {
			$json_response['success'] = 0;
			$json_response['error'] = 1;
		} else {
			$json_content = json_decode($content);
			$json_response['success'] = 1;
			$json_response['error'] = 0;
			$json_response['json_content'] = $json_content;
		}

		/* Return json reponse to js API (handled using read_callback) */
		echo json_encode($json_response);
	}
}

?>
