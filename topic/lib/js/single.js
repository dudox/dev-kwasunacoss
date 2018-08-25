


$(function(){
	$.ajax({
		type: "GET",
		url: "lib/function.php",
		data: {
			'function':'load_comment',
			'tid':val
		},
		dataType: "text",
		beforeSend: function(){
			$("#loadComment").html('<div class="card"><div class="row card-body"><div class="col-md-12  col-xs-12 col-sm-12"><div class="centering text-center"><img src="ajax-loader.gif" class="img-fluid" style="width: 100px;"/></div></div></div>');
		},
		success: function(response){
			$("#loadComment").html(response);
		}
	});
	
	$("#commentForm").on('submit',function(e){
		e.preventDefault();
		
		var frmData = new FormData(this);
		frmData.append('function','addComment');
		$.ajax({
			type: "POST",
			url: "lib/function.php",
			data: frmData,
			dataType: "text",
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function(){
				$("#btnComment").html('Contributing&nbsp;&nbsp;<i class="fa fa-spinning fa-pulse"></i>');
				$("#loadComment").html('<div class="card"><div class="row card-body"><div class="col-md-12  col-xs-12 col-sm-12"><div class="centering text-center"><img src="ajax-loader.gif" class="img-fluid" style="width: 100px;"/></div></div></div>');
			},
			success: function(response){
				$("#loadComment").fadeIn(1000,function(){
					$(this).append(response);
				});
			}
		});
	});
});
function user_like(){
	$.ajax({
		type: "POST",
		url: "lib/function.php",
		data: {
			
		},
		dataType: "text",
		success: function(){
			
		}
	});
}
