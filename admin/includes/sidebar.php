  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0)" class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="home" class="nav-link">
              <i class="nav-icon fa fa-dashboard text-info"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="manageHome" class="nav-link">
              <i class="nav-icon fas fa-house text-info"></i>
              <p>Home</p>
            </a>
          </li>
           </li>
            <li class="nav-item">
            <a href="manageAboutus" class="nav-link">
              <i class="nav-icon fa fa-user text-info"></i>
              <p>About</p>
            </a>
          <li class="nav-item">
            <a href="manageMenus" class="nav-link">
              <i class="nav-icon fa fa-bars text-info"></i>
              <p>Menu</p>
            </a>
          </li> 
           <li class="nav-item">
            <a href="manageGallery" class="nav-link">
              <i class="nav-icon  fas fa-image text-info"></i>
              <p>Gellary</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="manageReview" class="nav-link">
              <i class="nav-icon fa-regular fa-comments text-info"></i>
              <p>Review</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="manageContact" class="nav-link">
              <i class="nav-icon fa-solid fa-phone text-info"></i>
              <p>Contact</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="manageFooter" class="nav-link">
              <i class="nav-icon fa-solid fa-phone text-info"></i>
              <p>Footer</p>
            </a>
          </li> 
         <!--  <li class="nav-item">
            <a href="manageService" class="nav-link">
              <i class="nav-icon fas fa-handshake-angle text-info"></i>
              <p>Service</p>
            </a>
          </li>   -->  
          <li class="nav-item">
            <a href="changePassword" class="nav-link">
              <i class="nav-icon fas fa-key text-info"></i>
              <p>Change Password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-info"></i>
              <p>Logout</p>
            </a>
          </li>
      </nav>
    </div>
  </aside>
