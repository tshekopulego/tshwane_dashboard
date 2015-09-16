<!-- Content -->
<div class="content-block">
<div class="content-block-title"><span style="font-size: 20px; font-weight: 300;"> <span class="icon-home"> 
	</span>Tshwane Safety Dashboard</span>
<div style="float:right;">
</div>
</div>
<div class="mainview view">
	<div id="view" style="padding-bottom:45px; height:680px">
		<div class="onepcssgrid-1200" >
			<div class="onerow">
				<div class="col12"><center><b>Summary Of Incidents (Month)</b></center><br><canvas id="canvas3" height="150" width="600"></canvas></div>
				<div class="col12" style="padding-bottom:45px;"></div>
			</div>
			<div class="onerow">
				<div class="col6"><center><b>Top 10 Incidents By Type</b></center><br><canvas id="canvas" height="250" width="600"></canvas></div>
				<div class="col6 last"><center><b>Summary Of Incidents Status</b></center><br><canvas id="canvas1" height="250" width="600"></canvas></div>
			</div>
		</div>
	</div>		 
</div>		

<script>

	var pieData=[];

	$(document).ready(function() {
  
		var barChartData = {
			labels : [],
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,0.8)",
					highlightFill : "rgba(151,187,205,0.75)",
					highlightStroke : "rgba(151,187,205,1)",
					data : []
				}
			]
		}
		
	var lineChartData = {
			labels : [],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : []
				}

			]

		}
		/* Top 10 type incident*/
		$.getJSON('dashboard/chart/', function(json) {
			for (var i = 0; i < json.length; i++) {
				barChartData.labels.push(json[i]['type']);
				barChartData.datasets[0].data.push(parseInt(json[i]['total']));
			}
			var ctx = document.getElementById("canvas").getContext("2d");
			window.myBar = new Chart(ctx).Bar(barChartData, {
				responsive : true
			});
		});
		/* status incident*/
		$.getJSON('dashboard/chart2/', function(json) {
			for (var i = 0; i < json.length; i++) {
				var randomColor = Math.floor(Math.random()*16777215).toString(16);
				pieData.push({
						value: parseInt(json[i]['total']),
						color:"#"+randomColor,
						highlight: "#FF5A5E",
						label: json[i]['status']
					});
									
			}
	
				var ctx1 = document.getElementById("canvas1").getContext("2d");
				window.myPie = new Chart(ctx1).Pie(pieData);

		});
		
			/* SUMMARY OF incident*/
		$.getJSON('dashboard/chart1/', function(json) {
			for (var i = 0; i < json.length; i++) {
				lineChartData.labels.push(json[i]['date']);
				lineChartData.datasets[0].data.push(parseInt(json[i]['total']));
			}

			var ctx2 = document.getElementById("canvas3").getContext("2d");
				window.myLine = new Chart(ctx2).Line(lineChartData, {
					responsive: true
			});
		});
		

	});
</script>