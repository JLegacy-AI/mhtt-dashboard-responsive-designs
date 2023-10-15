<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Photo | MHTT</title>
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

    <main id="main" class="main">
      <div class="pagetitle">
        <div class="d-flex justify-content-between">
          <h1>Photos</h1>
          <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#addPhotoModal"
          >
            <i class="bx bx-plus"></i>
            Add Photos
          </button>
        </div>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Photos</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">
          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"
                      ><i class="bi bi-three-dots"></i
                    ></a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                    >
                      <li><a class="dropdown-item" href="./edit/">Edit</a></li>
                      <li><a class="dropdown-item" href="#">Share</a></li>
                      <li><a class="dropdown-item" href="#">Trash</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">
                      Date <span>| Sep 1, 3:52 PM</span>
                    </h5>

                    <div class="d-flex align-items-start">
                      <img
                        class="mr-2 mb-2"
                        src="./../../assets/img/product-1.jpg"
                        alt="Project Photo"
                        style="height: 150px; width: 150px"
                      />
                      <div class="ps-3">
                        <h6>Machine Learning Sentiment Analysis</h6>
                        <div>
                          <h5 class="card-title d-flex align-items-center">
                            <i class="bx bxs-purchase-tag text-primary"></i>
                            Tags
                          </h5>
                          <div class="d-block">
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <a
                              class="btn btn-primary fw-light text-capitalize mr-2"
                              ><i class="bx bx-plus"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"
                      ><i class="bi bi-three-dots"></i
                    ></a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                    >
                      <li><a class="dropdown-item" href="./edit/">Edit</a></li>
                      <li><a class="dropdown-item" href="#">Share</a></li>
                      <li><a class="dropdown-item" href="#">Trash</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">
                      Date <span>| Sep 1, 3:52 PM</span>
                    </h5>

                    <div class="d-flex align-items-start">
                      <img
                        class="mr-2 mb-2"
                        src="./../../assets/img/product-1.jpg"
                        alt="Project Photo"
                        style="height: 150px; width: 150px"
                      />
                      <div class="ps-3">
                        <h6>Machine Learning Sentiment Analysis</h6>
                        <div>
                          <h5 class="card-title d-flex align-items-center">
                            <i class="bx bxs-purchase-tag text-primary"></i>
                            Tags
                          </h5>
                          <div class="d-block">
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <a
                              class="btn btn-primary fw-light text-capitalize mr-2"
                              ><i class="bx bx-plus"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"
                      ><i class="bi bi-three-dots"></i
                    ></a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                    >
                      <li><a class="dropdown-item" href="./edit/">Edit</a></li>
                      <li><a class="dropdown-item" href="#">Share</a></li>
                      <li><a class="dropdown-item" href="#">Trash</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">
                      Date <span>| Sep 1, 3:52 PM</span>
                    </h5>

                    <div class="d-flex align-items-start">
                      <img
                        class="mr-2 mb-2"
                        src="./../../assets/img/product-1.jpg"
                        alt="Project Photo"
                        style="height: 150px; width: 150px"
                      />
                      <div class="ps-3">
                        <h6>Machine Learning Sentiment Analysis</h6>
                        <div>
                          <h5 class="card-title d-flex align-items-center">
                            <i class="bx bxs-purchase-tag text-primary"></i>
                            Tags
                          </h5>
                          <div class="d-block">
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <a
                              class="btn btn-primary fw-light text-capitalize mr-2"
                              ><i class="bx bx-plus"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"
                      ><i class="bi bi-three-dots"></i
                    ></a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                    >
                      <li><a class="dropdown-item" href="./edit/">Edit</a></li>
                      <li><a class="dropdown-item" href="#">Share</a></li>
                      <li><a class="dropdown-item" href="#">Trash</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">
                      Date <span>| Sep 1, 3:52 PM</span>
                    </h5>

                    <div class="d-flex align-items-start">
                      <img
                        class="mr-2 mb-2"
                        src="./../../assets/img/product-1.jpg"
                        alt="Project Photo"
                        style="height: 150px; width: 150px"
                      />
                      <div class="ps-3">
                        <h6>Machine Learning Sentiment Analysis</h6>
                        <div>
                          <h5 class="card-title d-flex align-items-center">
                            <i class="bx bxs-purchase-tag text-primary"></i>
                            Tags
                          </h5>
                          <div class="d-block">
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <a
                              class="btn btn-primary fw-light text-capitalize mr-2"
                              ><i class="bx bx-plus"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"
                      ><i class="bi bi-three-dots"></i
                    ></a>
                    <ul
                      class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                    >
                      <li><a class="dropdown-item" href="./edit/">Edit</a></li>
                      <li><a class="dropdown-item" href="#">Share</a></li>
                      <li><a class="dropdown-item" href="#">Trash</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">
                      Date <span>| Sep 1, 3:52 PM</span>
                    </h5>

                    <div class="d-flex align-items-start">
                      <img
                        class="mr-2 mb-2"
                        src="./../../assets/img/product-1.jpg"
                        alt="Project Photo"
                        style="height: 150px; width: 150px"
                      />
                      <div class="ps-3">
                        <h6>Machine Learning Sentiment Analysis</h6>
                        <div>
                          <h5 class="card-title d-flex align-items-center">
                            <i class="bx bxs-purchase-tag text-primary"></i>
                            Tags
                          </h5>
                          <div class="d-block">
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <span
                              class="badge bg-secondary fw-light text-capitalize mr-2"
                              ><i class="bx bxs-purchase-tag text-light"></i>
                              jamal</span
                            >
                            <a
                              class="btn btn-primary fw-light text-capitalize mr-2"
                              ><i class="bx bx-plus"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- End #main -->

    <!-- Modals -->

    <div
      class="modal fade rounded-0"
      id="addPhotoModal"
      tabindex="-1"
      aria-labelledby="addPhotoModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="card overflow-auto">
              <div class="card-body">
                <h2 class="card-title fs-2">Photos <span>| 15</span></h2>
                <div
                  class="d-flex justify-content-center flex-column align-items-center"
                >
                  <img class="img-thumbnail" src="" alt="" />
                  <div
                    class="col-8 d-flex justify-content-center align-items-center border rounded-3 position-relative"
                    style="height: 300px"
                  >
                    <i
                      class="bx bx-image-add text-secondary opacity-50"
                      style="font-size: 80px"
                    ></i>
                    <input
                      type="file"
                      class="position-absolute w-100 h-100 opacity-0"
                      style="cursor: pointer; height: 300px"
                      name=""
                      id=""
                    />
                  </div>
                  <button class="btn btn-primary col-4 mt-3">Upload</button>
                </div>
              </div>
              <div class="card-footer text-center">
                <p>Image Preview...</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/quill/quill.min.js"></script>
    <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>

    <!-- Main JS File -->
    <script src="../../assets/js/main.js"></script>
  </body>
</html>
