@extends('layouts.teacher')
@section('content')

<link rel="stylesheet" href="{{ asset("css/datatable.css") }}">
<link rel="stylesheet" href="{{ asset("css/default.css") }}">
<link rel="stylesheet" href="{{ asset("css/teacher_single_class.css") }}">
<div class="container single_class">
    <div class="row">

        <div class="col-md">
            <div class="single_class_content">
                <div class="single_class_header">
                <div class="row">
                        <div class="col-6">
                            <h2>{{ $item->Course_name }} : {{ $item->Course_code }}</h2>
                        </div>

                        <div class="col-6 d-flex justify-content-end">
                            <p><b for="#">Course Code : </b><span>{{ $item->Course_key }}</span></p>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                </tr>
            </thead>
            <tbody>
                @foreach($students as $user)
                <tr>
                    <td>{{ $user->Uname }}</td>
                    <td><span>{{ $user->Fname }}</span></td>
                    <td><span>{{ $user->Lname }}</span></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->institution }}</td>

                </tr>
               @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
