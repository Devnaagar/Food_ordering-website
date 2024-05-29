<style>
    
</style>

<?php if($this->session->flashdata('error')): ?>
        <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Admin Login</h2>
            <form action="<?php echo site_url('admin/admin_login/do_login'); ?>" method="post" class="">
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary col-lg-12"><a href="">Login</a></button>
            </form>
        </div>
    </div>
</div>
