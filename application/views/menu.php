<!-- Content -->
<div class="remodal" data-remodal-id="modal">
	<form style="text-align: left;" method="post" id="submit-form" onsubmit="return validateRequiredField();" action="menu/insert">
	 	  	
		<input type="hidden" name="category_id" id="category_id">
		<h1><span id='modal_title'></span> Enquiry Details</h1>
		<select id="enquiry_type_id" name="enquiry_type_id" style="width:100%" >
			<option value="0" >Select Enquiry Type</option>
		</select>
		<input type="hidden" name="enquiry_type_id2" id="enquiry_type_id2">
		<label for="category_name">Name</label>
		<input type="text" name="category_name" id="category_name">
		<label for="category_addrs">Address</label>
		<input type="text" name="category_addrs" id="category_addrs">
		<label for="category_phone">Phone</label>
		<input type="text" name="category_phone" id="category_phone"  maxlength="10">
		<label for="category_notes">Notes</label>
		<textarea name="category_notes" id="category_notes" rows="4" cols="50" ></textarea>
		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<button type='reset'>Cancel</button>
		</center>
	</form>
</div>
<!------------------------------------------------------------------------------------------------->

<div class="remodal" data-remodal-id="modal_view">
	<form style="text-align: left;" method="post" id="view-form" action="menu/view">
	 	  	
		<input type="hidden" name="category_view_id" id="category_view_id">
		<h1><span id='modal_title'></span> Enquiry Details</h1>
		<label for="enquiry_type_id1">Type</label>
		<input type="text" name="enquiry_type_id1" id="enquiry_type_id1" disabled>
		<label for="category_name1">Name</label>
		<input type="text" name="category_name1" id="category_name1" disabled>
		<label for="category_addrs1">Address</label>
		<input type="text" name="category_addrs1" id="category_addrs1" disabled>
		<label for="category_phone1">Phone</label>
		<input type="text" name="category_phone1" id="category_phone1" disabled>
		<label for="category_notes1">Notes</label>
		<input type="text" name="category_notes1" id="category_notes1" disabled>
		<label for="category_date1">Inquiry Date</label>
		<input type="text" name="category_date1" id="category_date1" disabled>
		<label for="category_user1">Captured By</label>
		<input type="text" name="category_user1" id="category_user1" disabled>


		<br><br>
		<center>
			<!--<button type='close'>Close</button>-->
		</center>
	</form>
</div>
<!------------------------------------------------------------------------------------------------->
<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-question"> </span>Enquiry Details </span>
<div style="float:right;">
	<div class="menu">
		<a href="#modal"><button id="btn-insert">Capture</button></a> 
		<a href="#modal_view"><button id="btn-view" disabled="disabled">View</button></a>
		<a href="#modal"><button id="btn-update" disabled="disabled">Update</button></a>
		<!--<a href="#modal_remove"><button id="btn-remove" disabled="disabled">Remove</button></a>-->
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
				<th>Name</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Type</th>
				<th>Notes</th>
				<th>Enquiry Date</th>
				<th>Captured By</th>
			</tr>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Name </th>
				<th>Address</th>
				<th>Phone</th>
				<th>Type</th>
				<th>Notes</th>
				<th>Enquiry Date</th>
				<th>Captured By</th>
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td colspan="7" class="dataTables_empty">Loading data from server</td>
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
			 		<form method="post" id="remove-form" action="menu/remove">
                		<div class="action-area-right">
                  			<div class="button-strip">
				   				<input type="hidden" name="remove_menu_id" id="remove_menu_id">
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
	$('[data-remodal-id=modal_view]').remodal();
	$('[data-remodal-id=modal_update]').remodal();
	$('[data-remodal-id=modal_remove]').remodal();
	
	/*onchange the the option handover field data for insert*/
    	  $("#enquiry_type_id").change(function(){
     
    	 $("#enquiry_type_id2").val($('#enquiry_type_id option:selected').text());
     
    	 });

	/*onchange the the option handover field data for update*/
    	  $("#enquiry_type_idup").change(function(){
     
    	 $("#enquiry_type_id2up").val($('#enquiry_type_id option:selected').text());
     
    	 });
		
			
	  /** Get request data for enquiry for insert **/
	
	getRequest("menu/get_enquiry_type", function(data) {
         
        var data = JSON.parse(data.responseText);
    
		for (var i = 0; i < data.length; i++) {
			$("#enquiry_type_id").append("<option value="+data[i].name+">"+data[i].name+"</option>");
			
		}
		
		
	});

  /** Get request data for enquiry for insert for update **/
	
	getRequest("menu/get_enquiry_type", function(data) {
         
        var data = JSON.parse(data.responseText);
    
		for (var i = 0; i < data.length; i++) {
			$("#enquiry_type_idup").append("<option value="+data[i].name+">"+data[i].name+"</option>");
			
		}
		
		
	});	
	

