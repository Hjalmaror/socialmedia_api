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

$(".likeButton").click(function(e){
	//instagram id
	var $id = this.id;
	var $ig_id = $id.substring(7, $id.length);
	console.log($ig_id);
	//facebook id
	var $fb_id = $("#fb_id").attr("value");
	var confirmChoice = confirm("Is this your choice?");
	if (confirmChoice == true) {
	    alert("Thank you for your participation");
	    $.ajax({
			url: 'database/like_check.php',
			type: 'POST',
			data: { user_id : $fb_id, ig_id : $ig_id},
			success: function(data) {
				//called when successful
				console.log(data);
			},
			error: function() {
				alert("Du har redan gillat ett inlägg")
			}
		});
	}
	
});
