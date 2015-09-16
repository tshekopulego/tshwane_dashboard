<!-- Content -->
<div class="remodal" data-remodal-id="modal">
	<form style="text-align: left;" method="post" id="submit-form" name="assert_form" onsubmit="return validateForm()" action="promo/insert">
	 	 
		<input type="hidden" name="assets_id" id="assets_id">
		<h1><span id='modal_title'></span> Assets</h1>
		<label for="call_sign">Call sign</label>
		<input type="text" name="call_sign" id="call_sign">
		<label for="reg_num">Registration Number</label>
		<input type="text" name="reg_num" id="reg_num">
		<label for="veh_type">Vehicle Type</label>
		<input type="text" name="veh_type" id="veh_type">
		<select id="menu_region_id" name="menu_region_id" style="width:100%" >
			<option value="">Select Region</option>
        	</select><br><br>
        	<select id="status" name="status" style="width:100%" >
			<option value="">Select status</option>
			<option value="In service">In service</option>
			<option value="Out of service">Out of service</option>
        	</select>
        	<input type="hidden" name="menu_region" id="menu_region">
		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<button type='reset'>Cancel</button>
		</center>
	</form>
</div>

<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-taxi"> </span> Assets</span>
<div style="float:right;">
	<div class="menu">
		<a href="#modal"><button id="btn-insert">Capture</button></a> 
		<a href="#modal"><button id="btn-update" disabled="disabled">Update</button></a>
		<a href="#modal_remove"><button id="btn-remove" disabled="disabled">Remove</button></a>
		<button id="btn-filter" value="on">Filter</button>
	</div>
</div>
</div>
<div class="mainview view">
<div id="view" style="padding-bottom:45px;">
	<!-- Datatables -->
	<!--
	<div id="header">
		<h1>Loading like iOS<span>Building a loading alert with JavaScript</span></h1>
		<nav class="demos">
			<div id="loading" class="btn">Loading</div>
			<div id="checkMark" class="btn">Success</div>
		   <div id="cross" class="btn">Error</div>
		</nav>
	</div>
	-->
	<table class="table" id="tabels">
		<thead>
			<tr>
				<th>Call sign</th>
				<th>Registration Number</th>
				<th>Vehicle Type</th>		
				<th>Regions/Units</th>
				<th>Status</th>
				<th>Captured Date</th>		
				<th>Captured by</th>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Call sign</th>
				<th>Registration Number</th>
				<th>Vehicle Type</th>		
				<th>Regions/Units</th>
				<th>Status</th>
				<th>Captured Date</th>		
				<th>Captured by</th>
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
			 		<form method="post" id="remove-form" action="promo/remove">
                		<div class="action-area-right">
                  			<div class="button-strip">
				   				<input type="hidden" name="remove_promo_id" id="remove_promo_id">
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
	
		 /** Get request data region  **/
	getRequest("promo/get_regions", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#menu_region_id").append("<option value="+data[i].region_name+">"+data[i].region_name+"</option>");
        }
        
        

    });
    
     $("#menu_region_id").change(function(){
    
    	 
    	 $("#menu_region").val($('#menu_region_id option:selected').text());
    });
    
     
</script>
<script type="text/javascript"> 
/*validating form input*/
function validateForm() {
   //declaration of variables
    var sign = document.forms["assert_form"]["call_sign"].value;
    var regnum= document.forms["assert_form"]["reg_num"].value;
    var vehecleType= document.forms["assert_form"]["veh_type"].value;
    var menuRegion= document.forms["assert_form"]["menu_region_id"].value;
    var status= document.forms["assert_form"]["status"].value;
    //logical conditions
    if (sign  == null || sign  == "") {
        alert("Call sign must be filled out");
        document.forms["assert_form"]["call_sign"].focus();
        return false;
    }else {
        if (regnum== null || regnum== "") {
        alert("Registration number must be filled out");
        document.forms["assert_form"]["reg_num"].focus();
        return false;
	}else {
	    if (vehecleType== null || vehecleType== "") {
      		  alert("Vehecle type must be filled out");
      		  document.forms["assert_form"]["veh_type"].focus();
	        return false;
	     }else {
		    if (menuRegion== null || menuRegion== "") {
	      		  alert("Region must be selected");
	      		  document.forms["assert_form"]["menu_region_id"].focus();
		        return false;
		     }else {
			    if (status== null || status == "") {
		      		  alert("status must be selected");
		      		  document.forms["assert_form"]["status"].focus();
			        return false;
			     }else {
				  return true;  
		             }
	             }
             }
        }
    }
}

$(document).ready(function() {
	
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
  
	/** Set datatables **/

	var oTable = $('#tabels').dataTable({
		"bProcessing": false,
		"bServerSide": true,
		"iDisplayLength": 50,
		"sAjaxSource": "promo/get",
		'sPaginationType': 'full_numbers',
		"aaSorting": [[ 5, "desc" ]],						
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
			// Set value form after select table for update data
			$('#remove_promo_id').val(aData[7]);
			$('#assets_id').val(aData[7]);
			$('#call_sign').val(aData[0]);
			$('#reg_num').val(aData[1]);
			$('#veh_type').val(aData[2]);
			
			$('#region').val(aData[3]);
			
			$('#menu_region_id').val(aData[3]);
			$('#status').val(aData[4]);
			$('#captured_date').val(aData[5]);
			$('#capturedby').val(aData[6]);
			
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
				$('#remove-form').val('');
				$('#submit-form input').val('');
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