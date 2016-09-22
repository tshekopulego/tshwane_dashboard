

<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-list"></span> List of incidents</span>
<div style="float:right;">
    <div class="menu">
        <!-- onClick="exportReport('capacity')" -->
        <a href="#" id="btn-capacity" ><button  class="btn-report" >Export</button></a>
        <a href="#modal" id="btn-capacity-email" ><button  class="btn-report-email" style="width:120px;" >Email Report</button></a>
        <!--
        <a href="capacity/export" id="btn-capacity" target="_blank" ><button  class="btn-report" >Export</button></a>
        -->
    </div>
</div>
</div>
<div class="mainview view">

	<div id="view" style="padding-bottom:45px; min-height:680px">
		<div class="onepcssgrid-1200" >
                    <!-- DATA ALL REGIONS -->
			<div class="onerow">
                            <div class="col12"><center><b>Summary Of Strength (All Regions)</b></center><br>
                                <form id="date_select_form" action="#" method="POST">
                                    <select id="time_select">
                                        <option value="" >Please Select</option>
                                        <option value="yesterday" >Yesterday</option>
                                        <option value="lastweek" >Last Week</option>
                                        <option value="lastmonth" >Last Month</option>
                                    </select>                                    
                                </form>
                                <canvas id="canvas" height="150" width="600"></canvas>
                                <div class="col12"><div id="legend" class="legend"></div></div>
                            </div>
                            <div class="col12" style="padding-bottom:45px;"></div>
			</div>
                    
                    <!-- DATA PER REGION -->
			<div class="onerow">
				<div class="col12">
                                    <center><b>Strength (Per Region)</b></center><br>
                                    <p>Please select BOTH region and date range below to view statistics.</p>
                                    <form action="#" id="region_date_select_form" method="POST">
                                        <div class="selectbox_container">
                                            <label>Select Region</label><br />
                                            <select id="region_select">
                                                <option value="" >Select Region</option>
                                            </select>    
                                        </div><!-- end .selectbox_container-->
                                        <div class="selectbox_container" id="select_date_container" style="display:none">
                                            <label>Select Date Range</label><br />
                                            <select id="month_select_b">
                                                <option value="" >Select Date</option>
                                            </select>                       
                                        </div><!-- end .selectbox_container-->
                                    </form>
                                    <div class="per_region_container" >
                                        <canvas id="canvas_b" height="150" width="600" ></canvas>
                                        <div class="col12"><div id="legend_b" class="legend"></div></div>
                                    </div>
                                </div>
				<div class="col12" style="padding-bottom:45px;"></div>
			</div>
		</div>
	</div>		 
</div>
<!-- End -->
		</div>		 
<div class="remodal" data-remodal-id="modal">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h1>Email Report</h1>
    <p class="modal_response">Please be patient, your PDF is being generated.</p>
    
    <div class="report_send_form" style="display:none">
        <form action="" method="POST" id="report_send_form">
            <label for="user_email">Email</label>
            <input type="text" name="user_email" id="user_email">
            <input type="hidden" name="selected_date" id="selected_date" val="" />
            <input type="hidden" name="selected_pdf" id="selected_pdf" val="" />
            <br />
            <button data-remodal-action="cancel" >Cancel</button>
            <button   id="send_report">Send</button>
        </form>
    </div>
</div>

