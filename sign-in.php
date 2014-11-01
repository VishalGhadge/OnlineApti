<?php
require './util.php';

//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['sess_Admin_Id']) || (trim($_SESSION['sess_Name']) == '')) {
    
} else {
    ?>

    <script type="text/javascript">
        location = "http://localhost:81/OnlineApti/sign-in.php";
    </script>
    <?php
}
?>
<!DOCTYPE html> 
<html>
    <head>
        <title><?php echo $Website_Title; ?></title>
        <link rel="shortcut icon" href="favicon.ico" type="<?php echo $Website_Favicon; ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="<?php echo $Website_Meta_Description; ?>" name="description" />
        <meta content="<?php echo $Website_Meta_Keyword; ?>" name="keyword" />
        <meta content="<?php echo $Website_Meta_Author; ?>" name="author" />



        <link rel="stylesheet" href="assets/css/demo.css" />
        <link rel="stylesheet" href="assets/css/sky-forms.css" />
        <link rel="stylesheet" href="assets/css/sky-forms-black.css" />
        <link rel="stylesheet" href="assets/css/form_validate.css" />
        <!--[if lt IE 9]>
                <link rel="stylesheet" href="assets/css/sky-forms-ie8.css">
        <![endif]-->

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!--<script src="assets/js/jquery.validate.min.js"></script>-->
        <!--[if lt IE 10]>
                <script src="assets/js/jquery.placeholder.min.js"></script>
        <![endif]-->		
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <script src="assets/js/sky-forms-ie8.js"></script>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body class="bg-cyan">
        
        <div class="body body-s bg">	  
            <div class="admin_login">

                <form action="" id="sky-form" class="sky-form" >
                    <header style="text-align: center;">
                        <h4 style ="color: #991717" class="semi-bold" >Administrator</h4>
                        <h5  class="" >Online Aptitude Test</h5>
                    </header>

                    <fieldset>					
                        <section>
                            <div class="row">
                                <label class="label col col-4">Username</label>
                                <div class="col col-8">
                                    <label class="input">
                                        <i class="icon-append icon-user"></i>
                                        <input type="text" name="Username" id="Username"/>
                                    </label>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="row">
                                <label class="label col col-4">Password</label>
                                <div class="col col-8">
                                    <label class="input">
                                        <i class="icon-append icon-lock"></i>
                                        <input type="password" name="Password" id="Password" />
                                    </label>
                                    <div class="note"><a href="#">Forgot password?</a></div>
                                </div>
                            </div>
                        </section>

                    </fieldset>
                    <div class="result sc_infobox " style="display: none;"></div>
                    <footer>
                        <div class="loader"><img src="assets/img/loader.GIF" style="display: none;"></div>

                        <div id="enter" class="button" >Login</div>
                       <!-- <a href="register.php" class="button button-secondary">Register</a> -->
                    </footer>
                </form>	
            </div>
        </div>

        <script src="assets/js/lib.js" type="text/javascript"></script>
    </body>
</html>