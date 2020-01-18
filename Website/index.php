<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>People Analytics - Dashboard</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/r-2.2.3/rg-1.1.1/sc-2.0.1/datatables.min.css" />
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- scripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


  <!--  -->
</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <!-- <div id="wrapper">
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      </ul> -->
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
          


<!-- $conn = mysqli_connect("35.224.164.95", "root", "navin1234","count") or die ("error".mysqli_error()); -->


      <!-- <script>
      // $( document ).ready(function() {
      //   day()
      //   console.log('Up and running')
      // });
      window.onload = function () {
        run()
        day()
        pie()
        week()
        month()
        // go()
      }
      </script> -->
      <!-- Topbar -->
      <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
      <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> -->
      <!-- <i class="fa fa-bars"></i> -->
      <!-- </button> -->



      <!-- </ul> -->

      <!-- </nav> -->
      <!-- End of Topbar -->

      <!-- Begin Page Content -->

      
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">People Analytics Dashboard</h1>
          <a href="https://storage.googleapis.com/library-258507.appspot.com/2019.csv" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Download CSV File</a>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Yesterday's visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            1,062                    </div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            1,064                    </div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Daily average this month</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      
                                            1,064.00                    </div>
                  </div>
                  <div class="col-auto">
                    <a href="#average"><i class="fas fa-walking fa-2x text-gray-300"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- People (Weekly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Last week's visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                             7,378


                    </div>
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">This week's visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                                                 7,476


                    </div>
                  </div>
                  <div class="col-auto">
                    <a href="#average"><i class="fas fa-walking fa-2x text-gray-300"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- People (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Last month's visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">                                                                           30,090                    </div>
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">This month's visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> 32,984                    </div>
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Monthly Average this year</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                                              22,204.17
                    </div>
                  </div>
                  <div class="col-auto">
                    <a href="#average"><i class="fas fa-walking fa-2x text-gray-300"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Last year's visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      0                    </div>
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">This year's visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">266,450</div>
                  </div>
                  <div class="col-auto">
                    <a href="#year"><i class="fas fa-walking fa-2x text-gray-300"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->

        <div class="row">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Today</h6>
              </div>
              <div class="card-body">
                <div class="chart-bar">
                  <div id="dayChart" style="height: 300px; width: 100%;"></div>
                                    
                                    


                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Today
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> Yesterday
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">This week</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-bar">
                  <div id="drillchart" style="height: 300px; width: 100%;"></div>
                  <button class="btn invisible" id="backButton">&lt; Back</button>
                  
                  
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> This Week
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Day of week with most visitors overall</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-bar">
                  <div id="pieChart" style="height: 300px; width: 100%;"></div>
                  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                                                                                            
                </div>
                <!-- <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Monday
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-warning"></i> Tuesday
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> Wednesday
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Thursday
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-secondary"></i> Friday
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-gray-300"></i> Saturday
                  </span>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <!-- Area Chart -->
        <div class="row">
          <a id="year"></a>
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Weekly trend</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-bar">
                  
                  <div id="chartContainer" style="height: 300px; width: 100%;"></div>

                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Total: 266,450                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Monthly trend</h6>
              </div>
              <div class="card-body">
                <div class="chart-bar">
                  <div id="monthly" style="height: 300px; width: 100%;"></div>
                  
                                                                        
                                                                                                                                                
                </div>
                <hr>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Total: 266,450                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="input-append date" id="datepicker" data-date="01-2020" 
         data-date-format="mm-yyyy">

        <input  type="text" readonly="readonly" name="date" >	  
        <span class="add-on"><i class="icon-th"></i></span>	  
          </div>	
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">People Analytics Report</h1>
        </div>
        
        <div class="row">
          
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            1,062                    </div>
                    
                  </div>
                  <div class="col-auto">
                    <a href="#average"><i class="fas fa-walking fa-2x text-gray-300"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- People (Weekly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Previous month's visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">                                                 1,040


                    </div>
                  </div>
                  <div class="col-auto">
                    <a href="#average"><i class="fas fa-walking fa-2x text-gray-300"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Day with most visitors</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> 15 : 200 Visitors  </div>
                  </div>
                  <div class="col-auto">
                    <a href="#average"><i class="fas fa-walking fa-2x text-gray-300"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row">
          <a id="year"></a>
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Weekly trend</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-bar">
                  
                  <div id="chart2Container" style="height: 300px; width: 100%;"></div>

                </div>
              </div>
            </div>
          </div>
     
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Day of week with most visitors overall</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-bar">
                  <div id="pie2Chart" style="height: 300px; width: 100%;"></div>
                  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                                                                                            
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <a id="year"></a>
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daily trend</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-bar">
                  
                  <div id="chart3Container" style="height: 300px; width: 100%;"></div>

                </div>
              </div>
            </div>
          </div>
      </div>
     
          
        </div>
      </div>
      <!-- DataTables Example -->

      <!-- /.container-fluid -->
      <!-- Content Row -->

        <!-- Content Row -->
        
        <!-- Area Chart -->
        
      </div>

      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script>
    function day(result) {
      var thismorn = JSON.parse(350);
      var thisaft = JSON.parse(714);
      var yestmorn = 349;
      var yestaft = 713;
      CanvasJS.addColorSet("redblue",
        [ //colorSet Array

          "#4e73df",
          "#F04444",
        ]);
      //Better to construct options first and then pass it as a parameter
      var options = {
        colorSet: "redblue",
        title: {
          text: ""
        },
        data: [{
          // Change type to "doughnut", "line", "splineArea", etc.
          type: "column",
          dataPoints: [{
              label: "This morning",
              y: thismorn
            },
            {
              label: "Yesterday morning",
              y: yestmorn
            },
            {
              label: "This afternoon",
              y: thisaft
            },
            {
              label: "Yesterday afternoon",
              y: yestaft
            }
          ]
        }]
      };

      $("#dayChart").CanvasJSChart(options);
    }
  </script>
  <script>
    function weekly(result) {
      var weeks = [{"x":0,"y":1850},{"x":1,"y":2674},{"x":2,"y":2772},{"x":3,"y":2870},{"x":4,"y":2968},{"x":5,"y":3066},{"x":6,"y":3164},{"x":7,"y":3262},{"x":8,"y":3360},{"x":9,"y":3458},{"x":10,"y":3556},{"x":11,"y":3654},{"x":12,"y":3752},{"x":13,"y":3850},{"x":14,"y":3948},{"x":15,"y":4046},{"x":16,"y":4144},{"x":17,"y":4242},{"x":18,"y":4340},{"x":19,"y":4438},{"x":20,"y":4536},{"x":21,"y":4634},{"x":22,"y":4732},{"x":23,"y":4830},{"x":24,"y":4928},{"x":25,"y":5026},{"x":26,"y":5124},{"x":27,"y":5222},{"x":28,"y":5320},{"x":29,"y":5418},{"x":30,"y":5516},{"x":31,"y":5614},{"x":32,"y":5712},{"x":33,"y":5810},{"x":34,"y":5908},{"x":35,"y":6006},{"x":36,"y":6104},{"x":37,"y":6202},{"x":38,"y":6300},{"x":39,"y":6398},{"x":40,"y":6496},{"x":41,"y":6594},{"x":42,"y":6692},{"x":43,"y":6790},{"x":44,"y":6888},{"x":45,"y":6986},{"x":46,"y":7084},{"x":47,"y":7182},{"x":48,"y":7280},{"x":49,"y":7378},{"x":50,"y":7476},{"x":51,"y":7574},{"x":52,"y":3276}];
      // CanvasJS.addColorSet("redblue",
      //   [ //colorSet Array

      //     "#4e73df",
      //     "#F04444",
      //   ]);
      var options = {
        // colorSet: "redblue",
        title: {
          text: ""
        },
        data: [{
          // Change type to "doughnut", "line", "splineArea", etc.
          type: "column",
          dataPoints: [{"x":0,"y":1850},{"x":1,"y":2674},{"x":2,"y":2772},{"x":3,"y":2870},{"x":4,"y":2968},{"x":5,"y":3066},{"x":6,"y":3164},{"x":7,"y":3262},{"x":8,"y":3360},{"x":9,"y":3458},{"x":10,"y":3556},{"x":11,"y":3654},{"x":12,"y":3752},{"x":13,"y":3850},{"x":14,"y":3948},{"x":15,"y":4046},{"x":16,"y":4144},{"x":17,"y":4242},{"x":18,"y":4340},{"x":19,"y":4438},{"x":20,"y":4536},{"x":21,"y":4634},{"x":22,"y":4732},{"x":23,"y":4830},{"x":24,"y":4928},{"x":25,"y":5026},{"x":26,"y":5124},{"x":27,"y":5222},{"x":28,"y":5320},{"x":29,"y":5418},{"x":30,"y":5516},{"x":31,"y":5614},{"x":32,"y":5712},{"x":33,"y":5810},{"x":34,"y":5908},{"x":35,"y":6006},{"x":36,"y":6104},{"x":37,"y":6202},{"x":38,"y":6300},{"x":39,"y":6398},{"x":40,"y":6496},{"x":41,"y":6594},{"x":42,"y":6692},{"x":43,"y":6790},{"x":44,"y":6888},{"x":45,"y":6986},{"x":46,"y":7084},{"x":47,"y":7182},{"x":48,"y":7280},{"x":49,"y":7378},{"x":50,"y":7476},{"x":51,"y":7574},{"x":52,"y":3276}]        }]
      };

      $("#chartContainer").CanvasJSChart(options);
    }
  </script>
  <script>
    function weekly2(result) {
      var weeks = [{"x":0,"y":1850},{"x":1,"y":2674},{"x":2,"y":2772},{"x":3,"y":2870},{"x":4,"y":2968}];
      // CanvasJS.addColorSet("redblue",
      //   [ //colorSet Array

      //     "#4e73df",
      //     "#F04444",
      //   ]);
      var options = {
        // colorSet: "redblue",
        title: {
          text: ""
        },
        data: [{
          // Change type to "doughnut", "line", "splineArea", etc.
          type: "column",
          dataPoints: [{"x":0,"y":1850},{"x":1,"y":2674},{"x":2,"y":2772},{"x":3,"y":2870},{"x":4,"y":2968}]        }]
      };

      $("#chart2Container").CanvasJSChart(options);
    }
  </script>
   <script>
    function weekly3(result) {
      var weeks = [{"x":1,"y":221},{"x":2,"y":321},{"x":3,"y":324},{"x":4,"y":341}
      ,{"x":5,"y":123},{"x":6,"y":224},{"x":7,"y":222},{"x":8,"y":431},{"x":9,"y":312},
      {"x":10,"y":321},{"x":11,"y":521},{"x":12,"y":111},{"x":13,"y":442},{"x":14,"y":234},
      {"x":15,"y":123},{"x":16,"y":231},{"x":17,"y":32},{"x":18,"y":235},{"x":19,"y":211},
      {"x":20,"y":342},{"x":21,"y":432},{"x":22,"y":50},{"x":23,"y":289},{"x":24,"y":79}
      ,{"x":25,"y":300},{"x":26,"y":221},{"x":27,"y":112},{"x":28,"y":187},{"x":29,"y":90},
      {"x":30,"y":200},{"x":31,"y":200}];
      // CanvasJS.addColorSet("redblue",
      //   [ //colorSet Array

      //     "#4e73df",
      //     "#F04444",
      //   ]);
      var options = {
        // colorSet: "redblue",
        title: {
          text: ""
        },
        data: [{
          // Change type to "doughnut", "line", "splineArea", etc.
          type: "column",
          dataPoints: [{"x":0,"y":221},{"x":1,"y":111},{"x":2,"y":321},{"x":3,"y":324},{"x":4,"y":341}
      ,{"x":1,"y":123},{"x":2,"y":224},{"x":3,"y":222},{"x":4,"y":431},{"x":1,"y":312},
      {"x":2,"y":321},{"x":3,"y":521},{"x":4,"y":111},{"x":1,"y":442},{"x":2,"y":234},
      {"x":3,"y":123},{"x":4,"y":231},{"x":1,"y":32},{"x":2,"y":235},{"x":3,"y":211},
      {"x":4,"y":342},{"x":1,"y":432},{"x":2,"y":50},{"x":3,"y":289},{"x":4,"y":79}
      ,{"x":1,"y":300},{"x":2,"y":221},{"x":3,"y":112},{"x":4,"y":187},{"x":1,"y":90},
      {"x":2,"y":200},{"x":1,"y":100}] }]
      };
      
      $("#chart3Container").CanvasJSChart(options);
    }
  </script>
  <script>
    function weekday(result) {
      var tweek = [{"total":1062,"morning":349,"afternoon":713},{"total":1064,"morning":350,"afternoon":714},{"total":1066,"morning":351,"afternoon":715},{"total":1068,"morning":352,"afternoon":716},{"total":1070,"morning":353,"afternoon":717},{"total":1072,"morning":354,"afternoon":718},{"total":1074,"morning":355,"afternoon":719}];
      var lweek = [{"total":1048,"morning":342,"afternoon":706},{"total":1050,"morning":343,"afternoon":707},{"total":1052,"morning":344,"afternoon":708},{"total":1054,"morning":345,"afternoon":709},{"total":1056,"morning":346,"afternoon":710},{"total":1058,"morning":347,"afternoon":711},{"total":1060,"morning":348,"afternoon":712}];


      var visitorsData = {
        "This week": [{
          click: visitorsChartDrilldownHandler,
          cursor: "pointer",
          type: "column",
          dataPoints: [{
              y: tweek[0]['total'],
              name: "This Monday",
              label: "Monday",
              color: "#4e73df"
            },
            {
              y: lweek[0]['total'],
              name: "Last Monday",
              label: "Monday",
              color: "#F04444"
            },
            {
              y: tweek[1]['total'],
              name: "This Tuesday",
              label: "Tuesday",
              color: "#4e73df"
            },
            {
              y: lweek[1]['total'],
              name: "Last Tuesday",
              label: "Tuesday",
              color: "#F04444"
            },
            {
              y: tweek[2]['total'],
              name: "This Wednesday",
              label: "Wednesday",
              color: "#4e73df"
            },
            {
              y: lweek[2]['total'],
              name: "Last Wednesday",
              label: "Wednesday",
              color: "#F04444"
            },
            {
              y: tweek[3]['total'],
              name: "This Thursday",
              label: "Thursday",
              color: "#4e73df"
            },
            {
              y: lweek[3]['total'],
              name: "Last Thursday",
              label: "Thursday",
              color: "#F04444"
            },
            {
              y: tweek[4]['total'],
              name: "This Friday",
              label: "Friday",
              color: "#4e73df"
            },
            {
              y: lweek[4]['total'],
              name: "Last Friday",
              label: "Friday",
              color: "#F04444"
            },
            {
              y: tweek[5]['total'],
              name: "This Saturday",
              label: "Saturday",
              color: "#4e73df"
            },
            {
              y: lweek[5]['total'],
              name: "Last Saturday",
              label: "Saturday",
              color: "#F04444"
            }
          ]
        }],
        "This Monday": [{
          color: "#E7823A",
          name: "This Monday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: tweek[0]['morning']
            },
            {
              label: 'Afternoon',
              y: tweek[0]['afternoon']
            }
          ]
        }],
        "Last Monday": [{
          color: "#E7823A",
          name: "Last Monday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: lweek[0]['morning']
            },
            {
              label: 'Afternoon',
              y: lweek[0]['afternoon']
            }
          ]
        }],
        "This Tuesday": [{
          color: "#E7823A",
          name: "This Tuesday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: tweek[1]['morning']
            },
            {
              label: 'Afternoon',
              y: tweek[1]['afternoon']
            }
          ]
        }],
        "Last Tuesday": [{
          color: "#E7823A",
          name: "Last Tuesday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: lweek[1]['morning']
            },
            {
              label: 'Afternoon',
              y: lweek[1]['afternoon']
            }
          ]
        }],
        "This Wednesday": [{
          color: "#E7823A",
          name: "This Wednesday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: tweek[2]['morning']
            },
            {
              label: 'Afternoon',
              y: tweek[2]['afternoon']
            }
          ]
        }],
        "Last Wednesday": [{
          color: "#E7823A",
          name: "Last Wednesday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: lweek[2]['morning']
            },
            {
              label: 'Afternoon',
              y: lweek[2]['afternoon']
            }
          ]
        }],
        "This Thursday": [{
          color: "#E7823A",
          name: "This Thursday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: tweek[3]['morning']
            },
            {
              label: 'Afternoon',
              y: tweek[3]['afternoon']
            }
          ]
        }],
        "Last Thursday": [{
          color: "#E7823A",
          name: "Last Thursday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: lweek[3]['morning']
            },
            {
              label: 'Afternoon',
              y: lweek[3]['afternoon']
            }
          ]
        }],
        "This Friday": [{
          color: "#E7823A",
          name: "This Friday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: tweek[4]['morning']
            },
            {
              label: 'Afternoon',
              y: tweek[4]['afternoon']
            }
          ]
        }],
        "Last Friday": [{
          color: "#E7823A",
          name: "Last Friday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: lweek[4]['morning']
            },
            {
              label: 'Afternoon',
              y: lweek[4]['afternoon']
            }
          ]
        }],
        "This Saturday": [{
          color: "#E7823A",
          name: "This Saturday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: tweek[5]['morning']
            },
            {
              label: 'Afternoon',
              y: tweek[5]['afternoon']
            }
          ]
        }],
        "Last Saturday": [{
          color: "#E7823A",
          name: "Last Saturday",
          type: "column",
          dataPoints: [{
              label: 'Morning',
              y: lweek[5]['morning']
            },
            {
              label: 'Afternoon',
              y: lweek[5]['afternoon']
            }
          ]
        }],
      };

      var newVSReturningVisitorsOptions = {
        animationEnabled: true,
        theme: "light2",
        title: {
          text: ""
        },
        subtitles: [{
          text: "Click on dataPoints to drill down"
        }],

        data: []
      };

      var visitorsDrilldownedChartOptions = {
        animationEnabled: true,
        theme: "light2",
        axisX: {
          labelFontColor: "#717171",
          lineColor: "#a2a2a2",
          tickColor: "#a2a2a2"
        },
        axisY: {
          gridThickness: 0,
          includeZero: false,
          labelFontColor: "#717171",
          lineColor: "#a2a2a2",
          tickColor: "#a2a2a2",
          lineThickness: 1
        },
        data: []
      };

      var visitorsDrilldownedChartOptions = {
        animationEnabled: true,
        theme: "light2",
        axisX: {
          labelFontColor: "#717171",
          lineColor: "#a2a2a2",
          tickColor: "#a2a2a2"
        },
        axisY: {
          gridThickness: 0,
          includeZero: false,
          labelFontColor: "#717171",
          lineColor: "#a2a2a2",
          tickColor: "#a2a2a2",
          lineThickness: 1
        },
        data: []
      };

      newVSReturningVisitorsOptions.data = visitorsData["This week"];
      $("#drillchart").CanvasJSChart(newVSReturningVisitorsOptions);

      function visitorsChartDrilldownHandler(e) {
        e.chart.options = visitorsDrilldownedChartOptions;
        e.chart.options.data = visitorsData[e.dataPoint.name];
        e.chart.options.title = {
          text: e.dataPoint.name
        }
        e.chart.render();
        $("#backButton").toggleClass("invisible");
      }

      $("#backButton").click(function() {
        $(this).toggleClass("invisible");
        newVSReturningVisitorsOptions.data = visitorsData["This week"];
        $("#drillchart").CanvasJSChart(newVSReturningVisitorsOptions);
      });

    }
  </script>
  <style>
    #backButton {
      border-radius: 4px;
      padding: 8px;
      border: none;
      font-size: 16px;
      background-color: #2eacd1;
      color: white;
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }

    .invisible {
      display: none;
    }
  </style>



  <script>
    function pie(result) {
      var monday = 5320;
      var tuesday = 5330;
      var wednesday = 4244;
      var thursday = 4252;
      var friday = 4260;
      var saturday = 4268;

      var options = {
        title: {
          text: ""
        },
        data: [{
          type: "pie",
          startAngle: 45,
          showInLegend: "true",
          legendText: "{label}",
          indexLabel: "{label} ({y})",
          yValueFormatString: "#,##0.#" % "",
          dataPoints: [{
              label: "Monday",
              y: monday
            },
            {
              label: "Tuesday",
              y: tuesday
            },
            {
              label: "Wednesday",
              y: wednesday
            },
            {
              label: "Thursday",
              y: thursday
            },
            {
              label: "Friday",
              y: friday
            },
            {
              label: "Saturday",
              y: saturday
            }
          ]
        }]
      };
      $("#pieChart").CanvasJSChart(options);
    }
  </script>
  <script>
    function pie2(result) {
      var monday = 5320;
      var tuesday = 5330;
      var wednesday = 4244;
      var thursday = 4252;
      var friday = 4260;
      var saturday = 4268;

      var options = {
        title: {
          text: ""
        },
        data: [{
          type: "pie",
          startAngle: 45,
          showInLegend: "true",
          legendText: "{label}",
          indexLabel: "{label} ({y})",
          yValueFormatString: "#,##0.#" % "",
          dataPoints: [{
              label: "Monday",
              y: monday
            },
            {
              label: "Tuesday",
              y: tuesday
            },
            {
              label: "Wednesday",
              y: wednesday
            },
            {
              label: "Thursday",
              y: thursday
            },
            {
              label: "Friday",
              y: friday
            },
            {
              label: "Saturday",
              y: saturday
            }
          ]
        }]
      };
      $("#pie2Chart").CanvasJSChart(options);
    }
  </script>
  <script>
    function monthly() {
      var jan = 12276;
      //Better to construct options first and then pass it as a parameter
      var options = {
        title: {
          text: ""
        },
        data: [{
          // Change type to "doughnut", "line", "splineArea", etc.
          type: "column",
          dataPoints: [{"x":1,"y":12276},{"x":2,"y":12740},{"x":3,"y":15934},{"x":4,"y":17250},{"x":5,"y":19716},{"x":6,"y":20910},{"x":7,"y":23498},{"x":8,"y":25420},{"x":9,"y":26430},{"x":10,"y":29202},{"x":11,"y":30090},{"x":12,"y":32984}]        }]
      };

      $("#monthly").CanvasJSChart(options);
    }
  </script>
  <script>
    function datetime() {}
      $("#datepicker").datepicker( {
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
      });
    }
  </script>
  <!-- Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script> -->
  <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="vendor/datatables/datetime-moment.js"></script>
  <script src="vendor/datatables/moment.min.js"></script>
  <script src="vendor/datatables/moment.js"></script> -->


  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/datatables-demo.js"></script> -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/r-2.2.3/rg-1.1.1/sc-2.0.1/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/sorting/datetime-moment.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script> -->
  <!-- <script src="js/demo/chart-bar-demo.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/excanvas.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script> -->
  <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    window.onload = function() {
      day(null);
      weekday([{"total":1062,"morning":349,"afternoon":713},{"total":1064,"morning":350,"afternoon":714},{"total":1066,"morning":351,"afternoon":715},{"total":1068,"morning":352,"afternoon":716},{"total":1070,"morning":353,"afternoon":717},{"total":1072,"morning":354,"afternoon":718},{"total":1074,"morning":355,"afternoon":719}]);
      pie(5320);
      weekly(null);
      monthly([{"x":1,"y":12276},{"x":2,"y":12740},{"x":3,"y":15934},{"x":4,"y":17250},{"x":5,"y":19716},{"x":6,"y":20910},{"x":7,"y":23498},{"x":8,"y":25420},{"x":9,"y":26430},{"x":10,"y":29202},{"x":11,"y":30090},{"x":12,"y":32984}]);
      weekly2(null);
      pie2(null);
      weekly3(null);
      datetime();
    }
  </script>
</body>

</html>