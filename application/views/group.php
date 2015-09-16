<!-- Content -->
<div class="remodal" data-remodal-id="modal">
	<!--this code its incorrect.
	<form style="text-align: left;" method="post" id="submit-form" action="user/insert">-->
	 	 <form style="text-align: left;" method="post" id="submit-form" action="group/insert">
		<input type="hidden" name="group_id" id="group_id">
		<h1><span id='modal_title'></span> User Group</h1>
		<label for="group_name">Group</label>
		<input type="text" name="group_name" id="group_name">
		<label for="group_description">Description</label>
		<input type="text" name="group_description" id="group_description">
		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<button type='reset'>Cancel</button>
		</center>
	</form>
</div>
<input id="update_id" type="hidden" name="id" value="">	
<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-users"></span> Group</span>
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
				<th>Group</th>
				<th>Description</th>
			</tr>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Group</th>
				<th>Description</th>
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td colspan="5" class="dataTables_empty">Loading data from server</td>
			</tr>
		</tbody>
	</table><br><br>
	<div style="font-size:15px; color: #999999; padding-bottom: 15px; float:left;">Module Access</div>
	<table class="table" id="tabelsShow">
	<thead>
		<tr>
			<th>Module</th>
			<th>View</th>
			<th>Input</th>
			<th>Update</th>
			<th>Delete</th>
			<th>Send Alert</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="5" class="dataTables_empty">Loading data from server</td>
		</tr>
	</tbody>

</table>
	
	<!-- Remove Modal -->
	<div class="remodal" data-remodal-id="modal_remove">
    	<div class="page">
              <h1><b>Confirm</b></h1>
              	<div class="content-area">
               		Are you sure you want to remove this data? 
              	</div>
              	<div class="action-area">
			 		<form method="post" id="remove-form" action="group/remove">
                		<div class="action-area-right">
                  			<div class="button-strip">
				   				<input type="hidden" name="remove_group_id" id="remove_group_id">
                    			<button type="submit">Okay</button>
                  			</div>
                		</div>
					</form>
              	</div>
            </div>
		</div><br>
	 
</div>
<!-- End -->
		</div>		 
	</div>		

<script>
    $('[data-remodal-id=modal]').remodal();
	$('[data-remodal-id=modal_remove]').remodal();
</script>
	
<script type="text/javascript"> 

$(document).ready(function() {
	
	/** Action button menu **/
	var update_id = '';
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
		"sAjaxSource": "group/get",
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
				        { type: "text" }]
		});

		var oTableShow = $('#tabelsShow').dataTable({
					"bFilter": true,
					"bServerSide": true,
					//"iDisplayLength": 5,
					"sAjaxSource": "group/get_access",
					"fnServerParams": function ( aoData ) {
            		aoData.push( { "name": "cari", "value": update_id } );
       				 },
					'sPaginationType': 'full_numbers',					
					"bAutoWidth": false,
       				 "fnServerData": function( sUrl, aoData, fnCallback ) {
            $.ajax( {
                "url": sUrl,
                "data": aoData,
                "success": fnCallback,
                "dataType": "jsonp",
                "cache": false
            } );
        }
         }).makeEditable({
                       	sUpdateURL: "group/insert_access",
                       	"aoColumns": [
                    				null,
                    				{
                						indicator: 'Saving ...',
                						tooltip: 'Click to select',
                						loadtext: 'loading...',
                						type: 'select',
                						onblur: 'submit',
                						data: "{'1':'YES','0':'NO'}",
                					},
                    				{
                						indicator: 'Saving ...',
                						loadtext: 'loading...',
                						type: 'select',
                						onblur: 'submit',
                						data: "{'1':'YES','0':'NO'}",
                					},
                    				{
                						indicator: 'Saving ...',
                						tooltip: 'Click to select',
                						loadtext: 'loading...',
                						type: 'select',
                						onblur: 'submit',
                						data: "{'1':'YES','0':'NO'}",
                					}
					]					
				});
				
	
	/** Set edit value after click datatables **/	
	$('#tabels tbody').on('click','tr', function () {
	
	 var aData = oTable.fnGetData(this);
	  
	 if(aData != null){
	 	// Set value form after select table for update data
		$('#update_id').val(aData[2]);
		update_id = aData[2];
		$('#remove_group_id').val(aData[2]);
	 	$('#group_name').val(aData[0]);
	 	$('#group_description').val(aData[1]);
		$('#group_id').val(aData[2]);
		oTableShow.fnReloadAjax();
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
				$(':hidden','#remove-form').val('');
				$(':hidden','#submit-form').val('');
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