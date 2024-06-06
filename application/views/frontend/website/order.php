<style>
    
    .req{
        font-size: 1.5rem;
        color:red;
    }
    .date{
        border:none;
        border-bottom: 2px solid grey;
    }
    .feature{
        margin-top: 20px;
    }
    .link{
        color:white;
        text-decoration: none;
        font-size: 1rem;
    }
    .choice_sel{
        border: none;
        border-bottom: 2px solid grey;
        width: 100%;
        margin-top: 10px;
    }
    .new_book{
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        border-radius: 10px;
    }
    .bg-primary{
        border-top-left-radius: 10px ;
        border-top-right-radius: 10px ;
        padding: 10px;
    }
    .accept{
        font-size: 12px;
    }
    .search_box{
        background-color: lightblue;
        border:none;
        color: grey;
        font-size: 15px;
    }
    .fa-magnifying-glass{
        margin-top: 5px;
    }
    .hidden{
        display: none;
    }
    .border_wale{
        border: none;
        border-bottom: 2px solid grey;
    }
</style>
<br><br><br>
<section >
    <div class="container">
        <div class="row">
            <h3>Booking / View </h3>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-4 d-flex justify-content-between">
                <div class="date_space">
                <label for="start" class="din">For Date : <span class="req">*</span></label><br>
                <input type="date" id="start" name="trip-start" value="<?php echo date("Y-m-d")?>" min="2000-01-01" max="2099-12-31" class="date"/>
                </div>
                <div class="feature">
                    <button class="btn btn-primary"><a href="<?php echo base_url(); ?>Booking" class="link">New</a></button>
                    <button class="btn btn-primary"><a href="#" class="link">View</a></button>
                </div>
            </div>
        </div>
        
    </div>
</section><br><br>
<section>
    <form method="POST" action="<?php echo base_url(); ?>Confirm-order">
    <div class="container new_book">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 bg-primary">
                        <h5 class="text-white">New Booking</h5>
                    </div>
                </div>
            </div>
        </div><br>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div class="col-lg-3">
                        
                        <label for="meals">Choice</label><br>
                        <select class=" choice_sel inputBox " name="meals" id="meals">
                            <option>Select Meal</option>
                            <?php
                                foreach($meals as $meal){
                                    echo "<option value = '$meal->meal_id'>$meal->meal_name</option>"; 
                                }
                                
                                          
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="mode">Mode</label><br>
                        <select class="choice_sel" name="mode" id="mode">
                            <option>---</option>
                            <option>Online</option>
                            <option>Coupon</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="cafeteria">Cafeteria</label><br>
                        <select class="choice_sel" name="cafeteria" id="cafeteria" >
                            <option>---</option>
                             <?php //print_r($cafeteria);
                             foreach ($cafeteria as $row) {
                               echo "<option value='$row->caf_id'> $row->caf_name</option>";
                            }
                             
                             ?>
                        </select>
                    </div>
                    
                </div>
            </div><br><br>
            <div class="row ">
                <div class="col-lg-12 d-flex justify-content-center">
                    <button type="button" class="fetch_all btn btn-primary" onclick="different_calls()" id="toggleButton">
                        <a class="link" href="#" >Fetch</a>     
                    </button>
                </div>
            </div>
        <br><br>

        <div class="container hidden">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend search_box">
                                <span class="input-group-text search_box" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </div>
                            <input type="text" class="form-control search_box" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="searchInput">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead >
                                    <tr>
                                        <th class="col-lg-1">S.NO.</th>
                                        <th class="col-lg-4"><em>Name</em></th>
                                        <th class="col-lg-2"><em>Rate</em></th>
                                        <th class="col-lg-2"><em>Quantity</em></th>
                                        <th class="col-lg-2"><em>Price</em></th>
                                    </tr>
                                </thead>
                                <tbody id="food_list">
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div><br>
                    <div class="row d-flex justify-content-center mb-5">
                        <div class="col-lg-3">
                            <label for="gtotal">Total : </label>
                            <input class="gtotal form-control" value="00" id="gtotal" name="g_total"/>
                            <!-- <input name="g_total" value="calculateTotal()" /> -->
                            <input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" name="user_id_ref"/>
                            <input type="hidden" id="order_num" name="order_num"/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><br>


<section>
    <div class="container">
        <div class="row">
            <p class="accept">"I accept policy" By visiting this Website you agree to be bound by the terms and conditions of this Privacy Policy.</p>
        </div>
    </div>
</section><br><br><br>

<footer class="fixed-bottom bg-light">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 d-flex justify-content-center bg-light">
                <button class="btn btn-primary m-3" type="submit" onclick="generateRandomString()"><a class="link">Order Now</a></button>
            </div>
        </div>
    </div>
</footer>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    
    $(document).ready(function(){
        $("#cafeteria").on('change',function(){
            var meal_id=$('#meals').val();
            var cafeteria_id = $('#cafeteria').val();
            if(meal_id !='' && cafeteria_id!=''){
                $.ajax({
                    url:"<?php echo base_url();?>home/Home/get_list_menu ",
                    method: "POST",
                    data:{meal_id:meal_id ,cafeteria_id: cafeteria_id},
                    success:function(data){
                        $('#food_list').html(data);
                    }
                });
            } else{
                $('#food_list').html('<h3> No DATA</h3>');
            }
        })
    });

    function sub_total(dish_id){
        let iprice= $("#price_"+dish_id).val();
        let qty_num= $("#qty_"+dish_id).val();
        let subtotal_price= (iprice*qty_num);
        let subtotal= $('#total_'+dish_id).val(subtotal_price);
        function calculateTotal() {
                let grandTotal = 0;
                $('.sub_total').each(function() {
                    grandTotal += parseFloat($(this).val()) || 0;
                });
                $('#gtotal').val(grandTotal);
            }
            $('.sub_total').on('input', calculateTotal);
            calculateTotal();
    }
    function checkInputValue(dish_id) {
            var qty = document.getElementById('qty_' + dish_id).value;
            var checkbox = document.getElementById('checkbox_' + dish_id);
            if (qty > 0) {
                checkbox.checked = true;
                checkbox.style.display = 'none';
            } else {
                checkbox.checked = false;
                checkbox.style.display = 'none';
            }
        }
        function generateRandomString() {
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            var result = '';
            for (var i = 0; i < 8; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            document.getElementById('order_num').value = result;
        }
</script>

<script>
        function different_calls() {
            const selectElements = document.querySelectorAll('select');
            selectElements.forEach(select => {
                select.disabled = true;
            });
        }
        $(document).ready(function(){
            $(document).ready(function(){
                $('#toggleButton').click(function(){
                    $('.hidden').toggle();
                });
            });
        });
</script>
