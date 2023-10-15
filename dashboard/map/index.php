<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Map | MHTT</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon" />
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="../../assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="../../assets/vendor/boxicons/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link
      href="../../assets/vendor/simple-datatables/style.css"
      rel="stylesheet"
    />

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
        <form
          class="search-form d-flex align-items-center"
          method="POST"
          action="#"
        >
          <input
            type="text"
            name="query"
            placeholder="Search"
            title="Enter search keyword"
          />
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
              <span class="badge bg-primary badge-number">4</span> </a
            ><!-- End Notification Icon -->

            <ul
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications"
            >
              <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"
                  ><span class="badge rounded-pill bg-primary p-2 ms-2"
                    >View all</span
                  ></a
                >
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
            <a
              class="nav-link nav-profile d-flex align-items-center pe-0"
              href="#"
              data-bs-toggle="dropdown"
            >
              <img
                src="../../assets/img/profile-img.jpg"
                alt="Profile"
                class="rounded-circle"
              />
              <span class="d-none d-md-block dropdown-toggle ps-2"
                >K. Anderson</span
              > </a
            ><!-- End Profile Iamge Icon -->

            <ul
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"
            >
              <li class="dropdown-header">
                <h6>Kevin Anderson</h6>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="users-profile.html"
                >
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="../../"
                >
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

        <li class="nav-item">
          <a class="nav-link collapsed" href="../../">
            <i class="bx bx-arrow-from-right"></i>
            <span>Logout</span>
          </a>
        </li>
        <!-- End Logout Page Nav -->
      </ul>
    </aside>

    <!-- ==== Main ==== -->
    <main id="main" class="main">
      <div class="pagetitle">
        <div class="d-flex justify-content-between">
          <h1>Maps</h1>
        </div>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Maps</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <!-- Right Side Section Start -->
      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-12">
                <div id="map"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Right Side Section -->
    </main>
    <!-- ==== End Main ==== -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>JLegacy-AI</span></strong
        >. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://github.com/JLegacy-AI">JLegacy-AI</a>
      </div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendors JS Files -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- Main JS Files -->
    <script src="../../assets/js/main.js"></script>
    <script src="../../controllers/controller.js"></script>

    <!-- Google Map Api JS Files -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      ((g) => {
        var h,
          a,
          k,
          p = "The Google Maps JavaScript API",
          c = "google",
          l = "importLibrary",
          q = "__ib__",
          m = document,
          b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
          r = new Set(),
          e = new URLSearchParams(),
          u = () =>
            h ||
            (h = new Promise(async (f, n) => {
              await (a = m.createElement("script"));
              e.set("libraries", [...r] + "");
              for (k in g)
                e.set(
                  k.replace(/[A-Z]/g, (t) => "_" + t[0].toLowerCase()),
                  g[k]
                );
              e.set("callback", c + ".maps." + q);
              a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
              d[q] = f;
              a.onerror = () => (h = n(Error(p + " could not load.")));
              a.nonce = m.querySelector("script[nonce]")?.nonce || "";
              m.head.append(a);
            }));
        d[l]
          ? console.warn(p + " only loads once. Ignoring:", g)
          : (d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)));
      })({ key: "AIzaSyA5PfF6fFvdx9PnfhhLRJVtlgj29pbMlpo", v: "weekly" });
    </script>
    <script src="../../controllers/googleMapAPIForDisplay.js"></script>
  </body>
</html>
