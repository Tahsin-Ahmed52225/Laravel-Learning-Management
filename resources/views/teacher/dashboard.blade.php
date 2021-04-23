@extends('layouts.teacher')
@section('content')


                <!-- main content Area start -->
                <!-- main content Area start -->
                <div class="container main_content">
                    <div class="row">
                        <div class="col-md-9">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            <div class="class_content_header">
                                <form action="">
                                    <textarea rows="3" cols="" class="form-control mb-2" placeholder="Write Your Post.."></textarea>
                                    <div class="row">
                                        <div class="col-md">
                                            <!-- class select item for student -->
                                            <div class="form-group">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Select Your Class</option>
                                                    <option>Spring'21 Visual Internet Programming</option>
                                                    <option>SWE 64 A Spring 20</option>
                                                    <option>Fall'20 Information System Management</option>
                                                    <option>Computer Graphics 64 A</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div>
                                                <button class="btn post_btn form-control">Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="class_content">
                                <!-- class content start -->
                                <div class="studen_single_class_content">
                                    <div class="d-flex">
                                        <div class="teacher_profile_wrapper">
                                            <a href="#"><img src="../asset/images/profile_p.png" alt=""></a>
                                        </div>
                                        <div>
                                            <p class="mb-0"><a href="#" class="">Samiul Islam</a> posted <a href="#">SWE 64 A Spring 20</a></p>
                                            <small><span>Feb 13</span> &#8226; <label for="#">11.20pm</label></small>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mt-2">
                                        <p class="class_post">Leverage agile frameworks to provide a robust synopsis for high level overviews.
                                            Iterative approaches to corporate strategy foster collaborative thinking to
                                            further the overall value proposition.</p>
                                    </div>
                                    <div class="">
                                        <p>
                                            <div class="row like_comment">
                                                <div class="col-md text-center comment_wrapper">
                                                    <a href="#"><span><i class="fa fa-comment mr-2"></i><label>3 </label> Comment</span></a>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="">
                                        <form>
                                            <textarea rows="2" cols="" class="form-control pl-3 py-2" placeholder="Write Your Comment.."></textarea>
                                        </form>
                                        <button class="btn comment_btn float-right">Comment</button>
                                    </div>
                                </div>
                            </div>

                            <div class="class_content">
                                <!-- class content start -->
                                <div class="studen_single_class_content">
                                    <div class="d-flex">
                                        <div class="teacher_profile_wrapper">
                                            <a href="#"><img src="../asset/images/profile_p.png" alt=""></a>
                                        </div>
                                        <div>
                                            <p class="mb-0"><a href="#" class="">Samiul Islam</a> posted <a href="#">SWE 64 A Spring 20</a></p>
                                            <small><span>Feb 13</span> &#8226; <label for="#">11.20pm</label></small>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mt-2">
                                        <p class="class_post">Leverage agile frameworks to provide a robust synopsis for high level overviews.
                                            Iterative approaches to corporate strategy foster collaborative thinking to
                                            further the overall value proposition.</p>
                                    </div>
                                    <div class="">
                                        <p>
                                            <div class="row like_comment">
                                                <div class="col-md text-center comment_wrapper">
                                                    <a href="#"><span><i class="fa fa-comment mr-2"></i><label>3 </label> Comment</span></a>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="">
                                        <form>
                                            <textarea rows="2" cols="" class="form-control pl-3 py-2" placeholder="Write Your Comment.."></textarea>
                                        </form>
                                        <button class="btn comment_btn float-right">Comment</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- right-upcoming content -->
                        <div class="col-md-3 p-0">
                            <div class="main_right_content">
                                <h3>Upcoming</h3><hr>
                                <a href="../pages/student_single_class.html">
                                    <div class="upcoming_content">
                                        <p class="class_name">SWE 64 A Spring 20</p>
                                        <p>Class Test 3</p>
                                        <p><small>Last Date &#8226;</small> <small>09/12/20 &#8226; </small><small>11.59pm</small></p>
                                    </div>
                                </a>
                                <a href="../pages/student_single_class.html">
                                    <div class="upcoming_content">
                                        <p class="class_name">VIP Sessional spring'21</p>
                                        <p>Class Test 1</p>
                                        <p><small>Last Date &#8226;</small> <small>22/03/21 &#8226; </small><small>11.59pm</small></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main content area end -->



@endsection
