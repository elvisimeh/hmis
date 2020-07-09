<?php

    $msg ='Sign In';
   	

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HIMS | Login</title>
    <!--[if lt IE 9]>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/applied-logo.png" type="image/x-icon">
    <!-- Google font-->
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

<style>
section{
  height: 100vh !important;
  /*background: url('../assets/images/stethoscope_new.png') fixed no-repeat !important;*/
  background-image: url('assets/images/stethoscope_new.png') !important;
  background-size: cover !important;
/**
  -webkit-filter: blur(10px);
  -moz-filter: blur(10px);
  -o-filter: blur(10px);
  -ms-filter: blur(10px);
  filter: blur(10px);
  **/
}

.auth-box{
    width : 400px;
    background-color: rgba(255, 255, 255, 0.5)
}



form{
  text-align: center;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
}
input{
  background: 0;
  width: 200px;
  outline: 0;
  border: 0;
  border-bottom: 2px solid rgba(255,255,255, 0.3);
  margin: 20px 0;
  padding-bottom: 10px;
  font-size: 18px;
  font-weight: bold;
  color: rgba(255,0,0, 0.8);
}
input:focus{
  color: rgba(52,63,79, 0.8);
  transform: scaleX(1) translateY(-2px); 
  border-bottom-color: #ff7676;  
  opacity: 1;
}
</style>

</head>

<body class="fix-menu">

        <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
					<form name="form1" method="POST" action="model/sign-in.php">
                            <div class="text-left">
                                <img src="assets/images/auth/applied-logo3.png" alt="small-logo.png" width="268" height="37">
                            </div>
                            <div class="auth-box" id="container">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h5 class="text-left txt-primary"><font color ="red"><?php echo $msg;?></font></h5>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="text" name ="username" class="form-control" placeholder="Your Username">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" name ="password" class="form-control" placeholder="Password">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    
                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <a href="auth-reset-password" class="text-right f-w-600 text-inverse"> Forgot Your Password?</a>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name ="commit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    
                                    <div class="col-md-2">
                                        <img src="assets/images/auth/applied-logo.png" alt="small-logo.png">
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
        
    </section>
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>
