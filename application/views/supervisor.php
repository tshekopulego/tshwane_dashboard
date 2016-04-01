<input id="update_id" type="hidden" name="id" value="">	
<!-- Content -->
<div class="remodal" data-remodal-id="modal">
	<form style="text-align: left;" method="post" id="submit-form" name="assert_form" onsubmit="return validateRequiredField();" action="supervisor/insert">
	 	 
		<input type="hidden" name="shift_id" id="shift_id">
		<h1><span id='modal_title'></span> Report</h1>
		<table>
			<tr>
				<td><label for="report_date">Enter Date (mm/dd/yyyy)</label></br>
					<input type="date" name="report_date" id="report_date" >
				</td>	
				<td></td>
				<td><label for="timepicker">Time</label></br><input type="time" name="timepicker" id="timepicker" ></td>
				<td></td>
				<td><label for="drop_shifts">Shifts</label></br>
					<select id="drop_shifts" name="drop_shifts" style="width:100%" >
        				<option value="">Select Shift</option>
						
        			</select>
						<input type="hidden" name="drop_shifts_id" id="drop_shifts_id">
					
				</td>
			</tr>
		</table>
		

		
		<label for="menu_region_id">Region</label>
		<select id="menu_region_id" name="menu_region_id" style="width:100%" >
		<option value="">Select Region</option>
       	</select> 
        <input type="hidden" name="menu_region" id="menu_region"/>
		 
		
		 <input type="hidden" name="checkboxvalue1" id="checkboxvalue1"/>
		 <input type="hidden" name="checkboxvalue2" id="checkboxvalue2"/>
		 <input type="hidden" name="checkboxvalue3" id="checkboxvalue3"/>
		 <input type="hidden" name="checkboxvalue4" id="checkboxvalue4"/>
		 <input type="hidden" name="checkboxvalue5" id="checkboxvalue5"/>
		 <input type="hidden" name="checkboxvalue6" id="checkboxvalue6"/>
		 <input type="hidden" name="checkboxvalue7" id="checkboxvalue7"/>
		 <input type="hidden" name="checkboxvalue8" id="checkboxvalue8"/>
		 <input type="hidden" name="checkboxvalue9" id="checkboxvalue9"/>
		 <input type="hidden" name="checkboxvalue10" id="checkboxvalue10"/>
		 <input type="hidden" name="checkboxvalue11" id="checkboxvalue11"/>
		 <input type="hidden" name="checkboxvalue12" id="checkboxvalue12"/>
		 <input type="hidden" name="checkboxvalue13" id="checkboxvalue13"/>
		 <input type="hidden" name="checkboxvalue14" id="checkboxvalue14"/>
		 <input type="hidden" name="checkboxvalue15" id="checkboxvalue15"/>
		 <input type="hidden" name="checkboxvalue16" id="checkboxvalue16"/>
		 <input type="hidden" name="checkboxvalue17" id="checkboxvalue17"/>
		 <input type="hidden" name="checkboxvalue18" id="checkboxvalue18"/>
		 <input type="hidden" name="checkboxvalue19" id="checkboxvalue19"/>
		 <input type="hidden" name="checkboxvalue20" id="checkboxvalue20"/>
		 <input type="hidden" name="checkboxvalue21" id="checkboxvalue21"/>
		 <input type="hidden" name="checkboxvalue22" id="checkboxvalue22"/></br><br>
		   	
		<input type="checkbox" name="handover" id="handover" value="" > Hand over to next shift<br>
		<textarea name="handover1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="complaints" id="complaints" value="" > Ensure shift send Complaints Register<br> 
		<textarea name="complaints1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="manage"  id="manage" value=""> Manage Leave/sick leave<br>
		<textarea name="manage1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="assist" id="assist" value=""> Assist with Other office duties/complaints<br>
		<textarea name="assist1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="pool" id="pool" value=""> Pool phone - Check numbers - sms<br>
		<textarea name="pool1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="private" id="private" value=""> Private calls - Minimize<br>
		<textarea name="private1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="lunch" id="lunch" value=""> Lunch break - Relief - clean up<br>
		<textarea name="lunch1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="etiquette" id="etiquette" value=""> Ensure proper Phone Etiquette<br>
		<textarea name="etiquette1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="protocol" id="protocol" value=""> Ensure Radio protocol - English and Codes<br>
		<textarea name="protocol1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="check_register" id="check_register" value=""> Check shift complete Complaints Register<br>
		<textarea name="check_register1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="check_emails" id="check_emails" value=""> Check Emails/shift check emails<br>
		<textarea name="check_emails1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="check_office" id="check_office" value=""> Check Office/Kitchen - clean and neat<br>
		<textarea name="check_office1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="check_standby" id="check_standby" value=""> Check Standby lists<br>
		<textarea name="check_standby1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="check_radios" id="check_radios" value=""> Check Radios - Working<br>
		<textarea name="check_radios1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="check_phones" id="check_phones" value=""> Check Phones/Pool phone - working<br>
		<textarea name="check_phones1" rows="4" cols="50" ></textarea><br>
		
		
		<input type="checkbox" name="daily"  id="daily" value=""> Daily Time sheet - Members Sign on<br>
		<textarea name="daily1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="feedback"  id="feedback" value=""> Feedback to Management - sms/call<br>
		<textarea name="feedback1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="check_ar"  id="check_ar" value=""> Check AR book<br>
		<textarea name="check_ar1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="check_ob"  id="check_ob" value=""> Check OB for any Incidents <br>
		<textarea name="check_ob1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="ob_duty"  id="ob_duty" value=""> On duty in OB - Book where members work<br>
		<textarea name="ob_duty1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="take_over"  id="take_over" value=""> Take over from previous shift<br>
		<textarea name="take_over1" rows="4" cols="50" ></textarea><br>
		
		<input type="checkbox" name="other"  id="other" value=""> Other - anything else<br>
		<textarea name="other1" rows="4" cols="50" ></textarea><br>
				
		<br><br>
		<center>
			<button type='submit'>Save</button>&nbsp;&nbsp;<button type='reset'>Cancel</button>
		</center>
	</form>
