<?php

//    echo "<pre>";print_r($orders);die;
?>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order List</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">S.NO.</th>
                                        <th>Order No.</th>
                                        <th>Order Amount</th>
                                        <th>user ID</th>
                                        <th>User Name</th>
                                        <th>Ordered At</th>
                                        <th>Actions</th>
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
                                                <td><?php echo $order['order_amt']?></td>
                                                <td><?php echo $order['user_id']?></td>
                                                <td><?php echo $order['name']?></td>
                                                <td><?php echo $order['order_at']?></td>
                                                <td>
                                                    <a href="<?php echo site_url('/admin/orders/delete_order/'.$order['order_id']); ?>" class="btn btn-danger">Delete</a>
                                                    <a href="<?php echo site_url('/admin/orders/invoice_page/'.$order['order_id']); ?>" class="btn btn-outline-success">Items</a>
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
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


