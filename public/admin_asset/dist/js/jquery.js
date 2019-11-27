$(document).ready(function() {
	$('#Image').change(thu);
});

function thu(input){
	if (input.files && input.files[0]) {
    	var reader = new FileReader();
		alert(reader);
	}
}