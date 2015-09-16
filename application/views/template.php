<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <title>Tshwane Safety Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/icomoon.css"/> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/tables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.mcdropdown.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/component.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.remodal.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/onepcssgrid.css">
  <script src="<?php echo base_url(); ?>js/main.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery-migrate-1.2.1.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.form.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.jeditable.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.dataTables.editable.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.dataTables.columnFilter.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.mcdropdown.js"></script>
  <script src="<?php echo base_url(); ?>js/lib/jquery.bgiframe.js"></script>
  <script src="<?php echo base_url(); ?>js/modernizr.custom.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.remodal.js"></script>
  <script src="<?php echo base_url(); ?>js/fullscreen.dg.js"></script>
  <script src="<?php echo base_url(); ?>js/Chart.min.js"></script>
</head>
<body>
<div id="main" class="main">
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<?php $i = 1; foreach ($user_menu->result() as $v) { ?>	
								<li><a class="gn-icon <?php echo $v->module_icon; ?>" onClick="openPages('<?php echo $v->module_link; ?>','<?php echo $v->module_id; ?>')"><?php echo $v->module_name; ?></a></li></a></li>
								<?php } ?>
								<!--<li><a class="gn-icon gn-icon-cog">Settings</a></li>
								<li><a class="gn-icon gn-icon-help">Help</a></li>-->
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a class="codrops-icon" href="#" onClick="openPages('dashboard')">Tshwane Safety Dashboard</a></li>
				<li><a class="codrops-icon" href="javascript:void(0)" onclick="javascript:toggleFullScreen()">Fullscreen</a></li>
				<!--<li><a class="codrops-icon" href="#" onClick="openPages('list_order')">Capture Incident</a></li>-->
				
				
				<li><a href="http://tshwanesafety.zendesk.com" target="blank" onClick="openUrl(http://tshwanesafety.zendesk.com/)">Help</a></li>
                                 <li><a class="codrops-icon" href="login/logout">Logout</a></li>
			</ul>
			<!--
			<header>
				<h1>Web Application<span></span></h1>	
			</header>
			 -->
		</div><!-- /container -->

	<div class="col_11">

		<div id="page"></div>

	</div>

</div>

</body>
</html>
  <script src="<?php echo base_url(); ?>js/classie.js"></script>
  <script src="<?php echo base_url(); ?>js/gnmenu.js"></script>
  <script src="<?php echo base_url(); ?>js/alert.js"></script>
  <script>
		new gnMenu( document.getElementById( 'gn-menu' ) );
  </script>
  <script>
		$('[data-remodal-id=modal_config]').remodal();
   </script>
<!-- For request marker images -->
<input id="add_images_marker_id" type="hidden">
<input id="add_images_marker_name" type="hidden">
<script>
  // Default load page
  openPages("dashboard");
  $('ul.menu-left li:first').addClass('selected');
 
   // Load page
  function openPages(url,module) {

  	$("#page").empty();		
	$(".remodal").remove();
	
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
					if(r.access_send != 1){ $("#btn-send").hide(); }else{ $("#btn-send").show(); }
					//if(r.access_region_capture != 1){ $("#btn-send").hide(); }else{ $("#btn-send").show(); }
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