<script>
   

	$(document).ready(function() {
  
		$('[data-remodal-id=modal]').remodal();
  
                //populate select date dropdown list
                $.getJSON('capacity/get_dates/', function(dates) {
                    $.each(dates, function(index, val){
                        $('#month_select, #month_select_b').append('<option value="'+ val['date'] +'">'+ val['date'] +'</option>');
                    });
                });
                
                //populate select region dropdown list
                $.getJSON('capacity/get_regions/', function(regions) {
                    $.each(regions, function(index, val){
                        $('#region_select').append('<option value="'+ val['region_id'] +'">'+ val['region_name'] +'</option>');
                    });
                });
                    
                function create_chart_all(){
                    /* Strength by Shift for all regions */
                    $.getJSON('capacity/chart/', function(json) {
                        
                        var barChartData = {
                            /* Labels to be injected with json from db */
                            labels : ["5am - 1pm", "1pm - 9pm", "9pm - 5am"],
                            datasets : [
                                {
                                    label: "Members",
                                    fillColor: "#33cc99",
                                    strokeColor: "#299571",
                                    highlightFill: "#278f6c",
                                    highlightStroke: "#207559",
                                    data: []
                                },
                                {
                                    label: "Vehicles",
                                    fillColor: "rgba(151,187,205,0.5)",
                                    strokeColor: "rgba(151,187,205,0.8)",
                                    highlightFill: "rgba(151,187,205,0.75)",
                                    highlightStroke: "rgba(151,187,205,1)",
                                    data: []
                                },
                                {
                                    label: "Bikes",
                                    fillColor: "rgba(220,220,220,0.5)",
                                    strokeColor: "rgba(220,220,220,0.8)",
                                    highlightFill: "rgba(220,220,220,0.75)",
                                    highlightStroke: "rgba(220,220,220,1)",
                                    data: []
                                }
                            ]
                        };

                        //loop through result and populate data
//                        for (var i = 0; i < json.length; i++) {
//                                //barChartData.labels.push(json[i]['shift']);
//                                barChartData.datasets[0].data.push(parseInt(json[i]['total_members']));
//                                barChartData.datasets[1].data.push(parseInt(json[i]['total_vehicles']));
//                                barChartData.datasets[2].data.push(parseInt(json[i]['total_bikes']));
//                        }
                        
                        jQuery.each(json, function(index, val){
                            if(val.shift){
                            if(val.shift === "1"){
                                barChartData.datasets[0].data.push(parseInt(json[0]['total_members']));
                                barChartData.datasets[1].data.push(parseInt(json[0]['total_vehicles']));
                                barChartData.datasets[2].data.push(parseInt(json[0]['total_bikes']));
                            }else if(val.shift === "2"){
                                barChartData.datasets[0].data.push(parseInt(json[1]['total_members']));
                                barChartData.datasets[1].data.push(parseInt(json[1]['total_vehicles']));
                                barChartData.datasets[2].data.push(parseInt(json[1]['total_bikes']));
                            }else if(val.shift === "3"){
                                barChartData.datasets[0].data.push(parseInt(json[2]['total_members']));
                                barChartData.datasets[1].data.push(parseInt(json[2]['total_vehicles']));
                                barChartData.datasets[2].data.push(parseInt(json[2]['total_bikes']));
                            }
                            }
                        });
                        
                        //fetch div by id
                        var ctx = document.getElementById("canvas").getContext("2d");
                        //initialize graph
                        var shift = new Chart(ctx).Bar(barChartData, {
                                responsive : true,
                                maintainAspectRatio: true,
                                onAnimationComplete: function(){ 
                                    var graph_png = shift.toBase64Image();
                                    email_report_popup(graph_png);
                                    export_pdf(graph_png); 
                                },
                                //String - A legend template
                                legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                        });                        

                        //Generate legend
                        var legend = shift.generateLegend();
                        $('#legend').append(legend);
                        
                        //update graph on select change
                        $('#time_select').off().on('change', function(){   
                            var selectedDate = $('#time_select option:selected').val();
                            // switched to post to pass text data instead of id
                            $.post('capacity/chart_by_search/',
                                {
                                    'daterange':selectedDate
                                }, function(data){
                                    //console.log(data);
                                    if($.isEmptyObject(data)){
                                        alert('Unfortunaltey there are no results for your search criteria!');
                                    }else{
                                    
                                    /*
                                    //check for undefined values (0)
                                    var morning = data[0];
                                    var afternoon = data[1];
                                    var evening = data[2];
                                        
                                    if(typeof morning === 'undefined'){
                                        morning = {shift: "0", region: "0", total_members: "0", total_vehicles: "0", total_bikes: "0"}
                                    }
                                    if(typeof afternoon === 'undefined'){
                                        afternoon = {shift: "1", region: "0", total_members: "0", total_vehicles: "0", total_bikes: "0"}
                                    }
                                    if(typeof evening === 'undefined'){
                                        evening = {shift: "2", region: "0", total_members: "0", total_vehicles: "0", total_bikes: "0"}
                                    }
                                    
                                    //create new array to run through
                                    var newData = [morning, afternoon, evening];
                                    console.log(newData);
                                      for (var i = 0; i < newData.length; i++) {
                                        shift.datasets[0].bars[i].value = parseInt(newData[i]['total_members']);                                        
                                        shift.datasets[1].bars[i].value = parseInt(newData[i]['total_vehicles']);
                                        shift.datasets[2].bars[i].value = parseInt(newData[i]['total_bikes']);
                                    }
        */

                                    
                                        jQuery.each(data, function(index, val){
                                            if(val.shift){
                                            if(val.shift === "1"){
                                                shift.datasets[0].bars[0].value = parseInt(val.total_members); 
                                                shift.datasets[1].bars[0].value = parseInt(val.total_vehicles);
                                                shift.datasets[2].bars[0].value = parseInt(val.total_bikes); 
                                            }else if(val.shift === "2"){
                                                shift.datasets[0].bars[1].value = parseInt(val.total_members); 
                                                shift.datasets[1].bars[1].value = parseInt(val.total_vehicles); 
                                                shift.datasets[2].bars[1].value = parseInt(val.total_bikes); 
                                            }else if(val.shift === "3"){
                                                shift.datasets[0].bars[2].value = parseInt(val.total_members); 
                                                shift.datasets[1].bars[2].value = parseInt(val.total_vehicles); 
                                                shift.datasets[2].bars[2].value = parseInt(val.total_bikes); 
                                            }
                                            }
                                        });
                                    
                                        //Update graph
                                        shift.update();
                                    }
                            }, "json");
                        });
                    });
                }
                //display main chart
                create_chart_all();
                
                                
                //create pdf content for export
                function export_pdf(image){
                    
                    var selectedDate = $('#time_select option:selected').val();
                    if(selectedDate == ''){
                        selectedDate = 'unselected';
                    }
                    
                    $('#btn-capacity').off().on('click', function(e){
                        e.preventDefault();
                        
                        $.post('capacity/make_graph/',
                            {
                                'image':image
                            }, function(data){
                                window.open(
                                    '/dashboard/index.php/capacity/export_pdf/'+data+'/'+selectedDate,
                                    '_blank' 
                                  );
                            }
                        );
                        
                    });
                }
				
				//Email report to someone
                function email_report_popup(image){
                    
                    var selectedDate = $('#time_select option:selected').val();
                    if(selectedDate == ''){
                        selectedDate = 'unselected';
                    }
                    
                    $('#btn-capacity-email').off().on('click', function(e){
                        $('[data-remodal-id=modal]').remodal();
                        
                        $.post('capacity/make_graph/',
                            {
                                'image':image
                            }, function(data){
                                //console.log(data);
                                $.post('capacity/save_export_pdf/',
                                    {
                                        'data':data,
                                        'date':selectedDate
                                    }, function(result){
                                        $('#selected_date').val(date);
                                        $('#selected_pdf').val(data);
                                        $('.modal_response').html('Your pdf has been generated and is ready to send.<br />Please complete the field below with the email address you wish to send to.');
                                        $('.report_send_form').fadeIn();
                                        //console.log(result);
                                    }
                                );
                          
                            }
                        );
                        
                    });
                }
				
				//Send report to someone
				$('#report_send_form').on('click', function(e){
                    e.preventDefault();
                    $('.report_send_form').fadeOut();
                    $('.modal_response').html('Your pdf is being sent..');
            
                    $.post('capacity/send_export_pdf/',
                        {
                            'date':$('#selected_date').val(),
                            'pdf':$('#selected_pdf').val(),
                            'email': $('#user_email').val()
                        }, function(result){
                            $('.modal_response').html('Your pdf has been sent.');
                            //console.log(result);
                        }
                    );
                    

                });
		
                
                //Using the same select date method to display the data from the day before
                function create_select_chart(){
                    
                    var barChartData = {
                        /* Labels to be injected with json from db */
                        labels : ["9pm - 5am", "5am - 1pm", "1pm - 9pm"],
                        datasets : [
                            {
                                label: "Members",
                                fillColor: "#33cc99",
                                strokeColor: "#299571",
                                highlightFill: "#278f6c",
                                highlightStroke: "#207559",
                                data: [0,0,0]
                            },
                            {
                                label: "Vehicles",
                                fillColor: "rgba(151,187,205,0.5)",
                                strokeColor: "rgba(151,187,205,0.8)",
                                highlightFill: "rgba(151,187,205,0.75)",
                                highlightStroke: "rgba(151,187,205,1)",
                                data: [0,0,0]
                            },
                            {
                                label: "Bikes",
                                fillColor: "rgba(220,220,220,0.5)",
                                strokeColor: "rgba(220,220,220,0.8)",
                                highlightFill: "rgba(220,220,220,0.75)",
                                highlightStroke: "rgba(220,220,220,1)",
                                data: [0,0,0]
                            }
                        ]
                    };
                    
                    //fetch div by id
                    var ctx = document.getElementById("canvas_b").getContext("2d");
                    //initialize graph
                    var shift = new Chart(ctx).Bar(barChartData, {
                            responsive : true,
                            //String - A legend template
                            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                    }); 
                    
                    //Generte legend
                    var legend = shift.generateLegend();
                    $('#legend_b').append(legend);
                    
                    /* Strength by Shift for selectable regions */
                    $('#region_select').off().on('change', function(){
                        $('#select_date_container, .per_region_container').fadeIn();
                        $("#select_date_container option:first").attr('selected','selected');
                    });
                    
                    //update graph on select change
                    $('#month_select_b').off().on('change', function(){
                        var selectedDate = $('#month_select_b option:selected').val();
                        var RegionId = $('#region_select option:selected').val();

                        $.post('capacity/chart_by_search/',
                            {
                                'daterange':selectedDate,
                                'region':RegionId

                            }, function(json){
                                //console.log(json);
                                if($.isEmptyObject(json)){
                                        alert('Unfortunaltey there are no results for your search criteria!');
                                }else{
                                    jQuery.each(json, function(index, val){
                                        if(val.shift){
                                            if(val.shift === "1"){
                                                shift.datasets[0].bars[0].value = parseInt(val.total_members); 
                                                shift.datasets[1].bars[0].value = parseInt(val.total_vehicles);
                                                shift.datasets[2].bars[0].value = parseInt(val.total_bikes); 
                                            }else if(val.shift === "2"){
                                                shift.datasets[0].bars[1].value = parseInt(val.total_members); 
                                                shift.datasets[1].bars[1].value = parseInt(val.total_vehicles); 
                                                shift.datasets[2].bars[1].value = parseInt(val.total_bikes); 
                                            }else if(val.shift === "3"){
                                                shift.datasets[0].bars[2].value = parseInt(val.total_members); 
                                                shift.datasets[1].bars[2].value = parseInt(val.total_vehicles); 
                                                shift.datasets[2].bars[2].value = parseInt(val.total_bikes); 
                                            }
                                        }
                                    });

                                 //Update graph
                                 shift.update();     
                             }

                        }, "json");

                    });
                }
                //create and display secondary table
                create_select_chart();
	});

</script>