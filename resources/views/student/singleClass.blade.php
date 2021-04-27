@extends('layouts.student')
@section('content')
<link rel="stylesheet" href="{{ asset("css/default.css") }}">
<link rel="stylesheet" href="{{ asset("css/teacher_single_class.css") }}">

<div class="container single_class">
    <div class="row">

        <div class="col-md">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
            @endforeach
            <div class="single_class_content">

                <div class="single_class_header">

                    <div class="row">
                        <div class="col-6">
                            <h2>{{ $item->Course_Name }} : {{ $item->Course_code }}</h2>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            Course Teacher : {{ $item->Fname }} {{ $item->Lname }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p><b for="#">Course Code : </b><span>{{ $item->Course_key }}</span></p>
                        </div>

                    </div>
                </div>
                <div class="post_part">
                    <div class="student_post">
                        <form action="{{ route("student.addpost", $item->CourseID) }}" method="POST">
                        @csrf
                            <textarea rows="3" cols="" class="form-control mt-3" placeholder="Write Your Post Here.." name="content"></textarea>
                            <button type="submit" class="btn float-right mt-2">Post</button>
                        </form>
                    </div>
                <!-- main single class content -->
                <?php
                $count = 1;
                 ?>
            @foreach($post as $posts)
            <div class="clearfix"></div>
            <div class="single_main_content">
                <div>
                    <div class="d-flex">
                        <div class="teacher_profile_wrapper">
                            <a href="#"><img src="{{ asset("img/profile_p.png") }}" alt=""></a>
                        </div>
                        <div>
                            <p class="mb-0"><a href="#" class="">{{ $posts->Fname }} {{ $posts->Lname }}</a> posted <a href="#">{{ $posts->Course_name }}</a></p>
                            <small>{{ Carbon\Carbon::parse($item->created_at)->format('H:i')    }} | {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</small>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="class_post">{{ $posts->content }} </p>
                    </div>
                    <div class="">
                        <p>
                            <?php $comm = 0 ?>
                            @foreach ($comments as $comment )
                            @if( $comment->Post_ID == $posts->id)
                            <?php $comm++;?>
                            @endif
                            @endforeach
                            <div class="accordion" id="accordionExample<?php echo $count;?>">
                                <div class="card bg-light">
                                  <div class="" id="headingOne">
                                    <h2 class="mb-0">
                                      <button class="btn  btn-block  text-center text-small" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $count;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $count;?>">
                                        Comments (<?php echo $comm ?>)
                                      </button>
                                    </h2>
                                  </div>

                                @foreach ($comments as $comment )
                                @if( $comment->Post_ID == $posts->id)
                                  <div id="collapseOne<?php echo $count;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample<?php echo $count;?>">
                                    <div class="card-body">
                                        <div>
                                            <p class="mb-0"><a href="#" class="">{{ $comment->Fname }} {{ $comment->Lname }}</a> - <small>{{ Carbon\Carbon::parse($item->created_at)->format('H:i')    }} {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</small></p>
                                        </div>
                                           {{ $comment->content }}
                                    </div>

                                  </div>

                                @endif

                                @endforeach

                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="">
                        <form  action="{{ route('student.addcomment', $posts->id ) }}" method="POST">
                            @csrf
                                <textarea name="comment_content" rows="2" cols="" class="form-control pl-3 py-2" placeholder="Write Your Comment.."></textarea>
                                <button class="btn comment_btn float-right">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php  $count++;?>
        @endforeach
        </div>
    </div>
</div>
        <!-- right content -->
        {{-- <div class="col-md-3 p-0">
            <div class="main_right_content">
                <h3>Upcoming</h3><hr>
                <a href="#">
                    <div class="upcoming_content">
                        <p>Class Test 3</p>
                        <p><small>Last Date &#8226;</small> <small>19/10/21 &#8226; </small><small>11.59pm</small></p>
                    </div>
                </a>
                <a href="#">
                    <div class="upcoming_content">
                        <p>Class Test 1</p>
                        <p><small>Last Date &#8226;</small> <small>29/01/21 &#8226; </small><small>11.59pm</small></p>
                    </div>
                </a>

            </div>
        </div> --}}
    </div>
</div>




@endsection
