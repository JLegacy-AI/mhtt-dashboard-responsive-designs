<?php
  include "../../../includes/utils.php";
  include "../../../includes/db_functions.php";
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $photoId = decode($_GET['puid']);
  $photo = getImageById($photoId);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Photo | Edit | MHTT</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../../../assets/img/favicon.png" rel="icon" />
    <link
      href="../../../assets/img/apple-touch-icon.png"
      rel="apple-touch-icon"
    />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />
    <link
      type="text/css"
      href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css"
      rel="stylesheet"
    />
    <link
      type="text/css"
      href="https://nhn.github.io/tui.image-editor/latest/dist/tui-image-editor.css"
      rel="stylesheet"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="../../../assets/vendor/boxicons/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="../../../assets/vendor/remixicon/remixicon.css"
      rel="stylesheet"
    />
    <link
      href="../../../assets/vendor/simple-datatables/style.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"
    />
    <!-- Template Main CSS File -->
    <link href="../../../assets/css/style.css" rel="stylesheet" />
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="../../../assets/img/logo.png" alt="" />
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
                src="../../../assets/img/profile-img.jpg"
                alt="Profile"
                class="rounded-circle"
              />
              <span class="d-none d-md-block dropdown-toggle ps-2"
                >
                <?php
                    echo getUserByID(checkToken($_SESSION['token'])['user'])['firstName'][0].' '.getUserByID(checkToken($_SESSION['token'])['user'])['lastName'];
                ?>
                </span
              > </a
            ><!-- End Profile Iamge Icon -->

            <ul
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"
            >
              <li class="dropdown-header">
                <h6>
                  <?php
                    echo getUserByID(checkToken($_SESSION['token'])['user'])['firstName'][0].' '.getUserByID(checkToken($_SESSION['token'])['user'])['lastName'];
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
                          href="../../users/edit?userwiki='.encode(checkToken($_SESSION['token'])['user']).'"
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
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="../../../"
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
          <a class="nav-link collapsed" href="../../projects/">
            <i class="bx bx-map-pin"></i>
            <span>Project</span>
          </a>
        </li>
        <!-- End Projects Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="../../users/">
            <i class="bx bx-user"></i>
            <span>Users</span>
          </a>
        </li>
        <!-- End Users Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="../../photos/">
            <i class="bx bx-photo-album"></i>
            <span>Photos</span>
          </a>
        </li>
        <!-- End Photos Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="../../map/">
            <i class="bx bx-map-alt"></i>
            <span>Maps</span>
          </a>
        </li>
        <!-- End Maps Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="../../../">
            <i class="bx bx-arrow-from-right"></i>
            <span>Logout</span>
          </a>
        </li>
        <!-- End Logout Page Nav -->
      </ul>
    </aside>

    <main id="main" class="main">
      <div class="pagetitle">
        <div class="d-flex justify-content-between">
          <h1>Edit Photo</h1>
        </div>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Photos</li>
            <li class="breadcrumb-item">Edit</li>
            <li class="breadcrumb-item active">Photo</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">
          <div class="card overflow-auto">
            <div class="card-body row">
              <h2 class="card-title fs-2">Photo <span>| #
                <?php echo $photoId?>
              </span></h2>
              <div
                class="col-12 d-flex justify-content-center align-items-center bg-light p-5 position-relative"
              >
                <?php
                  echo '<button
                          id="editPhoto"
                          class="btn btn-primary position-absolute"
                          style="top: 10px; left: 10px"
                          type="button"
                          data-url="'.$photo['url'].'"
                          
                        >
                          <i class="bi bi-pencil-square"></i>
                        </button>';
                ?>
                <?php
                  echo '<img
                  class="img-thumbnail"
                  src="'.$photo['url'].'"
                  alt=""
                />';
                ?>
              </div>
            </div>
          </div>

          <div class="card recent-sales overflow-auto">
                  <div class="card-header">
                      <p class="text-muted" style="font-size: 12px">Select Project From Dropdown and Press Enter to Add</p>
                      <div class="form-floating  position-relative dropdown" style="height:50px;">
                        <?php
                          echo '<input id="projectInput"  type="text" class="form-control" data-photo-id="'.$photoId.'" placeholder="Add Project"/>';
                        ?>
                        <label for="floatingTextarea">Project id or Name</label>
                        <ul id="project-menu-list" class="dropdown-menu">
                        </ul>
                      </div>
                  </div>
                  <div class="card-body">
                    <h2 class="card-title fs-2">
                      Projects <span>|  1
                      </span>
                    </h2>

                    <table class="table table-borderless table-hover datatable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Address</th>
                          <th scope="col">State</th>
                          <th scope="col">City</th>
                          <th scope="col">Postal Code</th>
                          <th scope="col">Last Activity</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $projects = getProjectsByPhotoId($photoId);

                          foreach($projects as $project){
                            echo '<tr>
                                    <th scope="row"><a href="#">#'.$project['id'].'</a></th>
                                    <td>
                                      <a
                                        href="#"
                                        class="text-primary text-decoration-underline"
                                      >
                                      '.$project['name'].'
                                      </a>
                                      
                                    </td>
                                    <td>
                                      <div class="">
                                        <i class="bx bx-envelope"></i>
                                        '.$project['addressOne'].'
                                      </div>
                                      <div class="">
                                        <i class="bx bx-envelope"></i>
                                        '.$project['addressTwo'].'
                                      </div>
                                    </td>
                                    <td>
                                    '.$project['state'].'
                                    </td>
                                    <td>
                                    '.$project['city'].'
                                    </td>
                                    <td>
                                    '.$project['postalCode'].'
                                    </td>
                                    <td>
                                    '.convertTime($project['lastActivity']).'
                                    </td>
                                    <td>
                                      <div class="d-flex">
                                        <a
                                          class="icon"
                                          href="#"
                                          data-bs-toggle="dropdown"
                                        >
                                          <i
                                            class="bx bx-dots-horizontal-rounded fs-5"
                                          ></i>
                                        </a>
                                        <ul
                                          class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                                        >
                                          <li>
                                            <a class="dropdown-item delete-project-photo" style="cursor: pointer;" data-project-id="'.$project['id'].'" data-photo-id="'.$photoId.'">Delete</a>
                                          </li>
                                        </ul>
                                      </div>
                                    </td>
                                  </tr>';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <div class="card recent-sales overflow-auto col-12 col-md-6">
                  <div class="card-header">
                      <p class="text-muted" style="font-size: 12px">Write Tag and Press Enter to Add</p>
                      <div class="form-floating position-relative dropdown" style="height:50px;">
                        <?php
                          echo '<input id="tagInput" type="text" class="form-control" placeholder="Enter Tags" data-photo-id="'.$photoId.'" />';
                        ?>
                        <label for="floatingTextarea">Add Tag</label>
                        <ul id="tags-menu-list" class="dropdown-menu">
                        </ul>
                      </div>
                      
                  </div>
                  <div class="card-body">
                    <h2 class="card-title fs-2">
                      Tags <span>|  1
                      </span>
                    </h2>

                    <table class="table table-borderless table-hover datatable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tags</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php   
                          $tags = getTagsByPhotoId($photoId);
                          foreach($tags as $tag){
                            echo '<tr>
                            <th scope="row"><a href="#">#'.$tag['id'].'</a></th>
                            <td>
                              <a
                                href="#"
                                class="text-primary text-decoration-underline"
                              >
                              '.$tag['Tag'].'
                              </a>
                              
                            </td>
                            <td>
                              <div class="d-flex">
                                <a
                                  class="icon"
                                  href="#"
                                  data-bs-toggle="dropdown"
                                >
                                  <i
                                    class="bx bx-dots-horizontal-rounded fs-5"
                                  ></i>
                                </a>
                                <ul
                                  class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                                >
                                  <li>
                                    <a class="dropdown-item delete-photo-tag" style="cursor: pointer;" data-photo-id="'.$photoId.'" data-tag="'.$tag['Tag'].'">Delete</a>
                                  </li>
                                </ul>
                              </div>
                            </td>
                          </tr>';
                          }
                          
                        
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-1">

                </div>
                  <div class="card recent-sales overflow-auto col-12 col-md-5">
                    <div class="card-body">
                      <h2 class="card-title fs-2">
                        Description <span id="show-description-characters">|  <?php echo strlen($photo['description'])?> Characters
                        </span>
                      </h2>
                      <div class="form-floating">
                        <textarea id="photo-description" class="form-control" placeholder="Leave a Description here" id="descriptionTextArea"><?php echo $photo['description']?></textarea>
                        <label for="floatingTextarea">Description</label>
                      </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                      <?php
                        echo '<button id="addDescriptionButton" class="btn btn-primary" data-photo-id="'.$photoId.'" style="cursor: pointer;">Save</button>';
                      ?>
                    </div>
                </div>
                
        </div>
      </section>
    </main>
    <!-- End #main -->

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
    >
      <i class="bi bi-arrow-up-short"></i>
    </a>

    <div
      class="modal fade rounded-0"
      id="toast-image-editor-modal"
      tabindex="-1"
      aria-labelledby="toast-image-editor-modal-label"
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
            <div id="tui-image-editor-container"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
    <script src="../../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/toastify-js"
    ></script>
    
    <!-- Image Editor Toast JS Files -->
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.4.0/fabric.js"
    ></script>
    <script
      type="text/javascript"
      src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://nhn.github.io/tui.image-editor/latest/dist/tui-image-editor.js"
    ></script>

    <!--- Main JS File -->
    <script src="../../../assets/js/main.js"></script>
    <script src="../../../controllers/controller.js"></script>
    <script src="../../../controllers/imageEditor.js"></script>
  </body>
</html>