</div>
<!------------------------------------------------------------------------------------------------>
<!--View Form-->
<div class="remodal" data-remodal-id="modal_view">
	<form style="text-align: left;" method="post" id="view-form" name="assert_form"  action="supervisor/get">
	 	 
		<!--<input type="text" name="shift_id" id="shift_id">-->
		<h1><span id='modal_title'></span> Report</h1>
		
			<label for="report_date">Date (mm/dd/yyyy) and Time</label><br>
			<input type="input" name="report_date1" id="report_date1" disabled><input type="input" name="timepicker1" id="timepicker1" disabled><br>
			<label for="drop_shifts1">Shifts</label></br>
			<input type="text" name="drop_shifts1" id="drop_shifts1" disabled><br>
			<label for="menu_region_id">Region</label><br>
			<input type="text" name="menu_region_id1" id="menu_region_id1" disabled><br>
			<label for="supname">Supervisor</label><br>
			<input type="text" name="supname" id="supname" disabled><br>
		
		
		
		 <input type="hidden" name="checkboxvalue1" id="checkboxvalue1"/>
		 <input type="hidden" name="checkboxvalue2" id="checkboxvalue2"/>
		 <input type="hidden" name="checkboxvalue3" id="checkboxvalue3"/>
		 <input type="hidden" name="checkboxvalue4" id="checkboxvalue4"/>
		 <input type="hidden" name="checkboxvalue5" id="checkboxvalue5"/>
		 <input type="hidden" name="checkboxvalue6" id="checkboxvalue6"/>
		 <input type="hidden" name="checkboxvalue7" id="checkboxvalue7"/>
		 <input type="hidden" name="checkboxvalue8" id="checkboxvalue8"/>
		 <input type="hidden" name="checkboxvalue9" id="checkboxvalue9"/>
		 <input type="hidden" name="checkboxvalue10" id="checkboxvalue10"/>
		 <input type="hidden" name="checkboxvalue11" id="checkboxvalue11"/>
		 <input type="hidden" name="checkboxvalue12" id="checkboxvalue12"/>
		 <input type="hidden" name="checkboxvalue13" id="checkboxvalue13"/>
		 <input type="hidden" name="checkboxvalue14" id="checkboxvalue14"/>
		 <input type="hidden" name="checkboxvalue15" id="checkboxvalue15"/>
		 <input type="hidden" name="checkboxvalue16" id="checkboxvalue16"/>
		 <input type="hidden" name="checkboxvalue17" id="checkboxvalue17"/>
		 <input type="hidden" name="checkboxvalue18" id="checkboxvalue18"/>
		 <input type="hidden" name="checkboxvalue19" id="checkboxvalue19"/>
		 <input type="hidden" name="checkboxvalue20" id="checkboxvalue20"/>
		 <input type="hidden" name="checkboxvalue21" id="checkboxvalue21"/>
		 <input type="hidden" name="checkboxvalue22" id="checkboxvalue22"/>
		 
         <input type="hidden" name="menu_region" id="menu_region"/></br><br>
		   	
		<input type="checkbox" name="handover11" id="handover11" value="" disabled> Hand over to next shift<br>
		<input type="text" name="handover111" id="handover111"  disabled><br>
		 
		
		<input type="checkbox" name="complaints11" id="complaints11" value="" disabled> Ensure shift send Complaints Register<br>
		<input type="text" name="complaints111" id="complaints111"  disabled><br>
		
		<input type="checkbox" name="manage11"  id="manage11" value="" disabled> Manage Leave/sick leave<br>
		<input type="text" name="manage111" id="manage111" disabled><br>
		
		<input type="checkbox" name="assist11" id="assist11" value="" disabled> Assist with Other office duties/complaints<br>
		<input type="text" name="assist111" id="assist111"  disabled><br>
		
		<input type="checkbox" name="pool11" id="pool11" value="" disabled> Pool phone - Check numbers - sms<br>
		<input type="text" name="pool111" id="pool111"  disabled><br>
		
		<input type="checkbox" name="private11" id="private11" value="" disabled> Private calls - Minimize<br>
		<input type="text" name="private111" id="private111" value="" disabled><br>
		
		<input type="checkbox" name="lunch11" id="lunch11" value="" disabled> Lunch break - Relief - clean up<br>
		<input type="text" name="lunch111" id="lunch111" value="" disabled><br>
		
		<input type="checkbox" name="etiquette11" id="etiquette11" value="" disabled> Ensure proper Phone Etiquette<br>
		<input type="text" name="etiquette111" id="etiquette111" value="" disabled><br>
		
		<input type="checkbox" name="protocol11" id="protocol11" value="" disabled> Ensure Radio protocol - English and Codes<br>
		<input type="text" name="protocol111" id="protocol111" value="" disabled><br>
		
		<input type="checkbox" name="check_register11" id="check_register11" value="" disabled> Check shift complete Complaints Register<br>
		<input type="text" name="check_register111" id="check_register111" value="" disabled><br>
		
		<input type="checkbox" name="check_emails11" id="check_emails11" value="" disabled> Check Emails/shift check emails<br>
		<input type="text" name="check_emails111" id="check_emails111" value="" disabled><br>
		
		<input type="checkbox" name="check_office11" id="check_office11" value="" disabled> Check Office/Kitchen - clean and neat<br>
		<input type="text" name="check_office111" id="check_office111" value="" disabled><br>
		
		<input type="checkbox" name="check_standby11" id="check_standby11" value="" disabled> Check Standby lists<br>
		<input type="text" name="check_standby111" id="check_standby111" value="" disabled><br>
		
		<input type="checkbox" name="check_radios11" id="check_radios11" value="" disabled> Check Radios - Working<br>
		<input type="text" name="check_radios111" id="check_radios111" value="" disabled><br>
		
		<input type="checkbox" name="check_phones11" id="check_phones11" value="" disabled> Check Phones/Pool phone - working<br>
		<input type="text" name="check_phones111" id="check_phones111" value="" disabled><br>
		
		<input type="checkbox" name="daily11"  id="daily11" value="" disabled> Daily Time sheet - Members Sign on<br>
		<input type="text" name="daily111"  id="daily111" value="" disabled><br>
		
		<input type="checkbox" name="feedback11"  id="feedback11" value="" disabled> Feedback to Management - sms/call<br>
		<input type="text" name="feedback111"  id="feedback111" value="" disabled><br>
		
		<input type="checkbox" name="check_ar11"  id="check_ar11" value="" disabled> Check AR book<br>
		<input type="text" name="check_ar111"  id="check_ar111" value="" disabled><br>
		
		<input type="checkbox" name="check_ob11"  id="check_ob11" value="" disabled> Check OB for any Incidents <br>
		<input type="text" name="check_ob111"  id="check_ob111" value="" disabled><br>
		
		<input type="checkbox" name="ob_duty11"  id="ob_duty11" value="" disabled> On duty in OB - Book where members work<br>
		<input type="text" name="ob_duty111"  id="ob_duty111" value="" disabled><br>
		
		<input type="checkbox" name="take_over11"  id="take_over11" value="" disabled> Take over from previous shift<br>
		<input type="text" name="take_over111"  id="take_over111" value="" disabled><br>
		
		<input type="checkbox" name="other11"  id="other11" value="" disabled> Other - anything else<br>
		<input type="text" name="other111"  id="other111" value="" disabled><br>
				
		<br><br>
		<center>
			<button type='close'>Close</button>
		</center>
	</form>
