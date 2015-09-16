<!-- Content -->
<script language="JavaScript">

var incident_imageview;
var incident_imagesend;

</script>
<div class="remodal" data-remodal-id="modal">
	<form style="text-align: left;" method="post" id="submit-form" name="notification_form" onsubmit="return validateForm()" action="category/insert">
		<input type="hidden" name="category_id" id="category_id">
		<h1><span id='modal_title'></span>Notifications</h1>
		<label for="title">Title</label>
		<input type="text" name="title" id="title">
		<label for="message">Message</label>
		<textarea id="message" name ="message" rows="4" cols="50"></textarea>
		<label for="category_img">Images (744px X 700px)</label>
		<input type="file" name="category_img" id="category_img" class="custom-file-input">
		
		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<button type='reset'>Clear</button>
		</center>
	</form>
</div>
<!------------------------------------------------------------------------------------------------------------------------>
<div class="remodal" data-remodal-id="modal_view">
	<form style="text-align: left;" method="post" id="view-form" action="category/preview">
		<input type="hidden" name="category_view_id" id="category_view_id">
		<h1><span id='modal_title'></span>Notifications</h1>
		
		<label for="title1">Title</label>
		<input type="text" name="title1" id="title1">
		<label for="message1">Message</label>
		<textarea rows="15" cols="50" name="message1" id="message1"></textarea>
		<label for="captured1">Captured By</label>
		<input type="text" name="captured1" id="captured1" disabled>
		<label for="date1">Captured Date</label>
		<input type="text" name="date1" id="date1" disabled>
		
		<label for="category_img1" Style="font-size:10px;">Image</label>
		<p id="notitficationDiv"  name="notitficationDiv"></p><br> 
		<label for="category_img1">Change the Images (744px X 700px)</label>
		<input type="file" name="category_img" id="category_img" class="custom-file-input">
		
		<br>
		<center>
			<button type='submit'>Update</button>
		</center>
	</form>
</div>
<!------------------------------------------------------------------------------------------------------------------------>
<div class="remodal" data-remodal-id="modal_send">
	<form style="text-align: left;" method="post" id="send-form" action="category/send">
		<input type="hidden" name="category_send_id" id="category_send_id">
		<center><span id='modal_title'><h1>Are you sure you want to send out the notification?</h1></span></center>
		
		
		<input type="hidden" name="title2" id="title2">
		
		<textarea rows="15" cols="50" name="message2" id="message2" style="display:none;"></textarea>
		
			
		
		<input type"hidden" id="notitficationDiv2"  name="notitficationDiv2" style="display:none;"></p><br> 
		
				
		<br>
		<center>
			<button type='submit'>Yes</button>
		</center>
	</form>
</div>
<!------------------------------------------------------------------------------------------------------------------------>
<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-bell"> </span> Notifications </span>
<div style="float:right;">
	<div class="menu">
		<a href="#modal"><button id="btn-insert">Capture</button></a> 
		<a href="#modal_view"><button id="btn-view" disabled="disabled">Preview</button></a>
		<a href="#modal_send"><button id="btn-send">Send</button></a>
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
				<th>Title</th>
				<th>Message</th>
				<th>Date</th>
				<th>Published by</th>
				<th>Images</th>
				<th>status</th>
			</tr>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Title</th>
				<th>Message</th>
				<th>Date</th>
				<th>Published by</th>
				<th>Images</th>
				<th>status</th>
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
    	$('[data-remodal-id=modal]').remodal();
	$('[data-remodal-id=modal_remove]').remodal();
	$('[data-remodal-id=modal_view]').remodal();
	$('[data-remodal-id=modal_send]').remodal();
</script>
<script type="text/javascript"> 

function validateForm() {
   //declaration of variables
    var title= document.forms["notification_form"]["title"].value;
    var message= document.forms["notification_form"]["message"].value;
   
    //logical conditions
    if (title== null || title== "") {
        alert("Title must be filled out");
        document.forms["notification_form"]["title"].focus();
        return false;
    }else {
        if (message== null || message== "") {
        alert("Message must be filled out");
        document.forms["notification_form"]["message"].focus();
        return false;
	}else {
	    return true;
        }
    }
}


$(document).ready(function() {

	
	/** Action button menu **/
	  
	/* Insert button */
	$('#btn-insert').bind('click', function(){
		// Reset submit form
		$(':hidden','#submit-form').val('');
		$('#modal_title').html($('#btn-insert').text());
	});
	/* View button */
	$('#btn-view').bind('click', function(){
		$('#modal_title').html($('#btn-view').text());
	});
	/* Send button */
	$('#btn-send').bind('click', function(){
		
		$('#modal_title').html($('#btn-send').text());
	
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
		"sAjaxSource": "category/get",
		'sPaginationType': 'full_numbers',
		"aaSorting": [[ 2, "desc" ]],					
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
			$('#remove_category_id').val(aData[7]);
			//$('#id').val(aData[3]);
			$('#category_id').val(aData[7]);
			$('#title').val(aData[0]);
			$('#message').val(aData[1]);
			$('#status').val(aData[5]);
			//-------------------------------------------
			$('#category_send_id').val(aData[7]);
			$('#title2').val(aData[0]);
			$('#message2').val(aData[1]);
			$('#captured2').val(aData[3]);
			$('#date2').val(aData[2]);
			//-------------------------------------------
			$('#category_view_id').val(aData[7]);
			$('#title1').val(aData[0]);
			$('#message1').val(aData[1]);
			$('#captured1').val(aData[3]);
			$('#date1').val(aData[2]);
			$('#notitficationDiv2').val(aData[6]);
			//------------------------------------------------
			$('#cat_send_id').val(aData[7]);
			incident_imageview=aData[4];
			incident_imagesend=aData[6];
			document.getElementById("notitficationDiv").innerHTML=incident_imageview;	
	                document.getElementById("notitficationDiv2").innerHTML=incident_imagesend;
	 
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
				$('#remove_user_id','#remove-form').val('');
				//$('#remove-form').val('');
				$('#category_id','#submit-form').val('');
				$('#category_view_id','#view-form').val('');
				$('#category_sendId','#send-form').val('');
				//$('#submit-form input').val('');
				//$(':hidden','#remove-form').val('');
				//$(':hidden','#submit-form').val('');
				$('#btn-update').attr("disabled","disabled");
				$('#btn-remove').attr("disabled","disabled");
				$('#btn-view').attr("disabled","disabled");
				$('#btn-send').attr("disabled","disabled");
        	} else {
            	oTable.$('tr.row_selected').removeClass('row_selected');
            	$(this).addClass('row_selected');
				$('#btn-update').removeAttr("disabled");
				$('#btn-remove').removeAttr("disabled");
				$('#btn-view').removeAttr("disabled");
				$('#btn-send').removeAttr("disabled");
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
		/*Set "view-form" action*/
		$('#view-form').ajaxForm({
		   resetForm: true,
		   cache: false,
		   success: alertForm
		});
			        /* Set "send-form" action */
		$('#send-form').ajaxForm({
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
			$('[data-remodal-id=modal_send]').remodal().close();
			alertSuccess(query);
		}
			
		
	});
</script>