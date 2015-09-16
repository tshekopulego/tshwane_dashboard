<script language="JavaScript">
var region_id;
var group_id;
</script>

<!-- Content -->
<div class="remodal" data-remodal-id="modal">
	<form style="text-align: left;" method="post" id="submit-form" name="admin_form" onsubmit="return validateForm()" action="user/insert">
	 	 
		<input type="hidden" name="user_id" id="user_id">
		<h1><span id='modal_title'></span> User Admin</h1>
		<label for="paynum">Pay Num</label>
		<input type="text" name="paynum" id="paynum">
                <label for="user_idno">ID number/Passport</label>
		<input type="text" name="user_idno" id="user_idno" maxlength="13">

		<label for="user_name">User Name</label>
		<input type="text" name="user_name" id="user_name"><br>
		<table border="1" width="100%">
		<tr><td>
		<label for="user_password">Password:</label>
		<input type="password" name="user_password" id="user_password" width="80%">
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" onChange="checkPasswordMatch();" width="80%"/>
		
        
		 <div id="divCheckPasswordMatch" align="center" style="color:#FF0000"></div><br>
		 </td></tr>
		 </table>
			<input type="hidden" name="password" id="password" />		
		<label for="user_group">Group</label>		
		<select id="user_group" name="user_group" style="width:100%" >
			<option value="">User Group</option>
	        </select>
	        <label for="user_region">Regions</label>
                 <select id="user_region" name="user_region" style="width:100%">
			<option value="">Select Region</option>
       		 </select>
	        <!--<label for="user_mgr_name">Manager Names</label>
	        <select id="user_mgr_name" name="user_mgr_name"  style="width:100%">
				<option value="">Select Manager</option>
	        </select>-->
                 <input type="hidden" name="usr_mgr_id" id="usr_mgr_id">
                 <input type="hidden" name="user_reg" id="user_reg">
		<label for="user_full_name">Full Name</label>
		<input type="text" name="user_full_name" id="user_full_name">
		<label for="user_email">Email</label>
		<input type="text" name="user_email" id="user_email">
		<label for="user_phone">Phone</label>
		<input type="text" name="user_phone" id="user_phone" maxlength="10">
		<label for="user_address">Address</label>
		<input type="text" name="user_address" id="user_address">

		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<button type='reset'>Cancel</button>
		</center>
	</form>
</div>

<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-key"></span> User Admin</span>
<div style="float:right;">
	<div class="menu">
		<a href="#modal"><button id="btn-insert">Capture</button></a> 
		<a href="#modal"><button id="btn-update" disabled="disabled">Update</button></a>
		<!--<a href="#modal_remove"><button id="btn-remove" disabled="disabled">Remove</button></a>-->
		<button id="btn-filter" value="on">Filter</button>
	</div>
</div>
</div>
<div class="mainview view">
<div id="view" style="padding-bottom:45px;">
<!-- Datatables -->
	<table class="table" id="tabels">
		<thead>
			<tr>
				<th align="right">Pay Num</th>
				<th align="right">ID Num</th>
				<th>User Name</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Group</th>
				<th>Region/units</th>
			</tr>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th align="right">Pay Num</th>
				<th align="right">ID Num</th>
				<th>User Name</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Group</th>
				<th>Region/units</th>
				
				
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td colspan="5" class="dataTables_empty">Loading data from server</td>
			</tr>
		</tbody>
	</table>

	<!-- Remove Modal -->
	<div class="remodal" data-remodal-id="modal_remove">
    	<div class="page">
              <h1><b>Confirmation</b></h1>
              	<div class="content-area">
               		Do you want delete this data? 
              	</div>
              	<div class="action-area">
			 		<form method="post" id="remove-form" action="user/remove">
                		<div class="action-area-right">
                  			<div class="button-strip">
				   				<input type="hidden" name="remove_user_id" id="remove_user_id">
                    			<button type="submit">Yes</button>
                  			</div>
                		</div>
					</form>
              	</div>
            </div>
		</div>		 
	</div>
	<!-- End -->
		</div>		 
	</div>
	
<script>
    $('[data-remodal-id=modal]').remodal();
	$('[data-remodal-id=modal_remove]').remodal();
</script>
<script type="text/javascript"> 
function checkPasswordMatch() {
    var password = $("#user_password").val();
    var confirmPassword = $("#confirm_password").val();

    if (password != confirmPassword){
        $("#divCheckPasswordMatch").html("Passwords do not match!");
        $("#password").val('') ;
        }
    else{
        $("#divCheckPasswordMatch").html("Passwords match.");
        $("#password").val(confirmPassword);
        }
}
</script>
<script type="text/javascript"> 

