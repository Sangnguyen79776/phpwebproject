<?php
session_start();
include '../connect/dbconnect.php';

$db_query = "SELECT label, value FROM dashboard_data";
$dbtests = $con->query($db_query);
$info = array();
if ($dbtests->num_rows > 0) {
    while ($q = $dbtests->fetch_assoc()) {
        $info[] = $q;
    }
}




?>





<html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
</head>
<body>
 
    <h1>Dashboard</h1>
    <div style="width: 800px; margin: 0 auto;">
        <canvas id="barChart"></canvas>
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        <canvas id="doughnutchart" ></canvas>
    </div>

    <script>
        // Example data for chart
        var labels = [];
        var values = [];
 
    
     
        <?php
        foreach ($info as $item) {
      
            echo "labels.push('".$item['label']."');";
            echo "values.push('".$item['value']."');";
        }
   ?>
        
    var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'dashboard_data',
                    data: values,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        let doughnutchart = document.getElementById('doughnutchart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let s = new Chart(doughnutchart, {
      type:'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Teaching quality', 'Facilties ', 'Materials', 'Human resources'],
        datasets:[{
          label:'Quality scale',
          data:[
           3,
           4,
           2,
           5,
          
          
            
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'red',
            'blue',
            'olive',
            'grey',
           
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Categories ranking  ',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
        
        let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday'],
        datasets:[{
          label:'Latest comment',
          data:[
            0,
            0.25,
            0.75,
           1,
           0,
           0.25,
           0.25,
            
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Comment ',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
    </script>
</body>
</html>