<!-- Content -->
<div class="remodal" data-remodal-id="modal">	
	<form style="text-align: left;" method="post" id="submit-form" name="region_form" onsubmit="return validateForm()" action="setting/insert">
		<input type="hidden" name="setting_id" id="setting_id">
		<h1><span id='modal_title'></span> Regions / Units</h1>
		<label for="setting_name">Name</label>
		<input type="text" name="setting_name" id="setting_name">
		<!------------------------------------------------------------------------------------>
		
		

		<!------------------------------------------------------------------------------------>
		<label for="setting_address">Address</label>
		<input type="text" name="setting_address" id="setting_address">
		<!------------------------------------------------------------------------------------>
		<label for="setting_telephone">Telephone</label>
		<input type="text" name="setting_telephone" id="setting_telephone" maxlength="10">
		<label for="setting_email">Email</label>
		<input type="text" name="setting_email" id="setting_email">
		
		<label for="setting_region">Region/unit</label>
		<input type="text" name="setting_region" id="setting_region">
		<label for="setting_code">Region Code</label>
		<input type="text" name="setting_code" id="setting_code">
		<label for="setting_commander">Current Commander</label>
		<input type="text" name="setting_commander" id="setting_commander">
		
		<label for="setting_latitude">Latitude</label>
		<input type="text" name="setting_latitude" id="setting_latitude">
		<label for="setting_longitude">Longitude</label>
		<input type="text" name="setting_longitude" id="setting_longitude">
		<label for="setting_images">Images</label>
		<input type="file" name="setting_images" id="setting_images" class="custom-file-input">
		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<button type='reset'>Clear</button>
		</center>
	</form>
</div>
<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-bank"> </span>Regions / Units </span>
<div style="float:right;">
	<div class="menu">
        <a href="#modal"><button id="btn-insert">Capture</button></a> 
		<a href="#modal"><button id="btn-update" disabled="disabled">Update</button></a>
		<!--<a href="#modal_remove"><button id="btn-removes" disabled="disabled">Remove</button></a>-->
		<button id="btn-filter" value="on">Filter</button>
        </div>
</div>
</div>
<div class="mainview view">
<div id="view" style="padding-bottom:45px;">
	<table class="table" id="tabels">
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Telephone</th>
				<th>Email</th>
				<th>Region/unit</th>
				<th>Region Code</th>	
				<th>Images</th>
				<th>Current Commander</th>
			</tr>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Name</th>
				<th>Address</th>
				<th>Telephone</th>
				<th>Email</th>
				<th>Region/unit</th>
				<th>Region Code</th>
				<th>Images</th>
				<th>Current Commander</th>
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
			 		<form method="post" id="remove-form" action="setting/remove">
                		<div class="action-area-right">
                  			<div class="button-strip">
				   				<input type="hidden" name="remove_setting_id" id="remove_setting_id">
                    			<button type="submit">Yes</button>
                  			</div>
                		</div>
					</form>
              	</div>
            </div>
		</div>
	</div>			
	<!----->
		</div>		 
	</div>		
 
<script>
    $('[data-remodal-id=modal]').remodal();
	$('[data-remodal-id=modal_remove]').remodal();
</script>
<script type="text/javascript"> 
function validateForm() {
   //declaration of variables
    var name= document.forms["region_form"]["setting_name"].value;
    var address= document.forms["region_form"]["setting_address"].value;
    var tel= document.forms["region_form"]["setting_telephone"].value;
    var region= document.forms["region_form"]["setting_region"].value;
    var code= document.forms["region_form"]["setting_code"].value;
    //logical conditions
    if (name== null || name== "") {
        alert("Name must be filled out!");
        document.forms["region_form"]["setting_name"].focus();
        return false;
    }else {
        if (address== null || address== "") {
        alert("Address must be filled out!");
        document.forms["region_form"]["setting_address"].focus();
        return false;
	}else {
	    if (tel== null || tel== "") {
      		  alert("Telephone number must be filled out!");
      		  document.forms["region_form"]["setting_telephone"].focus();
	        return false;
	     }else {
		    if (region== null || region== "") {
	      		  alert("Region name must be filled out!");
	      		  document.forms["region_form"]["setting_region"].focus();
		        return false;
		     }else {
			    if (code== null || code== "") {
		      		  alert("Region code must be filled out!");
		      		  document.forms["region_form"]["setting_code"].focus();
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
	$('#btn-removes').bind('click', function(){
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
		"sAjaxSource": "setting/get",
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
		    $('#remove_setting_id').val(aData[10]);
			$('#setting_id').val(aData[10]);
			$('#setting_name').val(aData[0]);
			$('#setting_address').val(aData[1]);
			$('#setting_telephone').val(aData[2]);
			$('#setting_email').val(aData[3]);
			$('#setting_region').val(aData[4]);
			$('#setting_code').val(aData[5]);
			$('#setting_images').val(aData[6]);
			$('#setting_latitude').val(aData[8]);
			$('#setting_longitude').val(aData[9]);
			$('#setting_commander').val(aData[7]);
			
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
		        	//ve_user_id','#remove-form').val('');  
				$('#remove-form').val('');
				$('#submit-form input').val('');
				//$(':hidden','#remove-form').val('');
				//$(':hidden','#submit-form').val('');
				$('#btn-update').attr("disabled","disabled");
				$('#btn-removes').attr("disabled","disabled");
        	} else {
            	oTable.$('tr.row_selected').removeClass('row_selected');
            	$(this).addClass('row_selected');
				$('#btn-update').removeAttr("disabled");
				$('#btn-removes').removeAttr("disabled");
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
			alertSuccess(query);
			oTable.fnReloadAjax();
			$('[data-remodal-id=modal]').remodal().close();
			$('[data-remodal-id=modal_remove]').remodal().close();
			
		}
			
		
	});
</script>