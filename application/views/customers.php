<script>
var user_id;var user_name;var user_email;var user_phone;var user_address;var user_update;
</script>

<!--Add update popup menu-->

<div class="remodal" data-remodal-id="modal">	
	<form style="text-align: left;" method="post" id="submit-form" action="customers/update_profile">
		<input type="hidden" name="user_id" id="user_id" style="color:white;">
		
		<h1><span id='modal_title'></span> My Profile</h1>
		
		<label for="user_phone">Telephone</label>
		<input type="text" name="update_user_phone" id="update_user_phone" maxlength="10">
		
		<label for="user_address">Address</label>
		<input type="text" name="update_user_address" id="update_user_address">
		
<label for="profile_img">Profile Picture</label>
		<input type="file" name="profile_img" id="profile_img" class="custom-file-input">

		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<!--<button type='reset'>Clear</button><--<button type='reset'>Clear</button>-->
		</center>
                <label style="text-decoration:none" id="pass_id"><a href="#modal_passwordreset" style="text-decoration:none" >Change password!</a></label>
	</form>
</div>
<!--End popup-->
<!--Change password-->
<div class="remodal" data-remodal-id="modal_passwordreset">	
	<form style="text-align: left;" method="post" onsubmit="return validateform();" id="reset-form" action="customers/reset_password">
		<h1><span id='modal_title'></span>Change password</h1>
		
		<label for="user_name"  >Password :</label>
		<input type="password" name="password" id="password">
		<input type="hidden" name="user_password" id="user_password">
                <label for="password">Confirm password :</label>
		<input type="password" name="user_con_password" id="user_con_password">
	         <div id="divCheckPasswordMatch" align="center"></div><br>
		<br><br>
		<center>
			<button type='submit'>Change</button>
		</center>
	</form>
</div>
<!--End password reset-->


<!-- Content -->

<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-user"> </span>My Profile</span>
<div style="float:right;">
	<div class="menu">
	<!--Add update btn for user to update profile info-->
		<a href="#modal"><button id="btn-update">Update</button></a>
	</div>
</div>
</div>


<div>



<div class="mainview view">
<div id="view" style="padding-bottom:45px;">
	<table class="table" id="tabels">
		<thead>
			<tr>
				<th></th>
				<th></th>
				
			</tr>
		</thead>
		
		<tbody>
			<tr>
				
<td  style="width: 400px; height: 60px;"><p id="imageDiv" ></p>   </td>
				
				
				<td>
				<label for="user_Pay_no">Pay number</label>
		<input type="text" name="user_Pay_no" id="user_Pay_no" disabled style="background:white;"></br></br>
		
<label for="user_id_no"  >Identity number </label>
		<input type="text" name="user_id_no" id="user_id_no" disabled style="background:white;"></br></br>


		<label for="user_name"  >Name </label>
		<input type="text" name="user_name" id="user_name" disabled style="background:white;"></br></br>
		
		<label for="user_email">Email</label>
		<input type="text" name="user_email" id="user_email" disabled  style="background:white;"></br></br>
		
		<label for="user_phone">Telephone</label>
		<input type="text" name="user_phone" id="user_phone" disabled style="background:white;"></br></br>
		
		<label for="user_address">Address</label>
		<input type="text" name="user_address" id="user_address" disabled style="background:white;"></br></br>
		
		<label for="user_Update">Date</label>
		<input type="text" name="user_update" id="user_update" disabled style="background:white;"></br></br>
		</td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th></th>
				<th></th>
				
			</tr>
		</thead>
	</table>	
	</div>
	<!-- End -->
	
		</div>	
	
	</div>		
 
<script>
    	$('[data-remodal-id=modal]').remodal();
        $('[data-remodal-id=modal_passwordreset]').remodal();

