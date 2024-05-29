<?php

   // echo "<pre>";print_r($cafeteria);die;
?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Cafeteria</h1>
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
                        <?php echo form_open('/admin/cafeteria/store_cafe'); ?>
                            <div class="card-body">
                                <div class="form-group col-lg-12 d-flex">
                                    <label for="location">Locations : &nbsp;</label>
                                        <select name="location_ref" id="location" class="form-control col-lg-3">
                                            <?php foreach($locations as $location): ?>
                                                <option value="<?php echo $location['id']; ?>"><?php echo $location['id']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    
                                    <label for="cafeteria_name" class="mx-3">Cafeteria Name : </label>
                                    <input type="text" name="caf_name" class="form-control col-lg-6" id="cafeteria_name" placeholder="Enter Cafeteria Name">
                                    
                                </div>
                                <div class="card-footer d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary" value="Create cafe" name="submit">Submit</button>
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
            <h1>Cafeteria</h1>
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
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">S.NO.</th>
                      <th>Cafeteria</th>
                      <th>Createdat</th>
                      <th>Updatedat</th>
                      <th>Locations</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($cafeteria)): ?>
                      <?php 
                        $sno=0;
                        ?>
                      <?php
                        foreach ($cafeteria as $cafe):
                        $sno+=1;
                        ?>
                        <tr>
                          <td><?php echo $sno; ?></td>
                          <td><?php echo $cafe['caf_name']; ?></td>
                          <td><?php echo $cafe['createdat']?></td>
                          <td><?php echo $cafe['updatedat']?></td>
                          <td><?php echo $cafe['loca_name']?></td>

                          <td>
                              <a href="<?php echo site_url('/admin/cafeteria/delete_cafeteria/'.$cafe['caf_id']); ?>" class="btn btn-danger">Delete</a>
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
                      
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

           
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


