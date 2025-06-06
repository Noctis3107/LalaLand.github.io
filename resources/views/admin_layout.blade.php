<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5"
    />
    <meta name="author" content="Admin Dashboard" />
    <meta
      name="keywords"
      content="Admin Dashboard, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"
    />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.Admin Dashboard.io/" />

    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <link href="{{ asset('backend/css/app.css')}}" rel="stylesheet" />
    <link href="{{ asset('backend/css/style.css')}}" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <div class="wrapper">
      <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
          <a class="sidebar-brand" href="{{URL::to('/dashboard')}}">
            <span class="align-middle">LalaLand</span>
          </a>

          <ul class="sidebar-nav">
            <li class="sidebar-header">Pages</li>
        
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{URL::to('/dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>
        
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{URL::to('/admin/product')}}">
                    <i class="align-middle" data-feather="box"></i>
                    <span class="align-middle">Products</span>
                </a>
            </li>
        
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{URL::to('/admin/danhmuc')}}">
                    <i class="align-middle" data-feather="tag"></i>
                    <span class="align-middle">Categories</span>
                </a>
            </li>
        
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{URL::to('/admin/orders')}}">
                    <i class="align-middle me-2" data-feather="package"></i>
                    <span class="align-middle">Orders</span>
                </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{URL::to('/admin/customers')}}">
                  <i class="align-middle me-2" data-feather="user"></i>
                  <span class="align-middle">Customers</span>
              </a>
            </li>

        
            
        </ul>
        

        </div>
      </nav>

      <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
          <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
          </a>

          <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">

              <li class="nav-item dropdown">

                <a
                  class="nav-link dropdown-toggle d-none d-sm-inline-block"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <img
                    src="{{ asset('backend/img/avatars/avatar.jpg')}}"
                    class="avatar img-fluid rounded-circle me-1"
                    alt="Admin img"
                  />
                  <span class="text-dark">
                    {{Auth::user()->hoten}}
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ URL::to('/admin_logout')}}"><i class="align-middle me-2" data-feather="log-out"></i> <span class="align-middle">log-out</span></a>
                </div>
              </li>
            </ul>
          </div>
        </nav>

        <main class="content">
            <!--Noi dung-->
            @yield('admin_content')
            
        </main>

        <footer class="footer">
          <div class="container-fluid">
            <div class="row text-muted">
              <div class="col-6 text-start">
                
              </div>
             
            </div>
          </div>
        </footer>
      </div>
    </div>

    <script src="{{ asset('backend/js/app.js')}}"></script>

    <style>
      .dropdown-menu.show {
          display: block;
      }
    </style>

  <script>

  // Lấy phần tử dropdown-menu-end
  const drop = document.querySelector('.nav-link.dropdown-toggle');
  const dropdownMenu = document.querySelector('.dropdown-menu-end');

  // Thêm sự kiện click
  drop.addEventListener('click', function(event) {
      // Ngăn chặn hành vi mặc định của sự kiện click
      event.preventDefault();
      // Toggle hiển thị/ẩn thẻ có class là .dropdown-menu.dropdown-menu-end.show
      dropdownMenu.classList.toggle('show');
      // Thêm thuộc tính data-bs-popper với giá trị "static"
      dropdownMenu.setAttribute('data-bs-popper', 'static');
  });

// Get current URL
var currentUrl = window.location.href;

// Select all sidebar links
var sidebarLinks = document.querySelectorAll('.sidebar-link');

