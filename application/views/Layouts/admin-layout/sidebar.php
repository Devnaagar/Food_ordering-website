<!-- Main Sidebar Container -->

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/style.css">

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Re-Meal</span>
    </a>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <!-- <ul class="nav nav-treeview"> -->
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/users/lists#" class="nav-link nav-link1">
                  <i class="fa-solid fa-user"></i>
                  <p>
                    Users
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/users/add_user#" class="nav-link nav-link2">
                      <i class="fa-solid fa-user-plus"></i>
                      <p>Add New Users</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/users/lists#" class="nav-link nav-link2">
                      <i class="fa-solid fa-table"></i>
                      <p>User's Table</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/Locations/location_add" class="nav-link nav-link1">
                  <i class="fa-solid fa-location-dot"></i>
                  <p>Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/cafeteria/cafe_add" class="nav-link nav-link1">
                  <i class="fa-solid fa-kitchen-set"></i>
                  <p>Cafeteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/meals/meal_add" class="nav-link nav-link1">
                <i class="fa-solid fa-utensils"></i>
                  <p>Meals</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/menu" class="nav-link nav-link1">
                  <i class="fa-solid fa-pizza-slice"></i>
                  <p>
                    Menu_items
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/menu" class="nav-link nav-link2">
                      <i class="fa-solid fa-user-plus"></i>
                      <p>Add New Dish</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/menu/menu_list" class="nav-link nav-link2">
                      <i class="fa-solid fa-table"></i>
                      <p>Menu Items List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/orders/order_add" class="nav-link nav-link1">
                  <i class="fa-solid fa-box-open"></i>
                  <p>Orders</p>
                </a>
              </li>
        </li>    
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
