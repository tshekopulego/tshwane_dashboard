<input id="update_id" type="hidden" name="id" value="">	

<script language="JavaScript">
var incident_image;
var longidute;
var latidute;
var incident_audio;
var incident_video;
var recapture_id ;
var type_AR;
var case_num;
</script>
<!--********************************************************************************************************-->
<div class="remodal" data-remodal-id="modal_export">
<a href="#" onclick='window.print()' ><button><span class="icon-print"></span>Print</button></a>
       <h1>Export Incidents </h1><br>
       
       <div  id="print_info_id"></div>
    
		
    
</div>
<div class="remodal" data-remodal-id="modal_csv">
      
       <h1>Export Incident/s</h1>
<form action="#">
       <hr>
       <p style="font-size:2em; color:green;">Are you sure you want to export data to CSV file?</h2><br>
        <hr><br>
        <button onclick="doCsv()">
       Yes
       </button>
</form>
     <div class="thiscsvtable">
      <table class="table" style="text-align: left;" id="csvidcopy">
      <thead>
      <tr>
      <th>RefNum</th><th>description</th><th>car_reg_num</th><th>num_persons</th><th>area</th><th>type</th><th>reportedon</th><th>location</th><th>region</th><th>address</th><th>latidute</th><th>longidute</th><th>user</th><th>reportedby</th><th>mobile</th><th>status</th><th>capturedby</th><th>RecapRefNum</th><th>channel</th>
      </tr>
      </thead>
      <tbody id="csv_info_id">
      </tbody>
      </table>
      </div>
</div>
 <!--
<!--********************************************************************************************************-->
<div class="remodal" data-remodal-id="modal_insert">
<form style="text-align: left;" method="post"  id="submit-form" onsubmit="return validateRequiredField();" action="list_order/insert">
		<input type="hidden" name="category_id" id="category_id">
		<h1><span id='modal_title'></span> Incidents</h1>
		<!--<label for="casenum">CaseNum</label>-->
		<input type="hidden" name="casenum" id="casenum" disabled>
		
		<select id="menu_category_id" name="menu_category_id" ng-change="get_crimetype(menu_category_id)"  style="width:100%" >
			<option value="">Select Category</option>
        	</select>
        	
        	<input type="hidden" name="string_menu_category_name" id="string_menu_category_name" />
        	<br><br>
		<select id="menu_type_id" name="menu_type_id" style="width:100%" >
			<option value="0" >Select Type</option>
        	</select>
        	<br><br>
        	<select id="menu_channel_id" name="menu_channel_id" style="width:100%">
			<option value="">Select Channel</option>
        	</select>
        	<input type="hidden" name="menu_channel" id="menu_channel" />
        	
        	<input type="hidden" name="string_category_type_name" id="string_category_type_name" />
        	
        	<label for="description">Description</label>
		<textarea name="description" rows="4" cols="50" ></textarea>
        	
      
        	
        	
        	
		<label for="location">Location</label>
		<input type="text" name="location" id="location" autocomplete="on" >


		<input type="hidden" name="category_name" id="category_name"/>
		
		<select id="menu_region_id" name="menu_region_id" style="width:100%" >
			<option value="">Select Region</option>
        	</select>
        	
        	<input type="hidden" name="menu_region" id="menu_region"/>
			
		<label for="reportedby">Reported by</label>
		<input type="text" name="reportedby" id="reportedby" >
		<label for="mobile">Contact/Radio Number</label>
		<input type="text" name="mobile" id="mobile" maxlength="10" >
		<!--<label for="status">Status</label>
		<input type="text" name="status" value="New" id="status" disabled>-->
		
		<label for="category_img">Images (744px X 700px)</label>
		<input type="file" name="category_img" id="category_img" class="custom-file-input">
		
		<label for="videolocation">Video</label>
		<input type="file" name="videolocation" id="videolocation" class="custom-file-input">
		
		<label for="audiolocation">Audio</label>
		<input type="file" name="audiolocation" id="audiolocation" class="custom-file-input">
			
		<!--<label for="capturedby">Captured by</label>
		<input type="text" name="capturedby" id="capturedby" disabled>
		<label for="date">Incident Report Date</label>
		<input type="text" name="date" id="date" disabled>-->

		
		<br><br>
		<center>
			<button type='submit' onclick="return validateRequiredField();">Save</button>&nbsp;&nbsp;<button type='reset'>Clear</button>
		</center>
	</form>	
</div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="remodal" data-remodal-id="modal_recapture">
	<form style="text-align: left;" method="post" id="recapture-form"  action="list_order/recapture_incident">
		<input type="hidden" name="category_id" id="category_id" >
		
		<h1><span id='modal_title'></span>Incident being recaptured</h1>
		<table  class="table">
			<tr>
				<td><p name="casenum2" id="casenum2"> </td>
				<td><p name="description2" id="description2"></p></td>
			</tr>
			<tr>
				<td><p name="category2" id="category2"></p></td>
				<td><p name="type2" id="type2"></p></td>
			</tr>
			<tr>
				<td><p name="location2" id="location2"></p></td>
				<td><p name="region2" id="region2"></p></td>
			</tr>
			<tr>
				<td><p name="reportedby2" id="reportedby2"></p></td>
				<td><p name="mobile2" id="mobile2"></p></td>
			</tr>	
			<tr>
				<td><p name="car_reg_num" id="car_reg_num"></p></td>
				<td><p name="num_persons" id="num_persons"></p></td>
			</tr>	
		</table>
		
		<h1><span id='modal_title'></span>Recapture Incident</h1>
		
		
		<p id="recaptureDiv"></p>
			<input type="hidden" name="recaptureID"  id="recaptureID" disabled />
		<!--Category-->
		<select id="menu_category_id_recapture" name="menu_category_id_recapture" ng-change="get_crimetype(menu_category_id_recapture)"  style="width:100%" required>
			<option value="">Select Category</option>
        	</select>
        	<input type="hidden" name="string_menu_category_name_recapture" id="string_menu_category_name_recapture" />
        	
        	
        	<br><br>
        	<!--category type-->
		<select id="menu_type_id_recapture" name="menu_type_id_recapture" style="width:100%" required>
			<option value="0" >Select Type</option>
        	</select>
        	<input type="hidden" name="string_category_type_name_recapture" id="string_category_type_name_recapture" />
        	
        	<br><br>
        	<!--Channel type-->
        	<select id="menu_channel_id_recapture" name="menu_channel_id_recapture" style="width:100%" required>
			<option value="">Select Channel</option>
        	</select>
        	<input type="hidden" name="menu_channel_recapture" id="menu_channel_recapture" />
        	
        	
        	<label for="description">Description</label>
		<textarea name="description_recapture" rows="4" cols="50" required></textarea>
        	
        	<div id="container1_AR">
			<!--<label for="reg_num">Vehicle Registration number(s)</label>
			<input type="text" name="reg_num" id="reg_num" >
				
			<label for="persons">Number of persons involved in accident</label>
			<input type="text" name="persons" id="persons" >-->
        	</div>
        	
        	
		<label for="location">Location</label>
		<input type="text" name="location_recapture" id="location_recapture"  required>


		<input type="hidden" name="category_name_recapture" id="category_name_recapture"/>
		
		<select id="menu_region_id_recapture" name="menu_region_id_recapture" style="width:100%" required>
			<option value="">Select Region</option>
        	</select>
        	<input type="hidden" name="menu_region_name_recapture" id="menu_region_name_recapture"/>
        	
       
			
		<label for="reportedby" >Reported by</label>
		<input type="text" name="reportedby_recapture" id="reportedby_recapture" >
		<label for="mobile">Contact/Radio Number</label>
		<input type="text" name="mobile_recapture" id="mobile_recapture" maxlength="10" >
		
		
		<label for="category_img">Images (744px X 700px)</label>
		<input type="file" name="category_img" id="category_img" class="custom-file-input">
		
		<label for="videolocation">Video</label>
		<input type="file" name="videolocation_recapture" id="videolocation_recapture" class="custom-file-input">
		
		<label for="audiolocation">Audio</label>
		<input type="file" name="audiolocation" id="audiolocation" class="custom-file-input">
			
		
		

		
		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<button type='reset'>Clear</button>
		</center>
		<br>
		
	</form>
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<div class="remodal" data-remodal-id="modal_activity">
<form style="text-align: left;" method="post"  id="submit-form"  action="">
		<h1><span id='modal_title'></span> Activity Log</h1>
