
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

    .watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 50px;
        opacity: 0.1;
        z-index: 0;
        pointer-events: none;
    }

    .card-header, .card-body, .card-footer {
        position: relative;
        z-index: 1;
    }

    .table-bordered{
        /* border:2px solid black; */
    }


</style>
<br><br><br>
<?php
//    echo "<pre>";print_r($information);die;
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="bordered"> 
                        <div class="watermark">
                            <img  src="<?php echo base_url(); ?>assets/admin/dist/img/geetalogo.png" alt="AdminLTELogo" height="400" width="400">
                        </div>
                        <div class="card-header">
                            <div class="row d-flex justify-content-between">
                                <h6><b>Invoice no :</b> <?php echo $information['order_id'];?></h6>
                                <h6><b>Invoice Date/Time :</b> <?php echo $information['order_at'];?></h6>
                            </div><br>
                            <div class="row d-flex justify-content-center">
                                <h1 class="text-center"><u>Invoice</u></h1>
                            </div>
                        </div>
                        
                        <br><br>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <p><b>User-Name :</b> <?php echo $information['user_name'];?></p>
                                    <p><b>User-Mobile :</b> <?php echo $information['user_mobile'];?></p>
                                    <p><b>User-Address :</b> <?php echo $information['house_no'];?> &nbsp;<?php echo $information['street'];?> &nbsp;<?php echo  $information['landmark']; ?></p>
                                    <p><b>Pincode : </b> <?php echo $information['pincode'];?></p>
                                </div>
                                <div class="col-lg-6 text-start">
                                    <div class="sub_div">
                                        <p><b>Order no :</b> <?php echo $information['order_no']?></p>
                                        <p><b>Order amt :</b> <?php echo $information['order_amt']?></p>
                                    </div>
                                    <div class="sub_div">
                                        <p><b>Cafeteria Name : </b><?php echo $information['caf_name']?></p>
                                        <p><b>Location :</b> <?php echo $information['loca_name']?></p>
                                    </div>
                                    <div class="sub_div">
                                        <p><b>Meal :</b> <?php echo $information['meal_name']?></p>
                                        <p><b>Order at :</b> <?php echo $information['order_at']?></p>
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
        </div>
    </div>
</section><br><br>