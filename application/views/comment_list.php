<!-- Content -->
<div style="font-size:15px; color: #999999; padding-bottom: 15px; float:left;">COMMENT LIST</div>
<div style="float:right;">
	<div class="menu">
		<button id="btn-active">Active</button>
		<button id="btn-Inactive">Inactive</button>
		<button id="btn-filter" value="on">Filter</button>
	</div>
</div>

<div class="mainview view">

<div id="view" style="padding-bottom:45px;">
<!-- Datatables -->
	<table class="table" id="tabels">
		<thead>
			<tr>
				<th width="150px">Location Name</th>
				<th width="150px">User Name</th>
				<th>User Comment</th>
				<th width="150px">Date</th>
				<th width="50px">Status</th>
			</tr>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Location Name</th>
				<th>User Name</th>
				<th>User Comment</th>
				<th>Date</th>
				<th>Status</th>
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

var active_id = '';
var active_status = '';

$(document).ready(function() {
	
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

	/* Alert form action */
	function alertForm(query){
		// Reload page
 		openPages('comment_list');
		alert(query);
	}

	/** Set datatables **/

	var oTable = $('#tabels').dataTable({
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "comment_list/get",
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
				        { type: "text" }]
		});

	$('#btn-Inactive').on('click',function () {

		$.get('comment_list/active_status?active_id='+active_id+'&active_status=0', function(data) {
			alertForm(data);
		});	
	
	});
	
	$('#btn-active').on('click',function () {

		$.get('comment_list/active_status?active_id='+active_id+'&active_status=1', function(data) {
			alertForm(data);
		});	
	
	});	
	
	/** Set edit value after click datatables **/	
	$('#tabels tbody').on('click','tr', function () {
	
	 var aData = oTable.fnGetData(this);
	  
	 if(aData != null){
	 	// Set value form after select table for update data

			active_id = aData[5];
			active_status = aData[6];
	 
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