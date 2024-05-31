<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Name - Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        .foot{
            color: aliceblue;
            height: 90px;
        }
        .texts{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#" >Re-MEAL</a>
    </nav>

    <div class="content d-flex justify-content-center align-items-center">
    <?php echo $contents; ?>
    </div>

    <footer class="bg-dark text-center text-lg-start mt-auto foot">
        <div class="texts">

            <p><strong>For any assistance, please feel free to call CS Helpdesk at 0288 35 12345, Email ID : . You may refer to User Manual or FAQs for assistance as most of your queries in relevance are addressed. &copy; 2014-2021 <a href="https://adminlte.io">jmd.cshelpdesk@zmail.ril.com</a>.</strong>
                <br>All rights reserved.</p>
            

        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
