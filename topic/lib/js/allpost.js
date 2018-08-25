
	$(document).ready(function(){
		var num = 1;
		$.ajax({
			type: "GET",
			url: "lib/function.php",
			data: {
				'function':'load_content',
				'pageno': num
			},
			dataType: "text",
			beforeSend: function(){
			$("#content").html('<div class="col-md-12"><center><img src="ajax-loader.gif" class="img-fluid" style="width: 100px;"/></center></div>');
			},
			success: function(response){
				$("#content").html(response);
			},
		});
		
		$.ajax({
			type: "GET",
			url: "lib/function.php",
			data: {
				'function':'load_pager',
				'pageno': num
			},
			dataType: "text",
			
			success: function(response){
				$("#pager").html(response);
			},
		});
	});
