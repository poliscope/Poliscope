

  <?php
  session_start();
			if(isset($_SESSION['user']))
                                           {echo"";
										   }
else
                                        {
	                                     header('Location:index.php');
                                        }
$conn = mysqli_connect('localhost','root','','poliscope');
if(mysqli_connect_error())
{
    echo "Error in connecting to database: ".mysqli_connect_error();
}
// The Chart table contains two fields: weekly_task and percentage
// This example will display a pie chart. If you need other charts such as a Bar chart, you will need to modify the code a little to make it work with bar chart and other charts
 $temp="select * from post where post_id=76";
    $sth=mysqli_query($conn,$temp);
/*
---------------------------
example data: Table (Chart)
--------------------------
weekly_task     percentage
Sleep           30
Watching Movie  40
work            44
*/

$rows = array();
//flag is not needed
$flag = true;
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'Weekly Task', 'type' => 'string'),
	array('label' => 'Percentage', 'type' => 'number')

);

$rows = array();

echo"<div id='chart_div'>
	</div>";
$r= mysqli_fetch_assoc($sth);
	
$r1=$r['support'];
$r2=$r['oppose'];
$r3=$r['neutral'];

	
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) "support"); 

    // Values of each slice
    $temp[] = array('v' => (int) $r1); 
	$rows[] = array('c' => $temp);
	$temp = array();
	$temp[] = array('v' => (string) "oppose"); 
	$temp[] = array('v' => (int) $r2); 
    $rows[] = array('c' => $temp);
	$temp = array();
	$temp[] = array('v' => (string) "neutral"); 
	$temp[] = array('v' => (int) $r3); 
    $rows[] = array('c' => $temp);


$table['rows'] = $rows;

$jsonTable = json_encode($table);
/*echo '<script type="text/javascript">',
     'drawChart();',
     '</script>'
;
}
*/
//echo $jsonTable;

?>
<html>
  <head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
	   
      var options = {
           title: 'chart',
          is3D: 'true',
          width: 500,
          height: 300
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
	</head>
	
	
	
	<body>
	
	
	
	
	</body>
	</html>
	  
