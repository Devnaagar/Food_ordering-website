<?php

//    echo "<pre>";print_r($mobile_number);die;
?>
<br><br><br>
<section class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-sm-8 col-12">
                <div class="card card-primary">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('Authentication/Signup/add_new_user'); ?>
                        <div class="card-body">
                            <h3 class="text-center">Sign Up</h3>
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="fullname" name="fullname" class="form-control" id="fullname" placeholder="Enter Full name" required>
                            </div> 
                            <div class="form-group">
                                <label for="mobile_number">Mobile</label>
                                <input type="mobile" name="mobile_number" class="form-control" id="mobile_number" value="<?php echo $mobile_number ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control" id="Password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</section>