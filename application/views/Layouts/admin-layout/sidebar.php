<!-- Main Sidebar Container -->

<style>

  /* .icon_box{
    height: 40px;
    width: 60px;
    z-index: 999;
    background-color: white;
    padding: 2px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
  } */
  /* .icon_box::before{
    color: darkgray;
  } */

  .right::before{
    text-align: end;
    margin-right: 0px;
    font-size: 15px;

}
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/style.css">

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">R-Meal</span>
    </a>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>admin/dashboard" class="nav-link nav-link1">
                <i class="fa-solid fa-chalkboard-user icon_box"></i>
                <p>DashBoard</p>
              </a>
            </li>
            <!-- <ul class="nav nav-treeview"> -->

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/users/lists#" class="nav-link nav-link1">
                  <i class="fa-solid fa-user icon_box"></i>
                  <p>
                    Users
                  </p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/dashboard/new_user" class="nav-link nav-link2">
                      <i class="fa-solid fa-user-plus "></i>
                      <p>Add New Users</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/dashboard/user_list" class="nav-link nav-link2">
                      <i class="fa-solid fa-table "></i>
                      <p>User's Table</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard/locations" class="nav-link nav-link1">
                  <i class="fa-solid fa-location-dot icon_box"></i>
                  <p>Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard/cafeteria" class="nav-link nav-link1">
                  <i class="fa-solid fa-kitchen-set icon_box"></i>
                  <p>Cafeteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard/meals" class="nav-link nav-link1">
                <i class="fa-solid fa-utensils icon_box"></i>
                  <p>Meals</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard/menu" class="nav-link nav-link1">
                  <i class="fa-solid fa-pizza-slice icon_box"></i>
                  <p>
                    Menu_items
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/dashboard/menu" class="nav-link nav-link2">
                      <i class="fa-solid fa-user-plus "></i>
                      <p>Add New Dish</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/dashboard/menu_list" class="nav-link nav-link2">
                      <i class="fa-solid fa-table "></i>
                      <p>Menu Items List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard/orders" class="nav-link nav-link1">
                  <i class="fa-solid fa-box-open icon_box"></i>
                  <p>Orders</p>
                </a>
              </li>
        </li>    
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
