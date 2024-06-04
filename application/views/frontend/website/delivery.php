<?php

   // echo "<pre>";print_r($cafeteria);die;
?>

<br><br><br>
    <section class="content">
        <div class="container">
            <div class="row">
                <h5>Delivery Address </h5>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('/home/Home/add_address'); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputfullname1">Full Name :</label>
                                            <input type="fullname" name="name" class="form-control" id="exampleInputfullname1" placeholder="Enter Full name" value="<?php echo $this->session->userdata('user_name'); ?>" required>
                                            <input type="hidden" value="<?php echo $this->session->userdata('user_id')?>" name="user_id"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputmobile1">Mobile :</label>
                                            <input type="mobile" name="mobile" class="form-control" id="exampleInputmobile1" placeholder="Enter mobile" value="<?php echo $this->session->userdata('mobile'); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="house_no">House No :</label>
                                            <input type="text" name="house_no" class="form-control" id="house_no" placeholder="house no.." required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="street">Street/Building</label>
                                            <input type="text" name="street" class="form-control" id="street" placeholder="street" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="landmark">Landmark :</label>
                                            <input type="text" name="landmark" class="form-control" id="landmark" placeholder="landmark" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="pincode">Pincode :</label>
                                            <input type="number" name="pincode" class="form-control" id="pincode" placeholder="Pincode" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary" value="Create User" name="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th style="width: 10px">S.NO.</th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>House No</th>
                                <th>Street</th>
                                <th>LandMark</th>
                                <th>Pincode</th>
                                <th>Updatedat</th>
                                <th>Actions</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($address)): ?>
                                <?php 
                                    $sno=0;
                                    ?>
                                <?php
                                    foreach ($address as $row):
                                    $sno+=1;
                                    ?>
                                    <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $this->session->userdata('user_id'); ?></td>
                                    <td><?php echo $row['user_name']; ?></td>
                                    <td><?php echo $row['user_mobile']?></td>
                                    <td><?php echo $row['house_no']?></td>
                                    <td><?php echo $row['street']?></td>
                                    <td><?php echo $row['landmark']?></td>
                                    <td><?php echo $row['pincode']?></td>
                                    <td><?php echo $row['updatedat']?></td>

                                    <td>
                                        <a href="<?php echo site_url('home/Home/delete_address/'.$row['deli_id']); ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="10" class="text-center">No users found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


