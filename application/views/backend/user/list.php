<section class="content-header  px-4">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content px-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body">
                <!-- <div class="row"> -->
                <div class="table-responsive-sm">
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">S.NO.</th>
                          <th>Name</th>
                          <th>Mobile</th>
                          <th>Password</th>
                          <th>Createdat</th>
                          <th style="width: 180px">Actions</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($users)): ?>
                          <?php 
                            $sno=0;
                            ?>
                          <?php foreach ($users as $user): 
                            $sno+=1;
                            ?>
                            <tr>
                              <td><?php echo "$sno"; ?></td>
                              <td><?php echo $user['name']; ?></td>
                              <td><?php echo $user['mobile']; ?></td>
                              <td><?php echo $user['password']; ?></td>
                              <td><?php echo $user['createdat']?></td>
                              <td class="d-flex justify-content-between">
                                  <a href="<?php echo site_url('/admin/Users/edit/'.$user['user_id']); ?>" class="btn btn-warning">Edit</a>
                                  <a href="<?php echo site_url('/admin/Users/delete/'.$user['user_id']); ?>" class="btn btn-danger">Delete</a>
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
                  
                <!-- </div> -->
                
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
        if (messageType === 'warning') {
            $('#successToast .toast-header').addClass('bg-warning text-black');
            $('#successToast .close').addClass('text-black');
        } else if (messageType === 'danger') {
            $('#successToast .toast-header').addClass('bg-danger text-white');
            $('#successToast .close').addClass('text-white');
        }
        $('#successToast').toast('show');
    <?php endif; ?>
});
</script>