</script>
<script>
function validateRequiredField()
   {
     var enquiry_type_id=document.forms["submit-form"]["enquiry_type_id"].value;
     var enquiry_type_id2=document.forms["submit-form"]["enquiry_type_id2"].value;
     var category_name=document.forms["submit-form"]["category_name"].value;
     var category_addrs=document.forms["submit-form"]["category_addrs"].value;
     var category_phone=document.forms["submit-form"]["category_phone"].value;
     var category_notes=document.forms["submit-form"]["category_notes"].value;
    
    
    
         if (enquiry_type_id == null || enquiry_type_id== "") {
	        alert("Enquiry Type must be selected ");
		document.forms["submit-form"]["enquiry_type_id"].focus();
	        return false;
	    }else{
	         if (enquiry_type_id2== null || enquiry_type_id2== "") {
		        alert("Enquiry Type must be selected");
		        return false;
		    }else{
	         if (category_name== null || category_name== "") {
		        alert("The name must be filled");
		        return false;
		    }else{
			if (category_addrs == null || category_addrs == "") {
			alert("The address must be filled");
			 return false;
		}else{
	         if (category_phone== null || category_phone== "") {
		        alert("Phone number must be filled");
		        return false;
		    }else{
 			if (category_notes== null || category_notes== "") {
		        alert("Notes must be filled");
		        return false;
		    }else{   
			//alertSubmit("Loading");
			return true;
		    }
		    }
		    }
	          }
		}
		}
}
</script>
<script type="text/javascript"> 

$(document).ready(function() {
	
	/** Action button menu **/
	  
	/* Insert button */
	$('#btn-insert').bind('click', function(){
		// Reset submit form
		$('#submit-form input').val('');
		$('#modal_title').html($('#btn-insert').text());
	});
	/* View button */
	$('#btn-view').bind('click', function(){
		$('#modal_title').html($('#btn-view').text());
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
		"sAjaxSource": "menu/get",
		"aaSorting": [[ 5, "desc" ]],
		"iDisplayLength": 50,
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
			//'menu_name','menu_category_id','menu_price','menu_disc','menu_desc','menu_image','menu_id'
			$('#remove_category_id').val(aData[7]);
			$('#category_id').val(aData[7]);
			$('#category_name').val(aData[0]);
			$('#category_addrs').val(aData[1]);
			$('#category_phone').val(aData[2]);
			$('#category_notes').val(aData[4]);
			$('#category_type').val(aData[3]);
			$('#enquiry_type_id2').val(aData[3]);
			//console.log(aData[7]);
			//----------------------view--------------------------
			$('#category_view_id').val(aData[7]);
			$('#category_name1').val(aData[0]);
			$('#category_addrs1').val(aData[1]);
			$('#category_phone1').val(aData[2]);
			$('#category_notes1').val(aData[4]);
			$('#category_date1').val(aData[5]);
			$('#category_user1').val(aData[6]);
			$('#enquiry_type_id1').val(aData[3]);
			//---------------------------------------------
	 
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
				$('#remove-form').val('');
				$('#submit-form input').val('');
				$('#btn-update').attr("disabled","disabled");
				$('#btn-remove').attr("disabled","disabled");
				$('#btn-view').attr("disabled","disabled");
        	} else {
            	oTable.$('tr.row_selected').removeClass('row_selected');
            	$(this).addClass('row_selected');
				$('#btn-update').removeAttr("disabled");
				$('#btn-remove').removeAttr("disabled");
				$('#btn-view').removeAttr("disabled");
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

		/* Set "submit-form" action */	 
		$('#update-form').ajaxForm({
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
			$('[data-remodal-id=modal_view]').remodal().close();
			$('[data-remodal-id=modal_update]').remodal().close();
			alertSuccess(query);
		}
			
		
	});
</script>