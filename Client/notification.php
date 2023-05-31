<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Home</title>

    <meta charset="UTF-8">
    <title>Notification UI Design</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">




    <!-- Favicon  -->
    <link rel="icon" href="../web/images/coopnobg.png">
</head>

<body>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid ">
                <a class="navbar-brand logo-image" href="home.php"><img src="images/cooplogo.png" style="width: 60px; height: auto;" alt="alternative"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="section-50">
            <div class="container">
            <?php include('sidebar.php'); ?>
                <h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted" style="display: inline"></i></h3>

                <div class="notification-ui_dd-content">
                    <div class="notification-list notification-list--unread">
                        <div class="notification-list_content">
                            <div class="notification-list_img">
                                <img src="images/users/user1.jpg" alt="user">
                            </div>
                            <div class="notification-list_detail">
                                <p><b>John Doe</b> reacted to your post</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.
                                </p>
                                <p class="text-muted"><small>10 mins ago</small></p>
                            </div>
                        </div>
                        <div class="notification-list_feature-img">
                            <img src="images/features/random1.jpg" alt="Feature image">
                        </div>
                    </div>
                    <div class="notification-list notification-list--unread">
                        <div class="notification-list_content">
                            <div class="notification-list_img">
                                <img src="images/users/user2.jpg" alt="user">
                            </div>
                            <div class="notification-list_detail">
                                <p><b>Richard Miles</b> liked your post</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.
                                </p>
                                <p class="text-muted"><small>10 mins ago</small></p>
                            </div>
                        </div>
                        <div class="notification-list_feature-img">
                            <img src="images/features/random2.jpg" alt="Feature image">
                        </div>
                    </div>
                    <div class="notification-list">
                        <div class="notification-list_content">
                            <div class="notification-list_img">
                                <img src="images/users/user3.jpg" alt="user">
                            </div>
                            <div class="notification-list_detail">
                                <p><b>Brian Cumin</b> reacted to your post</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.
                                </p>
                                <p class="text-muted"><small>10 mins ago</small></p>
                            </div>
                        </div>
                        <div class="notification-list_feature-img">
                            <img src="images/features/random3.jpg" alt="Feature image">
                        </div>
                    </div>
                    <div class="notification-list">
                        <div class="notification-list_content">
                            <div class="notification-list_img">
                                <img src="images/users/user4.jpg" alt="user">
                            </div>
                            <div class="notification-list_detail">
                                <p><b>Lance Bogrol</b> reacted to your post</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.
                                </p>
                                <p class="text-muted"><small>10 mins ago</small></p>
                            </div>
                        </div>
                        <div class="notification-list_feature-img">
                            <img src="images/features/random4.jpg" alt="Feature image">
                        </div>
                    </div>
                    <div class="notification-list">
                        <div class="notification-list_content">
                            <div class="notification-list_img">
                                <img src="images/users/user1.jpg" alt="user">
                            </div>
                            <div class="notification-list_detail">
                                <p><b>Parsley Montana</b> reacted to your post</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.
                                </p>
                                <p class="text-muted"><small>10 mins ago</small></p>
                            </div>
                        </div>
                        <div class="notification-list_feature-img">
                            <img src="images/features/random1.jpg" alt="Feature image">
                        </div>
                    </div>
                    <div class="notification-list">
                        <div class="notification-list_content">
                            <div class="notification-list_img">
                                <img src="images/users/user3.jpg" alt="user">
                            </div>
                            <div class="notification-list_detail">
                                <p><b>Brian Cumin</b> reacted to your post</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.
                                </p>
                                <p class="text-muted"><small>10 mins ago</small></p>
                            </div>
                        </div>
                        <div class="notification-list_feature-img">
                            <img src="images/features/random3.jpg" alt="Feature image">
                        </div>
                    </div>
                    <div class="notification-list">
                        <div class="notification-list_content">
                            <div class="notification-list_img">
                                <img src="images/users/user2.jpg" alt="user">
                            </div>
                            <div class="notification-list_detail">
                                <p><b>Lance Bogrol</b> reacted to your post</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.
                                </p>
                                <p class="text-muted"><small>10 mins ago</small></p>
                            </div>
                        </div>
                        <div class="notification-list_feature-img">
                            <img src="images/features/random2.jpg" alt="Feature image">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="#!" class="dark-link">Load more activity</a>
                </div>

            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>