<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="Scripts/jquery-1.7.1.min.js"></script>
<script src="Scripts/Chart.js" type="text/javascript"></script>
<canvas id="myBarChart" width="100" height="100"></canvas>
<?php
                        include('connection.php');

                        $query = "SELECT P_year as PY,COUNT(P_year) as total,P_status FROM project WHERE P_status = '2' GROUP BY P_year";
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
<script>
debugger;
$(document).ready(function () {
    var data = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
        datasets: [{
            label: "My First dataset",
            fillColor: "#FC9775",
            data: [65, 59, 80, 81, 56, 55, 40]
        }, {
            label: "My Second dataset",
            fillColor: "#5A69A6",
            data: [28, 48, 40, 19, 86, 27, 90]
        }]
    };

    var ctx = $("#myBarChart").get(0).getContext("2d");
    var myBarChart = new Chart(ctx).Bar(data);
});</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.js"></script>