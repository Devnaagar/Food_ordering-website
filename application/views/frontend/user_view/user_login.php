<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php 
    // echo validation_errors();

?>

<style>
    .container{
        height: 100%;
    }
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
    width: 138px;
    height: 30px;
    text-align: center;
}

.forgotLnk
{
    margin-top: 10px;
    display: block;
}

.form-signin{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

.checkbox{
    padding-left: 35px;
}

.purple-bg
{
    background-color: #6E329D;
    color: #fff;
}
.or-box
{
    /* position: relative; */
    border-top: 1px solid #dfdfdf;
    padding-top: 20px;
    width: 100%;
    /* margin-top:20px; */
}

.sign{
    box-shadow: 2px 3px 5px black;
}

.sign:hover{
    color:#fff
}

.create{
    width: 100%;
}




</style>


<!------ Include the above in your HEAD tag ---------->
<section>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-sm-8 col-12">
                <div class="account-box">
                    <div class="row d-flex justify-content-center">
                        <div class="logo ">
                            <h3 class="m-0">Sign In</h3>
                        </div>
                    </div>
                    <br><br>
                    <form class="form-signin" action="<?php echo site_url('Authentication/Login/do_login'); ?>" method="post">
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control " placeholder="Mobile Number" required autofocus name="mobile"/>
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="password" class="form-control " placeholder="Password" name="password" />
                        </div>
                        
                        <button class="btn btn-lg col-md-6  btn-primary sign" type="submit">
                            Sign in</button>
                        </form>
                        <br><br>
                        
                        <div class="or-box row-block">
                            <h5 class="text-primary">If do'not have account</h5>
                        <div class="row col-lg-12 d-flex justify-content-center">
                            <div class="row-block col-lg-6 d-flex justify-content-center ml-5">
                                <a href="<?php echo site_url('Validate'); ?>" class="btn btn-primary create">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>