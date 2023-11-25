<?php
include '../../includes/db_functions.php';
include '../../includes/utils.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (checkToken($_SESSION["token"]) == null)
  header("Location: ../../");
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Project | MHTT</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon" />
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect" />
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../../assets/img/logo.png" alt="" />
        <span class="d-none d-lg-block">MHTT</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
        <button type="submit" title="Search">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block">
          <a class="nav-link nav-icon search-bar-toggle" href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!-- End Search Icon-->

        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span> </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>
          </ul>
          <!-- End Notification Dropdown Items -->
        </li>
        <!-- End Notification Nav -->

        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php
              $userData = getUserByID(checkToken($_SESSION['token'])['user']);
              $fullName = isset($userData['firstName']) && !empty($userData['firstName']) ? $userData['firstName'][0] . ' ' . $userData['lastName'] : '';
              echo $fullName;
              ?>
            </span> </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
                <?php
                $userData = getUserByID(checkToken($_SESSION['token'])['user']);
                $fullName = isset($userData['firstName']) && !empty($userData['firstName']) ? $userData['firstName'][0] . ' ' . $userData['lastName'] : '';
                echo $fullName;
                ?>
              </h6>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <?php
              echo '<a
                          class="dropdown-item d-flex align-items-center"
                          href="../users/edit?userwiki=' . encode(checkToken($_SESSION['token'])['user']) . '"
                        >
                          <i class="bi bi-person"></i>
                          <span>My Profile</span>
                        </a>'
                ?>
            </li>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../../">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
          <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="../projects/">
          <i class="bx bx-map-pin"></i>
          <span>Project</span>
        </a>
      </li>
      <!-- End Projects Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../users/">
          <i class="bx bx-user"></i>
          <span>Users</span>
        </a>
      </li>
      <!-- End Users Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../photos/">
          <i class="bx bx-photo-album"></i>
          <span>Photos</span>
        </a>
      </li>
      <!-- End Photos Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../map/">
          <i class="bx bx-map-alt"></i>
          <span>Maps</span>
        </a>
      </li>
      <!-- End Maps Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../../">
          <i class="bx bx-arrow-from-right"></i>
          <span>Logout</span>
        </a>
      </li>
      <!-- End Logout Page Nav -->
    </ul>
  </aside>

  <!-- End Sidebar-->
  <div class="modal fade" id="addProjectForm" tabindex="-1" aria-labelledby="addProjectFormLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
            Add Project
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="project-add-form" class="row g-3 needs-validation" novalidate>
            <div class="col-12">
              <label for="projectName" class="form-label">Project Name</label>
              <div class="input-group has-validation">
                <input type="text" name="username" class="form-control" id="projectName" placeholder="Name" required />
                <div class="invalid-feedback">Please enter Project Name.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="addressOne" class="form-label">Address 1</label>
              <div class="input-group has-validation">
                <input type="text" name="address" class="form-control" id="addressOne" placeholder="Project Address 1"
                  required />
                <div class="invalid-feedback">
                  Please enter Project Address 1.
                </div>
              </div>
            </div>
            <div class="col-12">
              <label for="addressTwo" class="form-label">Address 2</label>
              <div class="input-group has-validation">
                <input type="text" name="address" class="form-control" id="addressTwo"
                  placeholder="Project Address 2" />
                <div class="invalid-feedback">
                  Please enter Project Address 2.
                </div>
              </div>
            </div>
            <div class="col-12">
              <label for="city" class="form-label">City</label>
              <div class="input-group has-validation">
                <input type="text" name="city" class="form-control" id="city" placeholder="Name" required />
                <div class="invalid-feedback">Please enter City Name.</div>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <label for="state" class="form-label">State</label>
              <div class="input-group has-validation">
                <input type="text" name="state" class="form-control" id="state" placeholder="State" required />
                <div class="invalid-feedback">Please enter State.</div>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <label for="postalCode" class="form-label">Postal Code</label>
              <div class="input-group has-validation">
                <input type="number" name="postalCode" class="form-control" id="postalCode" placeholder="postalCode"
                  required />
                <div class="invalid-feedback">Please enter postalCode.</div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">
                Submit
              </button>
            </div>
          </form>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="d-flex justify-content-between">
        <h1>Projects</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectForm">
          <i class="bx bx-plus"></i>
          Add Project
        </button>
      </div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../">Home</a></li>
          <li class="breadcrumb-item active">Projects</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <?php
            $projects = getProjects(checkToken($_SESSION["token"])["user"]);

            foreach ($projects as $project) {

              $projectImage = getProjectOneImage($project['id']);
              $isImage = $projectImage != null && count($projectImage) > 0 ? true : false;

              echo '<div class="col-xxl-4 col-lg-6 col-md-12">
                      <div class="card info-card sales-card">
                        <div class="filter">
                         
                          <a class="icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots"></i>
                          </a>
                          <ul
                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                          >
                            <li><a class="dropdown-item" href="./edit/?pid=' . encode($project['id']) . '">Edit</a></li>
                            <li><button class="dropdown-item btn btn-link delete-project" data-target-pid="' . encode($project['id']) . '">Delete</button></li>
                          </ul>
                        </div>

                        <div class="card-body">
                          <h5 class="card-title">
                            Last Activity <span>| ' . convertTime($project['lastActivity']) . '</span>
                          </h5>';
              if ($isImage) {
                echo '<img
                        class="w-100"
                        src="' . $projectImage['url'] . '"
                        alt="Project Photo"
                        
                      />';
              } else {
                echo '<img
                                        class="w-100"
                                        src="../../assets/img/sample_image.jpg"
                                        alt="Project Photo"
                                        
                                      />';
              }

              echo '
                              <div class="d-flex align-items-center">
                                <div class="ps-3">
                                  <h6 class="fs-3">
                                    ' . $project['name'] . '
                                  </h6>
                                  <span class="text-muted small pt-2"
                                    >' . $project['addressOne'] . '</span
                                  >
                                </div>
                              </div>
                              <div class="d-flex align-items-start row">
                                <div class="d-flex flex-column col-6">
                                  <h5 class="card-title">Photos <span>| ' . getProjectImagesCount($project['id'])['count'] . '</span></h5>
                                </div>
                                <div
                                  class="d-flex flex-column justify-content-center col-6"
                                >
                                  <h5 class="card-title">Users <span>| ' . getProjectUserCount($project['id'])['count'] . '</span></h5>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer d-flex justify-content-start"> 
                              <button class="btn btn-primary px-2 py-1 text-light marker-location-btn" data-project-id=' . $project['id'] . ' data-url="../../api/get_project_markers.php" data-bs-target="#pointMapModal" data-bs-toggle="modal">
                                <i class="bx bx-map fs-5 "></i>
                              </button>
                              <button class="btn btn-primary ms-2  px-2 py-1 text-light geofence-location-btn" data-project-id=' . $project['id'] . ' data-url="../../api/get_geofence_project.php" data-bs-target="#geofenceModal" data-bs-toggle="modal">
                                <i class="bx bx-shape-polygon fs-5" ></i>
                              </button>
                            </div>
                          </div>
                          
                        </div>';
            }

            ?>
            <!-- End Sales Card -->
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>JLegacy-AI</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://github.com/JLegacy-AI">JLegacy-AI</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Modals -->
  <!-- Point Map Modal -->
  <div class="modal fade" id="pointMapModal" aria-hidden="true" aria-labelledby="pointMapModalLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-nowrap " id="pointMapModalLabel">
            <i class="bx bx-map fs-5 text-danger"></i> Location Map
          </h1>
          <input type="Text" class="form-control mx-3" id="addressSearch" placeholder="Address...">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body w-100 h-100">
          <div id="locationMap" class="w-100 h-100"></div>
        </div>
        <div class="modal-footer">
          <button id="add-markers-location" data-url="../../api/add_markers_location_project.php"
            class="btn btn-primary">Add
            Locations</button>
        </div>
      </div>
    </div>
  </div>


  <!-- prettier-ignore -->
  <script>(g => {
      var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window;
      b = b[c] || (b[c] = {});
      var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => {
        await (a = m.createElement("script"));
        e.set("libraries", [...r, 'places', 'drawing'] + ""); // Add 'places' to include the Places API
        for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
        e.set("callback", c + ".maps." + q);
        a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
        d[q] = f;
        a.onerror = () => h = n(Error(p + " could not load."));
        a.nonce = m.querySelector("script[nonce]")?.nonce || "";
        m.head.append(a);
      }));
      d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n));
    })
      ({ key: "AIzaSyA0iKmisEWJWWvZCCNem16Ii7aJS8_lo6o" });</script>


  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


  <!-- Geofence Map Modal -->
  <div class="modal fade " id="geofenceModal" aria-hidden="true" aria-labelledby="geofenceModalLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-nowrap" id="geofenceModalLabel">
            <i class="bx bx-shape-polygon fs-5 text-danger"></i> Geofence Map
          </h1>
          <input id="addressSearchGeofence" type="Text" class="form-control mx-3" placeholder="Address...">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body w-100 h-100">
          <div id="info" style="position:absolute; color:red; font-family: Arial; height:200px; font-size: 12px;"></div>
          <div id="geofenceMap" class="w-100 h-100"></div>
        </div>
        <div class="modal-footer">
          <button id="add-geofence-location" data-url="../../api/add_geofence_project.php" class="btn btn-primary">Add
            Geofence Locations</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Main JS File -->
  <script src="../../assets/js/main.js"></script>
  <script src="../../controllers/controller.js"></script>
  <script src="../../controllers/ajaxControllers.js"></script>
  <script src="../../controllers/locationMap.js"></script>
  <script src="../../controllers/polygonGeofenceMap.js"></script>
  <style>
    .pac-container {
      z-index: 100000 !important;
    }
  </style>
</body>

</html>