</script>
<script type="text/javascript"> 
function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#user_con_password").val();

    if (password != confirmPassword){

        $("#divCheckPasswordMatch").html("Passwords do not match!");
         $("#user_password").val('');
         document.forms["reset-form"]["user_con_password"].focus();
        return false;
    }else{
        $("#divCheckPasswordMatch").html("Passwords match.");
          $("#user_password").val(password);
        return true;
    }
}
function validateform()
{
    var password= document.forms["reset-form"]["password"].value;
    var password2= document.forms["reset-form"]["user_password"].value;
    var confirm_password= document.forms["reset-form"]["user_con_password"].value;
    if (password== null || password== "") {
        alert("Password must be filled out");
        document.forms["reset-form"]["password"].focus();
        return false;
    }else {
        if (confirm_password== null || confirm_password== "") {
	      alert("Confirm Password must be filled out");
	      document.forms["reset-form"]["user_con_password"].focus();
	      return false;
	}else {
             if (password2== null || password2== "") {
	          alert("Password do not match!");
	          document.forms["reset-form"]["user_con_password"].focus();
	         return false;
	     }else {
                 return true;
             }
         }
    }

}
$(document).ready(function() {

    $("#user_con_password").keyup(checkPasswordMatch);


 /** Get request data region  **/
	getRequest("customers/getUser", function(data) {
         
	  
        var data = JSON.parse(data.responseText);
   
        
        user_id = data[0].user_id;
        user_name=data[0].user_name;
        user_email = data[0].user_email;
        user_phone = data[0].user_phone;
        user_address= data[0].user_address;
        user_update = data[0].user_update;
        user_Pay_no = data[0].user_paysal;
	user_id_no = data[0].user_identityNo;
 	user_profile_img  =  data[0].profile_img;

		$('#user_id').val(user_id);
		$('#user_name').val(user_name);
		$('#user_email').val(user_email);
		$('#user_phone').val(user_phone);
		$('#user_address').val(user_address);
		$('#user_update').val(user_update);	
        	$('#user_Pay_no ').val(user_Pay_no);
		$('#user_id_no ').val(user_id_no);


if(user_profile_img == '' )
{
    user_profile_img = "user-icon.jpg";
}  

	
    document.getElementById("imageDiv").innerHTML= "<img width=180px height=180px  src=../upload/profile/" +  user_profile_img + ">";	
    	

    });
	
	
	
	
	/** Action button menu **/
	

	/* Update button */
	$('#btn-update').bind('click', function(){
	
	
	
		$('#update_user_phone').val(user_phone);
		$('#update_user_address').val(user_address);
		
		
		
		$('#modal_title').html($('#btn-update').text());
	});
	
		
	
			
	$('.overlay').click(function() {
        $('.overlay').find('.page').addClass('pulse');
        $('.overlay').find('.page').on('webkitAnimationEnd', function() {
			$(this).removeClass('pulse');
        });
     });

	});
  
	/** Set datatables **/
		/*
		end popup
		*/

	
		//-----------------------------------------------------------------------------------
		// Alert Status
		function alertSuccess(query){
			iosOverlay({
				text: "Success!",
				duration: 2e3,
				icon: "../images/9755898871_a9cf3b0dd1_o.png"
			});
			return false;
		}

		function alertError(query){
			iosOverlay({
				text: "Error!",
				duration: 2e3,
				icon: "../images/9735695398_2b8cbfc7df_o.png"
			});
			return false;
		}
		
		/** Form submit action **/ 
		/* Set "submit-form" action */	 
		$('#submit-form').ajaxForm({
		   resetForm: true,
		   cache: false,
		   success: alertForm
		});
		
		/*Set "view-form" action*/
		$('#view-form').ajaxForm({
		   resetForm: true,
		   cache: false,
		   success: alertForm
		});
		/*Set "reset-form" action*/
		$('#reset-form').ajaxForm({resetForm:true,cache:false,success:alertForm});
		/* Alert form action */
		function alertForm(query){
			// Reload page
			alertSuccess(query);
			$('[data-remodal-id=modal]').remodal().close();
			$('[data-remodal-id=modal_passwordreset]').remodal().close();
			
			getRequest("customers/getUser", function(data) {
         
	  
        		var data = JSON.parse(data.responseText);
   
		         user_id = data[0].user_id;
        user_name=data[0].user_name;
        user_email = data[0].user_email;
        user_phone = data[0].user_phone;
        user_address= data[0].user_address;
        user_update = data[0].user_update;
        user_Pay_no = data[0].user_paysal;
	user_id_no = data[0].user_identityNo;
 	user_profile_img  =  data[0].profile_img;

		$('#user_id').val(user_id);
		$('#user_name').val(user_name);
		$('#user_email').val(user_email);
		$('#user_phone').val(user_phone);
		$('#user_address').val(user_address);
		$('#user_update').val(user_update);	
        	$('#user_Pay_no ').val(user_Pay_no);
		$('#user_id_no ').val(user_id_no);


if(user_profile_img == '' )
{
    user_profile_img = "user-icon.jpg";
}  

	
    document.getElementById("imageDiv").innerHTML= "<img width=180px height=180px  src=../upload/profile/" +  user_profile_img + ">";
			});
        	
        	
			
			
		}	


</script>