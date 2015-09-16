<header style="position: relative; margin-bottom: 30px; width: 100%;">
	<h1>SELECT CATEGORY MARKER :</h1>
	<div class="corner">
		<select id="type" name="type">
			<option value="marker">Marker</option>
			<option value="route">Route</option>
        </select>
		<select id="marker-category" name="marker_category">
			<option value="undefined">Select option</option>
        </select>
		<select id="route-category" name="route_category">
			<option value="undefined">Select option</option>
        </select>		
	</div>
</header>
<div id="map-canvas" style="height: 390px; width: 100%"></div>

<script>
/** Get Maps **/
init();

$("#route-category,#route-category").hide()

$("#marker-category").change(function() { 
	var value = $("#marker-category option:selected").val();
	init(value);
});

$("#route-category").change(function() { 
	var data = $("#route-category option:selected").val();
	init('',data);
});

$("#type").change(function() { 
	if($("#type").val() == 'marker'){
		$("#marker-category").show();
		$("#route-category").hide();
	}else{
		$("#marker-category").hide();
		$("#route-category").show();
	}
});

/** Get request data category  **/
getRequest("home/get_category", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#marker-category").append("<option value="+data[i].category_id+">"+data[i].category_name+" ("+data[i].count+")</option>");
        }

    });

getRequest("home/get_route", function(data) {
         
        var data = JSON.parse(data.responseText);
    
        for (var i = 0; i < data.length; i++) {
			$("#route-category").append("<option value='"+data[i].route_name+"'>"+data[i].route_name+"</option>");
        }

    });

	
function getRequest(url, callback) {
    var request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
    }
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            callback(request);
			$('.loading').hide();
        }
    }
    request.open("GET", url, true);
    request.send();
}

</script>