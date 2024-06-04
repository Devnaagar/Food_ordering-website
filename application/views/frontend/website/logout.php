<style>
    .logout{
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        border-radius: 20px;
    }
    .link{
        color:white;
        text-decoration: none;
        font-size: 1rem;
    }
</style>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
            <div class="logout text-center">
                <div class="row d-flex flex-column align-items-center justify-content-between mt-3">
                    <h5 class="mt-3">Are you sure to logout ? </h5>
                    <p>You will be returned to the login screen.</p>
                </div>
                <div class="row d-flex justify-content-center ">
                    <div class="col-lg-10 d-flex justify-content-evenly my-3">
                        <button class="btn btn-danger"><a href="<?php echo base_url(); ?>home/Home/logout_session" class="link">Logout</a></button>
                        <button class="btn btn-primary "><a href="<?php echo base_url(); ?>Home" class="link">Cancel</a></button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