<ol>
<li></li>

 </ol>
		
</form>	
</div>-->

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


<div class="remodal" data-remodal-id="modal_view">
	<form style="text-align: left;" method="post" id="view-form" action="list_order/view">
		<input type="hidden" name="category_id" id="category_id">
		<h1><span id='modal_title'></span>Incidents</h1>
		
		<label for="casenum3">CaseNum</label>
		<input type="text" name="casenum3"  id="casenum3" disabled />
	
		<label for="description1">Description</label>
		<textarea rows="15" cols="50" name="description1" id="description1" disabled></textarea>
		<label for="category1">Category</label>
		<input type="text" name="category1" id="category1" disabled>
		<label for="type1">Type</label>
		<input type="text" name="type1" id="type1" disabled>
		<label for="channel1">Channel</label>
		<input type="text" name="channel1" id="channel1" disabled>

		<label for="location1">Location</label>
		<input type="text" name="location1" id="location1" disabled>
		<label for="region1">Region</label>
		<input type="text" name="region1" id="region1" disabled>
		<!--<label for="address1">Address</label>
		<input type="text" name="address1" id="address1" disabled>
		<label for="map1">Map</label><br>-->
		
		<!-- <div class="form-group" style="border-bottom: dotted 1px #DDD;">
       <label for="map" class="control-label col-lg-3">GPRS Map</label>
		 <div  class="col-lg-9">
		
			<iframe width="600" height="170" scrolling="on" frameborder="0"  marginheight="0" marginwidth="0" src="https://www.google.com/maps?q=<%%VALUE(longidute)%%>,<%%VALUE(latidute)%%>&hl=es;z=14&amp;output=embed"></iframe><br><br>
		
		</div>
		</div>-->
	   
		<label for="reported1">Reported by</label>
		<input type="text" name="reported1" id="reported1" disabled>
		<label for="mobile1">Contact/Radio Number</label>
		<input type="text" name="mobile1" id="mobile1" disabled>
		
		<label for="status1">Status</label>
		<input type="text" name="status1" id="status1" disabled>
		<label for="captured1">Captured</label>
		<input type="text" name="captured1" id="captured1" disabled>
		<label for="date1">Date</label>
		<input type="text" name="date1" id="date1" disabled>
		
		<div id="recapRefNumDiv">
			<label for="recap_ref_num">Recaptured reference number</label>
			<input type="text" name="recap_ref_num" id="recap_ref_num" disabled>
		</div>
		
		<label for="category_img1" Style="font-size:10px;">Image</label>
		<p id="incidentDiv"></p><br>       
		
		
		<label for="audio">Audio</label></br>
		<p id="audioDiv"></p>
		</br>
		<label for="video">Video</label></br>	
	        <p id="videoDiv"></p>

		<br>
		<center>
			<button type='close'>Close</button>
		</center>
	</form>
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->



<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-list"></span> List of incidents</span>
<div style="float:right;">
<div class="menu">
	
		<select id="get_status" name="get_status" style="width:180px" disabled="disabled">
			<option value="">Select Status (all status)</option>
			<option value="New">New</option>
			<option value="Assigned">Assigned</option>
			<option value="Dispatched">Dispatched</option>
			<option value="Feedback">Feedback</option>
			<option value="Escalated">Escalated</option>
			<option value="Referred Back">Refer Back</option>
			
			<option value="Handedover">Handedover</option>
			<option value="Closed">Closed</option>
			
			
			
        </select>
		
		<a href="#modal_insert"><button id="btn-insert">Capture</button></a>
 
		<a href="#modal_recapture"><button id="btn-recapture" disabled="disabled">Recapture</button></a>

<a href="#modal_view"><button id="btn-view" disabled="disabled">View</button></a>

		<a href="#modal"><button id="btn-update" disabled="disabled">Status</button></a>

<a href="#modal_history"><button id="btn-history">History</button></a> 

		<button id="btn-priority">Priority</button>
		
		
<!--<a href="#modal_activity"><button id="btn-activity">Activity</button></a>-->

		<!--<a href="#modal_remove"><button id="btn-remove" disabled="disabled">Remove</button></a>-->
		<button id="btn-filter" value="on">Filter</button>
              <a href="#modal_file"><button id="btn-select-incident" >Export</button></a>
	</div>
</div>
</div>
<div class="mainview view">

<!-- Datatables -->
	<table class="table" id="tabels">
		<thead>
			<tr>
				<th width="80px">Ref no</th>
				<th>Category</th>
				<th width="150px">Type</th>
				<th width="150px">Date</th>
				<th width="200px">Location</th>
				<th width="80px">Status</th>
				<th>Region/units</th>
				<th>Channel</th>
				
			</tr>
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th width="80px">CaseNum</th>
				<th>Category</th>
				<th width="150px">Type</th>
				<th width="150px">Date</th>
				<th width="200px">Location</th>
				<th width="80px">Status</th>
				<th>Region/units</th>
				<th>Channel</th>
				
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td colspan="5" class="dataTables_empty">Loading data from server</td>
			</tr>
		</tbody>
	</table><br><br>
	<div class="remodal1" data-remodal-id="modal_history"><div style="font-size:15px; color: #999999; padding-bottom: 15px; float:left;">Incident History</div>
	<form class="form1" style="text-align: left;" method="post" id="history-form" action="list_order/history">
	<input type="hidden" name="category_id" id="category_id">
	<table class="table" id="tabelsShow" width="100%">
	<thead>
		<tr>
			<th>Ref Number</th>
			<th>Status</th>
			<th>Handedover Department </th>
			<th>Assigned Region </th>
			<th>Dispatched Vehicle</th>
			<th>Dispatched Officer/s</th>
			<th>Escalated To</th>
			<th width="200px">Notes</th>
			<th>Response Time</th>
			<th>CapturedBy</th>
			<th width="100px">Date</th>			
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="12" class="dataTables_empty">Loading data from server</td>
		</tr>
	</tbody>

	</table>
	</form>
	</div>
	<!--*******************************************************************************************************************-->
           <div class="remodal" data-remodal-id="modal_file"><div style="font-size:15px;  padding-bottom: 15px; float:left;">
	<h1><span id='modal_title'></span>Export Incidents</h1>
 <div style="text-align: left;">
       
        
        </div>
<p style="color:red;">Notes: If you want to only export specific records, please select by clicking on each records then click the SaveCSV</p>
	
</div><br>
	<!--<form style="text-align: left;" method="post" id="file-form" action="list_order/file_export">-->
	<div style="text-align: right;">
	<!--<a href="#modal_export"><button id="print_id" disabled="disabled">Print</button></a>-->
	<!--<a href="#modal_pdf"><button id="pdf_id" disabled="disabled">SaveAsPDF</button></a>-->
 <button id="selectall">SelectAll</button>
	<a href="#modal_csv"><button id="csv_id" disabled="disabled">SaveCSV</button></a><br>
	<!--<a href="#"><button onclick="doCsv()" >SaveAsCSV</button>-->
