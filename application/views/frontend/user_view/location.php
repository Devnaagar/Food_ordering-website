<?php

//    echo "<pre>";print_r($locations);die;
?>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
    .account-box
{
    border: 2px solid rgba(153, 153, 153, 0.75);
    border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    -khtml-border-radius: 2px;
    -o-border-radius: 2px;
    /* z-index: 3; */
    font-size: 13px !important;
    font-family: "Helvetica Neue" ,Helvetica,Arial,sans-serif;
    background-color: #ffffff;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.logo
{
    width: 308px;
    height: 30px;
    text-align: center;
}

.form-signin{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

#location{
    height: 50px;
}


.sign{
    box-shadow: 2px 3px 5px black;
}

.sign:hover{
    color:#fff
}






</style>


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 ">
            <div class="account-box">
                <div class="row d-flex justify-content-center">
                    <div class="logo ">
                        <h4 class="m-0">Select your location</h4>
                    </div>
                </div>
               <br>
                <form class="form-signin" action="<?php echo site_url('Home'); ?>" method="post">
                    <div class="form-group col-lg-12">
                        <select name="location_ref" id="location" class="form-control col-lg-12">
                            <?php foreach($locations as $location): ?>
                                <option value="<?php echo $location['id']; ?>"><?php echo $location['Loca_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-lg col-md-6  btn-primary sign" type="submit">
                        Proceed</button>
                </form>
                <br><br>
            </div>
        </div>
    </div>
</div>
