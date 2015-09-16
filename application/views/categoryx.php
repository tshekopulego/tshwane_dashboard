<!-- Content -->
<div style="font-size:15px; color: #999999; padding-bottom: 15px; float:left;">CATEGORY</div>
<div style="float:right;">
	<div class="menu">
		<a href="#view"><button id="btn-view">View</button></a> 
		<a href="#form"><button id="btn-insert">Insert</button></a> 
		<a href="#form"><button id="btn-update" disabled="disabled">Update</button></a>
		<button id="btn-remove" disabled="disabled">Remove</button>
		<button id="btn-filter" value="on">Filter</button>
	</div>
</div>

<div class="mainview view">
	<div id="form" style="display:none; padding-bottom:45px;">
		<form method="post" id="submit-form" action="category/insert" enctype="multipart/form-data">
		<input type="hidden" name="category_id" id="category_id">
		<br /><br />
		<div class="innert-list">
    		<h1>Name</h1>
    		<div class="corner">
    			<input type="text" name="category_name" id="category_name">
    		</div>
    	</div>
		<div class="innert-list">
			<h1>Menu Upper</h1>
			<div class="corner">
			<input type="text" name="category" id="category" value="" />
			<?php
				echo $this->dynamic_menu->build_menu();
			?>
			</div>
    	</div>
		<div class="innert-list">
    		<h1>Icon List</h1>
    		<div class="corner">
    			<input type="text" name="category_icon" id="category_icon" placeholder="Click icon to info!">
 <a href="<?php echo base_url(); ?>fonts/icomoon/" target="_blank"> <span aria-hidden="true" data-icon="&#xe03d;" style="font-size:16px;"></span></a>
    		</div>
    	</div>
		<div class="innert-list">
    		<h1>Marker</h1>
    		<div class="corner">
    			<input type="file" name="category_marker" id="category_marker">
				<input type="hidden" name="category_marker_old" id="category_marker_old">
    		</div>
    	</div>
		<div class="innert-list">
    		<h1>Description</h1>
    		<div class="corner">
    			<input type="text" name="category_desc" id="category_desc">
    		</div>
    	</div>
		<div class="innert-list">
    		<h1>Show Home</h1>
    		<div class="corner">
				<select id="category_dash" name="category_dash">
					<option value="0">No</option>
					<option value="1">Yes</option>
        		</select>
    		</div>
    	</div>
		<div class="innert-list">
    		<h1>Aktif</h1>
    		<div class="corner">
				<select id="category_aktif" name="category_aktif">
					<option value="No">No</option>
					<option value="Yes">Yes</option>
        		</select>
    		</div>
    	</div>
		<!--
		<div id="category_home_images" class="innert-list" style="display: none;">
    		<h1>Home Image</h1>
    		<div class="corner">
    			<input type="file" name="category_home_image" id="category_home_image">
				<input type="hidden" name="category_home_image_old" id="category_home_image_old">
    		</div>
    	</div>
		-->
		<div class="innert-list">
    		<h1>Language</h1>
    		<div class="corner">
				<select id="category_lan" name="category_lan">
        		</select>
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
				<th>Name</th>
				<th>Description</th>
				<th>Language</th>
				<th>Aktif</th>
			</tr>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Name</th>
				<th>Description</th>
				<th>Language</th>
				<th>Aktif</th>
			</tr>
		</tfoot>
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
			 		<form method="post" id="remove-form" action="category/remove">
                		<div class="action-area-right">
                  			<div class="button-strip">
				   				<input type="hidden" name="remove_category_id" id="remove_category_id">
                    			<button type="reset">Cancel</button>
                    			<button type="submit">Okay</button>
                  			</div>
                		</div>
					</form>
              	</div>
            </div>
		</div>
			 
</div>
<!-- End -->
		
<script type="text/javascript"> 

$(document).ready(function() {

	$("#current_rev").html("v"+$.mcDropdown.version);
	$("#category").mcDropdown("#categorymenu");
		
	/** Action button menu **/
	
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
	
	/*
	 $('#category_home').bind('change', function(){
		if($( "#category_home option:selected").text() == 'Yes'){
			$('#category_home_images').show();
		}else{		
			$('#category_home_images').hide();
		}
	});
	*/	
		
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

	/** Get request data language  **/
	getRequest("category/get_language", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#category_lan").append("<option value="+data[i].language_code+">"+data[i].language_name+"</option>");
        }
    });
	
	getRequest("category/get_category", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			if(data[i].category_upper == 0){
				category_value = ""+data[i].category_name;
			}else{
				category_value = "--- "+data[i].category_name+"</b>";
			}
			
			$("#category_upper").append("<option value="+data[i].category_id+">"+category_value+"</option>");
        }
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
 		openPages('category');
		alert(query);
	}
	
		/** Set datatables **/

	var oTable = $('#tabels').dataTable({
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "category/get",
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
						{ type: "text" }]
		});


	/** Show detail data datatables **/
	
	function fnFormatDetails ( nTr )
		{
			
		 var aData = oTable.fnGetData( nTr );
		 if(aData != null){
		 
			if(aData[6] == 0){
				var status = 'No';
			}else{
				var status = 'Yes';
			}
			
			var sOut = '<table width="100%" height="38" border="0" cellpadding="0" cellspacing="0">';
  				sOut += '<tr><td width="20%" height="19"><div align="center">Icon List </div></td><td width="20%"><div align="center">Marker</div></td><td width="20%"><div align="center">Dasboard</div></td><td width="20%"><div align="center">Created</div></td><td width="20%"><div align="center">Created Date</div></td></tr>';
    			sOut += '<tr><td height="19"><div align="center" style="font-size:24px;" aria-hidden="true" data-icon="'+aData[4]+'"></div></td>';
				sOut +=	'<td><div align="center"><img src="<?php echo base_url(); ?>upload/marker/'+aData[5]+'" alt=""></div></td><td><div align="center">'+status+'</div></td><td><div align="center">'+aData[8]+'</div></td><td><div align="center">'+aData[9]+'</div></td></tr></table>';
				
				return sOut;
			}
				}
			
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
		$('#remove_category_id').val(aData[6]);
	 	$('#category_id').val(aData[6]);
	 	$('#category_name').val(aData[0]);
		$('#category_desc').val(aData[1]);
		$('#category_lan').val(aData[2]);
	 	$('#category_icon').val(aData[4]);
		$('#category_dash').val(aData[7]);
		$('#category_aktif').val(aData[7]);
	 	$('#category_marker_old').val(aData[5]);
	 
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