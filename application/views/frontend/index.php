<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">


<head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="<?php echo base_url();?>imgs/logo.jpeg" alt="" width="10%">
            </div>
            <div class="back">
                <img class="backImg" src="<?php echo base_url();?>imgs/logo.jpeg" alt="" width="30%">
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Company Login</div>
                    <form method="post" action="<?php echo base_url();?>login/admin_login">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="phoneNumber" placeholder="Enter your email">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Enter your password">
                            </div>
                            <!-- <div class="text"><a href="#">Forgot password?</a></div> -->
                            <div>
                                <div class="button  input-box">
                                    <input type="submit" value='Submit'>
                                </div>
                            </div>
                            <div class="text sign-up-text">Are you new here? <label for="flip">Create an account</label></div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title">Company Signup</div>
                    <form method="post" action="<?php echo base_url();?>Login/register">
                        <div class="input-boxes">
                            <div class="input-box">
                            <i class="fa-solid fa-briefcase"></i>
                                <input type="text" name="name" placeholder="Enter your company name">
                            </div>
                            <!-- <div class="input-box">
                                <i class="fas fa-phone"></i>
                                <input type="phone" name="phone" placeholder="Enter your company phone number">
                            </div> -->
                            <!-- <div class="input-box">
                            <i class="fa-solid fa-briefcase"></i>
                                <input type="text" name="location" placeholder="Enter your company location">
                            </div> -->
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Enter your company email">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="confirmpassword" placeholder="Comfirm password">
                            </div>
                            <!-- <div class="text"><a href="#">Forgot password?</a></div> -->
                            <div>
                                <div class="button  input-box">
                                    <input type="submit" value='Submit'>
                                </div>
                            </div>
                            <div class="text sign-up-text">Already have an account? <label for="flip">Log In</label></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>