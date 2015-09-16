<!-- Content -->

<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-book"> </span>Strength Report</span>
<div style="float:right;">
	<div class="menu">

	        <a href="#modal"><button id="btn-insert">Deploy</button></a>
	<a href="#modal_view" ><button id="btn-view" disabled="disabled">View</button></a>
	<a href="#modal_strength" class="modal_strength"><button id="btn-strength">Strength</button></a>
		<a href="#modal_update" class="modal_update"><button id="btn-update" disabled="disabled">Update</button></a>
		<!--<a href="#modal_remove"><button id="btn-remove" disabled="disabled">Remove</button></a>-->
		<button id="btn-filter" value="on">Filter</button>
	</div>
</div>
</div>

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

<label for="view_remarks">Remarks</label>
<textarea name="view_remarks" id="view_remarks" rows="6" cols="50" disabled></textarea>

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

<div class="remodal" data-remodal-id="modal">	
	<form style="text-align: left;" method="post" id="submit-form" onsubmit="return validateRequiredField();" action="message/insert">
		<input type="hidden" name="deploy_id" id="deploy_id">
		<h1><span id='modal_title'></span> Strength report</h1>





		<label for="shifts">Select Shift</label>
<br>		
<input type="radio" name="shifts" id="shift1" class="radioClass" >  5am - 1pm
<br>
<input type="radio" name="shifts" id="shift2" class="radioClass" >  1pm - 9pm
<br>
<input type="radio" name="shifts" id="shift3" class="radioClass">  9pm - 5am
</br>
<input type="hidden" name="hidden_shifts" id="hidden_shifts">

<label for="menu_region_id">Region</label>
<select id="menu_region_id" name="menu_region_id" style="width:100%" >
			<option value="">Select Region</option>
        	</select>
        	
        	<input type="hidden" name="menu_region" id="menu_region"/>
 </br>      	
        <label for="region_ob">Region OB number</label>
<input type="text" name="region_ob" id="region_ob" placeholder="00/MM/YYYY">
</br>	
        	<label for="supervisor">Supervisor</label>
<input type="text" name="supervisor" id="supervisor">
<table>
<tr>
		<td><label for="members">Number of members</label><br>
		<input type="number" name="members" id="members" min="0" placeholder="0"></td>&nbsp;&nbsp;

		<td><label for="vehicles">Number of vehicles</label><br>
		<input type="number" name="vehicles" id="vehicles" min="0" placeholder="0"></td>&nbsp;&nbsp;
<td>
<label for="bikes">Number of Bikes</label><br>
		<input type="number" name="bikes" id="bikes" min="0" placeholder="0"></td>
</tr>
</table>
		
		<label for="remarks">Remarks</label>
		<textarea name="remarks" rows="6" cols="50" ></textarea>
        	
		<center>
			<button type='submit' >Save</button>&nbsp;&nbsp;<button type='reset'>Clear</button>
		</center>
	</form>
</div>
<!--*************************************************************************************************************************-->

<div class="remodal" data-remodal-id="modal_strength">	
	<form style="text-align: left;" method="post" id="submit-form" action="message/get_daily_deployment">
		<input type="hidden" name="id" id="id">
		<h1><span id='modal_title'></span> Calculate Daily Strength</h1>


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
<!--*********************************************************************************************************-->

<div class="remodal" data-remodal-id="modal_update">	
	<form style="text-align: left;" method="post" id="update-form" action="message/update">
		<input type="hidden" name="update_id" id="update_id">
		<h1><span id='modal_title'></span> Update Nodal Point OB number</h1>


<label for="nodal_ob">Nodal Point OB number</label><br>
		<input type="text" name="nodal_ob" id="nodal_ob" placeholder="00/MM/YYYY" >
</br>		
<label for="remarks">Remarks</label>
		<textarea name="nodal_remarks" id="nodal_remarks" rows="6" cols="50" ></textarea>	

		<br><br>
		<center>
			<button type='submit' >Save</button>&nbsp;&nbsp;<button type='reset'>Clear</button>
		</center>
	</form>
</div>

<!--**************************************************************************************************************************-->
<div class="mainview view">
<div id="view" style="padding-bottom:45px;">
	<table class="table" id="tabels">
		<thead>
			<tr>
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
		</thead>
		<tfoot id="form_filter" style="display:none">
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

	<!-- Remove Modal -->
	<div class="remodal" data-remodal-id="modal_remove">
    	<div class="page">
              <h1><b>Confirmation</b></h1>
              	<div class="content-area">
               		Do you want delete this data? 
              	</div>
              	<div class="action-area">
			 		<form method="post" id="remove-form" action="category/remove">
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
$('[data-remodal-id=modal_view]').remodal();
	$('[data-remodal-id=modal_strength]').remodal();
