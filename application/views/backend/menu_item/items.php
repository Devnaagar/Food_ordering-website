<?php

//    echo "<pre>";print_r($data);die;
?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Menu Items</h1>
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
                        <?php echo form_open('/admin/menu/store_dish_info'); ?>
                            <div class="card-body ">
                                <div class="form-group col-lg-12 d-flex flex-wrap">
                                    <label for="dish_name" class="mx-2">Dish Name: </label>
                                    <input type="text" name="dish_name" class="form-control col-lg-11" id="dish_name" placeholder="Enter dish Name" required>
                                </div>
                                <div class="form-group col-lg-12 d-flex flex-wrap">
                                    <label for="price" class="mr-1">Price: </label>
                                    <input type="text" name="price" class="form-control col-lg-5" id="price" placeholder="Enter price" required>
                                    <label for="meal" class="ml-2">Meal: &nbsp;</label>
                                    <select name="meal_id" id="meal" class="form-control col-lg-6" required>
                                        <option value="">select Meal Type</option>
                                        <?php foreach($meals as $meal): ?>
                                            
                                                <option value="<?php echo $meal->meal_id; ?>"><?php echo $meal->meal_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12 d-flex flex-wrap">
                                    
                                    <label for="location" class="mx-2">Locations: &nbsp;</label>
                                    <?php if(!empty($location)): ?>
                                    <select name="location_id" id="location" class="form-control col-lg-5" required>
                                        <option value="">select location</option>
                                        <?php 
                                            foreach($location as $row){
                                                echo '<option value="'.$row->id.'">'.$row->Loca_name.'</option>';
                                            }
                                        ?> 
                                    </select>
                                    <?php else: ?>
                                        <p>No users found.</p>
                                    
                                    <?php endif; ?>
                                    <label for="cafeteria" class="mx-2">Cafeteria: &nbsp;</label>
                                        <select name="cafeteria_id" id="cafeteria" class="form-control col-lg-5" required>
                                            <option value="">select cafeteria</option>
                                        </select>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>
    $(document).ready(function(){
        $("#location").on('change',function(){
           
            var location_id=$('#location').val();
             //alert(location_id);
            if(location_id !=''){
                $.ajax({
                    url:"<?php echo base_url();?>admin/menu/fetch_cafeteria ",
                    method: "POST",
                    data:{location_id:location_id},
                    success:function(data){
                        $('#cafeteria').html(data);
                    }
                });
            } else{
                $('#cafeteria').html('<option value ="">Select State </option>');
            }
        })
    });
</script>

    

