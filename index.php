<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ERDB-Multipurpose Cooperative</title>
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
    <!-- <link rel="stylesheet" type="text/css" href="main.css"> -->

    <script src = "https://www.gstatic.com/firebasejs/9.17.2/firebase-app.js"></script>
    <script src = "https://www.gstatic.com/firebasejs/9.17.2/firebase-auth.js"></script>
    <script src = "https://www.gstatic.com/firebasejs/9.17.2/firebase-database.js"></script>
    <script src = "index.js"></script>
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt>
            <img src="client/cooplogo.png" alt="IMG">
          </div>
          <form class="login100-form validate-form">
            <span class="login100-form-title"> ERDB <br>Multi-Purpose Cooperative</span>
            <div class="wrap-input100">
              <input class="input100" type="email" placeholder="Email" id= "email">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>
            <div class="wrap-input100">
              <input class="input100" type="password" placeholder="Password" id= "password">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>
            <div class="container-login100-form-btn">
              <button onclick= "login()" class="login100-form-btn">Login</button>
            </div>
            <div class="text-center p-t-136"></div>    
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

