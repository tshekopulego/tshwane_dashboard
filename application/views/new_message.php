<!-- Content -->
<input id="post_date" type="hidden" name="post_date" value="">	
<input id="post_shift" type="hidden" name="post_shift" value="">	

<div class="content-block">
	

<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-book"> </span>Strength Report</span>
<div style="float:right;">
	<div class="menu">
		<a href="#modal" class="modal"><button id="btn-insert">Deploy</button></a>
	<!--<a href="#modal_strength" class="modal_strength"><button id="btn-strength">Strength</button></a>-->
	<a href="#modal_update" class="modal_update"><button id="btn-update" disabled="disabled">Update</button></a>
	<a href="#modal_view" ><button id="btn-view" disabled="disabled">View</button></a>
	<!--<a href="#modal_view_header" ><button id="btn-view_header" disabled="disabled">View</button></a>-->
	<a href="#modal_con" class="modal_con"><button id="btn-con"  disabled="disabled">Conclude</button></a>
	<a href="#modal_remove"><button id="btn-remove" disabled="disabled">Remove</button></a>
	<button id="btn-filter" value="on">Filter</button>

	</div>
</div>
</div>
<!--*********************************************************************************************************-->
<!--***********NOT USED***********-->
<div class="remodal" data-remodal-id="modal_view_header">	
	<form style="text-align: left;" method="post" id="submit-form">
		<input type="hidden" name="view_id" id="view_id">
		<h1><span id='modal_title'></span> </h1>

<label for="view_shift">Shift</label>
<input type="text" name="view_shift" id="view_shift" class="view_shift" disabled>

<label for="view_supervisor">Supervisor</label>
<input type="text" name="view_supervisor" id="view_supervisor" disabled>

<label for="view_strength">Strength Totals</label>
<div class="mainview view">
<div id="view" style="padding-bottom:45px;">
<table class="table" id="tabels">
		<thead>
			<tr>
<th>Total Members</th>
				<th>Total Vehicles</th>
				<th>Total Bikes</th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				<td name="view_total_members" id="view_total_members"></td>
				<td name="view_total_vehicles" id="view_total_vehicles"></td>
				<td name="view_total_bikes" id="view_total_bikes"></td>
			</tr>
		</tbody>
</table>

<label for="view_captured_by">Captured by</label>
<input type="text" name="view_captured_by" id="view_captured_by" disabled>
</div>
</div>





	
	</form>
</div>

<!--***********END NOT USED***********-->
<!--*********************************************************************************************************-->


<div class="remodal" data-remodal-id="modal_view">	
	<form style="text-align: left;" method="post" id="submit-form">
		<input type="hidden" name="view_id" id="view_id">
		<h1><span id='modal_title'></span> </h1>


<label for="view_shift">Shift</label>
<input type="text" name="view_shift" id="view_shift" class="view_shift" disabled>

<label for="view_region">Region</label>
<input type="text" name="view_region" id="view_region" disabled>

<label for="view_region_ob">Region OB number</label>
<input type="text" name="view_region_ob" id="view_region_ob" disabled >

<label for="view_supervisor">Supervisor</label>
<input type="text" name="view_supervisor" id="view_supervisor" disabled>

<label for="view_strength">Strength</label>
<div class="mainview view">
<div id="view" style="padding-bottom:45px;">
<table class="table" id="tabels">
		<thead>
			<tr>
<th>Members</th>
				<th>Vehicles</th>
				<th>Bikes</th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				<td name="view_total_members" id="view_total_members"></td>
				<td name="view_total_vehicles" id="view_total_vehicles"></td>
				<td name="view_total_bikes" id="view_total_bikes"></td>
			</tr>
		</tbody>
</table>

<!--<label for="view_remarks">Remarks</label>
<textarea name="view_remarks" id="view_remarks" rows="6" cols="50" disabled></textarea>-->

<label for="view_nodal_ob">Nodal Point OB number</label>
<input type="text" name="view_nodal_ob" id="view_nodal_ob" disabled>

<label for="view_nodal_remarks">Remarks by Nodal Point</label>
<textarea name="view_nodal_remarks" id="view_nodal_remarks" rows="6" cols="50" disabled></textarea>

<label for="view_captured_by">Captured by</label>
<input type="text" name="view_captured_by" id="view_captured_by" disabled>
</div>
</div>





	
	</form>
</div>


<!--*********************************************************************************************************-->

<div class="remodal1" data-remodal-id="modal">	
	<form style="text-align: left;" method="post" id="deploy-form" onsubmit="return validateSetRequiredField();" action="new_message/insert">
		<input type="hidden" name="deploy_id" id="deploy_id">
		<h1><span id='modal_title'></span> Strength report</h1>