$('[data-remodal-id=modal_remove]').remodal();
$('[data-remodal-id=modal_update]').remodal();
</script>
<script type="text/javascript"> 
/** Get request data region  **/
	getRequest("message/get_regions", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#menu_region_id").append("<option value="+data[i].region_name+">"+data[i].region_name+"</option>");
			$("#menu_region_id_recapture").append("<option value="+data[i].region_name+">"+data[i].region_name+"</option>");
        }
      

    });
    
    
   function calculate_daily_strength()
   {
   
 if(($("#calc_date").val() == '' || $("#calc_date").val() == null || $("#calc_date").val() == 'mm/dd/yyy') || (radio_calc_shift == '' || radio_calc_shift == null))
 {
 	$("#display_daily_strength").hide();
 }else
 {
   getRequest("message/get_daily_deployment/" + radio_calc_shift.replace(/\ /g,"_") + "/" +  $("#calc_date").val() , function(data) {
         
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
	    	if (region == null || region== "") 
	   	{
		        alert("Select a region");
		        document.forms["submit-form"]["menu_region_id"].focus();
		        return false;
		}else if (region_ob == null || region_ob == "") 
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
	    		return true;
	    	}
	    }
	  
    
    }  
    
$(document).ready(function() {

 $("#display_daily_strength").hide();

$("a.modal_update").hide();
$("a.modal_strength").hide();


/**Get request data logged user to determine which buttons to hide **/
	getRequest("message/get_logged", function(data) {
         
        var data = JSON.parse(data.responseText);
    if(data == "Nodal Point")
{
$("a.modal_update").show();
$("a.modal_strength").show();
}else{
$("a.modal_update").hide();
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
		$('#submit-form input').val('');
		$("input[name=shifts]:radio").removeAttr("checked");
		$('#modal_title').html($('#btn-insert').text());
	});

/* View button */
	$('#btn-view').bind('click', function(){
		// Reset submit form
		 $("#display_daily_strength").hide();
		
		$("input[name=calc_shift]:radio").removeAttr("checked");
		document.getElementById("total_members").innerHTML		= 	"";
		document.getElementById("total_vehicles").innerHTML		= 	"";
		document.getElementById("total_bikes").innerHTML		= 	"";
		
		


		
		$('#modal_title').html($('#btn-view').text());
	});

/* Update strength */
	$('#btn-strength').bind('click', function(){
	
	
	
		$('#modal_title').html($('#btn-strength').text());
	});

	/* Update button */
	$('#btn-update').bind('click', function(){

	if($("#nodal_ob").val()!="")
	{
		$('#nodal_ob').attr("disabled","disabled");
	}
	else{
	$('#nodal_ob').removeAttr("disabled");
	}
	if($("#nodal_remarks").val()!="")
	{
		$('#nodal_remarks').attr("disabled","disabled");
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
  
	/** Set datatables **/

	var oTable = $('#tabels').dataTable({
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "message/get",
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
	      	aoColumns: [{ type: "text" },
						{ type: "text" },
						{ type: "text" },
						{ type: "text" },
{ type: "text" },
						{ type: "text" },
						{ type: "text" },
{ type: "text" },
						{ type: "text" },
				        { type: "text" }]
		});


	/** Show detail data datatables **/
	
			
	   $('#tabels tbody').on( 'dblclick','td', function () {
			var nTr = $(this).parents('tr')[0];
			if ( oTable.fnIsOpen(nTr) )
			{
				oTable.fnClose( nTr );
			}
			else
			{
				oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
			}
		} );
	
		/** Set edit value after click datatables **/	
		$('#tabels tbody').on('click','tr', function () {
		
		 var aData = oTable.fnGetData(this);
		  
		 if(aData != null){
		
			//$('#remove_table_id').val(aData[6]);
$('#view_id').val(aData[12]);
$('#id').val(aData[12]);
$('#update_id').val(aData[12]);
			$('#view_shift').val(aData[1]);
			$('#view_region_ob').val(aData[3]);
			$('#view_region').val(aData[2]);
			$('#view_supervisor').val(aData[8]);
$('#nodal_ob').val(aData[9]);
			$('#nodal_remarks').val(aData[11]);
$('#view_captured_by').val(aData[7]);
			document.getElementById("view_total_members").innerHTML		= 	 aData[4];
document.getElementById("view_total_vehicles").innerHTML		= 	 aData[5];
document.getElementById("view_total_bikes").innerHTML		= 	 aData[6];
			$('#view_remarks').val(aData[10]);
$('#view_nodal_ob').val(aData[9]);
$('#view_nodal_remarks').val(aData[11]);
	 
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
				$('#remove-form').val('');
				$('#submit-form input').val('');
$('#btn-view').attr("disabled","disabled");
				$('#btn-update').attr("disabled","disabled");
				$('#btn-remove').attr("disabled","disabled");
        	} else {
            	oTable.$('tr.row_selected').removeClass('row_selected');
            	$(this).addClass('row_selected');
$('#btn-view').removeAttr("disabled");
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
		
		/** Form submit action **/ 

		/* Set "submit-form" action */	 
		$('#submit-form').ajaxForm({
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
		
		/* Alert form action */
		function alertForm(query){
			// Reload page
			oTable.fnReloadAjax();
			$('[data-remodal-id=modal]').remodal().close();
$('[data-remodal-id=modal_update]').remodal().close();
$('[data-remodal-id=view]').remodal().close();
			$('[data-remodal-id=modal_remove]').remodal().close();
			alertSuccess(query);
		}
			
		
	});
</script>