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
    <!-- favicon link -->

    <link rel="stylesheet" href="{{ asset("css/adminStyle.css") }}">
    <title>LMS-Admin</title>

</head>
<body>


    <div>
        <div class="container login_wrapper">
            <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
                <div class="card card0 border-0">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
                    <div class="row d-flex">
                        <div class="col-lg-6">
                            <div class="card1">
                                <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="{{ asset("img/admin_login_img.png") }}" class="image"> </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form action="{{ route("adminlogin") }}" method="POST">
                            @csrf
                            <div class="card2 card border-0 px-4 py-5">
                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Email Address*</h6>
                                    </label>
                                    <input class="mb-4" type="text" name="admin_email" placeholder="Enter a valid email address..">
                                </div>
                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Password*</h6>
                                    </label>
                                    <input type="password" name="admin_password" placeholder="Enter password..">
                                </div>
                                <div class="row px-3 mb-4">
                                    <a href="./pages/forgot_password.html" class="ml-auto mb-0 text-sm forgot_link">Forgot Password?</a>
                                </div>
                                <div class="row mb-3 px-3">
                                    <button type="submit" class="btn btn-login text-center">Login</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- javascript file -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
