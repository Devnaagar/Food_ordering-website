<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
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
                          <th>Updatedat</th>
                          <th>Actions</th>
                          
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
                              <td><?php echo $user['updatedat']?></td>
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