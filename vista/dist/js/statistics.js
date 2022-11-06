$(document).ready(function() {
	
});

function saveClic(app_id) {

	console.log(app_id);

	$.ajax({
		
		url: window.location.origin+"/LobbyUI/controlador/save.controller.php",
		method: "POST",
		datatype: "json",
		data: { save: "saveStatistics", app_id: app_id },
		success:function(data) {
			console.log(data);
		}

	});

}