</div>
   <br>    
	<table class="table" id="tabelsexport" width="100%">
	
		<thead>
			<tr>
				<th width="100px">Ref no</th>
				<th>Category</th>
				<th width="200px">Type</th>
				<th width="200px">Date</th>
				<th width="200px">Location</th>
				<th>Status</th>
				<th>Region/units</th>
				<th>Channel</th>
				
			</tr>
		</thead>
		
		<tbody>
			<tr>
				<td colspan="5" class="dataTables_empty">Loading data from server</td>
			</tr>
		</tbody>
	</table><br><br>

	
	<!--</form>-->
	</div>
<!--***************************************************************************************************************-->

	<!-- Update status Modal -->
	<div class="remodal" data-remodal-id="modal" id="modal">
    	<div class="page">
    	
    	<form method="post" id="update-status-form" action="list_order/update_status" onsubmit="return validate();" >
              <h1><b>Incident Reference Number:  <span id="order_id"></span></b></h1>
             <input type="hidden" name="casenum1" id="casenum1" >
             <input type="hidden" name="date" id="date" >
              	<div class="content-area">
					Update incident Status :<br>
					
               		<select id="status_data" name="status_data" style="width:250px">
				<option value="">Select Status (all status)</option>
				
				<option id="region_assign" value="Assigned">Assigned</option>
				<option value="Dispatched">Dispatched</option>
				<option value="Feedback">Feedback</option>
				<option value="Escalated">Escalated</option>
				<option id="reffer_back" value="Referred">Refer back to Nodal Point</option>
				
				<option value="Handedover">Handedover</option>
				<option value="Closed">Closed</option>
			
			</select><br><br>
			<div id="dispatchCars">
			
			<select id="dispatch_cars_id" name="dispatch_cars_id" style="width:100%" >
			<option value="">Select a Vehicle</option>
        		</select>
<br>
<label id="lbl_car_data" for="string_car_data">Enter Vehicle Call Sign</label>
<input type="hidden" id="string_car_data" name="string_car_data" >
<br>
        		<label for="dispatch_officer">Officer's Pay No</label>
        		<input type="text" id="dispatch_officer" name="dispatch_officer" >
        		</div>
        		
			<div id="browserother">
			
			<select id="handover_region_id" name="handover_region_id" style="width:100%" >
			<option value="">Select Region</option>
        		</select></div>
        		<input type="hidden" id="string_handover_region_id" name="string_handover_region_id" >
        		<div id="arrival_time">
        		<label for="string_arrival_time">Arrival time at the scene<br>e.g 2015-07-24 01:25:01</label>&nbsp;&nbsp;
        		<input type="datetime-local" id="string_arrival_time" name="string_arrival_time">
			</div>
        		<div id="referred_div">
			
			<select id="referred_id" name="referred_id" style="width:100%" >
			<option value="">Select department</option>
        		</select></div>
        		<input type="hidden" id="string_referred_id" name="string_referred_id">
        		
			<div id="escalate_call_method">
			
			<select id="supervisor_name" name="supervisor_name" style="width:100%">
			<option value="">Select Supervisor (Name)</option>



			</select>
<br><br>



<br>
<label id="lbl_supervisor" for="supervisor_hidden_id">Enter Supervisor name</label>
<input type="hidden" name="supervisor_hidden_id" id="supervisor_hidden_id">
<br>
			</div>


			<label for="notes">Notes</label>
			<textarea name="notes" rows="10" cols="50" ></textarea>
			<!--<label for="capturedby">Captured by</label>-->
			<input type="hidden" name="operator" id="operator" disabled>
			<label for="date">Date</label>
			<input type="date" name="date" id="date" disabled>
              	</div>
              	<div class="action-area">
			 		
                		<div class="action-area-right">
                  			<div class="button-strip"><br>
				   		<input type="hidden" id="orders_id" name="orders_id">
                    			<button type="submit" id="btn-delete-log">Submit</button>
                  			</div>
                		</div>
					
					</div>
				</div>
		</form>
		
		
		</div><br>
		
		<!-- Remove Modal -->
	<div class="remodal" data-remodal-id="modal_remove">
    	<div class="page">
              <h1><b>Confirmation</b></h1>
              	<div class="content-area">
               		Do you want delete this data? 
              	</div>
              	<div class="action-area">
			 		<form method="post" id="remove-form" action="list_order/remove">
                		<div class="action-area-right">
                  			<div class="button-strip">
				   				<input type="hidden" name="remove_list_id" id="remove_list_id">
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
	
<script>
   	$('[data-remodal-id=modal]').remodal();
   	$('[data-remodal-id=modal_insert]').remodal();
   	$('[data-remodal-id=modal_recapture]').remodal();
   	$('[data-remodal-id=modal_view]').remodal();
   	$('[data-remodal-id=modal_history]').remodal();
	$('[data-remodal-id=modal_remove]').remodal();
