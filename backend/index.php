<?php include('head.php')?>

<body class="sb-nav-fixed">
    <?php include('navbar.php')?>
    <div id="layoutSidenav">
    <?php include('menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">หน้าหลัก</h1>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลนักศึกษา</li>
                    </ol> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                     <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <?php
                                    include('connection.php');
                                    $query = "SELECT COUNT(S_ID) AS Total FROM student ORDER BY S_ID";

                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)){
                                ?>
                                <div class="card-body">ขัอมูลนักศึกษา  <a align="center"><?php echo $row["Total"]; ?> คน</a></div>
                                <?php }?>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="student.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <?php
                                    include('connection.php');
                                    $query = "SELECT COUNT(A_ID) AS Total FROM admin ORDER BY A_ID";

                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)){
                                ?>
                                <div class="card-body">ขัอมูลอาจารย์ที่ปรึกษา <a align="center"><?php echo $row["Total"]; ?> คน</a></div>
                                <?php }?>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="admin.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <?php
                                    include('connection.php');
                                    $query = "SELECT COUNT(P_id) AS Total FROM project ORDER BY P_id";

                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)){
                                ?>
                                <div class="card-body">ข้อมูลโครงงาน <a align="center"><?php echo $row["Total"]; ?> ข้อมูล</a></div>
                                <?php }?>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="project.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <?php
                                    include('connection.php');
                                    $query = "SELECT COUNT(Pt_id) AS Total FROM project_type ORDER BY Pt_id";

                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)){
                                ?>
                                <div class="card-body">ข้อมูลประเภทโครงงาน <a align="center"><?php echo $row["Total"]; ?> ข้อมูล</a></div>
                                <?php }?>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="project_type.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php
                        include('connection.php');

                        $query = "SELECT P_year as PY,COUNT(P_year) as total,P_status FROM project WHERE P_status = '2' GROUP BY P_year ORDER BY P_year";
                        $query1 = "SELECT P_year as PYs,COUNT(P_year) as totals,P_status FROM project GROUP BY P_year";
                        $resultchart = mysqli_query($conn, $query);  
                        $resultcharts = mysqli_query($conn, $query1);
                        
                         //for chart
                        $total = array();
                        $PY = array();
                        $totals = array();
                        $PYs = array();
                        
                        while($rs = mysqli_fetch_array($resultchart)){ 
                            $PY[] = "\"".$rs['PY']."\"";
                            $total[] = "\"".$rs['total']."\"";
                            }
                            $PY = implode(",", $PY);
                            $total = implode(",", $total);
                        while($rs = mysqli_fetch_array($resultcharts)){ 
                            $PYs[] = "\"".$rs['PYs']."\"";
                            $totals[] = "\"".$rs['totals']."\"";
                            }
                            $PYs = implode(",", $PYs);
                            $totals = implode(",", $totals);
                        // echo '<pre>';
                        // print_r($productname);
                        // echo '</pre>';
                        ?>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area mr-1"></i> แผนภูมิ ประเภทโครงงาน
                                </div>
                                <div class="card-body"><canvas id="myArea" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <?php
                        include('connection.php');

                        $query = "SELECT COUNT(P.Pt_id) as PI,PT.Pt_name as PT
                        FROM project as P
                        INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id
                        GROUP BY P.Pt_id";

                        $resultchart = mysqli_query($conn, $query);  
                        
                         //for chart
                        $PI = array();
                        $PT = array();
                        
                        while($rs = mysqli_fetch_array($resultchart)){ 
                          $PI[] = "\"".$rs['PI']."\""; 
                          $PT[] = "\"".$rs['PT']."\""; 
                        }
                        $PI = implode(",", $PI); 
                        $PT = implode(",", $PT); 
                        ?>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i> แท่งกราฟโครงงาน
                                </div>
                                <div class="card-body"><canvas id="myChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        
                    </div>    
                </div>
            </main>
        </div>
    </div>
<script>
    <?php include('script.php')?> 
</script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
// Bar Chart Example
var ctx = document.getElementById("myChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php echo $PYs;?>],
    datasets: [{
        label: "จำนวนโครงงานทั้งหมด ที่ผ่านการอนุมัติ",
        data: [<?php echo $total;?>],
        fill: false,
        backgroundColor: "#4082c4",
    },
    {
        label: "จำนวนโครงงานทั้งหมด",
        data: [<?php echo $totals;?>],
        fill: false,
        backgroundColor: "#9082d4",
    }],
  },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    max: 20,
                    beginAtZero:true
                }
            }]
        }
    }  
});

</script>  
<script>
var ctx = document.getElementById("myCharts");
debugger;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $PYs;?>],
    datasets: [{
        label: "จำนวนโครงงานทั้งหมด ที่ผ่านการอนุมัติ",
        data: [<?php echo $total;?>],
        fill: false,
        backgroundColor: "#4082c4",
    },

    {
        label: "จำนวนโครงงานทั้งหมด",
        data: [<?php echo $totals;?>],
        fill: false,
        backgroundColor: "#9082d4",
    }]
    },
     options: {
        "hover": {
        "animationDuration": 1
    },
    "animation": {
        "duration": 1,
                    "onComplete": function () {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;

                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x, bar._model.y - 5);
                    });
                });
            }
        },

    legend:{
        "display": true
       },
    tooltips: {
        "enabled": true
     },
    scales: {
        yAxes: [{
                display: false,
                gridLines: {
                display : false
            },
            ticks: {
                    display: false,
                beginAtZero:true
                }
            }],
            xAxes: [{
                    gridLines: {
                    display : false
                },
                ticks: {
                    max:20,
                    beginAtZero:true
                }
            }]
        }
        
    }
});</script>
<script>
var xValues = [<?php echo $PT?>];
var yValues = [<?php echo $PI;?>];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myArea", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "โครงงานประเภท"
    }
  }
});
</script>
</body>
