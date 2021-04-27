@extends('layouts.student')
@section('content')
<link rel="stylesheet" href="{{ asset("css/default.css") }}">
<link rel="stylesheet" href="{{ asset("css/all_class.css") }}">
<div class="all_classes_content">
    <div class="container">
        <!-- first row -->
        <div class="row all_class_row">
            <div class="col-md-9 middle_content">
                <div>
                    <h2 class="heading"> All Classes <span class="badge">{{ count($courses) }}</span></h2>
                </div>
                <?php $counter = 1; ?>


                @if(count($courses))

                    @foreach($courses as $item)

                        {{-- @if($counter % 2 != 0) --}}
                           <div class="row">
                        {{-- @endif --}}
                            <div class="col-md-10 middle_column mx-auto">
                                <div>
                                    <a href="{{ route("teacher.class",$item->id) }}">
                                        <div class="class_wrapper">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h2><span>{{ $item->Course_Name }} : {{ $item->Course_code }}</span> </h2>
                                                </div>
                                                <div class="col-6 d-flex justify-content-end">
                                                    <p><b>Course Code : </b><span>{{ $item->Course_key }}</span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-6">
                                                <span><b>Course Teacher : </b><span>{{ $item->Fname }} {{ $item->Lname }}</span></span>
                                              </div>
                                              <div class="col-6 d-flex justify-content-end">
                                                <span><b>Starting Date: </b><span>{{ Carbon\Carbon::parse($item->created_at)->format('M d Y') }}</span></span>
                                              </div>
                                            </div>



                                        </div>
                                    </a>
                                </div>
                            </div>

                        {{-- @if($counter % 2 == 0) --}}
                        </div>
                        {{-- @endif --}}
                <?php $counter++; ?>
                @endforeach
                @endif
                {{-- <div class="row">
                    <!-- class content -->
                    <div class="col-md middle_column">
                        <div>
                            <a href="../pages/teacher_single_class.html">
                                <div class="class_wrapper">
                                    <h2>DMBS (CSI 223/CSI 224) - 64-A - SPRING 2019</h2>
                                    <p><b>Course Code : </b><span>bd35f</span></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- class content -->
                    <div class="col-md middle_column">
                        <div>
                            <a href="../pages/teacher_single_class.html">
                                <div class="class_wrapper">
                                    <h2>Fall'20 Information System Management</h2>
                                    <p><b>Course Code : </b><span>jg34v3</span></p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div> --}}
{{--
                <!-- second row -->
                <div class="row">
                    <!-- class content -->
                    <div class="col-md middle_column">
                        <div>
                            <a href="../pages/teacher_single_class.html">
                                <div class="class_wrapper">
                                    <h2>Spring'21 Visual Internet Programming</h2>
                                    <p><b>Course Code : </b><span>bd35f5</span></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- class content -->
                    <div class="col-md middle_column">
                        <div>
                            <a href="../pages/teacher_single_class.html">
                                <div class="class_wrapper">
                                    <h2>Data Structure Sessioal srping 18 64A</h2>
                                    <p><b>Course Code : </b><span>dfg536h</span></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- right-upcoming content -->
            {{-- <div class="col-md-3 p-0">
                <div class="main_right_content">
                    <h3>Upcoming</h3><hr>
                    <a href="#">
                        <div class="upcoming_content">
                            <p class="class_name">SWE 64 A Spring 20</p>
                            <p>Class Test 3</p>
                            <p><small>Last Date &#8226;</small> <small>09/12/20 &#8226; </small><small>11.59pm</small></p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="upcoming_content">
                            <p class="class_name">VIP Sessional spring'21</p>
                            <p>Class Test 1</p>
                            <p><small>Last Date &#8226;</small> <small>22/03/21 &#8226; </small><small>11.59pm</small></p>
                        </div>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>




@endsection
