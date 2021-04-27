
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Main css -->
    <link rel="stylesheet" href=" {{ asset("css/student_home.css") }}">
    <!-- teacher page css link -->
    <link rel="stylesheet" href="{{ asset("css/teacher.css") }}">

    <title>LMS-Teacher</title>

    </head>
    <body>




        <div class="tdg_main_sidebar d-flex">
            <aside>
                <!-- left sidebar content start -->
                <div class="sidebar">

                    <div class="user-panel">
                        <div class="pull-left image">
                            <a href="/{{ Auth::user()->type }}/dashboard"><img src="{{ asset("img/nav_brand.png") }}" class="" alt="User Image"></a>
                        </div>
                    </div>

                    <ul class="list-sidebar bg-default">
                        <li class="nav-item">
                            <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" >
                                <i class="fa fa-university"></i> <span class="nav-label"> My Classes </span> <span class="fa fa-chevron-right pull-right"></span>
                            </a>
                            <ul class="sub-menu collapse" id="dashboard">
                                @foreach ($courses as $item)
                                    <li>
                                        <a href="{{ route("teacher.class", $item->id) }}">{{ $item->Course_name }} : {{ $item->Course_code }}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </li>
                        <li>
                            <a href="{{ route("teacher.allclass") }}"><i class="fa fa-bookmark"></i> <span class="nav-label">All Classes</span> </a>
                        </li>
                    </ul>
                </div>
                <!-- left sidebar content end -->
            </aside>


            <!-- Right Sidebar -->
            <aside class="w-100">
                <header class="tdg_header">
                    <div class="container">
                        <!-- Top Navbar -->
                        <nav class="navbar navbar_1 navbar-expand-sm navbar-light pt-0 pb-0 pl-0">
                            <div class="float-left"><a href="#" class="button-left"><span class="fa fa-fw fa-bars "></span></a> </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav ml-auto">
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn join_class_btn" data-toggle="modal" data-target="#exampleModalCenter">
                                            Create a New Class
                                        </button>

                                        <!-- create new class modal for teacher -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Create Your New Class : </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route("teacher.addclass") }}" method="POST">
                                                        @csrf
                                                        <input name="course_name" type="text" class="form-control mb-2" placeholder="Enter Your Class Name..">
                                                        <input  name="course_code" type="text" class="form-control" placeholder="Enter Your Course Code..">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn join_btn">Create</button>
                                                    </div>
                                                       </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- notification start -->
                                    <li class="nav-item dropdown messages-menu">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bell-o"></i>
                                            <span class="label label-success bg-success">10</span>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <ul class="dropdown-menu-over list-unstyled">
                                                <li class="header-ul text-center">You have 10 Notification</li>
                                                <li>
                                                    <!-- notification content -->
                                                    <ul class="menu list-unstyled">
                                                        <li>
                                                            <a href="#">
                                                                <div class="pull-left">
                                                                    <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle  " alt="User Image">
                                                                </div>
                                                                <h4>
                                                                    Support Team
                                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                                </h4>
                                                                <p>Why not buy a new awesome theme?</p>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <div class="pull-left">
                                                                    <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle" alt="User Image">
                                                                </div>
                                                                <h4>
                                                                    AdminLTE Design Team
                                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                                </h4>
                                                                <p>Why not buy a new awesome theme?</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <div class="pull-left">
                                                                    <img src=" {{ asset("img/profile_p.png") }}" class="rounded-circle" alt="User Image">
                                                                </div>
                                                                <h4>
                                                                    Developers
                                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                                </h4>
                                                                <p>Why not buy a new awesome theme?</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <div class="pull-left">
                                                                    <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle" alt="User Image">
                                                                </div>
                                                                <h4>
                                                                    Sales Department
                                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                                </h4>
                                                                <p>Why not buy a new awesome theme?</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <div class="pull-left">
                                                                    <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle" alt="User Image">
                                                                </div>
                                                                <h4>
                                                                    Reviewers
                                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                                </h4>
                                                                <p>Why not buy a new awesome theme?</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <!-- notification footer -->
                                                <li class="footer-ul text-center">
                                                    <a href="#">See All Messages</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- notification end -->

                                    <!-- start message -->
                                    <li class="nav-item dropdown notifications-menu">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-envelope-o"></i>
                                            <span class="label label-warning bg-warning">5</span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <ul class="dropdown-menu-over list-unstyled">
                                                <li class="header-ul text-center">You have 5 Messages</li>
                                                <li>
                                                <!-- Message content -->
                                                <ul class="menu list-unstyled">
                                                    <li class="d-flex mt-2">
                                                        <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
                                                        <a href="#" class="p-0 pl-2">
                                                            <div>
                                                                Hi dear Ismail <br>
                                                                <small class=""><i class="fa fa-clock-o"></i>10 min ago</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
                                                        <a href="#" class="p-0 pl-2">
                                                            <div>
                                                                Hi dear Ismail <br>
                                                                <small class=""><i class="fa fa-clock-o"></i>10 min ago</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
                                                        <a href="#" class="p-0 pl-2">
                                                            <div>
                                                                Hi dear Ismail <br>
                                                                <small class=""><i class="fa fa-clock-o"></i>10 min ago</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
                                                        <a href="#" class="p-0 pl-2">
                                                            <div>
                                                                Hi dear Ismail <br>
                                                                <small class=""><i class="fa fa-clock-o"></i>10 min ago</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex mt-2">
                                                        <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
                                                        <a href="#" class="p-0 pl-2">
                                                            <div>
                                                                Hi dear Ismail <br>
                                                                <small class=""><i class="fa fa-clock-o"></i>10 min ago</small>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                </li>
                                                <!-- message footer -->
                                                <li class="footer-ul text-center"><a href="#">View all</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- end message -->

                                    <!-- right profile for teacher -->
                                    <li class="nav-item dropdown  user-menu">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ asset("img/profile_p.png") }}" class="user-image" alt="User Image" >
                                            <span class="hidden-xs">{{ Auth::user()->Fname }} {{ Auth::user()->Lname }}</span>
                                        </a>
                                        <div class="dropdown-menu position-absolute" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route("teacher.profile") }}"><span class=""><i class="fa fa-user mr-2"></i></span>Profile</a>
                                            <a class="dropdown-item" href="{{ route("teacher.editprofile") }}"><span class=""><i class="fa fa-edit mr-2"></i></span>Edit Profile</a>
                                            <a class="dropdown-item" href="{{ route("logout") }}"><span class=""><i class="fa fa-power-off mr-2"></i></span>Log Out</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </header>

                @yield('content')

            </aside>
        </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
          $('.button-left').click(function(){
              $('.sidebar').toggleClass('fliph');
          });
        });
    </script>




</body>
</html>
