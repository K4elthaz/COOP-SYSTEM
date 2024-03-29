<?php
session_start();
include("connections.php");



if (isset($_SESSION["idNumber"])) {
    $idNumber = $_SESSION["idNumber"];

    $query_account_type = mysqli_query($connections, "SELECT * FROM clients WHERE idNumber='$idNumber'");

    $get_account_type = mysqli_fetch_assoc($query_account_type);

    $account_type = $get_account_type["account_type"];

    if ($account_type == 1) {
        echo "<script>window.location.href='Admin/controlPanel.php';</script>";
    } else {
        echo "<script>window.location.href='Client/home.php';</script>";
    }
}

$idNumber = $password = "";
$idNumberErr = $passwordErr = "";

if (isset($_POST["btnLogin"])) {

    if (empty($_POST["idNumber"])) {
        $idNumberErr = "idNumber is Required!";
    } else {
        $idNumber = $_POST["idNumber"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is Required!";
    } else {
        $password = $_POST["password"];
    }

    if ($idNumber and $password) {
        $check_idNumber = mysqli_query($connections, "SELECT idNumber, password, account_type FROM login WHERE idNumber='$idNumber'
        UNION SELECT idNumber, password, account_type FROM clients WHERE idNumber='$idNumber'");

        $check_row = mysqli_num_rows($check_idNumber);

        if ($check_row > 0) {
            $fetch = mysqli_fetch_assoc($check_idNumber);

            $db_password = $fetch["password"];

            $account_type = $fetch["account_type"];

            if ($account_type == "1") {

                if ($db_password == $password) {
                    $_SESSION["idNumber"] = $idNumber;
                    echo "<script>window.location.href='Admin/controlPanel.php';</script>";
                } else {
                    $passwordErr = "Hi Admin, Your Password is Incorrect!!";
                }
            } else {
                if ($db_password == $password) {

                    $_SESSION["idNumber"] = $idNumber;
                    // mysqli_query($connections, "UPDATE login SET last_login=NOW() WHERE idNumber='$idNumber'");
                    echo "<script>window.location.href='Client/home.php';</script>";
                } else {
                    // mysqli_query($connections, "UPDATE login SET last_login=NOW() WHERE idNumber='$idNumber'");
                    $passwordErr = "Password is incorrect!";
                }
            }
        } else {
            $idNumberErr = "idNumber is not Registered!";
        }
    }
} else {
}
?>



<style>
.error {
    color: red;
}
</style>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">





    <!-- Styles -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap"
        rel="stylesheet">
    <link href="web/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="web/css/swiper.css" rel="stylesheet">
    <link href="web/css/styles.css" rel="stylesheet">


    <title>Login | ERDB-Multipurpose Cooperative</title>
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

    <link href="web/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="web/css/swiper.css" rel="stylesheet">
    <link href="web/css/styles.css" rel="stylesheet">
    <link rel="icon" href="web/images/coopnobg.png">


    <meta name="robots" content="noindex, follow">
    <script nonce="a822a476-1b98-4997-af61-6d989d0e9924">
    (function(w, d) {
        ! function(bv, bw, bx, by) {
            bv[bx] = bv[bx] || {};
            bv[bx].executed = [];
            bv.zaraz = {
                deferred: [],
                listeners: []
            };
            bv.zaraz.q = [];
            bv.zaraz._f = function(bz) {
                return function() {
                    var bA = Array.prototype.slice.call(arguments);
                    bv.zaraz.q.push({
                        m: bz,
                        a: bA
                    })
                }
            };
            for (const bB of ["track", "set", "debug"]) bv.zaraz[bB] = bv.zaraz._f(bB);
            bv.zaraz.init = () => {
                var bC = bw.getElementsByTagName(by)[0],
                    bD = bw.createElement(by),
                    bE = bw.getElementsByTagName("title")[0];
                bE && (bv[bx].t = bw.getElementsByTagName("title")[0].text);
                bv[bx].x = Math.random();
                bv[bx].w = bv.screen.width;
                bv[bx].h = bv.screen.height;
                bv[bx].j = bv.innerHeight;
                bv[bx].e = bv.innerWidth;
                bv[bx].l = bv.location.href;
                bv[bx].r = bw.referrer;
                bv[bx].k = bv.screen.colorDepth;
                bv[bx].n = bw.characterSet;
                bv[bx].o = (new Date).getTimezoneOffset();
                if (bv.dataLayer)
                    for (const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ, bK) => ({
                            ...bJ[1],
                            ...bK[1]
                        }))))) zaraz.set(bI[0], bI[1], {
                        scope: "page"
                    });
                bv[bx].q = [];
                for (; bv.zaraz.q.length;) {
                    const bL = bv.zaraz.q.shift();
                    bv[bx].q.push(bL)
                }
                bD.defer = !0;
                for (const bM of [localStorage, sessionStorage]) Object.keys(bM || {}).filter((bO => bO
                    .startsWith("_zaraz_"))).forEach((bN => {
                    try {
                        bv[bx]["z_" + bN.slice(7)] = JSON.parse(bM.getItem(bN))
                    } catch {
                        bv[bx]["z_" + bN.slice(7)] = bM.getItem(bN)
                    }
                }));
                bD.referrerPolicy = "origin";
                bD.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bv[bx])));
                bC.parentNode.insertBefore(bD, bC)
            };
            ["complete", "interactive"].includes(bw.readyState) ? zaraz.init() : bv.addEventListener(
                "DOMContentLoaded", zaraz.init)
        }(w, d, "zarazData", "script");
    })(window, document);
    </script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarExample">

    <!-- Navigation -->
    <nav id="navbarExample" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="web/index.php"><img src="web/images/coopnobg.png" style="width: 60px; height: auto;" alt="cooplogo"></a> 

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text" href="index.html">Evolo</a> -->

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="web/index.php#header">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="web/index.php#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="web/index.php">Details</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                            aria-expanded="false">Drop</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">


                            <li><a class="dropdown-item" href="web/terms.php">Terms Conditions</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li><a class="dropdown-item" href="web/privacy.php">Privacy Policy</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"></a>
                    </li>
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">

                    </span>

                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="client/cooplogo.png" alt="IMG">
                </div>
                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-title"> <b> Login to your account <b> </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid idNumber is required: ex@abc.xyz">
                        <input class="input100" type="text" name="idNumber" placeholder="Username"
                            value="<?php echo "$idNumber"; ?>">

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <span class="error"></span>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password" value="">

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <span class="error"></span>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="btnLogin" value="Login">Login</button>
                        <span class="error">
                            <?php echo $idNumberErr; ?>
                        </span>
                        <span class="error">
                            <?php echo $passwordErr; ?>
                        </span>
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

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>

    <script src="assets/js/main.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"7a48fe16aada017a","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}'
        crossorigin="anonymous"></script>

    <script src="web/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="web/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="web/js/scripts.js"></script> <!-- Custom scripts -->

</body>

</html>