// Loop through each link
sidebarLinks.forEach(function(link) {
    // Check if the link's href matches the current URL
    if (link.href === currentUrl) {
        // Add 'active' class to parent sidebar-item
        link.closest('.sidebar-item').classList.add('active');
    }

    // Add event listener to each link
    link.addEventListener('click', function() {
        // Remove 'active' class from all sidebar-items
        document.querySelectorAll('.sidebar-item').forEach(function(item) {
            item.classList.remove('active');
        });
        // Add 'active' class to clicked sidebar-item
        link.closest('.sidebar-item').classList.add('active');
    });
});



  </script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Line chart
			new Chart(document.getElementById("chartjs-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: "transparent",
						borderColor: window.theme.primary,
						data: [2115, 1562, 1584, 1892, 1487, 2223, 2966, 2448, 2905, 3838, 2917, 3327]
					}, {
						label: "Orders",
						fill: true,
						backgroundColor: "transparent",
						borderColor: "#adb5bd",
						borderDash: [4, 4],
						data: [958, 724, 629, 883, 915, 1214, 1476, 1212, 1554, 2128, 1466, 1827]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.05)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 500
							},
							display: true,
							borderDash: [5, 5],
							gridLines: {
								color: "rgba(0,0,0,0)",
								fontColor: "#fff"
							}
						}]
					}
				}
			});
		});
	</script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var ctx = document
          .getElementById("chartjs-dashboard-line")
          .getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
          type: "line",
          data: {
            labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            datasets: [
              {
                label: "Sales ($)",
                fill: true,
                backgroundColor: gradient,
                borderColor: window.theme.primary,
                data: [
                  2115, 1562, 1584, 1892, 1587, 1923, 2566, 2448, 2805, 3438,
                  2917, 3327,
                ],
              },
            ],
          },
          options: {
            maintainAspectRatio: false,
            legend: {
              display: false,
            },
            tooltips: {
              intersect: false,
            },
            hover: {
              intersect: true,
            },
            plugins: {
              filler: {
                propagate: false,
              },
            },
            scales: {
              xAxes: [
                {
                  reverse: true,
                  gridLines: {
                    color: "rgba(0,0,0,0.0)",
                  },
                },
              ],
              yAxes: [
                {
                  ticks: {
                    stepSize: 1000,
                  },
                  display: true,
                  borderDash: [3, 3],
                  gridLines: {
                    color: "rgba(0,0,0,0.0)",
                  },
                },
              ],
            },
          },
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
          type: "pie",
          data: {
            labels: ["Chrome", "Firefox", "IE"],
            datasets: [
              {
                data: [4306, 3801, 1689],
                backgroundColor: [
                  window.theme.primary,
                  window.theme.warning,
                  window.theme.danger,
                ],
                borderWidth: 5,
              },
            ],
          },
          options: {
            responsive: !window.MSInputMethodContext,
            maintainAspectRatio: false,
            legend: {
              display: false,
            },
            cutoutPercentage: 75,
          },
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
          type: "bar",
          data: {
            labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            datasets: [
              {
                label: "This year",
                backgroundColor: window.theme.primary,
                borderColor: window.theme.primary,
                hoverBackgroundColor: window.theme.primary,
                hoverBorderColor: window.theme.primary,
                data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                barPercentage: 0.75,
                categoryPercentage: 0.5,
              },
            ],
          },
          options: {
            maintainAspectRatio: false,
            legend: {
              display: false,
            },
            scales: {
              yAxes: [
                {
                  gridLines: {
                    display: false,
                  },
                  stacked: false,
                  ticks: {
                    stepSize: 20,
                  },
                },
              ],
              xAxes: [
                {
                  stacked: false,
                  gridLines: {
                    color: "transparent",
                  },
                },
              ],
            },
          },
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var markers = [
          {
            coords: [31.230391, 121.473701],
            name: "Shanghai",
          },
          {
            coords: [28.70406, 77.102493],
            name: "Delhi",
          },
          {
            coords: [6.524379, 3.379206],
            name: "Lagos",
          },
          {
            coords: [35.689487, 139.691711],
            name: "Tokyo",
          },
          {
            coords: [23.12911, 113.264381],
            name: "Guangzhou",
          },
          {
            coords: [40.7127837, -74.0059413],
            name: "New York",
          },
          {
            coords: [34.052235, -118.243683],
            name: "Los Angeles",
          },
          {
            coords: [41.878113, -87.629799],
            name: "Chicago",
          },
          {
            coords: [51.507351, -0.127758],
            name: "London",
          },
          {
            coords: [40.416775, -3.70379],
            name: "Madrid ",
          },
        ];
        var map = new jsVectorMap({
          map: "world",
          selector: "#world_map",
          zoomButtons: true,
          markers: markers,
          markerStyle: {
            initial: {
              r: 9,
              strokeWidth: 7,
              stokeOpacity: 0.4,
              fill: window.theme.primary,
            },
            hover: {
              fill: window.theme.primary,
              stroke: window.theme.primary,
            },
          },
          zoomOnScroll: false,
        });
        window.addEventListener("resize", () => {
          map.updateSize();
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
        var defaultDate =
          date.getUTCFullYear() +
          "-" +
          (date.getUTCMonth() + 1) +
          "-" +
          date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
          inline: true,
          prevArrow: '<span title="Previous month">&laquo;</span>',
          nextArrow: '<span title="Next month">&raquo;</span>',
          defaultDate: defaultDate,
        });
      });
    </script>
  </body>
</html>