<table>
			<tr>
				<td>
					<label for="deploy_date"><font color="red">Pick Date (USE THIS FORMAT 2016-02-05)</font></label><br>
					<input type="date" name="deploy_date" id="deploy_date">
				</td>
				<td>
</br><input type="hidden" name="fields" id="fields">
</td>

				<td><label for="drop_shifts">Shifts</label></br>
					<select id="drop_shifts" name="drop_shifts" style="width:100%" >
        					<option value="" disabled selected hidden>Select Shift</option>
						<option value="5am-1pm">5am - 1pm</option>
						<option value="1pm-9pm">1pm - 9pm</option>
						<option value="9pm-5am">9pm - 5am</option>
        				</select></td>
			</tr>
		</table>
		
		
<table id="deployTable">


<thead>
	<th></th>	
	<th>Region</th>
	<th></th>
<th></th>
	<th>Region OB</th>
	<th></th>
	<th>Nodal OB</th>
	<th></th>
	<th>Supervisor</th>
	<th></th>

	<th>Member</th>
	<th></th>

	<th>Vehicle</th>
	<th></th>

	<th>Bike</th>
	<th></th>

	<th>Remarks</th>
</thead>
	
<tbody>
</br>
<tr></tr>
</tbody>
</table>

</br>
		
		<center>
			<button type='submit' >Save</button>&nbsp;&nbsp;<button type='reset'>Clear</button>
		</center>
	</form>
</div>
<!--*************************************************************************************************************************-->
<!--***********NOT USED***********-->
<div class="remodal" data-remodal-id="modal_strength">	
	<form style="text-align: left;" method="post" id="submit-form" action="new_message/get_daily_deployment">
		<input type="hidden" name="id" id="id">
		<h1><span id='modal_title'></span>Calculate Daily Strength</h1>


<label for="calc_date">Pick Date (mm/dd/yyyy)</label><br>
		<input type="date" name="calc_date" id="calc_date" onclick="return calculate_daily_strength();">
</br>
<label for="calc_shift">Select Shift</label>
<br>		
<input type="radio" name="calc_shift" id="calc_shift1" onclick="return calculate_daily_strength();">  5am - 1pm
<br>
<input type="radio" name="calc_shift" id="calc_shift2" onclick="return calculate_daily_strength();">  1pm - 9pm
<br>
<input type="radio" name="calc_shift" id="calc_shift3" onclick="return calculate_daily_strength();">  9pm - 5am

</br></br>



<div id="display_daily_strength">
<h1>Daily Strength</h1>

<div class="mainview view">
<div id="view" style="padding-bottom:45px;">
<table class="table" id="tabels">
		<thead>
			<tr>
<th>Members</th>
				<th>Vehicles</th>
				<th>Bikes</th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				<td name="total_members" id="total_members"></td>
				<td name="total_vehicles" id="total_vehicles"></td>
				<td name="total_bikes" id="total_bikes"></td>
			</tr>
		</tbody>
</table>
</div>
</div>
</div>
				

		<br><br>
		<center>
			<button type='reset'>Clear</button>
		</center>
	</form>
</div>
<!--***********END NOT USED***********-->
<!--*********************************************************************************************************-->

<div class="remodal" data-remodal-id="modal_update">	
	<form style="text-align: left;" method="post" id="update-form" onsubmit="return validateLoading();" action="new_message/update">
<input type="hidden" name="nodal_update_id" id="nodal_update_id">
		<input type="hidden" name="nodal_update_date" id="nodal_update_date">
		<input type="hidden" name="nodal_update_shift" id="nodal_update_shift">
		
		<h1><span id='modal_title'></span> Strength report</h1>

<label for="region_nodal_ob">Region OB number</label><br>
		<input type="text" name="region_nodal_ob" id="region_nodal_ob" >
		
		
<label for="nodal_ob">Nodal Point OB number</label><br>
		<input type="text" name="nodal_ob" id="nodal_ob" >
		
</br>		

<table>
			<tr>
				<td><label for="update_members">Number of members</label><br>
				<input type="number" name="nodal_update_members" id="nodal_update_members" min="0"></td>&nbsp;&nbsp;
<td></td>
				<td><label for="update_vehicles">Number of vehicles</label><br>
				<input type="number" name="nodal_update_vehicles" id="nodal_update_vehicles" min="0"></td>&nbsp;&nbsp;
<td></td>
				<td><label for="update_bikes">Number of Bikes</label><br>
				<input type="number" name="nodal_update_bikes" id="nodal_update_bikes" min="0"></td>