</div>
<!------------------------------------------------------------------------------------------------>
<!--update Form-->
<div class="remodal" data-remodal-id="modal_update">
	<form style="text-align: left;" method="post" id="update-form" name="assert_form"  action="supervisor/update">
	 	 <input type="hidden" name="shift_update_id" id="shift_update_id">
	
		
		<h1><span id='modal_title'></span> Report</h1>
		
			<label for="report_date">Date (mm/dd/yyyy) and Time</label><br>
			<input type="input" name="report_date_up" id="report_date_up" disabled><input type="input" name="timepicker_up" id="timepicker_up" disabled><br>
			<label for="drop_shifts">Shifts</label></br>
			<input type="text" name="drop_shifts_up" id="drop_shifts_up" disabled><br>
			<label for="menu_region_id">Region</label><br>
			<input type="text" name="menu_region_id_up" id="menu_region_id_up" disabled><br>
			<label for="supname">Supervisor</label><br>
			<input type="text" name="supname_up" id="supname_up" disabled><br>
		
		
		
		 <input type="hidden" name="checkboxvalue_up1" id="checkboxvalue_up1"/>
		 <input type="hidden" name="checkboxvalue_up2" id="checkboxvalue_up2"/>
		 <input type="hidden" name="checkboxvalue_up3" id="checkboxvalue_up3"/>
		 <input type="hidden" name="checkboxvalue_up4" id="checkboxvalue_up4"/>
		 <input type="hidden" name="checkboxvalue_up5" id="checkboxvalue_up5"/>
		 <input type="hidden" name="checkboxvalue_up6" id="checkboxvalue_up6"/>
		 <input type="hidden" name="checkboxvalue_up7" id="checkboxvalue_up7"/>
		 <input type="hidden" name="checkboxvalue_up8" id="checkboxvalue_up8"/>
		 <input type="hidden" name="checkboxvalue_up9" id="checkboxvalue_up9"/>
		 <input type="hidden" name="checkboxvalue_up10" id="checkboxvalue_up10"/>
		 <input type="hidden" name="checkboxvalue_up11" id="checkboxvalue_up11"/>
		 <input type="hidden" name="checkboxvalue_up12" id="checkboxvalue_up12"/>
		 <input type="hidden" name="checkboxvalue_up13" id="checkboxvalue_up13"/>
		 <input type="hidden" name="checkboxvalue_up14" id="checkboxvalue_up14"/>
		 <input type="hidden" name="checkboxvalue_up15" id="checkboxvalue_up15"/>
		 <input type="hidden" name="checkboxvalue_up16" id="checkboxvalue_up16"/>
		 <input type="hidden" name="checkboxvalue_up17" id="checkboxvalue_up17"/>
		 <input type="hidden" name="checkboxvalue_up18" id="checkboxvalue_up18"/>
		 <input type="hidden" name="checkboxvalue_up19" id="checkboxvalue_up19"/>
		 <input type="hidden" name="checkboxvalue_up20" id="checkboxvalue_up20"/>
		 <input type="hidden" name="checkboxvalue_up21" id="checkboxvalue_up21"/>
		 <input type="hidden" name="checkboxvalue_up22" id="checkboxvalue_up22"/>
		 
         <input type="hidden" name="menu_region" id="menu_region"/></br><br>
		   	
		<input type="checkbox" name="handover_up" id="handover_up" value="" > Hand over to next shift<br>
		<input type="text" name="handover_up1" id="handover_up1" value="" ><br>
		 
		
		<input type="checkbox" name="complaints_up" id="complaints_up" value="" > Ensure shift send Complaints Register<br>
		<input type="text" name="complaints_up1" id="complaints_up1"  ><br>
		
		<input type="checkbox" name="manage_up"  id="manage_up" value="" > Manage Leave/sick leave<br>
		<input type="text" name="manage_up1" id="manage_up1" ><br>
		
		<input type="checkbox" name="assist_up" id="assist_up" value="" > Assist with Other office duties/complaints<br>
		<input type="text" name="assist_up1" id="assist_up1" ><br>
		
		<input type="checkbox" name="pool_up" id="pool_up" value=""> Pool phone - Check numbers - sms<br>
		<input type="text" name="pool_up1" id="pool_up1"  ><br>
		
		<input type="checkbox" name="private_up" id="private_up" value=""> Private calls - Minimize<br>
		<input type="text" name="private_up1" id="private_up1" value="" ><br>
		
		<input type="checkbox" name="lunch_up" id="lunch_up" value=""> Lunch break - Relief - clean up<br>
		<input type="text" name="lunch_up1" id="lunch_up1" value=""><br>
		
		<input type="checkbox" name="etiquette_up" id="etiquette_up" value="" > Ensure proper Phone Etiquette<br>
		<input type="text" name="etiquette_up1" id="etiquette_up1" value="" ><br>
		
		<input type="checkbox" name="protocol_up" id="protocol_up" value="" > Ensure Radio protocol - English and Codes<br>
		<input type="text" name="protocol_up1" id="protocol_up1" value="" ><br>
		
		<input type="checkbox" name="check_register_up" id="check_register_up" value="" > Check shift complete Complaints Register<br>
		<input type="text" name="check_register_up1" id="check_register_up1" value="" ><br>
		
		<input type="checkbox" name="check_emails_up" id="check_emails_up" value="" > Check Emails/shift check emails<br>
		<input type="text" name="check_emails_up1" id="check_emails_up1" value="" ><br>
		
		<input type="checkbox" name="check_office_up" id="check_office_up" value="" > Check Office/Kitchen - clean and neat<br>
		<input type="text" name="check_office_up1" id="check_office_up1" value="" ><br>
		
		<input type="checkbox" name="check_standby_up" id="check_standby_up" value="" > Check Standby lists<br>
		<input type="text" name="check_standby_up1" id="check_standby_up1" value="" ><br>
		
		<input type="checkbox" name="check_radios_up" id="check_radios_up" value="" > Check Radios - Working<br>
		<input type="text" name="check_radios_up1" id="check_radios_up1" value="" ><br>
		
		<input type="checkbox" name="check_phones_up" id="check_phones_up" value="" > Check Phones/Pool phone - working<br>
		<input type="text" name="check_phones_up1" id="check_phones_up1" value="" ><br>
		
		<input type="checkbox" name="daily_up" id="daily_up" value="" > Daily Time sheet - Members Sign on<br>
		<input type="text" name="daily_up1"  id="daily_up1" value="" ><br>
		
		<input type="checkbox" name="feedback_up"  id="feedback_up" value="" > Feedback to Management - sms/call<br>
		<input type="text" name="feedback_up1"  id="feedback_up1" value="" ><br>
		
		<input type="checkbox" name="check_ar_up"  id="check_ar_up" value="" > Check AR book<br>
		<input type="text" name="check_ar_up1"  id="check_ar_up1" value="" ><br>
		
		<input type="checkbox" name="check_ob_up"  id="check_ob_up" value="" > Check OB for any Incidents <br>
		<input type="text" name="check_ob_up1"  id="check_ob_up1" value="" ><br>
		
		<input type="checkbox" name="ob_duty_up"  id="ob_duty_up" value="" > On duty in OB - Book where members work<br>
		<input type="text" name="ob_duty_up1"  id="ob_duty_up1" value="" ><br>
		
		<input type="checkbox" name="take_over_up"  id="take_over_up" value="" > Take over from previous shift<br>
		<input type="text" name="take_over_up1"  id="take_over_up1" value="" ><br>
		
		<input type="checkbox" name="other_up"  id="other_up" value="" > Other - anything else<br>
		<input type="text" name="other_up1"  id="other_up1" value="" ><br>
				
		<br><br>
		<center>
			<button  type='submit' onclick="getSelectedCheckBox();">Save</button>&nbsp;&nbsp;<button type='reset'>Cancel</button>
		</center>
	</form>
