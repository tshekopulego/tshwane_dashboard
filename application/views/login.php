<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Tshwane Safety Dashboard- Login</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
  		<link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/icomoon.css"/> 
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/reset.css"/>
  		<script src="<?php echo base_url(); ?>js/lib/jquery.min.js"></script>
  		
		
    </head>
    <body>
        <div class="container">

			<section class="main">
				<form class="form-login" action="login/login_check">
					<h1><span class="log-in">Tshwane Safety Dashboard</span></h1>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Username</label>
						<input type="text" id="user_name" name="user_name" placeholder="Username">
					</p>
					<p class="float">
						<label for="password"><i class="icon-eye-blocked"></i>Password</label>
						<input type="password" id="user_password" name="user_password" placeholder="Password" class="showpassword">
					</p>
					<p class="clearfix"> 
						<input type="reset" class="log-btn" value="Cancel">  
						<input id="login" type="submit" name="submit" value="Log in">
					</p>
					<div id="message" align="center"></div>
					<p class="forgot">
					 <a href="#password_reset" class="forgot">forgot password?</a>
					</p>
				</form>​​
			</section>
			
        </div>
		<script type="text/javascript">
			$(function(){
				$("#login").click(function(){

				var action = $(".form-login").attr('action');
				var form_data = {
					username: $("#user_name").val(),
					password: $("#user_password").val()
				};

				$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(response)
					{
						if(response == "success")
							$(".form-login").slideUp('slow', function(){
								$("#message").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>').fadeIn(500);
								//redirect to secure page
				 				document.location='main';
							});
						else
							$("#message").html('<p class="error">ERROR: Invalid username and/or password.</p>').fadeIn(500);
			}
		});
		return false;
	});
 /*       $('form.reset').submit(function(){
		  var that = $(this),
		  url = that.attr('action'),
		  type = that.attr('method'),
		  data={};
		  
		  that.find('[name]').each(function(index,value){
		     var that=$(this),
			 name = that.attr('name'),
			 value=that.val();
			 data[name]=value;
                   });
		      $.ajax({
		      url:url,
			  type:type,
			  data:data,
			  success:function(response){
			     			if(response == "success")
							$(".reset").slideUp('slow', function(){
								$("#message1").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>').fadeIn(500);
								//redirect to secure page
				 				document.location='main';
							});
						else
							$("#message1").html('<p class="error3">ERROR: Invalid user</p>').fadeIn(500);
			  }
		  });
            return false;
	});
 				   $(".reset").submit(function(){
		                            
				var action = $(".reset-form").attr('action');
				var form_data = {
					username1: $("#user_name").val(),
                                            payno: $("#pay_no").val(),
					password1: $("#password1").val(),
					password2: $("#password2").val()
				};
				var form= $(".reset-form").serialize();

				$.ajax({
				type: "POST",
				url: action,
				data: form,
				success: function(response)
					{
						if(response == "success")
							$(".reset-form").slideUp('slow', function(){
								$("#message1").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>').fadeIn(500);
								//redirect to secure page
				 				document.location='main';
							});
						else
							$("#message1").html('<p class="error3">ERROR: Invalid user</p>').fadeIn(500);
			}
		});
		return false;

	});*/

	
			    $(".showpassword").each(function(index,input) {
			        var $input = $(input);
			        $("<p class='opt'/>").append(
			            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
			                var change = $(this).is(":checked") ? "text" : "password";
			                var rep = $("<input placeholder='Password' type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
			             })
			        ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
			    });

			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-eye-blocked').addClass('icon-eye2');
						$('.icon-eye2').removeClass('icon-eye-blocked');    
					} else {
						$('.icon-eye2').addClass('icon-eye-blocked');
						$('.icon-eye-blocked').removeClass('icon-eye2');
					}
			    });
			});
			$(function(){
			       $("#done").click(function(){
		                 if(checkForm()===true){
		                           
				var action = $(".reset").attr('action');
				/*var form_data = {
					user_name: $("#user_name").val(),
                                            pay_no: $("#pay_no").val(),
					password1: $("#password1").val(),
					password2: $("#password2").val()
				};*/
				var form= $(".reset").serialize();

				$.ajax({
				type: "POST",
				url: action,
				data: form,
				success: function(response)
					{
						if(response === "success"){
							$(".overlay").slideUp('slow', function(){
								$("#message1").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>').fadeIn(500);
								//redirect to secure page
				 				document.location='main';
							});
						}else{
						        console.log(response + " Eish kuyabheda");
							$("#message1").html('<p class="error3">ERROR: Invalid user</p>').fadeIn(500);
							}
			}
		});
		return false;
}
	});

			
			});
		</script>

