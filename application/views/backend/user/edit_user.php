

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Users</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
                <?php echo validation_errors(); ?>
                <?php echo form_open('admin/Users/update/'.$user['user_id']); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputfullname1">Full Name</label>
                            <input type="fullname" class="form-control" name="fullname" value="<?php echo set_value('name', $user['name']); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputmobile1">Mobile</label>
                            <input type="mobile" class="form-control" name="mobile" value="<?php echo set_value('mobile', $user['mobile']); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo set_value('password', $user['password']); ?>" >
                        </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary" value="Update user" name="submit">Update</button>
                    </div>
                </form>
            </div>
            </div>
          <div class="col-md-6">

          </div>
        </div>
      </div>
    </section>


