<?php
session_start();
include('dbcon.php');


if(isset($_POST['register_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'password' => $password,

    ];
    
    $createdUser = $auth->createUser($userProperties);

    if($createdUser){
        $_SESSION['status'] = "User Created";
        header('Location:login.php');
    }else{
        $_SESSION['status'] = "User not Created";
        header('Location:login.php');
    }

}
?>




<!-- REGISTRATION -->

<!DOCTYPE html>
<html lang="en">
<head>
<title>REGISTER | ERDB-Multipurpose Cooperative</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="util.css">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="main.css">

<meta name="robots" content="noindex, follow">
<script nonce="a822a476-1b98-4997-af61-6d989d0e9924">(function(w,d){!function(bv,bw,bx,by){bv[bx]=bv[bx]||{};bv[bx].executed=[];bv.zaraz={deferred:[],listeners:[]};bv.zaraz.q=[];bv.zaraz._f=function(bz){return function(){var bA=Array.prototype.slice.call(arguments);bv.zaraz.q.push({m:bz,a:bA})}};for(const bB of["track","set","debug"])bv.zaraz[bB]=bv.zaraz._f(bB);bv.zaraz.init=()=>{var bC=bw.getElementsByTagName(by)[0],bD=bw.createElement(by),bE=bw.getElementsByTagName("title")[0];bE&&(bv[bx].t=bw.getElementsByTagName("title")[0].text);bv[bx].x=Math.random();bv[bx].w=bv.screen.width;bv[bx].h=bv.screen.height;bv[bx].j=bv.innerHeight;bv[bx].e=bv.innerWidth;bv[bx].l=bv.location.href;bv[bx].r=bw.referrer;bv[bx].k=bv.screen.colorDepth;bv[bx].n=bw.characterSet;bv[bx].o=(new Date).getTimezoneOffset();if(bv.dataLayer)for(const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ,bK)=>({...bJ[1],...bK[1]})))))zaraz.set(bI[0],bI[1],{scope:"page"});bv[bx].q=[];for(;bv.zaraz.q.length;){const bL=bv.zaraz.q.shift();bv[bx].q.push(bL)}bD.defer=!0;for(const bM of[localStorage,sessionStorage])Object.keys(bM||{}).filter((bO=>bO.startsWith("_zaraz_"))).forEach((bN=>{try{bv[bx]["z_"+bN.slice(7)]=JSON.parse(bM.getItem(bN))}catch{bv[bx]["z_"+bN.slice(7)]=bM.getItem(bN)}}));bD.referrerPolicy="origin";bD.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bv[bx])));bC.parentNode.insertBefore(bD,bC)};["complete","interactive"].includes(bw.readyState)?zaraz.init():bv.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body>


<div class="limiter">

<div class="container-login100">
<div class="wrap-login100">
<div class="login100-pic js-tilt" data-tilt>
<img src="client/cooplogo.png" alt="IMG">
</div>

                <form class="login100-form validate-form" method="POST">
                  <span class="login100-form-title"> <b> REGISTER <b> </span>
                    <div class="wrap-input100 validate-input">
                      <input class="input100" id= "email" type="email" name="email" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                          <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                  
                    <div class="wrap-input100 validate-input">
                      <input class="input100" type="password" id= "password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                
                <div class="container-login100-form-btn">
                <button type="submit" name="register_btn" value = "register_btn" id = "register_btn" class="login100-form-btn">Submit</button>
                </div>
                

                <div class="text-center p-t-136">

                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="assets/vendor/bootstrap/js/popper.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/vendor/select2/select2.min.js"></script>

<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
<script>
	$('.js-tilt').tilt({
		scale: 1.1
	})
</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script src="assets/js/main.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a48fe16aada017a","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>