<div id="password_reset" class="overlay">
	<div class="popup">
		<a class="close" href="#">×</a>
		<h1><span class="log-in"><i class="icon-user"></i> Change Password<span></h1>
		<div class="content">
		     
			<form action="login/reset_password" onsubmit="return checkForm();" name="reset-form" class="reset" >
							    
							       <p class="float">
								Notes: You can change your password by providing Username and pay number
								</p>
                                                                 <br><br>
								<p class="float">
									<label for="username">Username:</label>
									<input type="text" id="user_name" name="user_name" placeholder="Username" >
								</p>
								<p class="float">
									<label for="password">Pay no:</label>
									<input type="text" id="pay_no" name="pay_no" placeholder="Pay number" >
								</p>
								
								<p class="float">
									<label for="identityNo">ID No/Passport:</label>
									<input type="text" id="identity_no" name="identity_no" maxlength="13" placeholder="ID Number" >
									<p id="error"></p>
								</p>
							    <p class="float">
                                                                         <input type="hidden" id="password" name="password" placeholder="Password" >

									<label for="password">Enter Password :</label></br>
									<input type="password" id="password1" name="password1" placeholder="Password" >
									<p id="error1"></p>
								</p>
								 <p class="float">
									<label for="password1">Re-enter Password :</label></br>
									<input type="password" id="password2" name="password2" placeholder="Re-Password" >
									<p id="error2"></p>
								</p></br>
								<p class="float">
						                <div id="divCheckPasswordMatch" align="center"></div><br>
		                                                </p></br>
								 <p class="float">
									<div class="button-strips">	
									<center>
									<!--<input type="submit"  class="button-style" value="Change">-->
									<button class="button-style" onclick="return checkForm();" id="done" type="submit">Done</button>
									</center>
									</div>
								</p>
								
					                         <div id="message1" align="center"></div>
							</form>
		</div>
	</div>
</div>

<script type="text/javascript">
function checkPasswordMatch() {
    var password = $("#password1").val();
    var confirmPassword = $("#password2").val();

    if (password != confirmPassword){
         $("#password").val('');
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    }else{
         $("#password").val(password);
        $("#divCheckPasswordMatch").html("Passwords match.");
    }
}

$('document').ready(function(){
        $("#password2").keyup(checkPasswordMatch);
});

function checkForm()
  {
  //validating the input text
    
     var username=document.forms["reset-form"]["user_name"].value;
     var pay_no=document.forms["reset-form"]["pay_no"].value;
     var idno=document.forms["reset-form"]["identity_no"].value;
     var password = document.forms["reset-form"]["password"].value;
     var password1=document.forms["reset-form"]["password1"].value;
     var password2=document.forms["reset-form"]["password2"].value;
    
  
    if(username== null || username== "") {
     	  alert("Error: Username cannot be blank!");
    	  document.forms["reset-form"]["user_name"].focus();
          return false;
    }else{
         if(pay_no== null || pay_no== ""){
              alert("Error: Pay numbner cannot be blank!");
              document.forms["reset-form"]["pay_no"].focus();
   	      return false;
         }else{
               if(idno== null || idno== ""){
	              alert("Error: Id numbner cannot be blank!");
	              document.forms["reset-form"]["identity_no"].focus();
	   	      return false;
	         }else{
	                if(password1== null || password1== ""){
	                     alert("Error: Password cannot be blank!");
	   		     document.forms["reset-form"]["password1"].focus();
	     		     return false;
		         }else{
		              if(password2== null || password2== ""){
			             alert("Error: Confirm password cannot be blank!");
				      document.forms["reset-form"]["password2"].focus();
				      return false;
			         }else{
			               if(password== null || password== ""){
	                                    alert("Error: Password do not match!");
	                                    document.forms["reset-form"]["password2"].focus();
	   	                          return false;
	                               }else{
			                  return true;
			                }
		         }
                      }
              }
         }
    
    }
    }
 /*   re =/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!re.test(pay_no)) {
      alert("Error: Your email is invalid, Valid email look like this : example@john.com!");
      document.forms["password-reset-form"]["email"].focus();
      return false;
    }

    if(password1!= null || password1 != "") {
     if(password1 == password2){
      if(password1.length < 6) {
        alert("Error: Password must contain at least six characters!");
        document.forms["password-reset-form"]["password1"].focus();
        return false;
      }
      if(password1 == email) {
        alert("Error: Password must be different from Username!");
        document.forms["password-reset-form"]["password1"].focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(password1)) {
        alert("Error: password must contain at least one number (0-9)!");
        document.forms["password-reset-form"]["password1"].focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(password1)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        document.forms["password-reset-form"]["password1"].focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(password1)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        document.forms["password-reset-form"]["password1"].focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      document.forms["password-reset-form"]["password2"].focus();
      return false;
    }
    }else{
      alert("Error: password don't match please re-enter!");
        //  alert("Error: password cannot be empty!");
      document.forms["password-reset-form"]["password2"].focus();
      return false;
    }
    alert("You entered a valid password: " + password1);
    return true;
  }*/

</script>

    </body>
</html>