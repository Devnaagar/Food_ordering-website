<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php 
    // echo validation_errors();

?>

<style>
    .login{
        margin-top: 10px;
    }
    .container{
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .row{
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
        margin-top: 20px;
    }

    .sign:hover{
        color:#fff
    }

    .create{
        width: 100%;
    }

    @media (max-width: 981px){
        .login{
            height: 80vh;
        }
        .container{
            height: 100%;
        }
        .account-box{
            transform: scale(1.4);
            height: 100%;
        }
    }
    @media (min-width: 982px) and (max-width:1111px) {
        .login{
            height: 80vh;
        }
        .container{
            height: 100%;
        }
        .account-box{
            /* transform: scale(1.4); */
            height: 100%;
        }
    }



</style>

<section class="login">
    <div class="container">
        <!-- <div class="row d-flex justify-content-center outer"> -->
            <div class="col-lg-6 col-md-8 col-sm-10 col-12">
                <div class="account-box">
                    <div class="row d-flex justify-content-center">
                        <div class="logo">
                            <h3 class="m-0">Sign In</h3>
                        </div>
                    </div>
                    <br><br>
                    <form class="form-signin" action="<?php echo site_url('Authentication/Login/do_login'); ?>" method="post">
                        <div class="form-group mb-3 col-lg-12">
                            <input type="text" class="form-control " placeholder="Mobile Number" required autofocus name="mobile"/>
                        </div>
                        <div class="form-group mb-3 col-lg-12">
                            <input type="password" class="form-control " placeholder="Password" name="password" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-lg btn-primary sign" type="submit">Sign in</button>
                        </div>
                    </form>
                    <br><br>
                    <div class="or-box text-center col-lg-12 d-flex justify-content-between">
                        <h5 class="text-primary">If you don't have an account</h5>
                        <a href="<?php echo site_url('Validate'); ?>" class="btn btn-primary create col-lg-3 col-sm-3">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>