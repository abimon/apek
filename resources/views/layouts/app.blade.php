<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEK INC. | {{$title}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendor CSS Files -->
    <link href="{{asset('storage/static/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/static/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/static/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('storage/static/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/static/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/static/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/static/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <header id="header" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
            <div class="logo">
                <h1><a href="/"><span>APEK </span>INC.</a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{request()->path()=='/'?'active':''" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="/#about">About</a></li>
                    <li><a class="nav-link scrollto" href="/#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="/#price">Pricing</a></li>
                    <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
                    <li><a class="nav-link scrollto {{request()->path()=='blog'?'active':''" href="/blog">Blog</a></li>
                    <li><a class="nav-link scrollto {{request()->path()=='dashboard'?'active':''" href="/dashboard">Dashboard</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <?php $bgimg = asset('storage/static/img/bgimg.jpg'); ?>
    <div style="height:80px;"></div>
    <div style="min-height:400px;">
        @yield('content')
    </div>
    <footer>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                &copy;2020-{{date('Y')}} Copyright <strong>APEK Inc.</strong>. All Rights Reserved
                            </p>
                        </div>
                        <div class="credits">
                            Designed by <a href="https://apekinc.com/">APEK Inc.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('storage/static/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('storage/static/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('storage/static/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('storage/static/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('storage/static/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('storage/static/assets/js/main.js')}}"></script>
    <script src="{{asset('storage/static/js/form.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
    </script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
</body>

</html>