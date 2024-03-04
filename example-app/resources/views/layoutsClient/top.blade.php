<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Nhóm 2</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../inc/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../inc/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../inc/css/index.css">
    {{-- <link href="../../inc/css/app.css" rel="stylesheet">
        
        <script src="../../inc/js/app.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
        <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"> --}}
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    
                    
    
    <div class="container-fluid fixed-top">
        <div class="container topbar  d-none d-lg-block" style="background-color: #FEF889;">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-dark">Hà Hoàng Hổ, Long Xuyên, An Giang</a></small>
                    {{-- <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-dark">nhom_2@gmail.com</a></small> --}}
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-dark">
                           
                        </a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-dark mx-2">{{ GoogleTranslate::trans('Privacy Policy', app()->getLocale()) }}</small>/</a>
                    <a href="#" class="text-white"><small class="text-dark mx-2">{{ GoogleTranslate::trans('Terms of Use', app()->getLocale()) }}</small>/</a>
                    <a href="#" class="text-white"><small class="text-dark ms-2">{{ GoogleTranslate::trans('Sales and Refunds', app()->getLocale()) }}</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="/" class="navbar-brand">
                    <h1 class="text-warning display-6">Food</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="/" class="nav-item nav-link ">Trang chủ</a>
                        <a href="shop" class="nav-item nav-link ">Cửa hàng</a>
                        <a href="detailshop" class="nav-item nav-link ">Thông tin cửa hàng</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">Xem thêm</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">

                                <a href="checkout" class="dropdown-item">Thanh toán</a>
                                <a href="testimonial" class="dropdown-item">Feedback</a>
                                <!-- <a href="404.html" class="dropdown-item">404 Page</a> -->
                            </div>
                        </div>
                        <a href="contact" class="nav-item nav-link">Liên Hệ</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <button
                            class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-warning"></i></button>
                        <a href="/cart" class="position-relative me-4 my-auto text-warning">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                        </a>
                        <a href="#" class="my-auto text-warning ">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>
                </div>

        </div>
        </nav>
        </nav>
    </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down">
            <div class="modal-content rounded-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="Nhập từ khóa"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1 " class="input-group-text p-3 icon_search"><i
                                class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
