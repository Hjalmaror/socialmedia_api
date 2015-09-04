$(document).ready(function(){
	saveInstagramElement();
	printInstagram();
	syncLikes();
});
	
function saveInstagramElement(){
	// POST Ajax: Save instagram element
	$.ajax({
		url: 'database/addPhotos.php',
		type: 'POST',
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
	    
	    $.ajax({
			url: 'database/like_check.php',
			type: 'POST',
			data: { user_id : $fb_id, ig_id : $ig_id},
			success: function(data) {
				alert(data);
				syncLikes();
			},
			error: function() {
				alert("Error: like not saved");
			}
		});
	}
	
});

function syncLikes(){

	$('.like').each(function() {
		//instagram id
		var $id = $(this).attr("id");
		var $ig_id = $id.substring(6, $id.length);
		
		$.ajax({
			url: 'database/like_sync.php',
			type: 'POST',
			data: { ig_id : $ig_id },
			success: function(data) {
				$("#likes-"+$ig_id).html(data);
				if($("#likes-"+$ig_id).html() != "0"){
					$("#heart-"+$ig_id).attr("src", "img/heart.png");
				}
				else if($("#likes-"+$ig_id).html() == "0"){
					$("#heart-"+$ig_id).attr("src", "img/heart_grey.png");
				}
				console.log(data);
			},
			error: function(data) {
				console.log(data);
			}
		});
	});
}

