
$(function(){
	var ch = "no";
	$("#check").change(function(){
		if($(this).is(":checked")){
			$(".check-msg").html("by selecting this, we'll notify you on your email when there's a reply to your topic");
			ch = "yes";
			
		} else {
			$(".check-msg").html("");
		}
	});	
	
	$("#topicForm").on('submit',function(e){
		e.preventDefault();
		
		
		var fd = new FormData(this);
		fd.append('function','topic-new');
		fd.append('ch',ch);
		
		
		$.ajax({
			type: "POST",
			url: "lib/new.php",
			data: fd,
			processData: false,
			contentType: false,
			dataType: "text",
			beforeSend: function(){
				$("#topicNew").html("<i class='fa fa-spinner fa-pulse fa-lg'>Loading</i>");
			},
			success: function(response){
				if($.trim(response) == 'success'){
					$("#postnew").fadeOut(1000,function(){
						$("#success").attr("style","display: visible;");
					});
					
				}
			}
		});
		
	});
});
