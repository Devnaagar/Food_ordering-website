<?php

   // echo "<pre>";print_r($cafeteria);die;
?>

<style>


</style>

<section class="content-header px-4">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Cafeteria</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content px-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('/admin/cafeteria/store_cafe'); ?>
                            <div class="card-body">
                                <div class="form-group col-lg-12 d-flex flex-wrap">
                                    <label for="location" class="mx-3">Locations:&nbsp;</label>
                                    <select name="location_ref" id="location" class="form-control col-lg-2">
                                        <?php foreach($locations as $location): ?>
                                            <option value="<?php echo $location['id']; ?>"><?php echo $location['Loca_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                    <label for="cafeteria_name" class="mx-3 loca">Cafeteria Name:</label>
                                    <input type="text" name="caf_name" class="form-control col-lg-7" id="cafeteria_name" placeholder="Enter Cafeteria Name">
                                    
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

    <section class="content-header px-4">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cafeteria</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content px-4">
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
                      <th>Cafeteria</th>
                      <th>Locations</th>
                      <th>Createdat</th>
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
                          <td><?php echo $cafe['loca_name']?></td>
                          <td><?php echo $cafe['createdat']?></td>

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

    <div aria-live="polite" aria-atomic="true" style="position: relative;">
    <div style="position: fixed; top: 1rem; left: 50%; transform: translateX(-50%); z-index: 9999;">
        <div class="toast" id="successToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header">
                <strong class="mr-auto">Notification</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function() {
    // Check if there's a flashdata message and show the toast
    <?php if($this->session->flashdata('message')): ?>
        var messageType = "<?php echo $this->session->flashdata('message_type'); ?>";
        if (messageType === 'success') {
            $('#successToast .toast-header').addClass('bg-success text-white');
            $('#successToast .close').addClass('text-white');
        } else if (messageType === 'danger') {
            $('#successToast .toast-header').addClass('bg-danger text-white');
            $('#successToast .close').addClass('text-white');
        }
        $('#successToast').toast('show');
    <?php endif; ?>
});
</script>

