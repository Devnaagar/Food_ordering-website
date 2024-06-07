<style>
    
</style>

<?php if($this->session->flashdata('error')): ?>
        <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Admin Login</h2><br><br>
                    <form action="<?php echo site_url('admin/admin_login/do_login'); ?>" method="post" class="">
                        <div class="form-group">
                            <label for="email"><h5>Email</h5></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><h5>Password</h5></label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary col-lg-12">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