</div>
<!------------------------------------------------------------------------------------------------->


<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-book"> </span>Supervisor's Shift report</span>
<div style="float:right;">
	<div class="menu">
		<a href="#modal"><button id="btn-insert">Capture</button></a> 
		<a href="#modal_view"><button id="btn-view" disabled="disabled">View</button></a> 
		<a href="#modal_update"><button id="btn-update" disabled="disabled">Update</button></a>
		<a href="#modal_remove"><button id="btn-remove" disabled="disabled">Remove</button></a>
		<button id="btn-filter" value="on">Filter</button>
	</div>
</div>
</div>


<div class="mainview view">
<div id="view" style="padding-bottom:45px;">

	<table class="table" id="tabels">
		<thead>
			<tr>
				<th>Date</th>
				<th>Shift</th>
				<th>Region</th>		
				<th>Supervisor's Name</th>
				
		</thead>
		<tfoot id="form_filter" style="display:none">
			<tr align="center">
				<th>Date</th>
				<th>Shift</th>
				<th>Region</th>		
				<th>Supervisor's Name</th>
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
	$('[data-remodal-id=modal_view]').remodal();
	$('[data-remodal-id=modal_update]').remodal();
	$('[data-remodal-id=modal_remove]').remodal();
	
	   getRequest("supervisor/get_shifts", function(data) {
         
        var data = JSON.parse(data.responseText);
    console.log("get the shift" + data);
		var i;
		for (i = 0; i < data.length; i++) {
			$("#drop_shifts").append("<option value="+data[i].shift_id+">"+data[i].shift_name+"</option>");
			}
    });
	
	 /** Get request data region  **/
	getRequest("supervisor/get_regions", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#menu_region_id").append("<option value="+data[i].region_id+">"+data[i].region_name+"</option>");
        }
        
        

    });
    
     $("#menu_region_id").change(function(){

    	 $("#menu_region").val($('#menu_region_id option:selected').val());
    });
	
	$("#drop_shifts").change(function(){

    	 $("#drop_shifts_id").val($('#drop_shifts option:selected').val());
    });
	
	//checkbox value hidden field population
