//Make sure jQuery has been loaded before app.js
//Ready document
$(document).ready(function(){
	
  //called when key is pressed in textbox
  $("#phone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("<div class='alert alert-warning'>Digits Only</div>").show().fadeOut("slow");
               return false;
    }
   });	

	
	//SignOut check
	$("#signOut").click(function(m){
		m.preventDefault();

		$.ajax({
			type: "GET",
			url: "./core/session.php?signout",
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
			url: "./core/session.php?set_session",
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

	//Add category
	$("#addCat").click(function(h){
		h.preventDefault();
		var name = $("#name").val();
		
		$.ajax({
			type: "GET",
			url: "./core/add.php?add_cat",
			data: "name="+name,
			success: function(html){

				if(html!='error'){
					$(".nav-pills").before("<div class='alert alert-success'>"+html+"</div>");
					$(".alert").fadeOut(3500, function(){
					  $(this).remove();
					});
				}
				else{
					$(".nav-pills").before("<div class='alert alert-danger'>"+html+"</div>");
					$(".alert").fadeOut(3500, function(){
					  $(this).remove();
					});
				}
				
			}
		});

	});	
	

});