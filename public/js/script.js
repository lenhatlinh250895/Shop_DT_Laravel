$(document).ready(function() {
	$(".delCart").click(function() {
		var id = $(this).attr('id');
		var token = $("input[name='_token']").val();
		$.ajax({
			url: 'delCart/'+id,
			type: 'POST',
			cache: false,
			data: {"_token":token,"id":id},
			success:function(data){
				if(data == "oke")
					location.reload();
			}
		});
	});
});