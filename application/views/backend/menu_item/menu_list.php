<?php 
    // echo "<pre>";print_r($items);die;
?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add Menu Items</h1>
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
                      <th>Dish Name</th>
                      <th>Price</th>
                      <th>Meal Type</th>
                      <th>Location</th>
                      <th>Cafeteria</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($items)): ?>
                      <?php 
                        $sno=0;
                        ?>
                      <?php foreach ($items as $row) : 
                        $sno+=1;
                        ?>
                        <tr>
                          <td><?php echo $sno; ?></td>
                          <td><?php echo $row['dish_name']; ?></td>
                          <td><?php echo $row['price']; ?></td>
                          <td><?php echo $row['meal_name']; ?></td>
                          <td><?php echo $row['loca_name']; ?></td>
                          <td><?php echo $row['caf_name']; ?></td>
                          <td>
                              <a href="<?php echo site_url('/admin/menu/edit_menu/'.$row['dish_id']); ?>" class="btn btn-warning">Edit</a>
                              <a href="<?php echo site_url('/admin/menu/delete_menu/'.$row['dish_id']); ?>" class="btn btn-danger">Delete</a>
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