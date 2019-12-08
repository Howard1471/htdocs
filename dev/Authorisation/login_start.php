

<?php 
include "../core/header.php";
include "../core/Constants.php";
?>

<title>Awards Registration</title>
</head>
<body>
<div class="container-fluid container_restrict">

    <div class="row ph_background" style="vertical-align: middle;">
        <div class = "col-md-2">
            <img src="../images/snarc_logo_colour.png">
        </div>
        <div class="col-md-8 pageheader"><h1>Login / Register Page</h1></div>
        <div class = "col-md-2">
            <img class="float-md-right" src="../images/snarc_logo_colour.png">
        </div>
    </div>

    <div class="col-md-12" style = "height:20px;"></div>
    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-4 loginbox" style = "height:400px;">
            <form name="loginBox">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="col-md-12 h-20 "><h1>LOGIN</h1></div>
                        <div class="col-md-12 h-10 " style="text-align:left;">username</div>
                        <div class="col-md-12 h-20 "><input class="logintextbox  text-center" type="text" placeholder="login name"/>  </div>
                        <div class="col-md-12 h-10 mt-3 " style="text-align:left;">password</div>
                        <div class="col-md-12 h-20 "><input class="logintextbox  text-center" type="text" placeholder="password"/></div>
                        <div class="col-md-12 h-20"><input class="btn btn-primary loginbutton" type = "button" id="loginBtn" value="Login" /></div>
                        <div class="col-md-12 h-20"><input class="btn btn-primary loginbutton" type = "button" id="registerBtn" value = "Register" /></div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </form>
        </div>   

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <p>please log in to access the member functions of this website</p>
                    <p>If you haven't registered with this site please do so before trying to login.</p>
                    <p>You will be asked to provide a valid email address to which we will send a validation email.  Until that email
                        is responded to your new account will remain locked</p>
                    <p>Please note that registering with this website does not constitute membership of the 
                    <?php echo GROUP_NAME; ?> Club</p>
                       
                </div>
                <div class="col-md-1"></div>
                
            </div>
        </div>
        
    </div>
</div>

<?php include "../core/footer.php";


