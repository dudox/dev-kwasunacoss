$(function(){
	
	
	
	
	//updating personal info
	$.ajax({type: "GET",url: "../src/function.php",data: {'function':'_personal'},dataType: "text",success: function(response){$("#_personal").html(response);_update_personal();}});
	// Feed Rule
	$.ajax({type: "GET",url: "../src/function.php",data: {'function':'_feed_r'},dataType: "text",success: function(response){$("#_feed_r").html(response);}});
	// updating password
	$.ajax({type: "GET",url: "../src/function.php",data: {'function':'_p_password'},dataType: "text",success: function(response){$("#_p_password").html(response);_update_password();}});
	
	//updating profile picture
	$.ajax({
		type: "GET",
		url: "../src/function.php",
		data: {'function':'_pp'},
		dataType: "text",
		success: function(response){
			$("#_pp").html(response);
			toggle_pp();
			$("#file").change(function(){ 
			readURL(this);
		});
			
		}
	});
	
	//updating Contrib
	$.ajax({
		type: "GET",
		url: "../src/function.php",
		data: {'function':'_p_contrib'},
		dataType: "text",
		success: function(response){
			$("#_p_contrib").html(response);
			_update_social();
		}
	});
});

	function toggle_pp(){
		$("#file").hide();
		$("#up-img").hide();
		
		var btn = $("#save-profile");
		
		$("#trigger").click(function(e){
			e.preventDefault();
			$("#file").trigger('click');
			$("#up-img").show();

		});
		
		
	}
	
	function readURL(input) {
		if (input.files && input.files[0]) { var reader = new FileReader();
			reader.onload = function (e) { $('#blah').attr('src', e.target.result); }
		reader.readAsDataURL(input.files[0]); }
	}
	
	
	
	function _update_personal(){
		$("#_update_personal").click(function(e){
			e.preventDefault();
			var f = $("#fullname");
			var em = $("#email");
			var u = $("#username");
			var p = $("#phone");
			var t = $("#type");
			var b = $("#bio");
			if($.trim(em.val()) === '' && $.trim(u.val()) === ''){
				return false;
			}
			
			$.ajax({
				type: "POST",
				url: "../src/function.php",
				data: {'function':'_update_personal',
					'f':f.val(),
					'e':em.val(),
					'u':u.val(),
					'p':p.val(),
					't':t.val(),
					'b':b.val()
				},
				dataType: "text",
				beforeSend: function(){
					$("#_update_personal").html(function(){
						$(this).attr("disabled","disabled");
						$(this).html('Updating&nbsp;<i class="fa fa-spinner fa-pulse"></i>');
					});
				},
				success: function(response){
					$("#_msg").html(response).fadeIn(3000);
					$("#_b_msg").html(response).fadeIn(3000);
					$("#_update_personal").html(function(){
						$(this).removeAttr("disabled");
						$(this).html('Update');
					});
					
				}
			});
		});
	}
	
	function _update_password(){
		var o = $("#op");
		var n = $("#np");
		var cn = $("#cnp");
		
		
		cn.keyup(function(){
			if(n.val() != cn.val()){
				$("#_msg").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong style="font-weight:900;">Warning</strong>&nbsp;&nbsp;password does not match</div>').fadeIn(3000);
				$("#_e_msg").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong style="font-weight:900;">Warning</strong>&nbsp;&nbsp;password does not match</div>').fadeIn(3000);
				return false;
			}else {
				$("#_msg").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong style="font-weight:900;"><i class="fa fa-check-o"></i></strong>&nbsp;&nbsp;Password match</div>').fadeIn(3000);
				$("#_e_msg").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong style="font-weight:900;"><i class="fa fa-check-o"></i></strong>&nbsp;&nbsp;Password match</div>').fadeIn(3000);
			}
		});
		n.keyup(function(){
			if(n.val() != cn.val()){
				$("#_msg").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong style="font-weight:900;">Warning</strong>&nbsp;&nbsp;password does not match</div>').fadeIn(3000);
				$("#_e_msg").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong style="font-weight:900;">Warning</strong>&nbsp;&nbsp;password does not match</div>').fadeIn(3000);
				return false;
			}else {
				$("#_msg").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong style="font-weight:900;"><i class="fa fa-check-o"></i></strong>&nbsp;&nbsp;Password match</div>');$("#_e_msg").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong style="font-weight:900;"><i class="fa fa-check-o"></i></strong>&nbsp;&nbsp;Password match</div>');
			}
		});
		$("#_update_password").click(function(e){
			e.preventDefault();
			
			if(o.val() === '' || n.val() === '' || cn.val() === ''){
				return false;
			}
			
			$.ajax({
				type: "POST",
				url: "../src/function.php",
				data: {'function':'_update_password','password':cn.val(),'o':o.val()},
				dataType: "text",
				beforeSend: function(){
					$("#_update_password").html(function(){
						$(this).attr("disabled","disabled");
						$(this).html('Updating&nbsp;<i class="fa fa-spinner fa-pulse"></i>');
					});
				},
				success: function(response){
					$("#_msg").html(response).fadeIn(3000);
					$("#_e_msg").html(response).fadeIn(3000);
					$("#_update_password").html(function(){
						$(this).removeAttr("disabled");
						$(this).html('Update');
					});
				}
			});
			
		});
	}

function _f_toggle(_this,param){
	if($(_this).text() == 'Disabled'){
		$.ajax({
			type: "POST",
			url: "../src/function.php",
			data: {'function':'update_feed_r','param':param,'val':'yes'},
			dataType: "text",
			success: function(response){
				if($.trim(response) == 'success'){
					$(_this).text('Enabled');
				}
			}
		});
	}else {
		$.ajax({
			type: "POST",
			url: "../src/function.php",
			data: {'function':'update_feed_r','param':param,'val':'no'},
			dataType: "text",
			success: function(response){
				if($.trim(response) == 'success'){
					$(_this).text('Disabled');
				}
			}
		});
	}
}

function _update_social(){
	$("#_update_social").click(function(e){
		e.preventDefault();
		var f = $("#facebook");
		var t = $("#twitter");
		var s = $("#skype");
		var g = $("#github");
		
		$.ajax({
			type: "POST",
			url: "../src/function.php",
			data: {'function':'_update_social','f':f.val(),'t':t.val(),'s':s.val(),'g':g.val()},
			dataType: "text",
			beforeSend: function(){
				$("#_update_social").html(function(){
					$(this).attr("disabled","disabled");
					$(this).html('Updating&nbsp;<i class="fa fa-spinner fa-pulse"></i>');
				});
			},
			success: function(response){
				$("#_msg").html(response).fadeIn(3000);
				$("#_c_msg").html(response).fadeIn(3000);
				$("#_update_social").html(function(){
					$(this).removeAttr("disabled");
					$(this).html('Update');
				});
			},
		});
	});
}

function _skills_toggle(_this,param){
		if(($_this).isSelected){
			alert("hello");
		}

}