</tr>
</table>
<input type="hidden" name="hidden_nodal_update_members" id="hidden_nodal_update_members">
<input type="hidden" name="hidden_nodal_update_vehicles" id="hidden_nodal_update_vehicles">
<input type="hidden" name="hidden_nodal_update_bikes" id="hidden_nodal_update_bikes">
</br>

<label for="nodal_sup">Supervisor</label><br>
		<input type="text" name="nodal_sup" id="nodal_sup" >

<label for="remarks">Remarks</label>
		<textarea name="nodal_remarks" id="nodal_remarks" rows="6" cols="50" ></textarea>	

		<br><br>
		<center>
			<button type='submit' >Save</button>&nbsp;&nbsp;<button type='reset'>Clear</button>
		</center>


	</form>
</div>

<!--*********************************************************************************************************-->



<!--*********************************************************************************************************-->

<div class="remodal" data-remodal-id="modal_con">	
<form style="text-align: left;" method="post" id="con-form" onsubmit="return validateLoading();" action="new_message/conclude">
		<input type="hidden" name="conclude_deploy_id" id="conclude_deploy_id">
		<h1><span id='modal_title'></span> Strength report</h1>




						<p><table  class="table">
							<tr>
								<td><p name="conclude_date" id="conclude_date"> </td>
							</tr>
							<tr>
								<td><p name="conclude_shift" id="conclude_shift"></td>
							</tr>
							<tr>
								<td><p name="conclude_mem" id="conclude_mem"></td>
							</tr>
							<tr>
								<td><p name="conclude_veh" id="conclude_veh"></td>
							</tr>
							<tr>
								<td><p name="conclude_bik" id="conclude_bik"></td>
							</tr>
<tr>
								<td><p name="conclude_prog" id="conclude_prog"></td>
							</tr>
						</table>
		<br><br>
		<center>
			<button type='submit' id="btn-save-con" >Conclude</button>
		</center>
	</form>
</div>



<!--**************************************************************************************************************************-->
<div class="mainview view">

<table class="table" id="tabels">
		<thead>
			<tr>
			<th>Date</th>
				<th>Shift</th>
				<th width="150px">Total Members</th>
				<th width="150px">Total Vehicles</th>
				<th width="150px">Total Bikes</th>
				<th>Conclude</th>
				
			
				
			</tr>
		</thead>
		
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Date</th>
				<th>Shift</th>
				<th>Total Members</th>
				<th>Total Vehicles</th>
				
				<th>Total Bikes</th>
				<th>Conclude</th>
				
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td colspan="8" class="dataTables_empty">Loading data from server</td>
			</tr>
		</tbody>
		
	</table>
	<br>
	<br>

<div id="view" style="padding-bottom:45px;">
	<table class="table" id="tabelDetails">
		<thead>
			<tr>
			<th width="100px">Date</th>
			<th width="100px">Shift</th>
				<th>Region</th>
				<th>Region OB</th>
				
				<th width="50px">Members</th>
				<th width="50px">Vehicles</th>
				<th width="50px">Bikes</th>
				<th>Captured by</th>
				<th>Supervisor</th>
				<th>Nodal Point OB</th>
				
			</tr>
		</thead>
		<tfoot id="form_filter_details" style="display:none">
			<tr align="center">
			<th>Date</th>
				<th>Shift</th>
				
				<th>Region</th>
				<th>Region OB</th>
				
				<th>Members</th>
				<th>Vehicles</th>
<th>Bikes</th>
				<th>Captured by</th>
				<th>Supervisor</th>
<th>Nodal Point OB</th>
				
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td colspan="8" class="dataTables_empty">Loading data from server</td>
			</tr>
		</tbody>
	</table>
<!--***********NOT USED***********-->
	<div class="remodal" data-remodal-id="modal_conclude">
    	<div class="page">
              <h1><b>Confirmation</b></h1>
              	<div class="content-area">
               		Do you want Conclude this data? 
              	</div>
              	<div class="action-area">
			 <form method="post" id="conclude-form" onsubmit="return validateLoading();" action="new_message/conclude">
                		<div class="action-area-right">
                  			<div class="button-strip">
				   		</br>
                    			
						<button type="submit">Yes</button>
                  			</div>
                		</div>
					</form>
              	</div>
            </div>
		</div>		 
	</div>
