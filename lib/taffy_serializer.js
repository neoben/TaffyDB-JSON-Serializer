/* 
 * JS library with read/write APIs 
 *
 * Requirement: jQuery
 *
 * */

var url = "lib/file_serializer.php";

function write_json_db(filename, json_records) {

	$.ajax({
		url: url,
		type: 'POST',
		data: {
			tag: 'write',
			filename: filename,
			json_records: json_records
		},
		success: function(data) {
			var json_response = jQuery.parseJSON(data);
			/* XXX remove log */
			console.log("ajax success", json_response);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("ajax error");
		}
	});
}

function read_json_db(filename) {
	console.log("read json file", filename);
}
