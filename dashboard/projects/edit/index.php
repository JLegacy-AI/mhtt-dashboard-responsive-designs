<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../../../assets/img/favicon.png" rel="icon" />
    <link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
      href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../../../assets/vendor/simple-datatables/style.css" rel="stylesheet" />
    
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Template Main CSS File -->
    <link href="../../../assets/css/style.css" rel="stylesheet" />
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
            <a class="nav-link collapsed" href="../../projects/">
                <i class='bx bx-map-pin'></i>
                <span>Project</span>
            </a>
        </li>
        <!-- End Projects Page Nav -->
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="../../users/">
                <i class='bx bx-user'></i>
                <span>Users</span>
            </a>
        </li>
        <!-- End Users Page Nav -->
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="../../photos/">
                <i class='bx bx-photo-album'></i>
                <span>Photos</span>
            </a>
        </li>
        <!-- End Photos Page Nav -->
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="../../map/">
                <i class='bx bx-map-alt'></i>
                <span>Maps</span>
            </a>
        </li>
        <!-- End Maps Page Nav -->
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="../../../">
                <i class='bx bx-arrow-from-right'></i>
                <span>Logout</span>
            </a>
        </li>
    <!-- End Logout Page Nav -->
    </ul>
</aside>



    <main id="main" class="main">
      <div class="pagetitle">
        <div class="d-flex justify-content-between ">
            <h1>Edit Project</h1>
            <button class="btn btn-primary">Save Changes</button>
        </div>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item ">Projects</li>
            <li class="breadcrumb-item active">Machine Learning Sentiment Analysis</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
                <h1 id="editableProjectName" class="outline-none col-12" style="color: #012970;">Machine Learning Sentiment Analysis 
                    <button  contenteditable="false" class="btn btn-link editableButton" data-target="#editableProjectName">
                        <i class='bx bx-edit fs-5 text-primary'></i>
                    </button>
                </h1>
                <p id="editableProjectAddress1"  class="outline-none col-12" style="color: #012970;">1433 W St Lincoln, NE 68508, 1433 W St Lincoln, NE 68508 • Lincoln 
                    <button contenteditable="false" class="btn btn-link editableButton" data-target="#editableProjectAddress1">
                        <i class='bx bx-edit fs-5 text-primary'></i>
                    </button>
                </p>
            </div>
            <div class=" d-flex">
                <p id="cityName" class="outline-none" style="color: #012970;">W St Lincoln 
                    <button  contenteditable="false"  class="btn btn-link editableButton" data-target="#cityName">
                        <i class='bx bx-edit fs-5 text-primary'></i>
                    </button>
                </p>
                <p id="stateName" class="outline-none" style="color: #012970;"> Lincoln
                    <button  contenteditable="false"  class="btn btn-link editableButton" data-target="#stateName">
                        <i class='bx bx-edit fs-5 text-primary'></i>
                    </button>
                </p>
                <p id="postalCode" class="outline-none" style="color: #012970;"> 68508
                    <button  contenteditable="false"  class="btn btn-link editableButton" data-target="#postalCode">
                        <i class='bx bx-edit fs-5 text-primary'></i>
                    </button>
                </p>
            </div>
            
            <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                  

                  <div class="card-body">
                    <h2 class="card-title fs-2">Users  <span>| 15</span> 
                        <button id="addUserToProjectButton" class="btn btn-link   " data-bs-toggle="modal" data-bs-target="#addUserToProject">
                            <i class='bx bxs-plus-square fs-4'></i>
                        </button>
                    </h2>

                    <table class="table table-borderless table-hover datatable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Emails</th>
                          <th scope="col">Last Activity</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><a href="#" >#2457</a></th>
                          <td>
                            <a href="#" class="text-primary text-decoration-underline ">
                              Brandon Jacob
                            </a>
                            <button class="btn btn-link   " >
                              <i class='bx bx-edit fs-5 text-secondary'></i>
                            </button>
                          </td>
                          <td>
                            <div class="">
                              <i class='bx bx-envelope'></i>
                                jamalmuhammad.@gmail.com
                            </div>
                            <div class="">
                              <i class='bx bx-envelope'></i>
                              jamalmuhammad.@gmail.com
                            </div>
                          </td>
                          <td><span class="badge bg-success">Approved</span></td>
                          <td>
                            <div class="d-flex">
                                <a class="icon" href="#" data-bs-toggle="dropdown">
                                  <i class='bx bx-dots-horizontal-rounded fs-5' ></i>
                                </a>
                                <ul
                                  class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                                >
                                  <li><a class="dropdown-item" href="../../users/edit">Edit</a></li>
                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card overflow-auto">
                  <div class="card-body">
                    <h2 class="card-title fs-2">Photos  <span>| 15</span></h2>
                    <div class="d-flex justify-content-center flex-column align-items-center">
                      <img class="img-thumbnail" src="" alt="">
                      <div class="col-8 d-flex justify-content-center align-items-center border rounded-3 position-relative" style="height: 300px">
                        <i class='bx bx-image-add text-secondary opacity-50' style="font-size: 80px"></i>
                        <input type="file" class="position-absolute w-100 h-100 opacity-0 " style="cursor: pointer; height:300px;" name="" id="">
                      </div>
                      <button class="btn btn-primary col-4 mt-3">
                        Upload
                      </button>
                    </div>
                  </div>
                  <div class="card-footer text-center ">
                      <p>Image Preview...</p>
                  </div>
                </div>
                <div class="card-footer row">
                    <div class="col-12">
                      <h2 class="card-title fs-4 col-12">25th October 2023</h2>
                      <div  class="col-12 row">

                        <!-- IMAGE START -->
                        <div class="col-sm-5 col-md-4 col-lg-3 position-relative">
                          <div class="d-flex position-absolute z-3 px-3 py-2 end-0">
                                <a class="icon" href="#" data-bs-toggle="dropdown">
                                  <i class='bx bx-dots-vertical-rounded fs-4' ></i>
                                </a>
                                <ul
                                  class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
                                >
                                  <li><a class="dropdown-item" href="../../photos/edit">Edit</a></li>
                                  <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                          </div>
                          <img class="w-100 h-100" src="../../../assets/img/product-2.jpg" alt="IPhone Watch">
                          <a class="h-100 position-absolute images-overlay" href="#" style="background-color: rgba(0,0,0,0); transition: all 300ms; transform: translateX(-100%); width: 90%;">
                            <input class="position-absolute" aria-label="select image" style="cursor: pointer; opacity: 1; left:10px; bottom:10px; height:20px; width: 20px;" type="checkbox" name="" id="">
                          </a>
                        </div>
                        <!-- IMAGE END -->

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



<!-- Modals -->

    <!-- End Sidebar-->
    <div class="modal fade" id="addUserToProject" tabindex="-1" aria-labelledby="addUserToProjectLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-0 ">
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold " id="exampleModalLabel">Send Invite To User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="user-registration-form" class="row g-3 needs-input-validation" novalidate>
                    <div class="col-md-6 col-12">
                      <label for="firstName" class="form-label">First Name</label>
                      <input type="text" name="name" class="form-control" id="firstName" required>
                      <div class="invalid-feedback">Please, enter your first name!</div>
                    </div>

                    <div class="col-md-6 col-12">
                      <label for="lastName" class="form-label">Last Name</label>
                      <input type="text" name="name" class="form-control" id="lastName" required>
                      <div class="invalid-feedback">Please, enter your last name!</div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Send Invite</button>
                    </div>
                  </form>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>




    
    
    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="../../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <!-- Template Main JS File -->
    <script src="../../../assets/js/main.js"></script>        
    <script src="../../../controllers/controller.js"></script>        
</body>
</html>