<!--***********END NOT USED***********-->
	<!-- Remove Modal -->
	<div class="remodal" data-remodal-id="modal_remove">
    	<div class="page">
              <h1><b>Confirmation</b></h1>
              	<div class="content-area">
               		Do you want delete this data? 
              	</div>
              	<div class="action-area">
			 		<form method="post" id="remove-form" action="new_message/remove">
                		<div class="action-area-right">
                  			<div class="button-strip">
				   				<input type="hidden" name="remove_category_id" id="remove_category_id">
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
var radio_shift;
var radio_calc_shift;
$('[data-remodal-id=modal]').remodal();
$('[data-remodal-id=modal_deploy]').remodal();
$('[data-remodal-id=modal_view]').remodal();
$('[data-remodal-id=modal_view_header]').remodal();
$('[data-remodal-id=modal_strength]').remodal();
$('[data-remodal-id=modal_con]').remodal();

$('[data-remodal-id=modal_remove]').remodal();
$('[data-remodal-id=modal_update]').remodal();
</script>
<script type="text/javascript"> 
/** Get request data region  **/

getRequest("new_message/get_regions", function(data) {
         
        var data = JSON.parse(data.responseText);
    console.log("get the region" + data);
		var i;
		for (i = 0; i < data.length; i++) {
			$("#menu_region_id").append("<option value="+data[i].region_id+">"+data[i].region_name+"</option>");
			$("#menu_region_id_recapture").append("<option value="+data[i].region_id+">"+data[i].region_name+"</option>");
			
			var region = data[i].region_name;
			var region_id = data[i].region_id;

			/*Creating deploy popup contents*/
				$('#deployTable > tbody:last-child').append('<tr><td>' + (i+1) + ') </td><td><label id=lbl_region_' + i + ' name=lbl_region_' + i + ' value=' + i + '> ' + region + ' </label></td><td><input type=hidden name=hidden_region_id_' + i + ' id=hidden_region_id_' + i + ' value=' + region_id  + ' ></td><td>&nbsp;</td><td><input type=text name=ob_num_' + i +' id=ob_num_' + i +' placeholder=OB/MM/YYYY></td><th>&nbsp;</th><td><input type=text name=nod_ob_num_' + i +' id=nod_ob_num_' + i +' placeholder=OB/MM/YYYY></td><td>&nbsp;</td><td><input type=text name=sup_' + i +'  id=sup_' + i +' ></td><td>&nbsp;</td><div width=10px ><td><input type=number name=mem_' + i +' id=mem_' + i +' placeholder=0 value=0></td><td>&nbsp;</td><td><input type=number name=veh_' + i +'  id=veh_' + i +' placeholder=0 value=0 min=0 width=10></td><td>&nbsp;</td><td><input type=number name=bik_' + i +' id=bik_' + i +' placeholder=0 value=0 min=0 width=10></td></div><td>&nbsp;</td><td><textarea name=remarks_' + i +'  rows=6 cols=50 ></textarea></td></tr>');
/*setting value of hidden field called fields*/						}
$("#fields").val(i);
     
    });
    
    
    /***********NOT USED************/
   function calculate_daily_strength()
   {
   
 	if(($("#calc_date").val() == '' || $("#calc_date").val() == null || $("#calc_date").val() == 'mm/dd/yyy') || (radio_calc_shift == '' || radio_calc_shift == null))
 	{
 		$("#display_daily_strength").hide();
 	}else
 	{
   		getRequest("new_message/get_daily_deployment/" + radio_calc_shift.replace(/\ /g,"_") + "/" +  $("#calc_date").val() , function(data) {
         
       			var data = JSON.parse(data.responseText);
        		var total_members = 0;
        		var total_vehicles = 0;
        		var total_bikes = 0;
        
        		for (var i = 0; i < data.length; i++) {
        			total_members  = parseInt(total_members) + parseInt(data[i].members);
        			total_vehicles = parseInt(total_vehicles ) + parseInt(data[i].vehicles );
        			total_bikes = parseInt(total_bikes ) + parseInt(data[i].bikes );
        		}
        
        	document.getElementById("total_members").innerHTML		= 	"" + total_members;
        	document.getElementById("total_vehicles").innerHTML		= 	"" + total_vehicles;
        	document.getElementById("total_bikes").innerHTML		= 	"" + total_bikes;
        	$("#display_daily_strength").show();
        
        
    	
    		});
  	}
   
   
   } 
/***********END NOT USED************/




