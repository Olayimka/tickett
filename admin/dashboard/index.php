<?php

include('conn.php');
include('session.php');

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ADMIN DASHBOARD</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="../../css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold"><?php echo $session_username; ?></strong>
                                    </span> <span class="text-muted text-xs block">College <?php echo $session_college; ?> <b
                                            class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">

                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li class="active">
                        <a href="index.html"><i class="fa fa-th-large"></i> <span
                                class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>

                    </li>





                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to TB TICKET MASTER Admin
                                Dashboard.</span>
                        </li>




                        <li>
                            <a href="login.html">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                        <li>
                            <a class="right-sidebar-toggle">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>


            <div class="wrapper wrapper-content">

            <?php
include('conn.php'); 
$college = $_SESSION['college'];
$sql ="SELECT SUM(amount) AS total_amount, COUNT(*) AS num_orders FROM payment WHERE college='$college';";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Invalid query: ' . mysqli_error($conn));
}

// Fetch the result
$row = mysqli_fetch_assoc($result);
$total_amount = $row['total_amount'];
$num_orders = $row['num_orders'];
// Now $total_amount holds the sum of amounts

// You can do whatever you want with $total_amount here

// Don't forget to close the database connection when you're done.
mysqli_close($conn);
?>


     
     
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right"></span>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $total_amount; ?>
</h1>
                                <div class="stat-percent font-bold text-success"> <i class="fa fa-bolt"></i>
                                </div>
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right"></span>
                                <h5>Orders</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $num_orders; ?></h1>
                                <div class="stat-percent font-bold text-info"><i class="fa fa-level-up"></i>
                                </div>
                                <small>Total orders</small>
                            </div>
                        </div>
                    </div>

                </div>
               

                <div class="row">

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>HISTORY</h5>

                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group"><input type="text" placeholder="Search"
                                                class="input-sm form-control"> <span class="input-group-btn">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    Go!</button> </span></div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>#</th>
                                                <th>eventName </th>
                                                <th>Ticket </th>
                                                <th>Quantity</th>
                                                <th>Amount </th>
                                                <th>Ticket Number </th>
                                                <th>college</th>
                                                <th>Fullname</th>
                                                
                                                <th>level</th>
                                                <th>Department</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
include('conn.php'); 
$college = $_SESSION['college'];
$sql ="SELECT * FROM payment WHERE college = '$college' ORDER by id DESC";
$result = mysqli_query($conn,$sql);
if (!$result) {
    die('Invalid query: ' . mysqli_error($conn));
}
$num_rows = mysqli_num_rows($result);
{
 while($row = mysqli_fetch_array($result)) {
     ?>

                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['eventName'];?></td>
                                                <td><?php echo $row['ticket'];?></td>
                                                <td><?php echo $row['quantity'];?></td>
                                                <td><?php echo $row['amount'];?></td>
                                                <td><?php echo $row['ticketNo'];?></td>
                                                <td><?php echo $row['college'];?></td>
                                                <td><?php echo $row['fullname'];?></td>
                                                <td><?php echo $row['level'];?></td>
                                                <td><?php echo $row['department'];?></td>
                                                <td><?php echo $row['status'];?></td>
                                                

                                                <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                            </tr>
<?php
 }}

?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>


            </div>


            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong>TB TICKET MASTER &copy; 2024
                </div>
            </div>

        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="../../js/jquery-2.1.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="../../js/plugins/flot/jquery.flot.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="../../js/plugins/flot/curvedLines.js"></script>

    <!-- Peity -->
    <script src="../../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../../js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../../js/inspinia.js"></script>
    <script src="../../js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../../js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="../../js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Sparkline -->
    <script src="../../js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="../../js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="../../js/plugins/chartJs/Chart.min.js"></script>

    <script>
        $(document).ready(function () {


            var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084' },
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    },
                    {
                        label: "Example dataset",
                        fillColor: "rgba(26,179,148,0.5)",
                        strokeColor: "rgba(26,179,148,0.7)",
                        pointColor: "rgba(26,179,148,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    }
                ]
            };

            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true,
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

        });
    </script>
</body>

</html>