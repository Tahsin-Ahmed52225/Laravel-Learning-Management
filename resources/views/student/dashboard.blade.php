@extends('layouts.student')
@section('content')

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
                <form action="{{ route("student.dashboard") }}" method="POST">
                    @csrf
                    <textarea rows="3" cols="" class="form-control mb-2" placeholder="Write Your Post.." name="content"></textarea>
                    <div class="row">
                        <div class="col-md">
                            <!-- class select item for student -->
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="course_id">
                                    @foreach ( $courses as $item )
                                    <option value="{{ $item->CourseID }}">{{ $item->Course_Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div>
                                <button type="submit" class="btn post_btn form-control">Post</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <?php
            $count = 1;
        ?>
        @foreach($post as $posts)

            <div class="class_content">
                <!-- class content start -->
                <div class="studen_single_class_content">
                    <div class="d-flex">
                        <div class="teacher_profile_wrapper">
                            <a href="#"><img src="{{ asset("img/profile_p.png") }}" alt=""></a>
                        </div>
                        <div>
                            <p class="mb-0"><a href="#" class="">{{ $posts->Fname }} {{ $posts->Lname }}</a> posted <a href="#">{{ $posts->Course_name }}</a></p>
                            <small>{{ Carbon\Carbon::parse($item->created_at)->format('H:i')    }} | {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</small>
                        </div>
                    </div>
                    <hr>
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
                                            <p class="mb-0"><a href="#" class="">{{ $comment->Fname }} {{ $comment->Lname }}</a> - <small>{{ Carbon\Carbon::parse($item->created_at)->format('H:i')    }} {{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</small>

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
            <?php  $count++;?>
    @endforeach

<!-- main content area end -->


@endsection
