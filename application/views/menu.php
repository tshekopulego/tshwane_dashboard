<!-- Content -->
<div class="remodal" data-remodal-id="modal">
	<form style="text-align: left;" method="post" id="submit-form" action="menu/insert">
	 	  	
		<input type="hidden" name="menu_id" id="menu_id">
		<h1><span id='modal_title'></span> List Menu</h1>
		<label for="menu_name">Name</label>
		<input type="text" name="menu_name" id="menu_name">
		<label for="menu_category_id">Category</label>
		<select id="menu_category_id" name="menu_category_id" style="width:100%">
			<option value="">Category Menu</option>
        </select>
		<label for="menu_image">Images (744px X 700px)</label>
		<input type="file" name="menu_image" id="menu_image" class="custom-file-input">
		<label for="menu_price">Price ($)</label>
		<input type="text" name="menu_price" id="menu_price">
		<label for="category_desc">Discount (%)</label>
		<input type="text" name="menu_disc" id="menu_disc">
		<label for="category_desc">Description</label>
		<input type="text" name="menu_desc" id="menu_desc">
		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<button type='reset'>Cancel</button>
		</center>
	</form>
</div>

<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-food"> </span>List Menu </span>
<div style="float:right;">
	<div class="menu">
		<a href="#modal"><button id="btn-insert">Insert</button></a> 
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
				<th>Name</th>
				<th>Category</th>
				<th>Price</th>
				<th>Discount (%)</th>
				<th>Description</th>
				<th>Images</th>
			</tr>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Name</th>
				<th>Category</th>
				<th>Price</th>
				<th>Discount (%)</th>
				<th>Description</th>
				<th>Images</th>
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
	$('[data-remodal-id=modal_remove]').remodal();
	
		/** Get request data category  **/
	getRequest("menu/get_category", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#menu_category_id").append("<option value="+data[i].category_id+">"+data[i].category_name+"</option>");
        }

    });
	
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
			// Set value form after select table for update data
			//'menu_name','menu_category_id','menu_price','menu_disc','menu_desc','menu_image','menu_id'
			$('#remove_menu_id').val(aData[6]);
			$('#menu_id').val(aData[6]);
			$('#menu_name').val(aData[0]);
			$('#menu_category_id').val(aData[7]);
			$('#menu_price').val(aData[2]);
			$('#menu_disc').val(aData[3]);
			$('#menu_desc').val(aData[4]);
	 
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