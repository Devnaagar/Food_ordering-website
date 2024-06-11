
  <style>
    .box_border {
      border: 2px solid black;
      box-shadow: 2px 3px 5px black;
      padding: 10px;
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .small-box {
      height: 135px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
    }
    .small-box .icon {
      top: 10px;
      right: 10px;
      font-size: 50px;
      position: absolute;
      opacity: 0.6;
      transition: all 0.3s ease-in-out;
    }
    .small-box:hover .icon {
      opacity: 0.6;
    }
    .card-header::after {
      display: none;
    }
    @media (max-width: 480px) {
      .box_border {
        margin-top: 10px;
      }
      .sub_gap {
        padding: 10px;
      }
      .sub_gap1 {
        margin: 7px;
      }
      .small-box .icon {
        position: relative;
        opacity: 0.6;
        font-size: 40px;
      }
    }
    @media (min-width: 481px) and (max-width: 991px) {
      .box_border {
        margin-top: 10px;
      }
    }
  </style>

  <section class="content p-4">
    <div class="container-fluid">
      <div class="row justify-content-between sub_gap my-2">
        <h1><b>DashBoard</b></h1>
        <p><?php echo date("d-m-Y")?></p>
      </div>
      <div class="row sub_gap my-2">
        <h3> Today Stats </h3>
      </div>
      <div class="row sub_gap my-2">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $total_users_today; ?></h3>
              <p>New Users</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-user-plus"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $total_orders_today; ?></h3>
              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="fa-brands fa-shopify"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Rs.<?php echo number_format($total_amount_today); ?></h3>
              <p>Total Order Amount</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-sack-dollar"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row sub_gap my-2">
        <h3> This Month </h3>
      </div>
      <div class="row sub_gap">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $total_users; ?></h3>
              <p>New Users</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-user-plus"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $total_orders; ?></h3>
              <p>Total Orders</p>
            </div>
            <div class="icon">
              <i class="fa-brands fa-shopify"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Rs.<?php echo number_format($total_amount_current_month); ?></h3>
              <p>Total Order Amount</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-sack-dollar"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="card sub_gap1">
        <div class="card-header border-transparent d-flex justify-content-between">
          <h3><b>Orders</b></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-1" style="display: block;">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">S.NO.</th>
                  <th>Order No.</th>
                  <th>Ordered At</th>
                  <th>Order Amount</th>
                  
                  <th>User Name</th>
                  <th>Status</th>
                  <th style="width: 50px">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($orders)): ?>
                  <?php 
                  $sno=0;
                  ?>
                  <?php
                    foreach ($orders as $order):
                    $sno+=1;
                  ?>
                    <tr>
                      <td><?php echo $sno; ?></td>
                      <td><?php echo $order['order_no']; ?></td>
                      <td><?php echo $order['order_at']?></td>
                      <td><?php echo $order['order_amt']?></td>
                      <td><?php echo $order['name']?></td>
                      <td><?php echo $order['status']?></td>
                      <td class="d-flex justify-content-around">
                        <a href="<?php echo site_url('/admin/orders/invoice_page/'.$order['order_id']); ?>" class="btn btn-outline-success">View</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="7" class="text-center">No orders found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


  <div aria-live="polite" aria-atomic="true" style="position: relative;">
    <div style="position: fixed; top: 1rem; left: 50%; transform: translateX(-50%); z-index: 9999;">
      <div class="toast" id="successToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
        <div class="toast-header bg-primary text-white">
          <strong class="mr-auto">Notification</strong>
          <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
          <?php echo $this->session->flashdata('message'); ?>
        </div>
      </div>
    </div>
 </div>

 <script>
   $(document).ready(function(){
     // Check if there's a flashdata message and show the toast
     <?php if($this->session->flashdata('message')): ?>
        var messageType = "<?php echo $this->session->flashdata('message_type'); ?>";
        if (messageType === 'primary') {
            $('#successToast .toast-header').addClass('bg-primary text-white');
            $('#successToast .close').addClass('text-white');
        }
        $('#successToast').toast('show');
     <?php endif; ?>
   });
</script>

