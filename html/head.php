 <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
  <style>
    .btnnn{
  display: inline-block;
  text-align: center;
  text-decoration: none;
  border: 2px solid #fe405e;
  border-radius: 10px;
  margin-top: 25px;
  margin-bottom: 25px;
  color: white;
  font-size: 20px;
  background-color: #fe405e;
  padding: 5px 30px 5px 30px;
}
.btnnn:hover {
  color: #fe405e;
  background-color: transparent;
  transition: all 0.5s;
}
.ts{
  font-size: 20px;
}
.header-text {
  font-size: 30px;
  background-color: pink;
  color: #fe405e;
  text-align: center; /* Center align the text horizontally */
  padding: 10px; /* Add some padding for spacing */
  margin-right:-10px;
}
.nv{
  margin-top:-15px;
  margin-right:-20px;
}
  </style>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../images/logo.png"
    />
    <title>ROYAL-ADMIN</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet" />
    <link
      href="../assets/libs/chartist/dist/chartist.min.css"
      rel="stylesheet"
    />
    <link
      href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet" />

  </head>

  <body>

    <div
      id="main-wrapper"
      data-theme="light"
      data-layout="vertical"
      data-navbarbg="skin6"
      data-sidebartype="full"
      data-sidebar-position="fixed"
      data-header-position="fixed"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-lg">
          <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-lg-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
              <!-- Logo icon -->
              <a href="home.php">
                <img
                  src="../images/logo.png"
                  alt=""
                  class="img-fluid"
                />
              </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
              class="topbartoggler d-block d-lg-none waves-effect waves-light"
              href="javascript:void(0)"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
              ><i class="ti-more"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <div class="nv text-center col-12"> <!-- Changed col-1 to col-12 for better width -->
        <div class="header-text">ROYAL JEWELERS</div>
      </div>
    </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar" data-sidebarbg="skin6">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <li class="sidebar-item">
                <a
                  class="sidebar-link sidebar-link"
                  href="home.php"
                  aria-expanded="false"
                  ><i data-feather="home" class="feather-icon"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>
              <li class="list-divider"></li>
              

             
            

             
              <li class="nav-small-cap">
                <span class="hide-menu">Datas</span>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i data-feather="file-text" class="feather-icon"></i
                  ><span class="hide-menu">Users </span></a
                >
                <ul
                  aria-expanded="false"
                  class="collapse first-level base-level-line"
                >
                
                  </li>
                  <li class="sidebar-item">
                    <a href="showUser.php" class="sidebar-link"
                      ><span class="hide-menu"> Show Users </span></a
                    >
                  </li>

                </ul>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i data-feather="grid" class="feather-icon"></i
                  ><span class="hide-menu">Products </span></a
                >
                <ul
                  aria-expanded="false"
                  class="collapse first-level base-level-line"
                >
                  <li class="sidebar-item">
                    <a href="insertProduct.php" class="sidebar-link"
                      ><span class="hide-menu"> Insert Products </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="show_products.php" class="sidebar-link"
                      ><span class="hide-menu"> Show Products</span></a
                    >
               
                </ul>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i data-feather="bar-chart" class="feather-icon"></i
                  ><span class="hide-menu">Purchase </span></a
                >
                <ul
                  aria-expanded="false"
                  class="collapse first-level base-level-line"
                >
               
                  <li class="sidebar-item">
                    <a href="show_purchase.php" class="sidebar-link"
                      ><span class="hide-menu"> Show Purchase  </span></a
                    >
                  </li>
                
                </ul>
              </li>
         
              <li class="sidebar-item">
                <a
                  class="sidebar-link sidebar-link"
                  href="show_feedback.php"
                  aria-expanded="false"
                  ><i data-feather="sidebar" class="feather-icon"></i
                  ><span class="hide-menu">Feedback </span></a
                >
              </li>
              <!-- <li class="sidebar-item">
                <a
                  class="sidebar-link sidebar-link"
                  href="show_questions.php"
                  aria-expanded="false"
                  ><i data-feather="sidebar" class="feather-icon"></i
                  ><span class="hide-menu">Questions </span></a
                >
              </li> -->
              <li class="list-divider"></li>
            
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
    