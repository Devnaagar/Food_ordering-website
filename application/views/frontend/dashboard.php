<style>
    .box_border{
        border: 2px solid black;
        box-shadow: 2px 3px 5px black;

        padding: 10px;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .small-box{
        height: 135px;
    }
    .card-header::after{
        display: none;
    }
    @media (max-width:480px){
        .box_border{
            margin-top: 10px;
        }
        .sub_gap{
            padding: 10px;
        }
        .sub_gap1{
            margin: 7px;
        }
    }
    @media (min-width:481px) and (max-width:991px){
        .box_border{
            margin-top: 10px;
        }
    }
</style>
<section>
    <div class="container">
        <br>
        <div class="row justify-content-between sub_gap">
            <h1><b>DashBoard</b></h1>
            <p><?php echo date("d-m-Y")?></p>
        </div><br>
        <div class="row sub_gap">
            <h3> Today Stats  </h3>
        </div><br>
        <div class="row sub_gap">
            <div class="col-lg-4 col-6">
                <!-- small box -->
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
            <div class="col-lg-4 col-6">
                <!-- small box -->
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
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>Rs.<?php echo number_format($total_amount_today, 2); ?></h3>

                    <p>Total Order Amount</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-sack-dollar"></i>
                </div>
                </div>
            </div>
          
          <!-- ./col -->
        </div><br>
        <div class="row sub_gap">
            <h3> This Month  </h3>
        </div><br>
        <div class="row sub_gap">
            <div class="col-lg-4 col-6">
                <!-- small box -->
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
            <div class="col-lg-4 col-6">
                <!-- small box -->
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
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Rs.<?php echo number_format($total_amount_current_month, 2); ?></h3>

                    <p>Total Order Amount</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-sack-dollar"></i>
                </div>
                </div>
            </div>
          <!-- ./col -->
        </div>
        <div class="card sub_gap1">
                <div class="card-header border-transparent d-flex justify-content-between">
                    <h3 ><b>Orders</b></h3>

                    <div class="card-tools ">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-1" style="display: block;">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">S.NO.</th>
                                            <th>Order No.</th>
                                            <th>Ordered At</th>
                                            <th>Order Amount</th>
                                            <th>user ID</th>
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
                                                    <td><?php echo $order['user_id']?></td>
                                                    <td><?php echo $order['name']?></td>
                                                    <td><?php echo $order['status']?></td>
                                                    <td class="d-flex justify-content-around">
                                                        <a href="<?php echo site_url('/admin/orders/invoice_page/'.$order['order_id']); ?>" class="btn btn-outline-success">View</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center">No users found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                    </div>
                </div>

            </div>
    </div>
</section>

