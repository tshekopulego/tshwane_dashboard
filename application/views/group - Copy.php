<!-- Content -->
<div class="remodal" data-remodal-id="modal">
	<form style="text-align: left;" method="post" id="submit-form" action="user/insert">
	 	 
		<input type="hidden" name="user_id" id="user_id">
		<h1><span id='modal_title'></span> User Group</h1>
		<label for="group_name">Group</label>
		<input type="text" name="group_name" id="group_name">
		<label for="group_description">Description</label>
		<input type="text" name="group_description" id="group_description">
		<br><br>
		<center>
			<button type='submit'>Simpan</button>&nbsp;&nbsp;<button type='reset'>Batal</button>
		</center>
	</form>
</div>

<input id="update_id" type="hidden" name="id" value="">	
<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-checkin"></span> Akses Pengguna</span>
<div style="float:right;">
	<div class="menu">
		<a href="#modal"><button id="btn-view">View</button></a> 
		<a href="#form"><button id="btn-insert">Insert</button></a> 
		<a href="#form"><button id="btn-update" disabled="disabled">Update</button></a>
		<button id="btn-remove" disabled="disabled">Remove</button>
		<button id="btn-filter" value="on">Filter</button>
	</div>
</div>
</div>
<div class="mainview view">
	<div id="form" style="display:none; padding-bottom:45px;">
		<form method="post" id="submit-form" action="group/insert" enctype="multipart/form-data">
		<input type="hidden" name="group_id" id="group_id">
		<br /><br />
		<div class="innert-list">
    		<h1>Group</h1>
    		<div class="corner">
    			<input type="text" name="group_name" id="group_name">
    		</div>
    	</div>
		<div class="innert-list">
    		<h1>Description</h1>
    		<div class="corner">
    			<input type="text" name="group_description" id="group_description">
    		</div>
    	</div>
		<div class="innert-list">
    	<br />
    	<div class="corner">
    		  <button type="reset">Reset</button>
              <button type="submit">Submit</button>
    	</div>
    </div>
	</form>
</div>

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
	<div style="font-size:15px; color: #999999; padding-bottom: 15px; float:left;">Akses Modul</div>
	<table class="table" id="tabelsShow">
	<thead>
		<tr>
			<th>Module</th>
			<th>View</th>
			<th>Input</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="5" class="dataTables_empty">Loading data from server</td>
		</tr>
	</tbody>

</table>
<!-- Remove Modal -->


	<div class="overlay" style="display: none; padding-bottom:45px;">
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
                    			<button type="reset">Cancel</button>
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
<script type="text/javascript"> 

$(document).ready(function() {
	
	/** Action button menu **/
	var update_id = '';
	/* Menu transition */
	$('.menu a').click(function(ev) {

        ev.preventDefault();
        var selected = 'selected';

        $('.mainview > *').removeClass(selected);
        $('.menu button').removeClass(selected);
		 setTimeout(function() {
          $('.mainview > *:not(.selected)').css('display', 'none');
        }, 100);
		$(ev.currentTarget).parent().addClass(selected);
        var currentView = $($(ev.currentTarget).attr('href'));
        currentView.css('display', 'block');
        setTimeout(function() {
          currentView.addClass(selected);
        }, 0);
      });

	/* View button */
	$('#btn-view').bind('click', function(){
		// Enable button insert
		$('#btn-insert').removeAttr("disabled");
		$('#btn-filter').removeAttr("disabled");
	});
		  
	/* Insert button */
	$('#btn-insert').bind('click', function(){
		// Reset submit form
		$(':hidden','#submit-form').val('');
		// Disabled button
		$('#btn-update').attr("disabled","disabled");
		$('#btn-remove').attr("disabled","disabled");
		$('#btn-filter').attr("disabled","disabled");
	});

	/* Update button */
	$('#btn-update').bind('click', function(){
		// Disabled button
		$('#btn-insert').attr("disabled","disabled");
		$('#btn-remove').attr("disabled","disabled");
		$('#btn-filter').attr("disabled","disabled");
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
 		openPages('group');
		alert(query);
	}
	
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
	});

</script>