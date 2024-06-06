
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
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand all_text" href="#">R-Meal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item all_text">
                    <a class="nav-link all_text" aria-current="page" href="<?php echo base_url(); ?>Home"><i class="fa-solid fa-house"></i></a>
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
                <li class="nav-item">
                    <a class="nav-link all_text" href="<?php echo base_url(); ?>Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                </li>
            </ul>
        </div>
        <div class="d-flex" role="search">
                <a class="text-decoration-none all_text" type="submit" href="<?php echo base_url(); ?>Logout"><input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>"/><?php echo $this->session->userdata('user_name'); ?> <i class="fa-solid fa-user ml-2"></i></a>
            </div>
    </div>
</nav>

    <div class="content">
    <?php echo $contents; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
