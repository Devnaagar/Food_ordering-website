
<?php

//    echo "<pre>";print_r($data);die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R-MEAL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: navy;
            /* color: white; */
        }
        .navigaion{
            color: white;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .all_text{
            color: white;
            width: 40%;
            display: flex;
            justify-content: start;
            align-items: center;
        }

        .home_con{
            display: flex;
            justify-content: space-between;
        }
        .all_text:hover{
            color: aqua;
        }
        .all_text:focus{
            color: aqua;
        }
        .list_center{
            width: 200px;
        }
        .space{
            width: fit-content;
        }
        .divider{
            width: 100%;
            /* display: flex; */
            /* justify-content: space-between; */
            /* flex-wrap: wrap; */
        }

        .profile{
            width: 80px;
        }
        .alg{
            display: flex;
            justify-content: start;
            align-items: center;
        }
        .full_text{
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            border: 2px solid white;
            border-radius: 5px;
            padding: 5px;
        }
        @media (min-width:992px){
            .divider{
                display: flex;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <div class="row" style="width:100%">
            <div class="col-lg-12 col-md-12">
                <div class="home_con flex-wrap">
                    <a class="navbar-brand all_text" href="#"><h4>R-Meal</h4></a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="divider">
                            <!-- <div class="divider1"> -->
                                <ul class="navbar-nav mb-2 mb-lg-0">
                                    <li class="nav-item all_text">
                                        <a class="nav-link text-light" aria-current="page" href="<?php echo base_url(); ?>Home"><i class="fa-solid fa-house"></i></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle all_text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Booking
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>Booking">Book Now/ View</a></li>
                                            <li><a class="dropdown-item" href="#">My basket</a></li>
                                            <li><a class="dropdown-item" href="#">Coupon Balance</a></li>
                                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>Address">Delivery Address</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link all_text" href="https://rmeal.ril.com/web/TransForm/RMeal_Customer_User_Manual.pdf">Help</a>
                                    </li>
                                    <li class="nav-item alg">
                                        <a class="nav-link all_text" href="<?php echo base_url(); ?>Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                                    </li>
                                </ul>
                            <!-- </div> -->
                            
                            <div class="d-flex profile" role="search">
                                <a class="text-decoration-none text-light all_text full_text" type="submit" href="<?php echo base_url(); ?>Logout"><input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" class="mr-2"/><?php echo $this->session->userdata('user_name'); ?> <i class="fa-solid fa-user"></i></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
   
    </div>
</nav>
<br><br>
    <div class="content">
    <?php echo $contents; ?>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
