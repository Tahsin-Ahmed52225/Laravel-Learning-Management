<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- font-awesome cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>LMS-Stamford University Login</title>
</head>
<body>

    <!-- navbar start -->
    <div class="container-fluid main_navbar">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="../index.html">
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
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- navbar end -->

    <!-- login main content start -->
    <div class="login_main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <div class="login_content_wrapper">
                        <h1 class="header">Choose an account</h1>
                        <hr>
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                        <div class="row">
                            <div class="col-md">
                                <div class="main_content_wrapper">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset("img/teacher.png") }}"   teacher.png" alt="Card image cap">
                                        <div class="card-body">
                                          <h5 class="card-title">Teacher Account</h5>
                                          <p class="card-text">For teachers, co-teachers, admins, coaches, instructional tech</p>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            Log In
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalLongTitle">Log In as Teacher</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form method="POST" action="{{ route("login_teacher") }}" id="teacherLogin">
                                                    @csrf
                                                <div class="modal-body">
                                                    <input id="Teacher_login_email"name="teacher_email" type="text" class="form-control" placeholder="Email" required>
                                                    <input id="Teacher_Login_password" name="teacher_password" type="password" class="form-control" placeholder="Password" required>
                                                </div>

                                                <div class="modal-footer">
                                                     <button type="submit" class="btn btn-secondary"  >Log In</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                                            Sign Up
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Create An Account</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cleanUp()">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="error_msg">

                                                    </div>
                                                    @if(session()->has('status'))

                                                    {!! session()->get('status') !!}

                                                    @endif
                                                    <form method="POST">

                                                    <div class="row">
                                                        <div class="col-6"> <input id="firstName" type="text" class="form-control" placeholder="First Name" required></div>
                                                        <div class="col-6"> <input id="lastName" type="text" class="form-control" placeholder="Last Name" required></div>
                                                    </div>

                                                    <input id="userName" type="text" class="form-control" placeholder="Username.." required>
                                                    <input id="email" type="email" class="form-control" placeholder="Email" required>
                                                    <input id="institution" type="text" class="form-control" placeholder="Institution" required>
                                                    <input id="password" type="password" class="form-control" placeholder="Password" required>
                                                    <input id="Confirm_Password" type="password" class="form-control" placeholder="Confirm Password" required>

                                                </div>

                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" onclick="teacher_signUp()">Create Your Account</button>
                                                </div>
                                                   </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="main_content_wrapper">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset("img/student.png") }}" alt="Card image cap">
                                        <div class="card-body">
                                          <h5 class="card-title">Student Account</h5>
                                          <p class="card-text">For students, class participants, club members, etc</p>
                                          <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                                            Log In
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Log In With Your Account</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" placeholder="Username.." required>
                                                    <input type="email" class="form-control" placeholder="Email" required>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Log In</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter3">
                                            Sign Up
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Create An Account</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" placeholder="Username.." required>
                                                    <input type="email" class="form-control" placeholder="Email" required>
                                                    <input type="password" class="form-control" placeholder="Password*" required>
                                                    <input type="password" class="form-control" placeholder="Confirm Password*" required>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" onclick="student_signup()" data-dismiss="modal">Create Your Account</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="modal fade" id="errorModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content bg-danger">
        <div class="modal-header">
            <div id="Error_msg"></div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>



      </div>
    </div>
</div>
    <!-- login main content end -->
    <!-- javascript file -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Teacher ajax --}}
<script src="{{ asset('js/validation.js') }}" ></script>
<script>



function student_signup(){
    alert("Hello I am Student");
}
</script>


</body>
</html>