/*validating form input*/
function validateForm() {
   //declaration of variables
    var username= document.forms["admin_form"]["user_name"].value;
    var password= document.forms["admin_form"]["user_password"].value;
    var pass= document.forms["admin_form"]["password"].value;
    var idnum= document.forms["admin_form"]["user_idno"].value;
    var group= document.forms["admin_form"]["user_group"].value;
    var region= document.forms["admin_form"]["user_region"].value;
    var mgrname= document.forms["admin_form"]["user_mgr_name"].value;
     var fullname= document.forms["admin_form"]["user_full_name"].value;
    var phone= document.forms["admin_form"]["user_phone"].value;
     var address= document.forms["admin_form"]["user_address"].value;
    
    //logical conditions
    if (username== null || username== "") {
        alert("Call sign must be filled out");
        document.forms["admin_form"]["user_name"].focus();
        return false;
    }else {
        if (pass== null || pass== "") {
	      alert("Passwords do not match");
	      document.forms["admin_form"]["password"].focus();
	      return false;
	}else {
        if (confirmpass== null || confirmpass== "") {
	      alert("Passwords do not match");
	      document.forms["admin_form"]["user_password"].focus();
	      return false;
	}else {
        if (idnum== null || idnum== "") {
	      alert("IDno must be filled out");
	      document.forms["admin_form"]["user_idno"].focus();
	      return false;
	}else {
        if (password== null || password== "") {
	      alert("Password must be filled out");
	      document.forms["admin_form"]["user_password"].focus();
	      return false;
	}else {
	    if (group== null || group== "") {
      		  alert("Group must be filled out");
      		 document.forms["admin_form"]["user_group"].focus();
	        return false;
	     }else {
		    if (region== null || region== "") {
	      		  alert("Region must be selected");
	      		  document.forms["admin_form"]["user_region"].focus();
		        return false;
		     }else {
			    if (mgrname== null || mgrname== "") {
		      		  alert("Manager name must be selected");
		      		 document.forms["admin_form"]["user_mgr_name"].focus();
			        return false;
			     }else {
				  if (fullname== null || fullname== "") {
			      		  alert("Ful name must be selected");
			      		  document.forms["admin_form"]["user_full_name"].focus();
				        return false;
				  }else {
					 if (phone== null || phone== "") {
				      		  alert("phone number must be selected");
				      		 document.forms["admin_form"]["user_phone"].focus();
					        return false;
				          }else {
						 if (address== null || address== "") {
					      		  alert("Address must be selected");
					      		 document.forms["admin_form"]["user_address"].focus();
						        return false;
					          }else {
							return true; 
					         } 
				          } 
			          }
		             }
	             }}}}
             }
        }
    }
}