/***********NOT USED************/
  function validateRequiredField()
   {
     var shift=document.forms["submit-form"]["hidden_shifts"].value;
     var region=document.forms["submit-form"]["menu_region"].value;
     
     var members=document.forms["submit-form"]["members"].value;
     var vehicles=document.forms["submit-form"]["vehicles"].value;
     var bikes=document.forms["submit-form"]["bikes"].value;
     var supervisor=document.forms["submit-form"]["supervisor"].value;
     
     var region_ob = document.forms["submit-form"]["region_ob"].value;
     var remarks = document.forms["submit-form"]["remarks"].value;
   
     if (shift == null || shift== "") 
	   	{
		        alert("Select a shift");
	        	document.forms["submit-form"]["shift1"].focus();
	        return false;
	}else
	    {
	    	//if (region == null || region== "") 
	   	//{
		       // alert("Select a region");
		       // document.forms["submit-form"]["menu_region_id"].focus();
		       // return false;
		//}else 
		if (region_ob == null || region_ob == "") 
	    	{
	        	alert("Enter the regional OB number");
	        	document.forms["submit-form"]["region_ob"].focus();
	        	return false;
	        }else if(supervisor == null || supervisor == "") 
	   	{
		        alert("Enter the supervisors full name");
		        document.forms["submit-form"]["supervisor"].focus();
		        return false;
		}else if (members == null || members == "") 
	   	{
		        alert("Enter the number of members");
		        document.forms["submit-form"]["members"].focus();
		        return false;
		}else if (vehicles == null || vehicles == "") 
	   	{
		        alert("Enter the number of vehicles");
		        document.forms["submit-form"]["vehicles"].focus();
		        return false;
		}else if (bikes == null || bikes == "") 
	   	{
		        alert("Enter the number of bikes");
		        document.forms["submit-form"]["bikes"].focus();
		        return false;
		}else if (remarks == null || remarks == "") 
	   	{
		        alert("Kindly provide Remarks");
		        document.forms["submit-form"]["remarks"].focus();
		        return false;
		}else{
			alertSubmit("Loading");
	    		return true;
	    	}
	    }
	  
    
    }
/***********END NOT USED************/
function validateSetRequiredField()
   {
   	
	var shift=document.forms["deploy-form"]["drop_shifts"].value;
	var deploy_date=document.forms["deploy-form"]["deploy_date"].value;
	
	if (deploy_date == null || deploy_date == "") 
	{
		alert("Select the current date");
		document.forms["deploy-form"]["deploy_date"].focus();
		return false;
	}
	else
	{
		if (shift == null || shift== "") 
		{
			alert("Select a shift");
			document.forms["deploy-form"]["drop_shifts"].focus();
			return false;
		}else{
			var post_date = '';
			var post_shift = '';
			alertSubmit("Loading");
			return true;
		}
	}
	
   
   }

function alertSubmit(query){
			iosOverlay({
				text: "Loading",
				duration: 2e3//,
				//icon: ".../images/loading.gif"
			});
			return false;
			}
function validateLoading()
   {
	alertSubmit("Loading");
			return true;

}

  
    
