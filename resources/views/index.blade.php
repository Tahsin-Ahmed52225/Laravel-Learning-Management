<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- font-awesome cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>LMS-Stamford University</title>
</head>
<body>

    <!-- home section start -->
        <div class="container-fluid main_navbar">
            <div class="container">
                <!-- hero navbar start -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset("img/nav_brand.png") }}" alt="TurggoMax">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Learn More <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Support</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">Getting Started</a>
                            </li>
                            <li class="nav-item dropdown">
                                <button href="#" class="btn">Log In</button>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- hero navbar end -->
            </div>
        </div>
        <!-- hero banner start -->
        <div class="banner_section">
            <div class="container">
                <div class="row">
                    <div class="col-md hero_banner_left">
                        <div>
                            <img src=" {{ asset("img/bg_1.png") }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-5 d-flex align-items-center hero_banner_right">
                        <div class="">
                            <h1>Learn Better Together</h1>
                            <hr>
                            <p>Edmodo allows your whole community to learn together from anywhere with all-in-one LMS, communication,
                                collaboration, and Zoom video conferencing tools..Manage your classroom.
                                Engage your students. Safe. Simple. Free.</p>
                                <a href="{{ route('login-lms') }}" class="btn">Sign up for a free account</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- home banner end -->




    <!-- javascript file -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
