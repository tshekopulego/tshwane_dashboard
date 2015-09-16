<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <title>Maps Finder App</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/chrome-bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/icomoon.css"/> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/tables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.mcdropdown.min.css">
  <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
  <script src="<?php echo base_url(); ?>js/map.js"></script>
  <script src="<?php echo base_url(); ?>js/map.location.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery-migrate-1.2.1.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.form.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.jeditable.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.dataTables.editable.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.dataTables.columnFilter.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.mcdropdown.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.bgiframe.js"></script>
</head>
<body>
<div class="main">
	<div class="col_3">
		<ul class="menu-left">
		
			<?php $i = 1; foreach ($user_menu->result() as $v) { ?>
			<li><a class="<?php if ($i % 2 == 0) { echo"logout"; }else{ echo"category"; } ?>" onClick="openPages('<?php echo $v->module_link; ?>','<?php echo $v->module_id; ?>')" href="#"><i class="<?php echo $v->module_icon; ?>"></i><?php echo $v->module_name; $i++; ?></a></li>
			<!--<li><a class="category" onClick="openPages('category')" href="#"><i class="icon-list"></i>Category</a></li>
			<li><a class="location-list" onClick="openPages('location_list')" href="#"><i class="icon-checkin"></i>Location List</a></li>
			<li><a class="location-list" onClick="openPages('comment_list')" href="#"><i class="icon-checkbox"></i>Comment List</a></li>
			<li><a class="setting" onClick="openPages('group')" href="#"><i class="icon-uniF00F"></i>User Group</a></li>
			<li><a class="setting" onClick="openPages('user')" href="#"><i class="icon-user"></i>User</a></li>-->
			<?php } ?>
			<li><a class="<?php if ($i % 2 == 0) { echo"logout"; }else{ echo"category"; } ?>" href="login/logout"><i class="icon-muhamad-bahrul-ulum-log-out"></i>Logout</a></li>
		</ul>
	</div>
	<div class="col_9 padding-left">
		<div class="content-block">
    		<div class="content-block-title"><span class="icon-checkin"></span>Maps Finder App</div>
			<div id="page"></div>
		</div>
	</div>
</div>
</body>
</html>

<!-- For request marker images -->
<input id="add_images_marker_id" type="hidden">
<input id="add_images_marker_name" type="hidden">

<script>
  
  // Default load page
  openPages("home");
  $('ul.menu-left li:first').addClass('selected');
   
   // Load page
  function openPages(url,module) {

  	$("#page").empty();		
	
  	$.ajax({
		url: url,	
		type: "GET",		
		cache: false,
		success: function (data) {
			$("#page").html(data);		
			//$('#loading').fadeOut(100);
			if(module != ''){
				$.getJSON('main/get_access_menu',{"modul":module},function(r){
					if(r.access_insert != 1){ $("#btn-insert").hide(); $("#btn-active").hide(); $("#btn-Inactive").hide(); $("#btn-add-image").hide(); $("#btn-add-times").hide(); $("#btn-view").hide();} else { $("#btn-insert").show(); $("#btn-active").show(); $("#btn-Inactive").show(); $("#btn-add-image").show(); $("#btn-add-times").show(); $("#btn-view").show(); }
					if(r.access_update != 1){ $("#btn-update").hide(); }else{ $("#btn-update").show(); }
					if(r.access_delete != 1){ $("#btn-remove").hide(); }else{ $("#btn-remove").show(); }
				});
			}	
			}		
		});
	}	  

	/*
	 * DataTables Refresh
	 */

   $.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource ) {
    if ( typeof sNewSource != 'undefined' )
    oSettings.sAjaxSource = sNewSource;
     
    this.fnClearTable( this );
    this.oApi._fnProcessingDisplay( oSettings, true );
    var that = this;
     
    $.getJSON( oSettings.sAjaxSource, null, function(json) {
    /* Got the data - add it to the table */
    for ( var i=0 ; i<json.aaData.length ; i++ ) {
    that.oApi._fnAddData( oSettings, json.aaData[i] );
    }
     
    oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
    that.fnDraw( that );
    that.oApi._fnProcessingDisplay( oSettings, false );
    });
	}	
  // Set style active menu
  $('ul.menu-left li').click(function(){
    	$('.menu-left li').removeClass('selected');
    	$(this).addClass('selected');
  });

</script>