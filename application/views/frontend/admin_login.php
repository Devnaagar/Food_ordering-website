<style>
    .password-container {
    position: relative;
    width: 100%;
}
    input[type="password"], input[type="text"] {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

.eye-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    user-select: none;
    display: inline-block;
    width: 24px;
    height: 24px;
}

.eye-icon .eye {
    position: absolute;
    top: 0;
    left: 0;
}

.eye-icon .slash {
    position: absolute;
    top: 0;
    left: 10px;
    width: 5%;
    height: 100%;
    background: black;
    transform: rotate(45deg);
    display: none;
}

.eye-icon.visible .slash {
    display: block;
}
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
                    <?php //echo  $this->input->cookie('user_email',true);?>
                    <form action="<?php echo site_url('admin/admin_login/do_login'); ?>" method="post" class="">
                        <div class="form-group">
                            <label for="email"><h5>Email</h5></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email_cookie) ? $email_cookie : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><h5>Password</h5></label>
                            <div class="password-container">
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($password_cookie) ? $password_cookie : ''; ?>" required>
                                <span id="togglePassword" class="eye-icon">
                                    <span class="eye">👁️</span>
                                    <span class="slash"></span>
                                </span>
                            </div>
                            
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me" <?php echo isset($email_cookie) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="remember_me">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary col-lg-12">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    
    // Toggle the eye icon (optional)
    this.classList.toggle('visible');
});
</script>

