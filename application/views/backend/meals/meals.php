<?php

   // echo "<pre>";print_r($cafeteria);die;
?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Meals</h1>
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
                        <?php echo form_open('/admin/meals/store_meal'); ?>
                            <div class="card-body">
                                <div class="form-group col-lg-12 d-flex flex-wrap">
                                    <label for="meal_name" class="mx-2">Meal Type: </label>
                                    <input type="text" name="meal_name" class="form-control col-lg-11" id="meal_name" placeholder="Enter meal-Type">  
                                </div>  
                            </div>
                            <div class="card-footer d-flex justify-content-center p-0 mb-2">
                                <button type="submit" class="btn btn-primary" value="Create meal" name="submit">Save</button>
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
            <h1>Meals</h1>
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
                      <th>Meals</th>
                      <th>Createdat</th>
                      <th style="width: 100px">Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($meals)): ?>
                      <?php 
                        $sno=0;
                        ?>
                      <?php
                        foreach ($meals as $meal):
                        $sno+=1;
                        ?>
                        <tr>
                          <td><?php echo $sno; ?></td>
                          <td><?php echo $meal->meal_name; ?></td>
                          <td><?php echo $meal->createdat?></td>

                          <td>
                              <a href="<?php echo site_url('/admin/meals/delete_meal/'.$meal->meal_id); ?>" class="btn btn-danger">Delete</a>
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


