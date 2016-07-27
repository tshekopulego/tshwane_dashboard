<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
      body, h1, h2, h3, h4, h5, h6, p, ul, ul li, tr td, span {
          font-family: DejaVu Sans, sans-serif;
          font-weight:100;
      }
</style>

</head>
<body>

<?php


echo $title;
echo '<br />';
echo '<ul class="bar-legend" style="list-style-type:none; padding:0px; margin:0px; margin-top:20px; ">'
        . '<li style="margin-right:20px; float:left; width:150px; display:inline-block" ><span style="background-color:#299571; display:block; width:15px; height:15px; float:left;"></span>Members</li>'
        . '<li style="margin-right:20px; float:left; width:150px; display:inline-block"><span style="background-color:rgba(151,187,205,0.8); display:block; width:15px; height:15px; float:left;"></span>Vehicles</li>'
        . '<li style="margin-right:20px; float:left; width:150px; display:inline-block"><span style="background-color:rgba(220,220,220,0.8); display:block; width:15px; height:15px; float:left;"></span>Bikes</li>'
    . '</ul>';
echo '<br />';
echo '<img src="./images/graphs/'.$graph.'.png" width="100%" />';
echo '<br />';
echo '<h2 style="text-align:center">Exported Data</h2>';

echo '<table border="0" cellpadding="5" cellspacing="0" style="border:1px solid #ccc; padding:10px; width:100%">';
echo '<tr><th style="border:1px solid #ccc; border-left:0px;">Shift</th><th style="border:1px solid #ccc; border-left:0px;">Region</th><th style="border:1px solid #ccc; border-left:0px;">Members</th><th style="border:1px solid #ccc; border-left:0px;">Vehicles</th><th style="border:1px solid #ccc; border-left:0px;">Bikes</th></tr>';

foreach ($rows as $row){
    $region = '';
    if(isset($row['region_name'])){
        $region = $row['region_name'];
    }

    echo '<tr><td style="border:1px solid #ccc; border-left:0px;">'.$row['shift'].'</td><td style="border:1px solid #ccc; border-left:0px;">'.$region.'</td><td style="border:1px solid #ccc; border-left:0px;">'.$row['total_members'].'</td><td style="border:1px solid #ccc; border-left:0px;">'.$row['total_vehicles'].'</td><td style="border:1px solid #ccc; border-left:0px;">'.$row['total_bikes'].'</td></tr>';
}
echo '</table>';
?>
    
</body>
</html>