//$('[data-remodal-id=modal_activity').remodal();
	$('[data-remodal-id=modal_export]').remodal();
	$('[data-remodal-id=modal_file]').remodal();
	$('[data-remodal-id=modal_csv]').remodal();
	
	
      	 
	 /** Get request data region  **/
	getRequest("list_order/get_regions", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#handover_region_id").append("<option value="+data[i].regionid+">"+data[i].region_name+"</option>");
        }

    });
	
	/** Get request data category  **/
	getRequest("list_order/get_category", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			//$("#menu_category_id").append("<option value="+data[i].category_id+">"+data[i].category_name+"</option>");
			$("#menu_category_id").append("<option value="+data[i].category_name+">"+data[i].category_name+"</option>");
			$("#menu_category_id_recapture").append("<option value="+data[i].category_name+">"+data[i].category_name+"</option>");
        }

    });
    
    	  /** Get request data region  **/
	getRequest("list_order/get_regions", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#menu_region_id").append("<option value="+data[i].region_name+">"+data[i].region_name+"</option>");
			$("#menu_region_id_recapture").append("<option value="+data[i].region_name+">"+data[i].region_name+"</option>");
        }

    });
    
    	  /** Get request data region  **/
	getRequest("list_order/get_channels", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#menu_channel_id").append("<option value="+data[i].channel_type+">"+data[i].channel_type+"</option>");
			$("#menu_channel_id_recapture").append("<option value="+data[i].channel_type+">"+data[i].channel_type+"</option>");
        }

    });
     $("#menu_channel_id_recapture").change(function(){
    
    	 
    	 $("#menu_channel_recapture").val($('#menu_channel_id_recapture option:selected').text());
    });
     /** Get request data region**/
    $("#menu_region_id").change(function(){
    
    	 
    	 $("#menu_region").val($('#menu_region_id option:selected').text());
    });
     /** Get request data type**/
    $("#menu_channel_id").change(function(){
  
    	 $("#menu_channel").val($('#menu_channel_id option:selected').text());
    });
    
     	  $("#menu_region_id_recapture").change(function(){
    
    	$("#menu_region_name_recapture").val($('#menu_region_id_recapture option:selected').text()); 
    
    });
    
    /********************************************************************************/
     $("#menu_type_id_recapture").change(function(){
    
    	$("#string_category_type_name_recapture").val($('#menu_type_id_recapture option:selected').text());
    	
    
	  if ($('#menu_type_id_recapture option:selected').text() == 'Accident'){
	    
	     $('#container1_AR').show();
	    
	  }else{
	    
	       $('#container1_AR').hide();
	  }
     	
    
    });
     /** Get request data type recapture**/
    $("#menu_category_id_recapture").change(function(){
    
    $("#string_menu_category_name_recapture").val($('#menu_category_id_recapture option:selected').text()); 
   // console.log("cat val"+);
    var menucategoryid = $('#menu_category_id_recapture option:selected').text();
    
   //console.log("logging text " +   carname);
    $("#menu_type_id_recapture").empty();
   
     
	getRequest("list_order/get_crimetype/" + menucategoryid.replace(/\ /g,"_"), function(data) {
      
        
        var data = JSON.parse(data.responseText);
        
        $('#menu_type_id_recapture').append($('<option>', {    value: 0,    text: 'Select type'}));
         
        for (var i = 0; i < data.length; i++) {
        
        	$("#menu_type_id_recapture").append("<option value="+data[i].type_name+">"+data[i].type_name+"</option>");
        }
         
	
	});
	/** var menucategoryname = $("#menu_category_id");
     console.log("logging text" +  menucategoryname);**/
    });
    
    
    /********************************************************************************/
    /** Get request data type capture**/
    $("#menu_category_id").change(function(){
    
    $("#string_menu_category_name").val($('#menu_category_id option:selected').text()); 
   // console.log("cat val"+);
    var menucategoryid = $('#menu_category_id option:selected').text();
    
   //console.log("logging text " +   carname);
    $("#menu_type_id").empty();
   
     
	getRequest("list_order/get_crimetype/" + menucategoryid.replace(/\ /g,"_"), function(data) {
      
        
        var data = JSON.parse(data.responseText);
        
        $('#menu_type_id').append($('<option>', {    value: 0,    text: 'Select type'}));
         
        for (var i = 0; i < data.length; i++) {
        
        	$("#menu_type_id").append("<option value="+data[i].type_name+">"+data[i].type_name+"</option>");
        }
         
	
	});
	/** var menucategoryname = $("#menu_category_id");
     console.log("logging text" +  menucategoryname);**/
    });
    
     $("#menu_type_id").change(function(){
     
     $("#string_category_type_name").val($('#menu_type_id option:selected').text());
     
     });
     /*onchange the the option handover field data*/
      $("#handover_region_id").change(function(){
     
     $("#string_handover_region_id").val($('#handover_region_id option:selected').text());
     
     });
     
     /*onchange for the type Accident*/
     
     
     
     /*onchage for the handover
      $('#browserother').hide();
     $("#status_data").change(function(){
      $('#status_data option:selected').each(function(){
	  if ($(this).text() == 'Assigned'){
	    $('#browserother').show();
	  }else{
	    $('#browserother').hide();
	  }
     	})
     }).change();*/
     
      /*onchage for the handover*/
      
     $("#status_data").change(function(){
     
     	var val = $('#status_data').val();
     	if (val === "Re-assign"){
	    $('#browserother').show();
	  }else if(val==='Assigned')
	  {$('#browserother').show();}else{
	    $('#browserother').hide();
	  }
     	
   
     }).change();
     
     /*onchage for the handover*/
      
     $("#status_data").change(function(){
      $('#status_data option:selected').each(function(){
       $('#notes').val('').empty();
	  if ($(this).text() == 'Feedback'){
	    $('#arrival_time').show();
		
	 console.log("AR container type: " + type_AR);
if(type_AR==="Accident")
{
$('#ARcontainer').show();
}
else{$('#ARcontainer').hide();}
	  }else{
	    $('#arrival_time').hide();
$('#ARcontainer').hide();
	  }
     	})
     }).change();
     
     /*onchage for the Dispatched*/
     
     $("#status_data").change(function(){
      $('#status_data option:selected').each(function(){
        $('#notes').val('').empty();
	  if ($(this).text() == 'Dispatched'){
	    $('#dispatchCars').show();
	  }else{
	    $('#dispatchCars').hide();
	  }
     	})
     }).change();
    
      /*onchange the the option handover field data*/
      $("#referred_id").change(function(){
     
     $("#string_referred_id").val($('#referred_id option:selected').text());
     
     });
      /*onchage for the handover*/
      
     $("#status_data").change(function(){
      $('#status_data option:selected').each(function(){
       $('#notes').val('').empty();
	  if ($(this).text() == 'Handedover'){
	    $('#referred_div').show();
	  }else{
	    $('#referred_div').hide();
	  }
     	})
     }).change();
     	
     	getRequest("list_order/get_dept", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#referred_id").append("<option value="+data[i].dept_name+">"+data[i].dept_name+"</option>");
        }

    });
     	


	/*getRequest("list_order/get_managers", function(data) {
		
	var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#supervisor_name").append("<option value="+data[i].user_full_name+">"+data[i].user_full_name+"</option>");
        }
 
    });*/
  $("#supervisor_name").append("<option value=Other> Other </option>"); 
	
     $("#supervisor_name").change(function(){

	if($ ('#supervisor_name').val() == "Other")
	{
		$("#lbl_supervisor").show();
       		$("#supervisor_hidden_id").val('');
    		$('#supervisor_hidden_id').get(0).type = 'text';

	}else
	{
        	$("#lbl_supervisor").hide();
      	  $("#supervisor_hidden_id").val($('#supervisor_name option:selected').text());
      	  $('#supervisor_hidden_id').get(0).type = 'hidden';
	}
  
     });


   
   getRequest("list_order/get_vehicle_type", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#dispatch_cars_id").append("<option value="+data[i].call_sign+">"+data[i].call_sign+"</option>");
        }
$("#dispatch_cars_id").append("<option value=Other>Other</option>");

    });
    $ ('#dispatch_cars_id').change(function(){

if($ ('#dispatch_cars_id').val() == "Other")
    {
	$("#lbl_car_data").show();
        $("#string_car_data").val('');
    	$('#string_car_data').get(0).type = 'text';

}else{
     $("#lbl_car_data").hide();
           $("#string_car_data").val($('#dispatch_cars_id option:selected').text());
$('#string_car_data').get(0).type = 'hidden';
}
           
     });
   
</script>
	
<script type="text/javascript">
function doCsv(){
    var csvtable=document.getElementById("csvidcopy").innerHTML;
      var csvFile= csvtable.replace(/<thead>/g,'').replace(/<\/thead>/g,'').replace(/<tbody id="csv_info_id">/g,'').replace(/<\/tbody>/g,'').replace(/<tr>/g,'').replace(/<\/tr>/g,'\r\n').replace(/<th>/g,'').replace(/<\/th>/g,';').replace(/<td>/g,'').replace(/<\/td>/g,';').replace(/\t/g,'').replace(/\n/g,'');
 // alert(csvFile);
       //  FILENAME = "Incidents Report.csv";
          // Initiate Download
       /* var a = document.createElement("a");
            a.download="Incidents Report.csv";
            a.href="data:application/csv,"+escape(csvFile);
            a.click();
        */
    FILENAME = "Incidents Report.csv";
         // Initiate Download
        var a = document.createElement("a");
        csvEncoding = 'data:text/csv;charset=utf-8,';
        if (navigator.msSaveBlob) { // IE10
            navigator.msSaveBlob(new Blob([csvFile], { type: "text/csv" }), FILENAME);
        } else if ('download' in a) { //html5 A[download]
            a.href = csvEncoding + encodeURIComponent(csvFile);
            a.download = FILENAME;
            document.body.appendChild(a);
            setTimeout(function() {
                a.click();
                document.body.removeChild(a);
            }, 66);
        } else if (document.execCommand) { // Other version of IE
            var oWin = window.open("about:blank", "_blank");
            oWin.document.write(csvFile);
            oWin.document.close();
            oWin.document.execCommand('SaveAs', true, FILENAME);
            oWin.close();
        } else {
        
           alert("Support for your specific browser hasn't been created yet, please check back later.");
        } 
}
function validateRequiredField()
   {
     var desc=document.forms["submit-form"]["description"].value;
     var menu_c_id=document.forms["submit-form"]["menu_category_id"].value;
     var menu_hiddencat=document.forms["submit-form"]["string_menu_category_name"].value;
     var menu_t_id=document.forms["submit-form"]["menu_type_id"].value;
     var loc=document.forms["submit-form"]["location"].value;
     var menu_region_id=document.forms["submit-form"]["menu_region_id"].value;
     var menu_hiddenchannel=document.forms["submit-form"]["menu_channel"].value;
     var menu_channel=document.forms["submit-form"]["menu_channel_id"].value;
     var reportedby=document.forms["submit-form"]["reportedby"].value;
     var mobile=document.forms["submit-form"]["mobile"].value;
     var string_category_type_name =document.forms["submit-form"]["string_category_type_name"].value;
    
    
         if (menu_c_id == null || menu_c_id== "") {
	        alert("category must be filled out");
	        return false;
	    }else{
	         if (menu_hiddencat== null || menu_hiddencat== "") {
		        alert("category must be filled out");
		        return false;
		    }else{
	         if (menu_t_id== null || menu_t_id== "") {
		        alert("Crime type must be filled out");
		        return false;
		    }else{
			if (string_category_type_name == null || string_category_type_name == "") {
			alert("Select a category type");
			document.forms["submit-form"]["menu_type_id"].focus();
			 return false;
		}else{
	         if (menu_channel== null || menu_channel== "") {
		        alert("Channel must be filled out");
		        return false;
		    }else{
	         if (menu_hiddenchannel== null || menu_hiddenchannel== "") {
		        alert("Channel must be filled out");
		        return false;
		    }else{
		         if (desc == null || desc == "") {
  
        		alert("description must be filled out");
        			return false;
  		 	 }else{
				if (loc== null || loc== "") {
			        alert("location must be filled out");
			        return false;
			    }else{
			         if (menu_region_id== null || menu_region_id== "") {
				        alert("region must be filled out");
				        return false;
				    }else{
			         if (string_handover_region_id== null || string_handover_region_id== "") {
				        alert("region must be filled out");
				        return false;
				    }else{
					  if (reportedby== null || reportedby == "") {
					        alert("reported by must be filled out");
					        return false;
					    }else{
					         if (mobile== null || mobile== "") {
						        alert("mobile no must be filled out");
						        return false;
								}else{
								   return true;
								}
		     		       	}
						}}
				    }}}
			    }
		    }}
	    }
    }

   }
   

