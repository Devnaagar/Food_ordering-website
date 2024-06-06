
<style>
    .container{
        border: 2px dotted black;
    }
    .sub_div{
        display: flex;
        justify-content: space-between;
    }
    .food_lists{
        margin: 10px;
    }
</style>
<br><br><br>

<?php

//    echo "<pre>";print_r($information);die;
?>

<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <h2 class="text-center"><u>Invoice</u></h2>
        </div><br>
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6">
                <div class="invoice_info text-start">
                    <h6><b>Invoice no :</b> <?php echo $information['order_id'];?></h6>
                    <h6><b>Invoice Date/Time :</b> <?php echo $information['order_at'];?></h6>
                </div>
            </div>
        </div><br><br><br>
        <div class="row">
            <div class="col-lg-6 text-start">
                <p><b>User-Name :</b> <?php echo $information['user_name'];?></p>
                <p><b>User-Mobile :</b> <?php echo $information['user_mobile'];?></p>
                <p><b>User-Address :</b> <?php echo  $information['house_no']; echo $information['street'];?> &nbsp;<?php echo  $information['landmark']; ?></p>
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
            <div class="col-lg-6 text-end">
                <p><b>Order amt :</b> Rs. <?php echo $information['order_amt']?></p>
            </div>
        </div>
        <br><br><br>
        <div class="row d-flex justify-content-center">
            <h2 class="text-center">Thank you for your order!!!!!!!</h2>
        </div>
    </div>
</section><br><br>