$(document).ready(function() {

var post_date = '';
var post_shift = '';

 $("#display_daily_strength").hide();

$("a.modal_update").hide();
$("a.modal_strength").hide();
$("a.modal").hide();
$("a.modal_conclude").hide();
$("#btn-save-con").show();


/**Get request data logged user to determine which buttons to hide **/
	getRequest("new_message/get_logged", function(data) {
         
        var data = JSON.parse(data.responseText);
		 console.log("get the logged " + data);
    if(data == 17)
{
$("a.modal_update").show();
$("a.modal").show();
$("a.modal_conclude").show();
$("a.modal_strength").show();
}else{
$("a.modal_update").hide();
$("a.modal").hide();
$("a.modal_conclude").hide();
$("a.modal_strength").hide();
}
    });
 
 
 
 
  /** Get request data region**/
    $("#menu_region_id").change(function(){
    
    	 
    	 $("#menu_region").val($('#menu_region_id option:selected').text());
    });



    
     
 
$("input[name=shifts]:radio").change(function () {

 var rate_value;
 
if (document.getElementById('shift1').checked) {
  rate_value = "5am - 1pm";
  $("#hidden_shifts").val(rate_value);
  
}else if (document.getElementById('shift2').checked) {
  rate_value = "1pm - 9pm";
  $("#hidden_shifts").val(rate_value);
 
}else if (document.getElementById('shift3').checked) {
  rate_value = "9pm - 5am";
  $("#hidden_shifts").val(rate_value);
 
}

    
    });



$("input[name=calc_shift]:radio").change(function () {

 
if (document.getElementById('calc_shift1').checked) {
  radio_calc_shift = "5am - 1pm";
 
  
}else if (document.getElementById('calc_shift2').checked) {
  radio_calc_shift = "1pm - 9pm";

 
}else if (document.getElementById('calc_shift3').checked) {
  radio_calc_shift= "9pm - 5am";
  
 
}

    
    });

	/** Action button menu **/
	  
	 
	/* Insert button */
	$('#btn-insert').bind('click', function(){
		// Reset submit form
		$('#deploy_date').val('');
		$('#drop_shifts').val('');


		//$("input[name=shifts]:radio").removeAttr("checked");
		$('#modal_title').html($('#btn-insert').text());
	});


/* View button */
	$('#btn-view').bind('click', function(){
$('#modal_title').html($('#btn-view').text());
		// Reset submit form
		 $("#display_daily_strength").hide();
		
		$("input[name=calc_shift]:radio").removeAttr("checked");
		document.getElementById("total_members").innerHTML		= 	"";
		document.getElementById("total_vehicles").innerHTML		= 	"";
		document.getElementById("total_bikes").innerHTML		= 	"";
		
	});

$('#btn-view_header').bind('click', function(){
		// Reset submit form
		 $("#display_daily_strength").hide();
		
		$("input[name=calc_shift]:radio").removeAttr("checked");
		document.getElementById("total_members").innerHTML		= 	"";
		document.getElementById("total_vehicles").innerHTML		= 	"";
		document.getElementById("total_bikes").innerHTML		= 	"";
		
		


		
		$('#modal_title').html($('#btn-view_header').text());
	});


/* Update strength */
	$('#btn-strength').bind('click', function(){
	
		$('#modal_title').html($('#btn-strength').text());
	});

	/* Update button */
	$('#btn-update').bind('click', function(){

$('#modal_title').html($('#btn-update').text());

		if($("#nodal_ob").val()!="")
		{
			//$('#nodal_ob').attr("disabled","disabled");
		}
		else{
			$('#nodal_ob').removeAttr("disabled");
		}
		if($("#nodal_remarks").val()!="")
		{
			//$('#nodal_remarks').attr("disabled","disabled");
		}
		else{
			$('#nodal_remarks').removeAttr("disabled");
		}
	
		$('#modal_title').html($('#btn-update').text());
	});
	
	/* Filter button */	
  	$('#btn-filter').bind('click', function(){
		
		if($('#btn-filter').attr("value") == "on"){
			$('#form_filter').show();
$('#form_filter_details').show();
			$('#btn-filter').attr("value","off");
    	}else{
			$('#form_filter').hide();
$('#form_filter_details').hide();
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

/* Remove button */
	$('#btn-con').bind('click', function(){
			
		$('#modal_title').html($('#btn-con').text());	
		
	});

  
	/** Set datatables **/

	var oTable = $('#tabels').dataTable({
		"bProcessing": false,
		"bServerSide": true,
		"aLengthMenu": [3],
		"iDisplayLength": 3,
		"sAjaxSource": "new_message/get_deployment_calc",
		'sPaginationType': 'full_numbers',
		"aaSorting": [[ 0, "desc" ]],					
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
	      	aoColumns: [{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" }, { type: "text" }]
		});


	/** Show detail data datatables **/
			
	   /*$('#tabels tbody').on( 'dblclick','td', function () {
			var nTr = $(this).parents('tr')[0];
			if ( oTable.fnIsOpen(nTr) )
			{
				oTable.fnClose( nTr );
			}
			else
			{
				oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
			}
		} );*/
	
		/** Set edit value after click datatables **/	
		$('#tabels tbody').on('click','tr', function () {
		
		 var aData = oTable.fnGetData(this);

		  
		 if(aData != null){

			post_date=aData[0];
			post_shift=aData[1];

			oTableDetails.fnReloadAjax();

			//$('#remove_table_id').val(aData[6]);
			$('#view_id').val(aData[12]);
			$('#id').val(aData[12]);
			$('#update_id').val(aData[12]);
			$('#conclude_deploy_id').val(aData[6]);
			document.getElementById("conclude_date").innerHTML		= 	 "Date: " + aData[0];
			document.getElementById("conclude_shift").innerHTML		= 	 "Shift: " + aData[1];
			document.getElementById("conclude_mem").innerHTML		= 	 "Members: " + aData[2];
			document.getElementById("conclude_veh").innerHTML		= 	 "Vehicles: " + aData[3];
			document.getElementById("conclude_bik").innerHTML		= 	 "Bikes: " + aData[4];
			document.getElementById("conclude_prog").innerHTML		= 	 "Concluded by: " + aData[5];
			
			if(aData[5] == "Inprogress")
			{
				$("#btn-save-con").show();
			}else{
				$("#btn-save-con").hide();
			}

 			if ( $(this).hasClass('row_selected') ) {

            		$(this).removeClass('row_selected');

			post_date='';
			post_shift='';
				
/*Reloads table details and gets new values based on date and shift selected*/
				oTableDetails.fnReloadAjax();

				// clear data form
				$('#remove-form').val('');
				//$('#con-form').val('');
				$('#submit-form input').val('');

				$('#btn-view').attr("disabled","disabled");
				$('#btn-view_header').attr("disabled","disabled");
				$('#btn-update').attr("disabled","disabled");
				$('#btn-remove').attr("disabled","disabled");
				//$('#btn-con').attr("disabled","disabled");

        		} else {

            			oTable.$('tr.row_selected').removeClass('row_selected');
oTableDetails.$('tr.row_selected').removeClass('row_selected');

            			$(this).addClass('row_selected');
				//$('#btn-view').removeAttr("disabled");
				$('#btn-view_header').removeAttr("disabled");
				//$('#btn-update').removeAttr("disabled");
				$('#btn-remove').removeAttr("disabled");
				$('#btn-con').removeAttr("disabled");
				$('#btn-update').attr("disabled","disabled");
				$('#btn-view').attr("disabled","disabled");




        	}
	  	}
		});



		// Alert Status
		function alertSuccess(query){
			iosOverlay({
				text: "Success!",
				duration: 2e3,
				icon: "images/9755898871_a9cf3b0dd1_o.png"
			});
			return false;
		}

		function alertError(query){
			iosOverlay({
				text: "Error!",
				duration: 2e3,
				icon: "images/9735695398_2b8cbfc7df_o.png"
			});
			return false;
		}

/** End **/

/** Set datatable details **/

post_date = $('#post_date').val();
post_shift = $('#post_shift').val();
	var oTableDetails = $('#tabelDetails').dataTable({
		"bProcessing": false,
		"bServerSide": true,
"iDisplayLength": 50,

		"sAjaxSource": "new_message/get",
"fnServerParams": function ( aoData ) {
            				aoData.push( { "name": "post_date", "value": post_date },{ "name": "post_shift", "value": post_shift } );
       				 },
		'sPaginationType': 'full_numbers',
		"aaSorting": [[ 0, "desc" ]],					
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
	      	aoColumns: [{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" },{ type: "text" }, { type: "text" }]
		});


/** Set edit value after click datatables **/	
		$('#tabelDetails tbody').on('click','tr', function () {
		
		 var aData = oTableDetails.fnGetData(this);
		  
		 if(aData != null){
			$('#remove_table_id').val(aData[12]);
			$('#view_id').val(aData[12]);
			$('#id').val(aData[12]);



			//$('#remove_deploy_id').val(aData[12]);
			
			$('#nodal_update_id').val(aData[12]);
			$('#view_shift').val(aData[1]);
			$('#view_region_ob').val(aData[3]);
			$('#view_region').val(aData[2]);
			$('#view_supervisor').val(aData[8]);
			$('#nodal_ob').val(aData[9]);
			$('#nodal_remarks').val(aData[11]);
			$('#view_captured_by').val(aData[7]);
			document.getElementById("view_total_members").innerHTML		= 	 aData[4];
			document.getElementById("view_total_vehicles").innerHTML	= 	 aData[5];
			document.getElementById("view_total_bikes").innerHTML		= 	 aData[6];
			$('#view_remarks').val(aData[10]);
			$('#view_nodal_ob').val(aData[9]);
			$('#view_nodal_remarks').val(aData[11]);
			
			//update
			$('#update_region_ob').val(aData[3]);
			$('#update_members').val(aData[4]);
			$('#update_vehicles').val(aData[5]);
			$('#update_bikes').val(aData[6]);
			$('#nodal_sup').val(aData[8]);
			
			//update nodal point
			$('#nodal_update_date').val(aData[0]);
			$('#nodal_update_shift').val(aData[1]);
			$('#region_nodal_ob').val(aData[3]);
			$('#nodal_update_members').val(aData[4]);
			$('#nodal_update_vehicles').val(aData[5]);
			$('#nodal_update_bikes').val(aData[6]);
			
			//hidden fields
			$('#hidden_nodal_update_members').val(aData[4]);
			$('#hidden_nodal_update_vehicles').val(aData[5]);
			$('#hidden_nodal_update_bikes').val(aData[6]);
			
			//$('#nodal_update_date').val(post_date);
			//$('#nodal_update_shift').val(post_shift);
	 
 			if ( $(this).hasClass('row_selected') ) {
            		$(this).removeClass('row_selected');
				// clear data form
				$('#remove-form').val('');
				//$('#con-form').val('');
				$('#submit-form input').val('');
				$('#deploy-form input').val('');
				$('#btn-view').attr("disabled","disabled");
				$('#btn-update').attr("disabled","disabled");
				

				$('#btn-nodal-update').attr("disabled","disabled");
				$('#btn-remove').attr("disabled","disabled");
        	} else {
			oTableDetails.$('tr.row_selected').removeClass('row_selected');
oTable.$('tr.row_selected').removeClass('row_selected');
            		$(this).addClass('row_selected');

				$('#btn-view').removeAttr("disabled");
				$('#btn-update').removeAttr("disabled");
				//$('#btn-con').removeAttr("disabled");

				$('#btn-nodal-update').removeAttr("disabled");
				$('#btn-remove').removeAttr("disabled");

$('#btn-con').attr("disabled","disabled");
			

//trigger value
				$( "#btn-view_header" ).trigger( "click" );

				
				
        	}
	  	}
		});
		
	
		/** Set edit value after click datatables **/	
		$('#tabelDetails tbody').on('dblclick','tr', function () {
		
		 var aData = oTableDetails.fnGetData(this);
		  
		 if(aData != null){
		
			$('#remove_table_id').val(aData[12]);
			$('#view_id').val(aData[12]);
			$('#id').val(aData[12]);
			$('#nodal_update_id').val(aData[12]);
			$('#view_shift').val(aData[1]);
			$('#view_region_ob').val(aData[3]);
			$('#view_region').val(aData[2]);
			$('#view_supervisor').val(aData[8]);
			$('#nodal_ob').val(aData[9]);
			$('#nodal_remarks').val(aData[11]);
			$('#view_captured_by').val(aData[7]);
			document.getElementById("view_total_members").innerHTML		= 	 aData[4];
			document.getElementById("view_total_vehicles").innerHTML	= 	 aData[5];
			document.getElementById("view_total_bikes").innerHTML		= 	 aData[6];
			$('#view_remarks').val(aData[10]);
			$('#view_nodal_ob').val(aData[9]);
			$('#view_nodal_remarks').val(aData[11]);
			
			//update
			/*$('#update_region_ob').val(aData[3]);
			$('#update_members').val(aData[4]);
			$('#update_vehicles').val(aData[5]);
			$('#update_bikes').val(aData[6]);
			
			//update nodal point
			$('#nodal_update_members').val(aData[4]);
			$('#nodal_update_vehicles').val(aData[5]);
			$('#nodal_update_bikes').val(aData[6]);*/
	 
 			if ( $(this).hasClass('row_selected') ) {
            		$(this).removeClass('row_selected');
				// clear data form
				$('#remove-form').val('');
				//$('#conclude-form').val('');
				$('#submit-form input').val('');
				$('#btn-view').attr("disabled","disabled");
				$('#btn-update').attr("disabled","disabled");
				$('#btn-con').attr("disabled","disabled");

				$('#btn-nodal-update').attr("disabled","disabled");
				$('#btn-remove').attr("disabled","disabled");
        	} else {
            	oTableDetails.$('tr.row_selected').removeClass('row_selected');
            	$(this).addClass('row_selected');
				$('#btn-view').removeAttr("disabled");
				$('#btn-update').removeAttr("disabled");
				//$('#btn-con').removeAttr("disabled");
				//$('#btn-con').attr("disabled","disabled");
				$('#btn-nodal-update').removeAttr("disabled");
				$('#btn-remove').removeAttr("disabled");

				
				$('#btn-con').attr("disabled","disabled");

				//test if values are empty before update
				//trigger value
				$( "#btn-view" ).trigger( "click" );
        	}
	  	}
		});
		

/** End datatable details**/
		
		/** Form submit action **/ 

		/* Set "submit-form" action */	 
		$('#submit-form').ajaxForm({
		   resetForm: true,
		   cache: false,
		   success: alertForm
		});
		
		/* Set "submit-form" action */	 
		$('#deploy-form').ajaxForm({
		   resetForm: true,
		   cache: false,
		   success: alertForm
		});


/* Set "update-form" action */	 
		$('#update-form').ajaxForm({
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

/* Set "conclude-form" action */
		$('#con-form').ajaxForm({
		   resetForm: true,
		   cache: false,
		   success: alertForm
		});
		
		/* Alert form action */
		function alertForm(query){
			// Reload page
			oTable.fnReloadAjax();
			oTableDetails.fnReloadAjax();

			var post_date = '';
			var post_shift = '';

			$('[data-remodal-id=modal]').remodal().close();
			$('[data-remodal-id=modal_update]').remodal().close();
			$('[data-remodal-id=view]').remodal().close();
			$('[data-remodal-id=modal_remove]').remodal().close();
			$('[data-remodal-id=modal_con]').remodal().close();

			alertSuccess(query);
		}
			
		
	});
</script>