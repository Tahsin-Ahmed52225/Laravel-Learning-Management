@extends('layouts.teacher')
@section('content')
<link rel="stylesheet" href="{{ asset("css/profile.css") }}">
<div class="about_content">
    <div class="container ">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto ">
                <div class="row header">
                    <div class="col-md-4 about_left d-flex align-items-center justify-content-center">
                        <div class="about_left_content">
                            <div class="about_img_wrapper">
                                <img src="{{ asset("img/profile_p.png") }}    " alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 about_right">
                        <div class="about_right_content">
                            <div class="">
                                <h2>{{ Auth::user()->Fname }} {{ Auth::user()->Lname }}</h2>

                                <button type="button" onclick="location.href='{{ route('teacher.editprofile') }}'" class="btn btn-primary mb-4">Edit Profile</button>

                                <div class="">
                                    <span>Email</span>
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                                <div class="">
                                    <span>Institution</span>
                                    <p>{{ Auth::user()->institution }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
