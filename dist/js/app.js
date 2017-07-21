//Make sure jQuery has been loaded before app.js
//Ready document
$(document).ready(function(){

	
	//SignOut check
	$("#signOut").click(function(m){
		m.preventDefault();

		$.ajax({
			type: "GET",
			url: "./system/session.php?signout",
			success: function(html){    
				if(html == 'true'){
					window.location = "./";
				}
				else{
					$(".login-box").before("<div class='alert alert-danger'>Oops, something went wrong...</div>");
					$(".alert").fadeOut(3500);
				}
			}
		});		

	});
	
	//Signin check
	$("#signin").click(function(e){
		e.preventDefault();
		
		var email = $("#email").val();
		var pass = $("#pass").val();
		
		$.ajax({
			type: "GET",
			url: "./system/session.php?set_session",
			data: "email="+email+"&pass="+pass,
			success: function(html){

				if(html=='true'){
					window.location = "./";
				}
				else{
					$(".error").html(html);
					$(".alert").fadeOut(5200);
					$("#email").val("");
					$("#pass").val("");
				}
				
			}
		});

	});

	//Save settings
	$("#saveSettings").click(function(h){
		h.preventDefault();
		var geo = $("#inputLocation").val();
		var intro = $("#inputIntroduction").val();
		var skills = $("#inputSkills").val();
		
		$.ajax({
			type: "GET",
			url: "./system/settings.php?profile",
			data: "location="+geo+"&introduction="+intro+"&skills="+skills,
			success: function(html){

				if(html!='error'){
					$("#settings").before("<div class='alert alert-success'>"+html+"</div>");
					$(".alert").fadeOut(3500, function(){
					  $(this).remove();
					  window.location = "./?page=profile";
					});
				}
				else{
					$("#settings").before("<div class='alert alert-danger'>"+html+"</div>");
					$(".alert").fadeOut(3500, function(){
					  $(this).remove();
					});
				}
				
			}
		});

	});	
	

});