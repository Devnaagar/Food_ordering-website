<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add locations</h1>
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
                        <?php echo form_open('/admin/Locations/store_locat'); ?>
                            <div class="card-body d-flex">
                                <div class="form-group col-lg-11">
                                    <label for="exampleInputlocation1">Location : </label>
                                    <input type="text" name="location" class="form-control" id="exampleInputlocation1" placeholder="Enter Locations" required>
                                </div>
                                <div class="card-footer d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary" value="Create Location" name="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Locations</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
              <div class="table-responsive-sm">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">S.NO.</th>
                      <th>Locations</th>
                      <th>Createdat</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($locations)): ?>
                      <?php 
                        $sno=0;
                        ?>
                      <?php foreach ($locations as $location): 
                        $sno+=1;
                        ?>
                        <tr>
                          <td><?php echo "$sno"; ?></td>
                          <td><?php echo $location['Loca_name']; ?></td>
                          <td><?php echo $location['createdat']?></td>
                          <td>
                              <a href="<?php echo site_url('/admin/Locations/delete_locat/'.$location['id']); ?>" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                          <td colspan="7" class="text-center">No users found.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
                
              </div>
            </div>
                      
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