//var menucategoryname = $("#checkboxvalue");	
	$(function(){
		$('#handover').change(function() {
			$("#checkboxvalue1").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	$(function(){
		$('#complaints').change(function() {
			$("#checkboxvalue2").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	$(function(){
		$('#manage').change(function() {
			$("#checkboxvalue3").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#assist').change(function() {
			$("#checkboxvalue4").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#pool').change(function() {
			$("#checkboxvalue5").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#private').change(function() {
			$("#checkboxvalue6").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#lunch').change(function() {
			$("#checkboxvalue7").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#etiquette').change(function() {
			$("#checkboxvalue8").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#protocol').change(function() {
			$("#checkboxvalue9").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_register').change(function() {
			$("#checkboxvalue10").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_emails').change(function() {
			$("#checkboxvalue11").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_office').change(function() {
			$("#checkboxvalue12").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_standby').change(function() {
			$("#checkboxvalue13").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_radios').change(function() {
			$("#checkboxvalue14").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_phones').change(function() {
			$("#checkboxvalue15").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#daily').change(function() {
			$("#checkboxvalue16").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#feedback').change(function() {
			$("#checkboxvalue17").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_ar').change(function() {
			$("#checkboxvalue18").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_ob').change(function() {
			$("#checkboxvalue19").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#ob_duty').change(function() {
			$("#checkboxvalue20").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#take_over').change(function() {
			$("#checkboxvalue21").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#other').change(function() {
			$("#checkboxvalue22").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	//updating checkbox
	/*$(function(){
		$('#handover_up').change(function() {
			$("#checkboxvalue_up1").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	$(function(){
		$('#complaints_up').change(function() {
			$("#checkboxvalue_up2").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	$(function(){
		$('#manage_up').change(function() {
			$("#checkboxvalue_up3").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#assist_up').change(function() {
			$("#checkboxvalue_up4").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#pool_up').change(function() {
			$("#checkboxvalue_up5").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#private_up').change(function() {
			$("#checkboxvalue_up6").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#lunch_up').change(function() {
			$("#checkboxvalue_up7").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#etiquette_up').change(function() {
			$("#checkboxvalue_up8").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#protocol_up').change(function() {
			$("#checkboxvalue_up9").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_register_up').change(function() {
			$("#checkboxvalue_up10").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_emails_up').change(function() {
			$("#checkboxvalue_up11").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_office_up').change(function() {
			$("#checkboxvalue_up12").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_standby_up').change(function() {
			$("#checkboxvalue_up13").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_radios_up').change(function() {
			$("#checkboxvalue_up14").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_phones_up').change(function() {
			$("#checkboxvalue_up15").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#daily_up').change(function() {
			$("#checkboxvalue_up16").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#feedback_up').change(function() {
			$("#checkboxvalue_up17").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_ar_up').change(function() {
			$("#checkboxvalue_up18").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#check_ob_up').change(function() {
			$("#checkboxvalue_up19").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#ob_duty_up').change(function() {
			$("#checkboxvalue_up20").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#take_over_up').change(function() {
			$("#checkboxvalue_up21").val(($(this).is(':checked')) ? 1 : 0);
		});
	});
	
	$(function(){
		$('#other_up').change(function() {
			$("#checkboxvalue_up22").val(($(this).is(':checked')) ? 1 : 0);
		});
	});*/
	
	

</script>
<script>
function getSelectedCheckBox(){

	    $("#checkboxvalue_up1").val(($('#handover_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up2").val(($('#complaints_up').is(':checked')) ? 1 : 0);
	
		$("#checkboxvalue_up3").val(($('#manage_up').is(':checked')) ? 1 : 0);

		$("#checkboxvalue_up4").val(($('#assist_up').is(':checked')) ? 1 : 0);
	
		$("#checkboxvalue_up5").val(($('#pool_up').is(':checked')) ? 1 : 0);
	
		$("#checkboxvalue_up6").val(($('#private_up').is(':checked')) ? 1 : 0);
	
		$("#checkboxvalue_up7").val(($('#lunch_up').is(':checked')) ? 1 : 0);
	
		$("#checkboxvalue_up8").val(($('#etiquette_up').is(':checked')) ? 1 : 0);
	
		$("#checkboxvalue_up9").val(($('#protocol_up').is(':checked')) ? 1 : 0);
	
		$("#checkboxvalue_up10").val(($('#check_register_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up11").val(($('#check_emails_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up12").val(($('#check_office_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up13").val(($('#check_standby_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up14").val(($('#check_radios_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up15").val(($('#check_phones_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up16").val(($('#daily_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up17").val(($('#feedback_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up18").val(($('#check_ar_up').is(':checked')) ? 1 : 0);
	
		$("#checkboxvalue_up19").val(($('#check_ob_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up20").val(($('#ob_duty_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up21").val(($('#take_over_up').is(':checked')) ? 1 : 0);
		
		$("#checkboxvalue_up22").val(($('#other_up').is(':checked')) ? 1 : 0);
		
		return false;
	}
function validateRequiredField()
 {
     var date =document.forms["submit-form"]["report_date"].value;
     var region =document.forms["submit-form"]["menu_region_id"].value;
     var time =document.forms["submit-form"]["timepicker"].value;
     var shift =document.forms["submit-form"]["drop_shifts"].value;
    // var category_phone=document.forms["submit-form"]["category_phone"].value;
     //var category_notes=document.forms["submit-form"]["category_notes"].value;
    
    
    
         if (date == null || date== "") {
	        alert("Date must be selected ");
			document.forms["submit-form"]["date"].focus();
	        return false;
	    }else{
	         if (region== null || region== "") {
		        alert("Region must be selected");
		        return false;
		    }else{
	         if (time== null || time== "") {
		        alert("Time must be filled");
		        return false;
		    }else{
			if (shift == null || shift == "") {
			alert("Shift must be filled");
			 return false;
		}else{   
			alertSubmit("Loading");

			return true;
		    }
		    }
		    }
	          }
}
	function alertSubmit(query){
			iosOverlay({
				text: "Loading",
				duration: 2e3,
				//icon: "../images/loading.gif"
			});
			return false;
			}
			
			//function alertMessage(query){
			//iosOverlay({
			//	text: "Data inserted exists, so you can update the existing one!",
				//duration: 2e3,
				//icon: "../images/loading.gif"
			//});
			//return false;
			//}

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
	/* View button */
	$('#btn-view').bind('click', function(){
		$('#modal_title').html($('#btn-view').text());
			
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
		"sAjaxSource": "supervisor/get",
		'sPaginationType': 'full_numbers',	
		"aaSorting": [[ 0, "desc" ]],			
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
//---------------------------------------------------------------------------------------------------------------------------------------------	
		/** Set edit value after click datatables **/	
		$('#tabels tbody').on('click','tr', function () {
		
		 var aData = oTable.fnGetData(this);
		  
		 if(aData != null){
			// Set value form after select table for update data
			//'menu_name','menu_category_id','menu_price','menu_disc','menu_desc','menu_image','menu_id'
			/*$('#report_id').html(aData[48]);
			$('#update_id').val(aData[48]);
			$('#report_id').val(aData[48]);
			$('#shift_id').val(aData[48]);
			update_id = aData[48];
			$('#report_date').val(aData[0]);
			$('#drop_shifts').val(aData[1]);
			$('#menu_region_id').val(aData[2]);
			$('#supname').val(aData[3]);
			$('#timepicker').val(aData[4]);*/
			
			
			//----------------------view--------------------------
			$('#report_id').html(aData[49]);
			$('#update_id').val(aData[49]);
			$('#report_id').val(aData[49]);
			$('#shift_id').val(aData[49]);
			update_id = aData[49];
			$('#report_date1').val(aData[0]);
			$('#drop_shifts1').val(aData[1]);
			$('#menu_region_id1').val(aData[2]);
			$('#supname').val(aData[3]);
			$('#timepicker1').val(aData[4]);
			if(aData[5]== 1){document.getElementById('handover11').checked = true;}else{document.getElementById('handover11').checked = false;}
			$('#handover111').val(aData[6]);
			if(aData[7]== 1){var complaints11 = document.getElementById('complaints11').checked = true;	}else{document.getElementById('complaints11').checked = false;}
			$('#complaints111').val(aData[8]);
			if(aData[9]== 1){var manage11 = document.getElementById('manage11').checked = true;}else{document.getElementById('manage11').checked = false;}
			$('#manage111').val(aData[10]);
			if(aData[11]== 1){var assist11 = document.getElementById('assist11').checked = true;}else{document.getElementById('assist11').checked = false;}
			$('#assist111').val(aData[12]);
			if(aData[13]== 1){var pool11 = document.getElementById('pool11').checked = true;}else{document.getElementById('pool11').checked = false;}
			$('#pool111').val(aData[14]);
			if(aData[15]== 1){var private11 = document.getElementById('private11').checked = true;}else{document.getElementById('private11').checked = false;}
			$('#private111').val(aData[16]);
			if(aData[17]== 1){var lunch11 = document.getElementById('lunch11').checked = true;}else{document.getElementById('lunch11').checked = false;}
			$('#lunch111').val(aData[18]);
			if(aData[19]== 1){var etiquette11 = document.getElementById('etiquette11').checked = true;}else{document.getElementById('etiquette11').checked = false;}
			$('#etiquette111').val(aData[20]);
			if(aData[21]== 1){var protocol11 = document.getElementById('protocol11').checked = true;}else{document.getElementById('protocol11').checked = false;}
			$('#protocol111').val(aData[22]);
			if(aData[23]== 1){var check_register11 = document.getElementById('check_register11').checked = true;}else{document.getElementById('check_register11').checked = false;}
			$('#check_register111').val(aData[24]);
			if(aData[25]== 1){var check_emails11 = document.getElementById('check_emails11').checked = true;}else{document.getElementById('check_emails11').checked = false;}
			$('#check_emails111').val(aData[26]);
			if(aData[27]== 1){var check_office11 = document.getElementById('check_office11').checked = true;}else{document.getElementById('check_office11').checked = false;}
			$('#check_office111').val(aData[28]);
			if(aData[29]== 1){var check_standby11 = document.getElementById('check_standby11').checked = true;}else{document.getElementById('check_standby11').checked = false;}
			$('#check_standby111').val(aData[30]);
			if(aData[31]== 1){var check_radios11 = document.getElementById('check_radios11').checked = true;}else{document.getElementById('check_radios11').checked = false;}
			$('#check_radios111').val(aData[32]);
			if(aData[33]== 1){var check_phones11 = document.getElementById('check_phones11').checked = true;}else{document.getElementById('check_phones11').checked = false;}
			$('#check_phones111').val(aData[34]);
			if(aData[35]== 1){var daily11 = document.getElementById('daily11').checked = true;}else{document.getElementById('daily11').checked = false;}
			$('#daily111').val(aData[36]);
			if(aData[37]== 1){var feedback11 = document.getElementById('feedback11').checked = true;}else{document.getElementById('feedback11').checked = false;}
			$('#feedback111').val(aData[38]);
			if(aData[39]== 1){var check_ar11 = document.getElementById('check_ar11').checked = true;}else{document.getElementById('check_ar11').checked = false;}
			$('#check_ar111').val(aData[40]);
			if(aData[41]== 1){var check_ob11 = document.getElementById('check_ob11').checked = true;}else{document.getElementById('check_ob11').checked = false;}
			$('#check_ob111').val(aData[42]);
			if(aData[43]== 1){var ob_duty11 = document.getElementById('ob_duty11').checked = true;}else{document.getElementById('ob_duty11').checked = false;}
			$('#ob_duty111').val(aData[44]);
			if(aData[45]== 1){var take_over11 = document.getElementById('take_over11').checked = true;}else{document.getElementById('take_over11').checked = false;}
			$('#take_over111').val(aData[46]);
			if(aData[47]== 1){var other11 = document.getElementById('other11').checked = true;}else{document.getElementById('other11').checked = false;}
			$('#other111').val(aData[48]);
			//------------------------------------------------
			//update 
			$('#report_id').html(aData[49]);
			$('#update_id').val(aData[49]);
			$('#report_id').val(aData[49]);
			$('#shift_id').val(aData[49]);
			$('#shift_update_id').val(aData[49]);
			update_id = aData[49];
			console.log("the  id"+update_id);
			$('#report_date_up').val(aData[0]);
			$('#drop_shifts_up').val(aData[1]);
			$('#menu_region_id_up').val(aData[2]);
			$('#supname_up').val(aData[3]);
			$('#timepicker_up').val(aData[4]);
			if(aData[5]== 1){var handover_up = document.getElementById('handover_up').checked = true;}else{document.getElementById('handover_up').checked = false;}
			$('#handover_up1').val(aData[6]);
			if(aData[7]== 1){var complaints_up = document.getElementById('complaints_up').checked = true;}else{document.getElementById('complaints_up').checked = false;}
			$('#complaints_up1').val(aData[8]);
			if(aData[9]== 1){var manage_up = document.getElementById('manage_up').checked = true;}else{document.getElementById('manage_up').checked = false;}
			$('#manage_up1').val(aData[10]);
			if(aData[11]== 1){var assist_up = document.getElementById('assist_up').checked = true;}else{document.getElementById('assist_up').checked = false;}
			$('#assist_up1').val(aData[12]);
			if(aData[13]== 1){var pool_up = document.getElementById('pool_up').checked = true;}else{document.getElementById('pool_up').checked = false;}
			$('#pool_up1').val(aData[14]);
			if(aData[15]== 1){var private_up = document.getElementById('private_up').checked = true;}else{document.getElementById('private_up').checked = false;}
			$('#private_up1').val(aData[16]);
			if(aData[17]== 1){var lunch_up = document.getElementById('lunch_up').checked = true;}else{document.getElementById('lunch_up').checked = false;}
			$('#lunch_up1').val(aData[18]);
			if(aData[19]== 1){var etiquette_up = document.getElementById('etiquette_up').checked = true;}else{document.getElementById('etiquette_up').checked = false;}
			$('#etiquette_up1').val(aData[20]);
			if(aData[21]== 1){var protocol_up = document.getElementById('protocol_up').checked = true;}else{document.getElementById('protocol_up').checked = false;}
			$('#protocol_up1').val(aData[22]);
			if(aData[23]== 1){var check_register_up = document.getElementById('check_register_up').checked = true;}else{document.getElementById('check_register_up').checked = false;}
			$('#check_register_up1').val(aData[24]);
			if(aData[25]== 1){var check_emails_up = document.getElementById('check_emails_up').checked = true;}else{document.getElementById('check_emails_up').checked = false;}
			$('#check_emails_up1').val(aData[26]);
			if(aData[27]== 1){var check_office_up = document.getElementById('check_office_up').checked = true;}else{document.getElementById('check_office_up').checked = false;}
			$('#check_office_up1').val(aData[28]);
			if(aData[29]== 1){var check_standby_up = document.getElementById('check_standby_up').checked = true;}else{document.getElementById('check_standby_up').checked = false;}
			$('#check_standby_up1').val(aData[30]);
			if(aData[31]== 1){var check_radios_up = document.getElementById('check_radios_up').checked = true;}else{document.getElementById('check_radios_up').checked = false;}
			$('#check_radios_up1').val(aData[32]);
			if(aData[33]== 1){var check_phones_up = document.getElementById('check_phones_up').checked = true;}else{document.getElementById('check_phones_up').checked = false;}
			$('#check_phones_up1').val(aData[34]);
			if(aData[35]== 1){var daily_up = document.getElementById('daily_up').checked = true;}else{document.getElementById('daily_up').checked = false;}
			$('#daily_up1').val(aData[36]);
			if(aData[37]== 1){var feedback_up = document.getElementById('feedback_up').checked = true;}else{document.getElementById('feedback_up').checked = false;}
			$('#feedback_up1').val(aData[38]);
			if(aData[39]== 1){var check_ar_up = document.getElementById('check_ar_up').checked = true;}else{document.getElementById('check_ar_up').checked = false;}
			$('#check_ar_up1').val(aData[40]);
			if(aData[41]== 1){var check_ob_up = document.getElementById('check_ob_up').checked = true;}else{document.getElementById('check_ob_up').checked = false;}
			$('#check_ob_up1').val(aData[42]);
			if(aData[43]== 1){var ob_duty_up = document.getElementById('ob_duty_up').checked = true;}else{document.getElementById('ob_duty_up').checked = false;}
			$('#ob_duty_up1').val(aData[44]);
			if(aData[45]== 1){var take_over_up = document.getElementById('take_over_up').checked = true;}else{document.getElementById('take_over_up').checked = false;}
			$('#take_over_up1').val(aData[46]);
			if(aData[47]== 1){var other_up = document.getElementById('other_up').checked = true;}else{document.getElementById('other_up').checked = false;}
			$('#other_up1').val(aData[48]);
			
			
			//---------------------------------------------
	 
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
				$('#remove-form').val('');
				$('#submit-form input').val('');
				$('#view-form input').val('');
				$('#update-form input').val('');
				
				$('#btn-update').attr("disabled","disabled");
				$('#btn-remove').attr("disabled","disabled");
				$('#btn-view').attr("disabled","disabled");
        	} else {
            	oTable.$('tr.row_selected').removeClass('row_selected');
            	$(this).addClass('row_selected');
				
				$('#btn-update').removeAttr("disabled");
				$('#btn-remove').removeAttr("disabled");
				$('#btn-view').removeAttr("disabled");
        	}
	  	}
		});
//---------------------------------------------------------------------------------------------------------------------------------------
/** Set edit value after double click datatables **/	
		$('#tabels tbody').on('dblclick','tr', function () {
		
		 var aData = oTable.fnGetData(this);
		  
		 if(aData != null){
			// Set value form after select table for update data
			//'menu_name','menu_category_id','menu_price','menu_disc','menu_desc','menu_image','menu_id'
			$('#report_id').html(aData[48]);
			$('#update_id').val(aData[48]);
			$('#report_id').val(aData[48]);
			update_id = aData[48];
				
			//----------------------view--------------------------
			$('#report_id').html(aData[49]);
			$('#update_id').val(aData[49]);
			$('#report_id').val(aData[49]);
			//$('#shift_upadte_id').val(aData[50]);
			update_id = aData[49];
			$('#report_date1').val(aData[0]);
			$('#drop_shifts1').val(aData[1]);
			$('#menu_region_id1').val(aData[2]);
			$('#supname').val(aData[3]);
			$('#timepicker1').val(aData[4]);
			if(aData[5]== 1){document.getElementById('handover11').checked = true;}else{document.getElementById('handover11').checked = false;}
			$('#handover111').val(aData[6]);
			if(aData[7]== 1){var complaints11 = document.getElementById('complaints11').checked = true;}else{document.getElementById('complaints11').checked = false;}
			$('#complaints111').val(aData[8]);
			if(aData[9]== 1){var manage11 = document.getElementById('manage11').checked = true;}else{document.getElementById('manage11').checked = false;}
			$('#manage111').val(aData[10]);
			if(aData[11]== 1){var assist11 = document.getElementById('assist11').checked = true;}else{document.getElementById('assist11').checked = false;}
			$('#assist111').val(aData[12]);
			if(aData[13]== 1){var pool11 = document.getElementById('pool11').checked = true;}else{document.getElementById('pool11').checked = false;}
			$('#pool111').val(aData[14]);
			if(aData[15]== 1){var private11 = document.getElementById('private11').checked = true;}else{document.getElementById('private11').checked = false;}
			$('#private111').val(aData[16]);
			if(aData[17]== 1){var lunch11 = document.getElementById('lunch11').checked = true;}else{document.getElementById('lunch11').checked = false;}
			$('#lunch111').val(aData[18]);
			if(aData[19]== 1){var etiquette11 = document.getElementById('etiquette11').checked = true;}else{document.getElementById('etiquette11').checked = false;}
			$('#etiquette111').val(aData[20]);
			if(aData[21]== 1){var protocol11 = document.getElementById('protocol11').checked = true;}else{document.getElementById('protocol11').checked = false;}
			$('#protocol111').val(aData[22]);
			if(aData[23]== 1){var check_register11 = document.getElementById('check_register11').checked = true;}else{document.getElementById('check_register11').checked = false;}
			$('#check_register111').val(aData[24]);
			if(aData[25]== 1){var check_emails11 = document.getElementById('check_emails11').checked = true;}else{document.getElementById('check_emails11').checked = false;}
			$('#check_emails111').val(aData[26]);
			if(aData[27]== 1){var check_office11 = document.getElementById('check_office11').checked = true;}else{document.getElementById('check_office11').checked = false;}
			$('#check_office111').val(aData[28]);
			if(aData[29]== 1){var check_standby11 = document.getElementById('check_standby11').checked = true;}else{document.getElementById('check_standby11').checked = false;}
			$('#check_standby111').val(aData[30]);
			if(aData[31]== 1){var check_radios11 = document.getElementById('check_radios11').checked = true;}else{document.getElementById('check_radios11').checked = false;}
			$('#check_radios111').val(aData[32]);
			if(aData[33]== 1){var check_phones11 = document.getElementById('check_phones11').checked = true;}else{document.getElementById('check_phones11').checked = false;}
			$('#check_phones111').val(aData[34]);
			if(aData[35]== 1){var daily11 = document.getElementById('daily11').checked = true;}else{document.getElementById('daily11').checked = false;}
			$('#daily111').val(aData[36]);
			if(aData[37]== 1){var feedback11 = document.getElementById('feedback11').checked = true;}else{document.getElementById('feedback11').checked = false;}
			$('#feedback111').val(aData[38]);
			if(aData[39]== 1){var check_ar11 = document.getElementById('check_ar11').checked = true;}else{document.getElementById('check_ar11').checked = false;}
			$('#check_ar111').val(aData[40]);
			if(aData[41]== 1){var check_ob11 = document.getElementById('check_ob11').checked = true;}else{document.getElementById('check_ob11').checked = false;}
			$('#check_ob111').val(aData[42]);
			if(aData[43]== 1){var ob_duty11 = document.getElementById('ob_duty11').checked = true;}else{document.getElementById('ob_duty11').checked = false;}
			$('#ob_duty111').val(aData[44]);
			if(aData[45]== 1){var take_over11 = document.getElementById('take_over11').checked = true;}else{document.getElementById('take_over11').checked = false;}
			$('#take_over111').val(aData[46]);
			if(aData[47]== 1){var other11 = document.getElementById('other11').checked = true;}else{document.getElementById('other11').checked = false;}
			$('#other111').val(aData[48]);
			
			
			
			//---------------------------------------------
	 
 			if ( $(this).hasClass('row_selected') ) {
            	$(this).removeClass('row_selected');
				// clear data form
				$('#remove-form').val('');
				$('#submit-form input').val('');
				$('#view-form input').val('');
				$('#update-form input').val('');
				
				$('#btn-update').attr("disabled","disabled");
				$('#btn-remove').attr("disabled","disabled");
				$('#btn-view').attr("disabled","disabled");
        	} else {
            	oTable.$('tr.row_selected').removeClass('row_selected');
            	$(this).addClass('row_selected');
				
				$('#btn-update').removeAttr("disabled");
				$('#btn-remove').removeAttr("disabled");
				$('#btn-view').removeAttr("disabled");
				//trigger value
				$('#btn-view').trigger( "click" );
        	}
	  	}
		});
//---------------------------------------------------------------------------------------------------------------------------------------
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
		
		/*Set "update-form" action*/
		$('#update-form').ajaxForm({
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
			$('[data-remodal-id=modal_update]').remodal().close();
			alertSuccess(query);
		}
			
		
	});
</script>