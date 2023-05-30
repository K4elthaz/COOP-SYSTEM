<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" 
    integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" 
    crossorigin="anonymous">
</head>

<body>
    <div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="home.php">
                    <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Home
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="balance.php">
                    <i class="fa bi-wallet-fill fa-2x"></i>
                    <span class="nav-text">
                        View Balance
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="pdfDownload.php">
                    <i class="fa bi-file-earmark-fill fa-2x"></i>
                    <span class="nav-text">
                        Download Forms
                    </span>
                </a>
            </li>
            
            <li>
                <a href="CreateLoan.php">
                    <i class="fa bi-file-post-fill fa-2x"></i>
                    <span class="nav-text">
                        Apply Loan
                    </span>
                </a>
            </li>

            <li class="has-subnav">
                <a href="EditProfile.php">
                    <i class="fa bi-pencil-fill fa-2x"></i>
                    <span class="nav-text">
                        Edit Profile
                    </span>
                </a>
            </li>
            
            <li>
                <a href="notification.php">
                    <i class="fa bi-bell-fill fa-2x"></i>
                    <span class="nav-text">
                        Notification
                    </span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <i class="fa fa-cogs fa-2x"></i>
                    <span class="nav-text">
                        add more
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-map-marker fa-2x"></i>
                    <span class="nav-text">
                        add more
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-info fa-2x"></i>
                    <span class="nav-text">
                        add more
                    </span>
                </a>
            </li> -->
        </ul>

        <ul class="logout">
            <li>
                <a href="../login.php">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>


<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);


@import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);

.fa-2x {
    font-size: 2em;
}

.fa {
    position: relative;
    display: table-cell;
    width: 60px;
    height: 55px;
    text-align: center;
    vertical-align: middle;
    font-size: 24px;
}


.main-menu:hover,
nav.main-menu.expanded {
    width: 250px;
    overflow: visible;
}

.main-menu {
    /* glassmorphism */
    /* background: rgba(30, 29, 29, 0.75);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(18.7px);
    -webkit-backdrop-filter: blur(18.7px); */

    background: #212121;
    border-right: 1px solid #e5e5e5;
    position: absolute;
    top: 0;
    bottom: 0;
    height: 100%;
    left: 0;
    width: 60px;
    overflow: hidden;
    -webkit-transition: width .05s linear;
    transition: width .05s linear;
    -webkit-transform: translateZ(0) scale(1, 1);
    z-index: 1000;
}

.main-menu>ul {
    margin: 7px 0;
}

.main-menu li {
    position: relative;
    display: block;
    width: 250px;
}

.main-menu li>a {
    position: relative;
    display: table;
    border-collapse: collapse;
    border-spacing: 0;
    color: #999;
    font-family: arial;
    font-size: 17px;
    text-decoration: none;
    -webkit-transform: translateZ(0) scale(1, 1);
    -webkit-transition: all .1s linear;
    transition: all .1s linear;

}

.main-menu .nav-icon {
    position: relative;
    display: table-cell;
    width: 60px;
    height: 36px;
    text-align: center;
    vertical-align: middle;
    font-size: 18px;
}

.main-menu .nav-text {
    position: relative;
    display: table-cell;
    vertical-align: middle;
    width: 190px;
    font-family: 'Kanit', sans-serif;
    
}

.main-menu>ul.logout {
    position: absolute;
    left: 0;
    bottom: 0;
    
}

.no-touch .scrollable.hover {
    overflow-y: hidden;
}

.no-touch .scrollable.hover:hover {
    overflow-y: auto;
    overflow: visible;
}

a:hover,
a:focus {
    text-decoration: none;
}

nav {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
}

nav ul,
nav li {
    outline: 0;
    margin: 0;
    padding: 0;
}

.main-menu li:hover>a,
nav.main-menu li.active>a,
.dropdown-menu>li>a:hover,
.dropdown-menu>li>a:focus,
.dropdown-menu>.active>a,
.dropdown-menu>.active>a:hover,
.dropdown-menu>.active>a:focus,
.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,
.dashboard-page nav.dashboard-menu ul li.active a {
    color: #fff;
    background-color: #000000;
}

.area {
    float: left;
    background: #e2e2e2;
    width: 100%;
    height: 100%;
}

@font-face {
    font-family: 'Titillium Web';
    font-style: normal;
    font-weight: 300;
    src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}
</style>