$(document).ready(function() {

$("#confirm_password").keyup(checkPasswordMatch);
     

	/** Action button menu **/
	  
	/* Insert button */
	$('#btn-insert').bind('click', function(){
		// Reset submit form
		$('#submit-form input').val('');
		$('#modal_title').html($('#btn-insert').text());
	});

	/* Update button */
	$('#btn-update').bind('click', function(){
		$('#modal_title').html($('#btn-update').text());
	});
	
	/* Filter button */	
  	$('#btn-filter').bind('click', function(){
		
		if($('#btn-filter').attr("value") == "on"){
			$('#form_filter').show();
			$('#btn-filter').attr("value","off");
    	}else{
			$('#form_filter').hide();
			$('#btn-filter').attr("value","on");
		}
			
	});
		
	/* Remove button */
	$('#btn-remove').bind('click', function(){
		$('.overlay').show();
		$('.overlay').find('button').click(function() {
         		$('.overlay').hide();
    });
			
	$('.overlay').click(function() {
        $('.overlay').find('.page').addClass('pulse');
        $('.overlay').find('.page').on('webkitAnimationEnd', function() {
			$(this).removeClass('pulse');
        });
     });

	});
	

	/** Get request data group  **/
	getRequest("user/get_group", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#user_group").append("<option value="+data[i].group_id+">"+data[i].group_name+"</option>");
			
        }

    });
    
    
	  /** Get request data region  **/
	getRequest("user/get_regions", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#user_region").append("<option value="+data[i].region_name+">"+data[i].region_name+"</option>");
        }

    });
     $("#user_region").change(function(){
    
    	 
    	 $("#user_reg").val($('#user_region option:selected').text());
    });
   
      $("#user_group").change(function(){
        	group_id = $("#user_group").val();
        	console.log("Group selected => Group id: " + group_id + " region id: " + region_id);
        	if( group_id === '5'){ 
        		$('#user_region').hide(); 
        		$('#user_mgr_name').hide();
        	}
        	else if(group_id === '6' || group_id === '7'){ $('#user_region').show(); $('#user_region').hide(); }
        	else if(group_id === '4'){ $('#user_region').hide(); $('#user_mgr_name').show();}
        	else{ $('#user_region').show(); $('#user_mgr_name').show();
        	}
        	$("#user_mgr_name").empty();
        	
        	getRequest("user/get_managers/" + region_id + "/" + group_id, function(data) {
     
        var data = JSON.parse(data.responseText);
         $('#user_mgr_name').append($('<option>', {    value: 0,    text: 'Select Manager'}));
        for (var i = 0; i < data.length; i++) {
        	
        	$("#user_mgr_name").append("<option value="+data[i].user_id+">"+data[i].user_full_name+"</option>");
        	}
	});
  
        });
      
      //onclick function for managers
	$("#user_region").change(function(){
		region_id = $("#user_region").val();
		
	$("#user_mgr_name").empty();
    console.log("Region selected => Group id: " + group_id + " region id: " + region_id);
     /** Get request data managers**/
    
     	getRequest("user/get_managers/" + region_id + "/" + group_id, function(data) {
     
        var data = JSON.parse(data.responseText);
         $('#user_mgr_name').append($('<option>', {    value: 0,    text: 'Select Manager'}));
        for (var i = 0; i < data.length; i++) {
        	
        	$("#user_mgr_name").append("<option value="+data[i].user_id+">"+data[i].user_full_name+"</option>");
        	}
	});
	
	

});
        
       

		/** Set datatables **/

	var oTable = $('#tabels').dataTable({
		"bProcessing": false,
		"bServerSide": true,
		"iDisplayLength": 50,
		"sAjaxSource": "user/get",
		"aaSorting": [[ 0, "desc" ]],
		'sPaginationType': 'full_numbers',					
       	"fnServerData": function( sUrl, aoData, fnCallback ) {
            $.ajax( {
                "url": sUrl,
                "data": aoData,
                "success": fnCallback,
                "dataType": "jsonp",
                "cache": false
            } );
        }
         }).columnFilter({
		 	// Set filter type
	      	aoColumns: [{ type: "text" },
						{ type: "text" },
						{ type: "text" },
						{ type: "text" },
						{ type: "text" },
				        { type: "text" },
						{ type: "text" }]
		});

	/** Set edit value after click datatables **/	
	$('#tabels tbody').on('click','tr', function () {
	
		 var aData = oTable.fnGetData(this);
		  
		 if(aData != null){
			// Set value form after select table for update data
			$('#remove_user_id').val(aData[11]);
			$('#user_id').val(aData[11]);
			$('#user_name').val(aData[2]);
			$('#user_group > option[value="'+aData[9]+'"]').prop("selected", "selected");
			$('#user_full_name').val(aData[3]);
			$('#user_email').val(aData[4]);
			$('#user_phone').val(aData[5]);
			$('#user_address').val(aData[6]);
			$('#paynum').val(aData[0]);
			$('#user_region').val(aData[8]);
//$('#user_region > option[value="'+aData[8]+'"]').prop("selected", "selected");

			$('#user_idno').val(aData[1]);
		 console.log("region"+ aData[8]);
			if ( $(this).hasClass('row_selected') ) {
					$(this).removeClass('row_selected');
					// clear data form
					$('#remove_user_id','#remove-form').val('');
					$('#user_id','#submit-form').val('');
					$('#btn-update').attr("disabled","disabled");
					$('#btn-remove').attr("disabled","disabled");
			} else {
					oTable.$('tr.row_selected').removeClass('row_selected');
					$(this).addClass('row_selected');
					$('#btn-update').removeAttr("disabled");
					$('#btn-remove').removeAttr("disabled");
			}
		}
	});
		
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
		
		/* Set "remove-form" action */
		$('#remove-form').ajaxForm({
		   resetForm: true,
		   cache: false,
		   success: alertForm
		});
		
		/* Alert form action */
		function alertForm(query){
			// Reload page
			oTable.fnReloadAjax();
			$('[data-remodal-id=modal]').remodal().close();
			$('[data-remodal-id=modal_remove]').remodal().close();
			alertSuccess(query);
		}
	});
</script>