@extends('layouts.teacher')
@section('content')
<link rel="stylesheet" href="{{ asset("css/edit_profile.css") }}">

<div class="edit_content">
    <div class="container ">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="main_content">
                      <form  action="{{ route("teacher.editprofile") }}" method="POST">
                      @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="#">First Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->Fname }}" name="Fname">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="#">Last Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->Lname }}" name="Lname">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="#">Email address</label>
                          <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="#">Institution</label>
                            <input type="text" class="form-control" id="" value="{{ Auth::user()->institution }}" name="institution">
                        </div>
                        <div class="form-group">
                          <label for="#">Institution</label>
                          <input type="password" class="form-control" id="" placeholder="Change Password" name="password">
                        </div>
                        <button type="submit" class="btn changes_btn">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
