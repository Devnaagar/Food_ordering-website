    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Users</h1>
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
                <?php echo form_open('admin/Users/add_user_post'); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputfullname1">Full Name</label>
                            <input type="fullname" name="fullname" class="form-control" id="exampleInputfullname1" placeholder="Enter Full name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputmobile1">Mobile</label>
                            <input type="mobile" name="mobile" class="form-control" id="exampleInputmobile1" placeholder="Enter mobile" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" value="Create User" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
      </div>
    </section>