function validate()
   {
    
     var update =document.forms["update-status-form"]["status_data"].value;
     var notes=document.forms["update-status-form"]["notes"].value;
     var string_handover_region_id =document.forms["update-status-form"]["string_handover_region_id"].value;
     var handover_region_id=document.forms["update-status-form"]["handover_region_id"].value;
     var dispatch_cars_id =document.forms["update-status-form"]["dispatch_cars_id"].value;
     var string_car_data=document.forms["update-status-form"]["string_car_data"].value;
     var dispatch_officer=document.forms["update-status-form"]["dispatch_officer"].value;
     var string_arrival_time=document.forms["update-status-form"]["string_arrival_time"].value;
     var supervisor_name=document.forms["update-status-form"]["supervisor_name"].value;
     var supervisor_hidden_id=document.forms["update-status-form"]["supervisor_hidden_id"].value;
     var string_referred_id=document.forms["update-status-form"]["string_referred_id"].value;
     var referred_id=document.forms["update-status-form"]["referred_id"].value;


     
	if(update =="Assigned")	{ 
    
	if (handover_region_id== null || handover_region_id== "") {
   	 alert("Region must be filled out");
   	 return false;
	}else{
   	if (string_handover_region_id== null || string_handover_region_id == "") {
     	 alert("Region must be filled out");
      	return false;
	}else{
   	if (notes== null || notes == "") {
     	 alert("Notes must be filled out");
      	return false;
	}else{
   	 return true;
     	}
	}
	}
        }


	if(update =="Dispatched")	{ 
    
	//if (dispatch_cars_id== null || dispatch_cars_id== "") {
   	// alert("Car must be filled out");
   	 //return false;
	//}else{
   	//if (string_car_data== null || string_car_data == "") {
     //	 alert("Car must be filled out");
      	//return false;
	//}else{
   	//if (dispatch_officer== null || dispatch_officer == "") {
     	// alert("Officer must be filled out");
      //	return false;
	//}else{
   	if (notes== null || notes == "") {
     	 alert("Notes must be filled out");
      	return false;
	}else{
   	 return true;
     	}
	//}
	//}
       // }
	}


	if(update =="Feedback")	{ 
    
	if (string_arrival_time== null || string_arrival_time== "") {
   	 alert("Arrival Time must be filled out");
   	 return false;
	}else{
   	if (notes== null || notes == "") {
     	 alert("Notes must be filled out");
      	return false;
	}else{
   	 return true;
     	}
	}
	}

	if(update =="Referred")	{
 
   	if (notes== null || notes == "") {
     	 alert("Notes must be filled out");
      	return false;
	}else{
   	 return true;
     	}
	
	}
	

	if(update =="Escalated")	{ 
    
	//if (supervisor_name== null || supervisor_name== "") {
   	 //alert("Supervisor Name must be filled out");
   	// return false;
	//}else{
   	if (supervisor_hidden_id== null || supervisor_hidden_id== "") {
     	alert("Supervisor Name must be filled out");
      	return false;
	}else{
   	if (notes== null || notes == "") {
     	 alert("Notes must be filled out");
      	return false;
	}else{
   	 return true;
     	}
	}
	//}
	}


	if(update =="Handedover")	{ 
    
	if (referred_id== null || referred_id== "") {
   	 alert("Department must be filled out");
   	 return false;
	}else{
   	if (string_referred_id== null || string_referred_id== "") {
     	 alert("Department  must be filled out");
      	return false;
	}else{
   	if (notes== null || notes == "") {
     	 alert("Notes must be filled out");
      	return false;
	}else{
   	 return true;
     	}
	}
	}
	}

	if(update =="Closed")	{
 
   	if (notes== null || notes == "") {
     	 alert("Notes must be filled out");
      	return false;
	}else{
   	 return true;
     	}
	
	}

       	
}

 //var oTable;
    var selected =  new Array();

