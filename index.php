<?php 
    require_once 'app/auth/auth_register.php'; 
     

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pax Finalist</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<div class="limiter">
    <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" action="" method="POST">
                        <span class="login100-form-title p-b-26">
                            PAX FINALIST
                        </span>
                        <span class="login100-form-title p-b-48">
                            <i class="zmdi zmdi-font"></i>
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Enter fullname">
                            <input class="input100" type="text" name="fullname">
                            <span class="focus-input100" data-placeholder="Fullname"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter index number">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="text" name="index_number">
                            <span class="focus-input100" data-placeholder="Index Number"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter program">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="text" name="program">
                            <span class="focus-input100" data-placeholder="Program"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Select year">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="number" name="_date">
                            <span class="focus-input100" data-placeholder="Contact Number"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="submit" type="submit">
                                    SUBMIT
                                </button>
                            </div>
                        </div>
                    </form>
                </div><br><br>
                <div style="margin-left:30px"></div>
                <div> 
                    
                    <a href="exportData.php" class="btn btn-success pull-right">Export Members</a><br><br>
                    <?php require_once 'app/auth/auth_usertable.php'; ?>
                </div>        
    </div>
</div>

    

    <div id="dropDownSelect1"></div>


    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>