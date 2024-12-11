<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> <!-- Bootstrap CSS (cơ bản) -->
    <link rel="stylesheet" href="assets/css/iconfont.min.css"> <!-- Font icon -->
    <link rel="stylesheet" href="assets/css/plugins.css"> <!-- Các plugin CSS -->
    <link rel="stylesheet" href="assets/css/helper.css"> <!-- CSS hỗ trợ -->
    <link rel="stylesheet" href="assets/css/style.css"> <!-- CSS chính -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script> <!-- Modernizr -->

    <!-- Bootstrap Bundle JS (bao gồm Popper.js và các tính năng JS của Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>



    <title>Trang chủ</title>
</head>

<body>
    <!--Header section start-->
    <div id="main-wrapper">
        <header class="header header-transparent header-sticky">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div
                            class="col-xl-6 col-lg-8 d-flex flex-wrap justify-content-lg-start justify-content-center align-items-center">
                            <!--Links start-->
                            <div class="header-top-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-phone"></i>037 3196 508</a></li>
                                    <li><a href="#"><i class="fa fa-envelope-open-o"></i>ichndps41009@gmail.com</a></li>
                                </ul>
                            </div>
                            <!--Links end-->
                        </div>
                        <div class="col-xl-6 col-lg-4">
                            <div class="ht-right d-flex justify-content-lg-end justify-content-center">
                                <ul class="ht-us-menu d-flex">
                                    <?php
                                    if (isset($_SESSION['user']) && count($_SESSION['user']) > 0) { ?>
                                        <li><a href="#"><i
                                                    class="fa fa-user-circle-o"></i><?= $_SESSION['user'][0]['email_user'] ?></a>
                                            <ul class="ht-dropdown right">
                                                <li><a href="?ctrl=user&view=account">Tài khoản của tôi</a></li>
                                                <?php if ($_SESSION['user'][0]['role'] == 1) { ?>
                                                    <li><a href="?ctrl=admin">Quản lí trang</a></li><?php } ?>
                                                <li><a href="?ctrl=user&view=logout">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="?ctrl=user&view=login"><i class="fa fa-user-circle-o"></i>Đăng nhập</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom menu-right">
                <div class="container">
                    <div class="row align-items-center">

                        <!--Logo start-->
                        <div class="col-lg-3 col-md-3 col-6 order-lg-1 order-md-1 order-1">
                            <div class="logo">
                                <a href="index.php"><img src="assets/images/arsenallogo2.svg" alt="logo TG shop"></a>
                            </div>
                        </div>
                        <!--Logo end-->

                        <!--Menu start-->
                        <div
                            class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-3 d-flex justify-content-center">
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="index.php">Trang chủ</a>
                                    </li>
                                    <li><a href="?ctrl=product">Cửa hàng</a>
                                    </li>
                                    <li><a href="?ctrl=blog">Bài viết</a>
                                    </li>
                                    <li><a href="?ctrl=page&&view=contact">Câu lạc bộ</a></li>
                                    <li><a href="?ctrl=page&&view=contact">Liên hệ chúng tôi</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--Menu end-->

                        <!--Search Cart Start-->
                        <div class="col-lg-3 col-md-3 col-6 order-lg-3 order-md-3 order-2 d-flex justify-content-end">
                            <div class="header-search">
                                <button title="Tìm kiếm" class="header-search-toggle"><i
                                        class="fa fa-search"></i></button>
                                <div class="header-search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Nhập và nhấn enter">
                                        <button title="Tìm kiếm"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="header-cart">
                                <a href="?ctrl=cart"><i class="fa fa-shopping-cart"></i><span><?php if (isset($_SESSION['user']) && isset($_SESSION['cart'])) {
                                                                                                    echo
                                                                                                    count($_SESSION['cart']);
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                }; ?></span></a>
                            </div>
                        </div>
                        <!--Search Cart End-->
                    </div>

                    <!--Mobile Menu start-->
                    <div class="row">
                        <div class="col-12 d-flex d-lg-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                    <!--Mobile Menu end-->
                </div>
            </div>
        </header>