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
    @media (max-width:480px){
        .box_border{
            margin-top: 10px;
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
        <div class="row justify-content-between">
            <h1><b>DashBoard</b></h1>
            <p><?php echo date("d-m-Y")?></p>
        </div><br>
        <div class="row">
            <h3> Today Stats  </h3>
        </div><br><br>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="box_border">
                    <h4><b>Orders :</b><?php echo $total_orders_today; ?></h4>
                </div>
                
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="box_border">
                    <h4><b>Users :</b> <?php echo $total_users_today; ?></h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="box_border">
                    <h4><b>Order Amount :</b> <?php echo number_format($total_amount_today, 2); ?></h4>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <h3> OverAll </h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="box_border">
                    <h4><b>Total Orders :</b> <?php echo $total_orders; ?></h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="box_border">
                    <h4><b>Total Users :</b> <?php echo $total_users; ?></h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="box_border">
                    <h4><b> Total Order Amount :</b> <?php echo number_format($total_amount_overall, 2); ?></h4>
                </div>
            </div>
        </div>
    </div>
</section>