$(document).ready(function() {
	//hide capture/recapture fields

	 $("#ARcontainer").hide();
      	 $("#container1_AR").hide();
      	 
      	 $('#browserother').hide();
      	 $('#arrival_time').hide();
         $('#dispatchCars').hide();
      	 $('#referred_div').hide();
      	 $('#notes').val('').empty();
      	 $('#recapRefNumDiv').hide();
      	
      	 $('#get_status').hide();
$("#lbl_car_data").hide();
$("#lbl_supervisor").hide();


$("#region_assign").hide();


/**Get request data logged user to determine which buttons to hide **/
	getRequest("list_order/get_logged", function(data) {
         
        var data = JSON.parse(data.responseText);
    if(data == "Nodal Point")
{
$("#region_assign").show();
$("#reffer_back").hide();

}else{
$("#region_assign").hide();
$("#reffer_back").show();
}
    });


      	 
      	  //$("#submitStatus").change(function(){console.log("Deleting");})
      
	var check_total = 0;
	
	setInterval(function() {
		$.get('list_order/check_corruption', function(data) {
			
			if(check_total < data){
			
				alert('We have '+(data-check_total)+" New Corruption Incidents!");
				check_total = data;	
				oTable.fnReloadAjax();
				oTableShow.fnReloadAjax();
			}
		});
	}, 5000); // refers to the time to refresh the div. it is in milliseconds.

	//code to that hide the dropdown for supervisors
	   $('#escalate_call_method').hide();
	 
	 $('#status_data').change(function(){
		  $( "#status_data option:selected" ).each(function() {
	      if($( this ).text()=='Escalated' ){
			   $('#escalate_call_method').show();
		    }else{
				 $('#escalate_call_method').hide();
			}
		  });	 
	 }).change();
	 
     $("#status_data").change(function(){
        // if($('#status_data option:selected').text()=='RefferedBack')
       
         $( "#status_data option:selected" ).each(function() {
         if($( this ).text()=='Dispatched' ){
			   $('#dispatchCars').show();
		    }else{
				 $('#dispatchCars').hide();
			}
			});
     }).change();
 
	/** Action button menu **/
	var update_id = '';
	var cat_id ='';
	
	/* Insert button */
	$('#btn-insert').bind('click', function(){
		// Reset submit form
		$('#submit-form input').val('');
		$('#modal_title').html($('#btn-insert').text());
	});
	/* View Recapture*/
	$('#btn-recapture').bind('click', function(){
	
	if($('#recaptureID').val()==''){alert("id not available");/*$('#recapture-form').hide()*/}
	
	// Reset submit form
		//$('#recapture-form input').val('');
		$('#modal_title').html($('#btn-recapture').text());
	});

	/* Update button */
	$('#btn-update').bind('click', function(){
        $('#dispatchCars').hide();
	$('#notes').val('').empty();
        $('#notes').val('');

// Reset submit form
		//$('#update-status-form input').val('');

		//$('#update-status-form').hide();
		
	console.log(update_id);
		 /** Get request data region  **/
	getRequest("list_order/get_log_id/" + update_id, function(data) {
         
        var data = JSON.parse(data.responseText);
        var flag = false;
        //if value is in database say false
        	
        	if(data==0)
        	{
        		//getRequest("list_order/send_log_id/" + update_id, function(data) {console.log(data);});
        			
        		 
        		$('#update-status-form').show();
	          	$('#locked-message').hide();
		        $('#modal_title').html($('#btn-update').text());	
        	}
	        else{	
	        //write id  to database
	        	console.log("ID found: " + data[0].incident_id );
	        	if(data[0].incident_id==update_id)
        		{
		        	$('#update-status-form').hide();
		          	$('#locked-message').show();
		          	$('#modal_title').html('Incident Locked');
	         	}
		}
    
     
     

    });
		// console.log("testing"+ $user_region );
		 
	});
	
	/* View button */
	$('#btn-view').bind('click', function(){
if(incident_image != '')
{
$("#audioDiv").show()
}

		$('#modal_title').html($('#btn-view').text());
	});
	/* Submit Status button */
	$('#btn-delete-log').bind('click', function(){
		console.log("Deleting log");
		//getRequest("list_order/delete_log_id/" + update_id, function(data) {console.log(data);});
	});
	
/******************************************************************************/	
	$('#btn-priority').bind('click', function(){
	          
	       
	       $('#tabels tbody tr').each(function() {
	       var crimetype = $(this).find("td").eq(2).html();
	      //  console.log("crimetype:"+ crimetype);
	       if(crimetype=='Robbery')	       
	        $(this).addClass("priority row_selected");
	       if(crimetype=='Murder')	       
	        $(this).addClass("priority row_selected"); 
	        if(crimetype=='Theft')	       
	        $(this).addClass("priority row_selected");  
	        if(crimetype=='Hijaking')	       
	        $(this).addClass("priority row_selected");  
	        if(crimetype=='Breaking')	       
	        $(this).addClass("priority row_selected");   
	               });
	
	});
/*************************************************************************/


/* Activity log button */
	$('#btn-activity').bind('click', function(){
		// Reset submit form
$("ol").empty();
getRequest("list_order/get_activity_log/" + case_num.split('/').join('_'), function(data) {
         
        var data = JSON.parse(data.responseText);
 for (var i = 0; i < data.length; i++) {
  $("ol").append("<li>" + data[i].audit_status + " BY " + data[i].capturedby + "</li>");
$("ol").append("<li>" + data[i].RefNum +  " ; "  + data[i].description +  " ; "  + data[i].car_reg_num+  " ; "  +data[i].num_persons +  " ; "  + data[i].area +  " ; "  + data[i].type+  " ; "  + data[i].reportedon+  " ; "  + data[i].location+  " ; "  + data[i].region+  " ; "  + data[i].address +  " ; "  +data[i].user+ "</li>");
$("ol").append("</br>");

        }

   
       

    });

 });
	
	/* histoy button */
	$('#btn-histoy').bind('click', function(){
		$('#modal_title').html($('#btn-histoy').text());
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
		"aoColumnDefs": [
						{ "bVisible": false, "aTargets": [8] },
						{ "bVisible": false, "aTargets": [9] },
						{ "bVisible": false, "aTargets": [10] },
						{ "bVisible": false, "aTargets": [11] }],
		"bProcessing": false,
		"bServerSide": true,
		"iDisplayLength": 50,
		"sAjaxSource": "list_order/corruption",
		"fnServerParams": function ( aoData ) {
            aoData.push( { "name": "status", "value": $('#get_status').val() } );
       	},
		"aaSorting": [[ 3, "desc" ]],
		'sPaginationType': 'full_numbers',
       	"fnServerData": function( sUrl, aoData, fnCallback ) {
            $.ajax( {
                "url": sUrl,
                "data": aoData,
                "success":  fnCallback,
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
						{ type: "text" },
						{ type: "text" },
						{ type: "text" },
						{ type: "text" },
						{ type: "text" },
				        	{ type: "text" }]
		});		
   
		var oTableShow = $('#tabelsShow').dataTable({
					"bFilter": false,
					"bServerSide": true,
					"iDisplayLength": 50,
					"sAjaxSource": "list_order/history",
					"fnServerParams": function ( aoData ) {
            		aoData.push( { "name": "getRef", "value": update_id } );
       				 },
					'sPaginationType': 'full_numbers',
					"aaSorting": [[ 10, "desc" ]],					
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
         });

     
        //======================================================================================================================
         var oTableExport = $('#tabelsexport').dataTable({
                                        "aoColumnDefs": [ { "bVisible": false, "aTargets": [7] },
						{ "bVisible": false, "aTargets": [8] },
						{ "bVisible": false, "aTargets": [9] },
						{ "bVisible": false, "aTargets": [10] },
						{ "bVisible": false, "aTargets": [11] }],
					//"bFilter": false,
					"bServerSide": true,
					"iDisplayLength": 50,
					"sAjaxSource": "list_order/file_export",
					"fnServerParams": function ( aoData ) {
            		aoData.push( { "name": "status", "value": $('#get_status').val() } );
       				 },
					'sPaginationType': 'full_numbers',
					"aaSorting": [[ 4, "desc" ]],					
					"bAutoWidth": false,
       				 "fnServerData": function( sUrl, aoData, fnCallback ) {
            $.ajax( {
                "url": sUrl,
                "data": aoData,
                "success": fnCallback,
                "dataType": "jsonp",
                "cache": false
            } );
        },
                   
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
    var iPos = oTable.fnGetPosition( nRow );
    if ( jQuery.inArray(aData[0], selected) != -1 )
    {
        $(nRow).addClass('row_selected');
    }
    if ( iPos != null )
    {
        var aData = oTable.fnGetData( iPos );
        if ( jQuery.inArray(aData[0], selected) != -1 )
        {
            $(this).addClass('row_selected');
            
        }
    }
     $('#selectall').click(function(){
      
        $(nRow).toggleClass('row_selected');
         var iPos = oTable.fnGetPosition( nRow );
        var aData = oTable.fnGetData( iPos );
        var iId = aData[21];
        if ( jQuery.inArray(iId, selected) == -1 )
        {
            selected[selected.length++] = iId;
        }
        else
        {
            selected = jQuery.grep(selected, function(value) {
                return value != iId;
                            } );
        }

          $('#csv_id').removeAttr("disabled");

    }); 
    $(nRow).click( function () {
        
        var iPos = oTable.fnGetPosition( nRow );
        var aData = oTable.fnGetData( iPos );
        var iId = aData[21];
        if ( jQuery.inArray(iId, selected) == -1 )
        {
            selected[selected.length++] = iId;
        }
        else
        {
            selected = jQuery.grep(selected, function(value) {
                return value != iId;
                            } );
        }
 
        $(nRow).toggleClass('row_selected');
          $('#csv_id').removeAttr("disabled");
    });
  
    return nRow;
            }
    });
      
      
     $('#print_id').click( function () {
   
			        /** Get request data region style="border: 1px solid black;"**/ 
			getRequest("list_order/get_incident_data", function(data) {
		          $("#print_info_id").empty();
		        var data = JSON.parse(data.responseText);
		               $("#print_info_id").append("<table>");  
		        for (var i = 0; i < data.length; i++) {
		              
		               for (var x = 0; x < selected.length; x++) {
		                     if(Number(selected[x])===Number(data[i].id)){
		                     $("#print_info_id").append("<tr><td><img src=../upload/gambar/"+data[i].RefNum+"></img></td><td>");
		                     $("#print_info_id").append("<table>");
					$("#print_info_id").append("<tr><td>Reference No </td><td>:</td><td>"+data[i].RefNum+"</td></tr>");
					$("#print_info_id").append("<tr><td>Description </td><td>:</td><td>"+data[i].description+"</td></tr>");
					$("#print_info_id").append("<tr><td>Accident Reg No </td><td>:</td><td>"+data[i].car_reg_num+"</td></tr>");
					$("#print_info_id").append("<tr><td>Number persons </td><td>:</td><td>"+data[i].num_persons+"</td></tr>");
					$("#print_info_id").append("<tr><td>Category </td><td>:</td><td>"+data[i].area+"</td></tr>");
					$("#print_info_id").append("<tr><td>Type </td><td>:</td><td>"+data[i].type+"</td></tr>");
					$("#print_info_id").append("<tr><td>Reported on </td><td>:</td><td>"+data[i].reportedon+"</td></tr>");
					$("#print_info_id").append("<tr><td>Location </td><td>:</td><td>"+data[i].location+"</td></tr>");
					$("#print_info_id").append("<tr><td>Region </td><td>:</td><td>"+data[i].region+"</td></tr>");
					$("#print_info_id").append("<tr><td>Address </td><td>:</td><td>"+data[i].address+"</td></tr>");
					$("#print_info_id").append("<tr><td>Latidute </td><td>:</td><td>"+data[i].latidute+"</td></tr>");
					$("#print_info_id").append("<tr><td>Longidute </td><td>:</td><td>"+data[i].longidute+"</td></tr>");
					$("#print_info_id").append("<tr><td>user </td><td>:</td><td>"+data[i].user+"</td></tr>");
					$("#print_info_id").append("<tr><td>reportedby </td><td>:</td><td>"+data[i].reportedby+"</td></tr>");
					$("#print_info_id").append("<tr><td>mobile </td><td>:</td><td>"+data[i].mobile+"</td></tr>");
					$("#print_info_id").append("<tr><td>status </td><td>:</td><td>"+data[i].status+"</td></tr>");
					$("#print_info_id").append("<tr><td>capturedby </td><td>:</td><td>"+data[i].capturedby+"</td></tr>");
					$("#print_info_id").append("<tr><td>Recapture Ref No </td><td>:</td><td>"+data[i].RecapRefNum+"</td></tr>");
					$("#print_info_id").append("<tr><td>channel </td><td>:</td><td>"+data[i].channel+"</td></tr></table></td></tr>");
				   
			         $("#print_info_id").append("<br><br>");	
			         }
		              }
		         }
		         $("#print_info_id").append("</table>");	
		        
		    });

          });
          
          $('#csv_id').click(function(){
             
             getRequest("list_order/get_incident_data", function(data) {
              // var dataArray =[];
               var darr="";
                var n=0;   
                var data = JSON.parse(data.responseText);
                //JSONArray list = new JSONArray();
             
	     
	         for (var x = 0; x < selected.length; x++) {
	            for (var i = 0; i < data.length; i++) {
		             
		             if(Number(selected[x])===Number(data[i].id)){
		           
		               darr+="<tr><td>"+data[i].RefNum+"</td><td>"+data[i].description+"</td><td>"+data[i].car_reg_num+"</td><td>"+ data[i].num_persons+"</td><td>"+data[i].area+"</td><td>"+data[i].type+"</td><td>"+data[i].reportedon+"</td><td>"+data[i].location+"</td><td>"+ data[i].region+"</td><td>"+data[i].address+"</td><td>"+data[i].lat+"</td><td>"+data[i].lot+"</td><td>"+data[i].user+"</td><td>"+data[i].reportedby+"</td><td>"+data[i].mobile+"</td><td>"+data[i].status+"</td><td>"+data[i].capturedby+"</td><td>"+data[i].RecapRefNum+"</td><td>"+ data[i].channel+"</td></tr>";
		              
		               }
		         }
		   }
		  
	          document.getElementById("csv_info_id").innerHTML =darr;
	    });
            $('.thiscsvtable').hide();
         });

     /*     $('#selectall_id').click(function(){
          $(this).toggleClass('row_selected');
          });*/
          function getDataForm(id){
          
           /** Get request data region style="border: 1px solid black;"**/ 
	getRequest("list_order/get_incident_list/"+id, function(data) {
         
        var data = JSON.parse(data.responseText);
               $("#print_info_id").append("<table>");  
        for (var i = 0; i < data.length; i++) {
         
                     $("#print_info_id").append("<tr><td><img src=../upload/gambar/"+data[i].RefNum+"></img></td><td>");
                     $("#print_info_id").append("<table>");
			$("#print_info_id").append("<tr><td>Reference No</td><td>"+data[i].RefNum+"</td></tr>");
			$("#print_info_id").append("<tr><td>Description</td><td>"+data[i].description+"</td></tr>");
			$("#print_info_id").append("<tr><td>Accident Reg No</td><td>"+data[i].car_reg_num+"</td></tr>");
			$("#print_info_id").append("<tr><td>Number persons</td><td>"+data[i].num_persons+"</td></tr>");
			$("#print_info_id").append("<tr><td>Area</td><td>"+data[i].area+"</td></tr>");
			$("#print_info_id").append("<tr><td>Type</td><td>"+data[i].type+"</td></tr>");
			$("#print_info_id").append("<tr><td>Reported on</td><td>"+data[i].reportedon+"</td></tr>");
			$("#print_info_id").append("<tr><td>Location</td><td>"+data[i].location+"</td></tr>");
			$("#print_info_id").append("<tr><td>Region</td><td>"+data[i].region+"</td></tr>");
			$("#print_info_id").append("<tr><td>Address</td><td>"+data[i].address+"</td></tr>");
			$("#print_info_id").append("<tr><td>Latidute</td><td>"+data[i].latidute+"</td></tr>");
			$("#print_info_id").append("<tr><td>Longidute</td><td>"+data[i].longidute+"</td></tr>");
			$("#print_info_id").append("<tr><td>user</td><td>"+data[i].user+"</td></tr>");
			$("#print_info_id").append("<tr><td>reportedby</td><td>"+data[i].reportedby+"</td></tr>");
			$("#print_info_id").append("<tr><td>mobile</td><td>"+data[i].mobile+"</td></tr>");
			$("#print_info_id").append("<tr><td>status</td><td>"+data[i].status+"</td></tr>");
			$("#print_info_id").append("<tr><td>capturedby</td><td>"+data[i].capturedby+"</td></tr>");
			$("#print_info_id").append("<tr><td>RecapRefNum</td><td>"+data[i].RecapRefNum+"</td></tr>");
			$("#print_info_id").append("<tr><td>channel</td><td>"+data[i].channel+"</td></tr></table></td></tr>");
		
	     $("#print_info_id").append("<br><br>");	
        }
         $("#print_info_id").append("</table>");	
    });
          
          }
        //============================================================================================================
	$('#get_status').bind('change', function(){
		oTable.fnReloadAjax();
	});
	
	/** Set edit value after click datatables **/	
	$('#tabels tbody').on('click','tr', function () {
	
	 var aData = oTable.fnGetData(this);
	  
	if(aData != null){
	 	// Set value form after select table for update data
	       
		$('#order_id').html(aData[0]);
		//$('#order_id').val(aData[0]);
		$('#update_id').val(aData[21]);
		$('#orders_id').val(aData[21]);
		//getting the ids
		$('#category_id').val(aData[21]);
		$('#remove_list_id').val(aData[21]);
		update_id = aData[21];
		cat_id = aData[21];
		
		
		$('#casenum').val(aData[0]);
case_num = aData[0];
		$('#description').val(aData[9]);
		$('#category').val(aData[1]);
		$('#type').val(aData[2]);
		$('#location').val(aData[4]);
		$('#region').val(aData[6]);
	 	$('#address').val(aData[11]);
	 	$('#feedback').val(aData[10]);
		$('#reported').val(aData[12]);
		$('#mobile').val(aData[13]);
		
		$('#status').val(aData[5]);
		$('#captured').val(aData[8]);
		$('#date').val(aData[3]);
		$('#channel').val(aData[7]);
		//-------------------------------
		//recapture
		
		$('#recaptureID').val(aData[0]);
		document.getElementById("casenum2").innerHTML		= 	"Reference no:     " + aData[0];
		document.getElementById("description2").innerHTML	= 	"Description:      " + aData[9];
		document.getElementById("category2").innerHTML		= 	"Crime category:   " + aData[1];
		document.getElementById("type2").innerHTML		= 	"Crime type:       " + aData[2];
		document.getElementById("location2").innerHTML		= 	"Location:         " + aData[4];
		document.getElementById("region2").innerHTML		= 	"Region:           " + aData[6];
		document.getElementById("reportedby2").innerHTML	= 	"Reported by:      " + aData[12];
		document.getElementById("mobile2").innerHTML		= 	"Contact/Radio Number:        " + aData[13];
		
	 	
	 	//-------------------------------
		//view part
		$('#casenum1').val(aData[0]);
		$('#casenum3').val(aData[0]);
		$('#description1').val(aData[9]);
		$('#category1').val(aData[1]);
		$('#type1').val(aData[2]);
		$('#location1').val(aData[4]);
		$('#region1').val(aData[6]);
	 	$('#address1').val(aData[11]);
	 
		$('#reported1').val(aData[12]);
		$('#mobile1').val(aData[13]);
		$('#status1').val(aData[5]);
		$('#captured1').val(aData[8]);
		$('#date1').val(aData[3]);
		$('#category_img1').val(aData[14]);
		type_AR = aData[2];
		//$('#car_reg_num ').val(aData[20]);
		//$('#num_persons').val(aData[21]);
		$('#channel1').val(aData[7]);
		incident_image=aData[14];
		longidute=aData[18];
		latidute = aData[17];
		incident_audio = aData[16];
		incident_video = aData[15];
//var extention = incident_audio.substring(incident_audio.indexOf('.'),incident_audio.length);
		
		document.getElementById("incidentDiv").innerHTML="<img src=../upload/gambar/" + incident_image + " width='100%' height='500em'></img>";
		document.getElementById("audioDiv").innerHTML =incident_audio;
		document.getElementById("videoDiv").innerHTML =incident_video;
		
oTableShow.fnReloadAjax();
		
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
				//$(':hidden','#remove-form').val('');
				$('#remove_list_id','#remove-form').val('');
				//$(':hidden','#submit-form').val('');
				$('#category_id','#submit-form').val('');
				$('#category_id','#recapture-form').val('');
				$('#btn-update').attr("disabled","disabled");
				
				$('#btn-remove').attr("disabled","disabled");
				$('#btn-view').attr("disabled","disabled");
				$('#btn-recapture').attr("disabled","disabled");
				$('#btn-history').attr("disabled","disabled");
						updateHistory();
        	} else {
            	oTable.$('tr.row_selected').removeClass('row_selected');
		
            	$(this).addClass('row_selected');
				$('#btn-update').removeAttr("disabled");
				$('#btn-remove').removeAttr("disabled");
				$('#btn-view').removeAttr("disabled");
				$('#btn-recapture').removeAttr("disabled");
				$('#btn-history').removeAttr("disabled");
        	}
	  	}
		});
		
		//-----------------------------------------------------------------------------------




/** Set edit value after double click datatables to view **/	
	$('#tabels tbody').on('dblclick','tr', function () {
	

	 var aData = oTable.fnGetData(this);
	  
	if(aData != null){
	 	// Set value form after select table for update data
		//getting the ids
		$('#category_id').val(aData[21]);
		
		//-------------------------------
		
	 	
	 	//-------------------------------
		//view part
		$('#casenum1').val(aData[0]);
		$('#casenum3').val(aData[0]);
		$('#description1').val(aData[9]);
		$('#category1').val(aData[1]);
		$('#type1').val(aData[2]);
		$('#location1').val(aData[4]);
		$('#region1').val(aData[6]);
	 	$('#address1').val(aData[11]);
	 
		$('#reported1').val(aData[12]);
		$('#mobile1').val(aData[13]);
		$('#status1').val(aData[5]);
		$('#captured1').val(aData[8]);
		$('#date1').val(aData[3]);
		$('#category_img1').val(aData[14]);
type_AR = aData[3];
		//$('#car_reg_num ').val(aData[20]);
		//$('#num_persons').val(aData[21]);
		$('#channel1').val(aData[7]);
		incident_image=aData[14];
		longidute=aData[18];
		latidute = aData[17];
		incident_audio = aData[16];
		incident_video = aData[15];
//var extention = incident_audio.substring(incident_audio.indexOf('.'),incident_audio.length);
		
		document.getElementById("incidentDiv").innerHTML="<img src=../upload/gambar/" + incident_image + "></img>";


document.getElementById("audioDiv").innerHTML =incident_audio;
		document.getElementById("videoDiv").innerHTML =incident_video;
		oTableShow.fnReloadAjax();
		
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
				//$(':hidden','#remove-form').val('');
				$('#remove_list_id','#remove-form').val('');
				//$(':hidden','#submit-form').val('');
				$('#category_id','#submit-form').val('');
				$('#category_id','#recapture-form').val('');
				$('#btn-update').attr("disabled","disabled");
				
				$('#btn-remove').attr("disabled","disabled");
				$('#btn-view').attr("disabled","disabled");
				$('#btn-recapture').attr("disabled","disabled");
				$('#btn-history').attr("disabled","disabled");
						updateHistory();
        	} else {
            	oTable.$('tr.row_selected').removeClass('row_selected');
		
            	$(this).addClass('row_selected');
				
				$('#btn-view').removeAttr("disabled");
				//trigger value
$( "#btn-view" ).trigger( "click" );
        	}
	  	}
		});








		//-----------------------------------------------------------------------------------
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
		
		/*Set "recapture-form" action*/
		$('#recapture-form').ajaxForm({
		   resetForm: true,
		   cache: false,
		   success: alertForm
		});
		
		
		/*Set "history-form" action*/
		$('#history-form').ajaxForm({
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
		/*update-status-form*/
		$('#update-status-form').ajaxForm({
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
			$('[data-remodal-id=modal_view]').remodal().close();
			$('[data-remodal-id=modal_recapture]').remodal().close();
			$('[data-remodal-id=modal_history]').remodal().close();
			$('[data-remodal-id=modal_insert]').remodal().close();
                        $('[data-remodal-id=modal_cativity]').remodal().close();
                        $('[data-remodal-id=modal_export]').remodal().close();
			$('[data-remodal-id=modal_csv]').remodal().close();
		}	
	});

</script>