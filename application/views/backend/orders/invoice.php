
<style>
    .bordered{
        /* border: 2px dotted black; */
        padding: 20px;
        position: relative;

    }
    .sub_div{
        display: flex;
        justify-content: space-between;
    }
    .food_lists{
        margin: 10px;
    }

    .box_total{
        border:3px double black;
        padding: 20px;
    }
    .amt_box{
        display: flex;
        justify-content: center;
        align-items: center;
        /* border:3px solid black; */
    }


    .card-header, .card-body, .card-footer {
        position: relative;
        z-index: 1;
    }

    .card-header::after{
        display: none;
    }
    @media (max-width:480px){
        
        .sub_gap{
            padding: 10px;
        }
        .sub_gap1{
            margin: 7px;
        }
    }


</style>
<br><br><br>
<?php
   //echo "<pre>";print_r($status);die;
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="card card-primary">
                    <div class="bordered"> 
                        <div class="card-header">
                            <div class="row d-flex justify-content-between">
                                <h6><b>Order ID :</b> <?php echo $information['order_id'];?></h6>
                                <h6><b>Invoice Date/Time :</b> <?php echo $information['order_at'];?></h6>
                            </div><br>
                            <div class="row d-flex justify-content-center">
                                <h1 class="text-center"><u>Order Summary</u></h1>
                            </div>
                        </div>
                        
                        <br><br>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 text-start">
                                    <p><b>User-Name :</b> <?php echo $information['user_name'];?></p>
                                    <p><b>User-Mobile :</b> <?php echo $information['user_mobile'];?></p>
                                    <p><b>User-Address :</b> <?php echo $information['house_no'];?> &nbsp;<?php echo $information['street'];?> &nbsp;<?php echo  $information['landmark']; ?></p>
                                    <p><b>Pincode : </b> <?php echo $information['pincode'];?></p>
                                </div>
                                <div class="col-lg-7 text-start">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <p><b>Order no :</b> <?php echo $information['order_no']?></p>
                                            <p><b>Order at :</b> <?php echo $information['order_at']?></p>
                                            <p><b>Cafeteria Name : </b><?php echo $information['caf_name']?></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p><b>Meal :</b> <?php echo $information['meal_name']?></p>
                                                <p><b>Order amt :</b> <?php echo $information['order_amt']?></p>
                                            <p><b>Location :</b> <?php echo $information['loca_name']?></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row food_lists">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Sno.</th>
                                        <th>Items</th>
                                        <th>Rate</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </thead>
                                    <tbody>
                                        <?php $sno=0;?>
                                        <?php foreach($foods as $food) :
                                            $sno+=1;
                                            ?>
                                            <tr>
                                                <td><?php echo "$sno"; ?></td>
                                                <td><?php echo $food['dish_name']?> </td>
                                                <td><?php echo $food['rate']?> </td>
                                                <td><?php echo $food['quantity']?> </td>
                                                <td><?php echo $food['price']?> </td>
                                            </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="row d-flex justify-content-end">
                                <div class="col-lg-6 d-flex">
                                    <div class="box_total d-flex">
                                        <h4><b>Total amount :</b> </h4> &nbsp;
                                        <div class="amt_box">
                                            <h5>Rs. <?php echo $information['order_amt']?></h5> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <br><br><br>
                        <div class="card-footer">
                            <div class="row d-flex justify-content-center">
                                <h2 class="text-center">Thank you for your order!!!!!!!</h2>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Status</h3>
                        </div>
                        <!-- <form action="<?php //echo site_url('/admin/Orders/add_status')?>" method="post"> -->
                            <?php //echo form_open('/admin/orders/add_status'); ?>
                        <form id="orderForm" method="post"> 
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" value="<?php echo $information['order_id'];?>" id="order_ref" name="order_ref"/>
                                    <div class="col-lg-12">
                                        <select class="form-control" id="status" name="status">
                                            <option value="pending">Pending</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="cancel">Cancelled</option>
                                        </select>
                                    </div>
                                </div><br>
                                
                                
                                <div class="row">
                                <label for="description">Description:</label>
                                    <div class="col-lg-12">
                                        <textarea name="description" placeholder="Describe" style="width:100%" class="form-control" rows="4" id="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <button class="btn btn-info" id="save_button" type="submit">Submit</button>
                            </div>
                        </form>
                        
                    <!-- </form> -->
                    
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
                        <table class="table table-bordered" id="orderDetails">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Timing</th>
                                    <th>Description</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="status_list">
                                    

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><br><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script>
         $(document).ready(function() {
    const orderForm = $('#orderForm');
    const statusSelect = $('#status');
    const orderRef = $('#order_ref').val();
    const formKey = 'formDisabled_' + orderRef;

    // Function to disable form
    function disableForm() {
        // console.log('Disabling form'); // Debug log
        orderForm.find('input, select, textarea, button').prop('disabled', true);
    }

    // Check if the form should be disabled on page load
    function checkFormStatus() {
        $.ajax({
            url: '<?php echo site_url('admin/Orders/get_status'); ?>',
            type: 'GET',
            data: { order_ref: orderRef },
            success: function(data) {
                // console.log(data); // Debug log
                const orderDetails = JSON.parse(data);
                let html = '';

                orderDetails.forEach(order => {
                    html += '<tr>';
                    html += '<td>' + order.status + '</td>';
                    html += '<td>' + order.description + '</td>';
                    html += '<td>' + order.updatedat + '</td>';
                    html += '</tr>';
                });

                $('#orderDetails tbody').html(html);
                if (orderDetails.length > 0) {
                    const lastStatus = orderDetails[0].status;
                    statusSelect.val(lastStatus);
                    // console.log(lastStatus);

                    if (lastStatus === 'delivered') {
                        disableForm();
                    }
                }
            }
        });
    }

    checkFormStatus();

    orderForm.on('submit', function(e) {
        e.preventDefault();

        if (statusSelect.val() === 'delivered') {
            localStorage.setItem(formKey, 'true');
        }

        $.ajax({
            url: '<?php echo site_url('admin/Orders/add_status'); ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                checkFormStatus();
                $('#successToast').toast('show');
                $('#mesgbocx').html('Status saved successfully');
            }
        });
    });
});
    </script>
    <div aria-live="polite" aria-atomic="true" style="position: relative;">
    <div style="position: fixed; top: 1rem; left: 50%; transform: translateX(-50%); z-index: 9999;">
        <div class="toast" id="successToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header bg-success text-white">
                <strong class="mr-auto">Notification</strong>
                <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <div id="mesgbocx"></div>
            </div>
        </div>
    </div>
</div>
