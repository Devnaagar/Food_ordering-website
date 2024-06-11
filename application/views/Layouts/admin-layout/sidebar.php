<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    .right {
      margin-top: 5px;
      display: flex;
      justify-content: end;
      align-items: center;
    }
    .right::before {
      font-size: 15px;
    }
    .nav-link.active {
      background-color: #007bff;
      color: white;
    }
    .fa-solid{
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">R-Meal</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/dashboard" class="nav-link nav_link_3" id="dashboard">
              <i class="fa-solid fa-chalkboard-user icon_box"></i>
              <p>DashBoard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/users/lists#" class="nav-link nav_link_3" id="users">
              <i class="fa-solid fa-user icon_box"></i>
              <p>Users
                <i class="right fas fa-angle-left"></i>
              </p>
              
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard/new_user" class="nav-link nav_link_3" id="new_user">
                   
                  <p class="ml-5">Add New Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard/user_list" class="nav-link nav_link_3" id="user_list">
                  
                  <p class="ml-5">User's Table</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/dashboard/locations" class="nav-link nav_link_3" id="locations">
              <i class="fa-solid fa-location-dot icon_box"></i>
              <p>Location</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/dashboard/cafeteria" class="nav-link nav_link_3" id="cafeteria">
              <i class="fa-solid fa-kitchen-set icon_box"></i>
              <p>Cafeteria</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/dashboard/meals" class="nav-link nav_link_3" id="meals">
              <i class="fa-solid fa-utensils icon_box"></i>
              <p>Meals</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/dashboard/menu" class="nav-link nav_link_3" id="menu">
              <i class="fa-solid fa-pizza-slice icon_box"></i>
              <p>
                Menu_items
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard/menu" class="nav-link nav_link_3" id="add_dish">
                   
                  <p class="ml-5">Add New Dish</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard/menu_list" class="nav-link nav_link_3" id="menu_list">
                  
                  <p class="ml-5">Menu Items List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/dashboard/orders" class="nav-link nav_link_3" id="orders">
              <i class="fa-solid fa-box-open icon_box"></i>
              <p>Orders</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      // Check localStorage for the active link
      var activeLink = localStorage.getItem('activeLink');

      if (activeLink) {
        $('.nav_link_3').removeClass('active');
        $('#' + activeLink).addClass('active');
      } else {
        // Set the current page as active if no active link is stored
        var path = window.location.pathname;
        $('.nav_link_3').each(function() {
          if ($(this).attr('href').includes(path)) {
            $(this).addClass('active');
            localStorage.setItem('activeLink', $(this).attr('id'));
          }
        });
      }

      $('.nav_link_3').on('click', function() {
        // Remove 'active' class from all nav-links
        $('.nav_link_3').removeClass('active');
        
        // Add 'active' class to the clicked nav-link
        $(this).addClass('active');

        // Store the id of the active link in localStorage
        var id = $(this).attr('id');
        localStorage.setItem('activeLink', id);
      });
    });
  </script>
</body>
</html>