<?php
include("config.php");

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





  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <link id="pagestyle" href="assets/css/material-dashboard.min.css?v=3.0.5" rel="stylesheet" />

  <style>
    .async-hide {
      opacity: 0 !important
    }

    #ofBar {
      display: none !important;
    }

    .form-group>input {
      border: solid 1px #9093A5;
    }

    .form-group>textarea {
      border: solid 1px #9093A5;
    }
  </style>

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main" style="background-color:#000">
    <div class="sidenav-header">
      <h3 style="color: #fff;padding: 20px;">Stolen Cars</h3>
    </div>



    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="reports.php">
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

    <nav
      class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky"
      id="navbarBlur" data-scroll="true">
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
              <a href="pages/authentication/signin/illustration.html" class="nav-link text-body p-0 position-relative"
                target="_blank">
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
              <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons cursor-pointer">
                  notifications
                </i>
                <span
                  class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger border border-white small py-1 px-2">
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

      <h1 style="color:#000"> &nbsp;&nbsp; &nbsp;&nbsp;Summary Report</h1>
      <br>
      <br>
      <div class="row">
        <div class="col-lg-6 col-md-4 col-sm-3 mt-lg-0 mt-4">
          <div class="card ">
            <div class="card-header p-3 pt-2 bg-transparent">
              <div class="icon icon-lg icon-shape bg-gradient-info text-center border-radius-xl mt-n4 position-absolute"
                style="background-color: #000!important;background-image: unset;">
                <i
                  class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">directions_car</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-md mb-0 text-capitalize ">Total Registered Vechicles</p>
                <br>

                <h3 class="mb-0 ">
                  <?php function lastID($dbConn)
                  {

                    $sql = "SELECT count(*) FROM missing_record";
                    $result = $dbConn->prepare($sql);
                    $result->execute();
                    return $result->fetchColumn();
                  }
                  echo lastID($dbConn);
                  ?>
                </h3>
              </div>
            </div>

          </div>
        </div>
        <hr>
        <div class="col-lg-6 col-md-4 col-sm-3 mt-lg-0 mt-4">
          <div class="card ">
            <div class="card-header p-3 pt-2 bg-transparent">
              <div class="icon icon-lg icon-shape bg-gradient-info text-center border-radius-xl mt-n4 position-absolute"
                style="background-color: #000!important;background-image: unset;">
                <i
                  class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">flag_circle</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-md mb-0 text-capitalize ">Total Vechicles Detected</p>
                <br>

                <h3 class="mb-0 ">
                  <?php function lastID1($dbConn)
                  {

                    $sql = "SELECT count(*) FROM scan";
                    $result = $dbConn->prepare($sql);
                    $result->execute();
                    return $result->fetchColumn();
                  }
                  echo lastID1($dbConn);
                  ?>
                </h3>
              </div>
            </div>

          </div>
        </div>


        <hr>
        <div class="col-lg-6 col-md-4 col-sm-3 mt-lg-0 mt-4">
          <div class="card ">
            <div class="card-header p-3 pt-2 bg-transparent">
              <div class="icon icon-lg icon-shape bg-gradient-info text-center border-radius-xl mt-n4 position-absolute"
                style="background-color: #000!important;background-image: unset;">
                <i
                  class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">query_stats</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-md mb-0 text-capitalize ">Total Vechicles Found</p>
                <br>

                <h3 class="mb-0 ">
                  <?php function lastID2($dbConn)
                  {

                    $sql = "SELECT count(*) FROM missing_record WHERE report_status='FOUND'";
                    $result = $dbConn->prepare($sql);
                    $result->execute();
                    return $result->fetchColumn();
                  }
                  echo lastID2($dbConn);
                  ?>
                </h3>
              </div>
            </div>

          </div>

        </div>

        <hr>
        <div class="col-lg-6 col-md-4 col-sm-3 mt-lg-0 mt-4">
          <div class="card ">
            <div class="card-header p-3 pt-2 bg-transparent">
              <div class="icon icon-lg icon-shape bg-gradient-info text-center border-radius-xl mt-n4 position-absolute"
                style="background-color: #000!important;background-image: unset;">
                <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">wifi_find</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-md mb-0 text-capitalize ">Total Vechicles Searching</p>
                <br>

                <h3 class="mb-0 ">
                  <?php function lastID3($dbConn)
                  {

                    $sql = "SELECT count(*) FROM missing_record WHERE report_status='SEARCHING'";
                    $result = $dbConn->prepare($sql);
                    $result->execute();
                    return $result->fetchColumn();
                  }
                  echo lastID3($dbConn);
                  ?>
                </h3>
              </div>
            </div>

          </div>
        </div>


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
            <span class="badge filter bg-gradient-primary active" data-color="primary"
              onclick="sidebarColor(this)"></span>
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
              callback: function (value, index, values) {
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