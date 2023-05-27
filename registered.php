
<?php
include("config.php");

if ($_POST){
  function lastID($dbConn){

    $sql = "SELECT count(*) FROM missing_record"; 
    $result = $dbConn->prepare($sql); 
    $result->execute(); 
    return $result->fetchColumn(); 
    }

$car_id = "V.REG_".sprintf('%04s', lastID($dbConn)+1);
$num_plate = $_POST['in_NumPlate'];
$car_make = $_POST['in_CarMake'];
$car_model = $_POST['in_CarModel'];
$car_colour = $_POST['in_CarColour'];
$car_last_seen = $_POST['in_CarLastSeen'];
$date_stolen = $_POST['in_DateStolen'];
$report_status = $_POST['in_ReportStatus'];
$person_name = $_POST['in_PersonName'];
$person_phone = $_POST['in_PersonPhone'];
$person_address = $_POST['in_PersonAddress'];

$sql = "INSERT INTO missing_record (id,car_id,num_plate,car_make,car_model,car_colour,car_last_seen,date_stolen,report_status,person_name,person_phone,person_address) VALUES (null,:car_id,:num_plate,:car_make,:car_model,:car_colour,:car_last_seen,:date_stolen,:report_status,:person_name,:person_phone,:person_address)";
$query = $dbConn->prepare($sql);


$query->bindparam(':car_id', $car_id);
$query->bindparam(':num_plate', $num_plate);
$query->bindparam(':car_make', $car_make);
$query->bindparam(':car_model', $car_model);
$query->bindparam(':car_colour', $car_colour);
$query->bindparam(':car_last_seen', $car_last_seen);
$query->bindparam(':date_stolen', $date_stolen);
$query->bindparam(':report_status', $report_status);
$query->bindparam(':person_name', $person_name);
$query->bindparam(':person_phone', $person_phone);
$query->bindparam(':person_address', $person_address);
$query->execute();

header("registered.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="assets/img/favicon.png">
<title>
   StolenCars
  </title>





<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />

<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<link id="pagestyle" href="assets/css/material-dashboard.min.css?v=3.0.5" rel="stylesheet" />

<style>
    .async-hide {
      opacity: 0 !important
    }
    #ofBar
    {
      display: none  !important;
    }
   .form-group > input {
     border: solid 1px #9093A5;
}

.form-group > textarea {
     border: solid 1px #9093A5;
}
  </style>

</head>
<body class="g-sidenav-show  bg-gray-200">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main" style="background-color:#000">
  <div class="sidenav-header">
<h3 style="color: #fff;padding: 20px;">Stolen Cars</h3>
</div>



<hr class="horizontal light mt-0 mb-2">
<div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="reports.php" >
<i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">line_axis</i>
<span class="nav-link-text ms-2 ps-1">Reports</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="registered.php">
<i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">receipt_long</i>
<span class="nav-link-text ms-2 ps-1">Registered Cars</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="scanned.php">
<i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">flag_circle</i>
<span class="nav-link-text ms-2 ps-1">Scanned Cars</span>
</a>
</li>
<!-- <li class="nav-item">
<a class="nav-link" href="repors.php" target="_blank">
<i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">receipt_long</i>
<span class="nav-link-text ms-2 ps-1">Reports</span>
</a>
</li> -->
</ul>
</div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

<nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
<div class="container-fluid py-1 px-3">

<div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
<a href="javascript:;" class="nav-link text-body p-0">
<div class="sidenav-toggler-inner">
<i class="sidenav-toggler-line"></i>
<i class="sidenav-toggler-line"></i>
<i class="sidenav-toggler-line"></i>
</div>
</a>
</div>
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
<div class="ms-md-auto pe-md-3 d-flex align-items-center">
<div class="input-group input-group-outline">
<label class="form-label">Search here</label>
<input type="text" class="form-control">
</div>
</div>
<ul class="navbar-nav  justify-content-end">
<li class="nav-item">
<a href="pages/authentication/signin/illustration.html" class="nav-link text-body p-0 position-relative" target="_blank">
<i class="material-icons me-sm-1">
account_circle
</i>
</a>
</li>
<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
<a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
<div class="sidenav-toggler-inner">
<i class="sidenav-toggler-line"></i>
<i class="sidenav-toggler-line"></i>
<i class="sidenav-toggler-line"></i>
</div>
</a>
</li>
<li class="nav-item px-3">
<a href="javascript:;" class="nav-link text-body p-0">
<i class="material-icons ">
settings
</i>
</a>
</li>
<li class="nav-item dropdown pe-2">
<a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
<i class="material-icons cursor-pointer">
notifications
</i>
<span class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger border border-white small py-1 px-2">
<span class="small">11</span>
<span class="visually-hidden">unread notifications</span>
</span>
</a>
<ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">

</ul>
</li>
</ul>
</div>
</div>
</nav>

<div class="container-fluid py-4">
 <div>
<h1 style="color:#000">  &nbsp;&nbsp;  &nbsp;&nbsp;Registered Vehicles</h1>
 <button type="button" class="" data-bs-toggle="modal" data-bs-target="#vehicleCreate" >
           Register Vehicle
          </button>
     <div class="modal fade" id="vehicleCreate" tabindex="-1" role="dialog" aria-labelledby="modalStockTitle"
            aria-hidden="true" style="border-radius: 0!important;">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
              <div class="modal-content" style="border-radius: 0!important;">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                      <h5 class="">Register Vehicle</h5>
                      <p class="mb-0">Fill the form</p>
                    </div>
                    <div class="card-body pb-3">
                      <form action="" method="POST">
                        <div class='form-group'>
      
    <div class='form-group'>
        <label for='in_NumPlate'>Num Plate</label>
        <input name='in_NumPlate' id='in_NumPlate' class='form-control' type='text' >
    </div>
    <div class='form-group'>
        <label for='in_CarMake'>Car Make</label>
        <input name='in_CarMake' id='in_CarMake' class='form-control' type='text' >
    </div>
    <div class='form-group'>
        <label for='in_CarModel'>Car Model</label>
        <input name='in_CarModel' id='in_CarModel' class='form-control' type='text' >
    </div>
    <div class='form-group'>
        <label for='in_CarColour'>Car Colour</label>
        <input name='in_CarColour' id='in_CarColour' class='form-control' type='text' >
    </div>
    <div class='form-group'>
        <label for='in_CarLastSeen'>Car Last Seen</label>
        <input name='in_CarLastSeen' id='in_CarLastSeen' class='form-control' type='text' >
    </div>
    <div class='form-group'>
        <label for='in_DateStolen'>Date Stolen</label>
        <input name='in_DateStolen' id='in_DateStolen' class='form-control' type='date'  required >
    </div>
    <div class='form-group'>
        <label for='in_ReportStatus'>Report Status</label>
        <input name='in_ReportStatus' id='in_ReportStatus' class='form-control' type='text' >
    </div>
    <div class='form-group'>
        <label for='in_PersonName'>Person Name</label>
        <input name='in_PersonName' id='in_PersonName' class='form-control' type='text' >
    </div>
    <div class='form-group'>
        <label for='in_PersonPhone'>Person Phone</label>
        <input name='in_PersonPhone' id='in_PersonPhone' class='form-control' type='text' >
    </div>
    <div class='form-group'>
        <label for='in_PersonAddress'>Person Address</label>
        <input name='in_PersonAddress' id='in_PersonAddress' class='form-control' type='text' >
    </div>


                        <div class="text-center">
                          <button  class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0" type="Submit" 
                            >Submit</button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
</div>
 <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reg_ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NO. Plate</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Car Brand
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Car Model</th>


                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Stolen</th>

                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Report Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Owners Name
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
               

              </tr>
            </thead>
            <tbody id="Staffs_body">
              <?php

              $result = $dbConn->query("SELECT * FROM missing_record ORDER BY id DESC");
              while($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
  
                <tr>
                  <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-normal'><?php echo $row['id']?></span></td>
                    <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-normal'><?php echo $row['car_id']?></td>
                    <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-normal'><?php echo  $row['num_plate']?></span></td>
                    <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-normal'><?php echo $row['car_make']?></span></td>
                    <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-normal'><?php echo  $row['car_model']?></span></td>
                     <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-normal'><?php echo  $row['date_stolen']?></span></td>
                    
                     <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-normal'><?php echo  $row['report_status']?></span></td>
                    
                     <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-normal'><?php echo  $row['person_name']?></span></td>
                    
                     <td class='align-middle text-center'><span class='text-secondary text-xs font-weight-normal'><?php echo  $row['person_address']?></span></td>
                    
                    
                </tr><?php

}
?>

            
            </tbody>
          </table>
        </div>

</div>
<footer class="footer py-4  ">
<div class="container-fluid">
<div class="row align-items-center justify-content-lg-between">
<div class="col-lg-6 mb-lg-0 mb-4">
<!-- <div class="copyright text-center text-sm text-muted text-lg-start">
© <script>
                  document.write(new Date().getFullYear())
                </script>,
made with <i class="fa fa-heart"></i> by
<a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
for a better web.
</div> -->
</div>
<div class="col-lg-6">
<ul class="nav nav-footer justify-content-center justify-content-lg-end">

<li class="nav-item">
<!-- <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a> -->
</li>
</ul>
</div>
</div>
</div>
</footer>
</div>
</main>
<div class="fixed-plugin">
<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
<i class="material-icons py-2">settings</i>
</a>
<div class="card shadow-lg">
<div class="card-header pb-0 pt-3">
<div class="float-start">
<h5 class="mt-3 mb-0">Material UI Configurator</h5>
<p>See our dashboard options.</p>
</div>
<div class="float-end mt-4">
<button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
<i class="material-icons">clear</i>
</button>
</div>

</div>
<hr class="horizontal dark my-1">
<div class="card-body pt-sm-3 pt-0">

<div>
<h6 class="mb-0">Sidebar Colors</h6>
</div>
<a href="javascript:void(0)" class="switch-trigger background-color">
<div class="badge-colors my-2 text-start">
<span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
<span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
</div>
</a>

</div>
</div>

</div>

<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="assets/js/plugins/fullcalendar.min.js"></script>

<script src="assets/js/plugins/dragula/dragula.min.js"></script>
<script src="assets/js/plugins/jkanban/jkanban.js"></script>
<script src="assets/js/plugins/chartjs.min.js"></script>
<script>
    var ctx1 = document.getElementById("chart-line-1").getContext("2d");

    var ctx2 = document.getElementById("chart-line-2").getContext("2d");

    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["A", "M", "J", "J", "A", "S", "O", "N", "D"],
        datasets: [{
          label: "Visitors",
          tension: 0.5,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#fff",
          borderWidth: 2,
          backgroundColor: "transparent",
          data: [50, 45, 60, 60, 80, 65, 90, 80, 100],
          maxBarThickness: 6,
          fill: true
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
            }
          },
        },
      },
    });

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["A", "M", "J", "J", "A", "S", "O", "N", "D"],
        datasets: [{
          label: "Income",
          tension: 0.5,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#fff",
          borderWidth: 2,
          backgroundColor: "transparent",
          data: [60, 80, 75, 90, 67, 100, 90, 110, 120],
          maxBarThickness: 6,
          fill: true
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'

            },
            ticks: {
              callback: function(value, index, values) {
                return '$' + value;
              },
              display: true,
              padding: 10,
              color: '#f8f9fa',
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
            }
          },
        },
      },
    });
  </script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="assets/js/material-dashboard.min.js?v=3.0.5"></script>
</body>
</html>