$(document).ready(function(){
	saveInstagramElement();
	printInstagram();
});
	
function saveInstagramElement(){
	// POST Ajax: Save instagram element
	$.ajax({
		url: 'database/addPhotos.php',
		type: 'GET',
		success: function(data) {
			//called when successful
			console.log("data saved");
		},
		error: function(e) {
			//called when there is an error
			console.log(e);
		}
	});
}

function printInstagram(){
	$('#imgTable').load("database/getPhotos.php");
}
