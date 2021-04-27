
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon link -->
    <link rel="icon" href="../asset/images/favicon.png" type="image/gif" sizes="16x16">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- for datatable css link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset("css/default.css") }}">
    <link rel="stylesheet" href="{{ asset("css/datatable.css") }}">

    <title>LMS - Admin</title>

    </head>


    <body>




        <div class="tdg_main_sidebar d-flex">
            <aside>
                <!-- left sidebar -->
                <div class="sidebar">

                    <div class="user-panel">
                        <div class="pull-left image">
                            <a href="/{{ Auth::user()->type }}/dashboard"><img src="{{ asset("img/nav_brand.png") }}" class="" alt="User Image"></a>
                        </div>
                    </div>

                    <ul class="list-sidebar bg-default">
                        <li>
                            <a href="\{{ Auth::user()->type }}\dashboard"><i class="fa fa-user"></i> <span class="nav-label">View all teachers</span> </a>
                        </li>
                        <li>
                            <a href="{{ route("admin.allstudent") }}"><i class="fa fa-users"></i> <span class="nav-label">View all students</span> </a>
                        </li>
                        <li>
                            <a href="{{ route("admin.allcourse") }}"><i class="fa fa-bookmark"></i> <span class="nav-label">View all Courses</span> </a>
                        </li>
                    </ul>
                </div>
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
                                    <!-- notification content start -->
                                    <li class="nav-item dropdown messages-menu">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bell-o"></i>
                                            <span class="label label-success bg-success">10</span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <ul class="dropdown-menu-over list-unstyled">
                                                <li class="header-ul text-center">You have 10 Notification</li>
                                                <li>
                                                    <!-- Notification content -->
                                                    <ul class="menu list-unstyled">
                                                        <li>
                                                            <a href="#">
                                                                <div class="pull-left">
                                                                    <img src="../asset/images/profile_p.png" class="rounded-circle  " alt="User Image">
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
                                                                    <img src="../asset/images/profile_p.png" class="rounded-circle" alt="User Image">
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
                                                                    <img src="{{ asset("img/profile_p.png") }}" class="rounded-circle" alt="User Image">
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
                                                                    <img src="../asset/images/profile_p.png" class="rounded-circle" alt="User Image">
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
                                                                    <img src="../asset/images/profile_p.png" class="rounded-circle" alt="User Image">
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
                                                    <a href="#">See All Notification</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- notification content end -->

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
                                                            <img src="../asset/images/profile_p.png" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
                                                            <a href="#" class="p-0 pl-2">
                                                                <div>
                                                                    Hi dear Ismail <br>
                                                                    <small class=""><i class="fa fa-clock-o"></i>10 min ago</small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="d-flex mt-2">
                                                            <img src="../asset/images/profile_p.png" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
                                                            <a href="#" class="p-0 pl-2">
                                                                <div>
                                                                    Hi dear Ismail <br>
                                                                    <small class=""><i class="fa fa-clock-o"></i>10 min ago</small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="d-flex mt-2">
                                                            <img src="../asset/images/profile_p.png" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
                                                            <a href="#" class="p-0 pl-2">
                                                                <div>
                                                                    Hi dear Ismail <br>
                                                                    <small class=""><i class="fa fa-clock-o"></i>10 min ago</small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="d-flex mt-2">
                                                            <img src="../asset/images/profile_p.png" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
                                                            <a href="#" class="p-0 pl-2">
                                                                <div>
                                                                    Hi dear Ismail <br>
                                                                    <small class=""><i class="fa fa-clock-o"></i>10 min ago</small>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="d-flex mt-2">
                                                            <img src="../asset/images/profile_p.png" class="rounded-circle ml-2" style="width:40px;height:40px;" alt="User Image">
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

                                    <!-- right profile -->
                                    <li class="nav-item dropdown  user-menu">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ asset("img/profile_p.png") }}" class="user-image" alt="User Image" >
                                            <span class="hidden-xs">{{ Auth::user()->Lname }}</span>
                                        </a>
                                        <div class="dropdown-menu position-absolute" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route("logout") }}"><span class=""><i class="fa fa-power-off mr-2"></i></span>Log Out</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </header>
@yield("content")
                {{-- <!-- table content start -->
                <div class="row teachers_table">
                    <div class="col-md">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>UserName</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>Email</th>
                                    <th>Institution</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td><span>Tiger</span></td>
                                    <td><span>Nixon</span></td>
                                    <td>hello@gmail.com</td>
                                    <td>Stamford University Bangladesh</td>
                                    <td>
                                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td><span>Tiger</span></td>
                                    <td><span>Nixon</span></td>
                                    <td>hello@gmail.com</td>
                                    <td>Stamford University Bangladesh</td>
                                    <td>
                                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td><span>Tiger</span></td>
                                    <td><span>Nixon</span></td>
                                    <td>hello@gmail.com</td>
                                    <td>Stamford University Bangladesh</td>
                                    <td>
                                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td><span>Tiger</span></td>
                                    <td><span>Nixon</span></td>
                                    <td>hello@gmail.com</td>
                                    <td>Stamford University Bangladesh</td>
                                    <td>
                                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <!-- table content end -->
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


    <!-- for datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
    var table = $('#example').DataTable({
        columnDefs: [{
            orderable: false,
            targets: [1,2,3]
        }]
    });

    $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );
    </script>





    </body>
</html>
