@extends('layouts.admin')
@section('content')

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
                    <th>Account State</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $user)
                <tr>
                    <td>{{ $user->Uname }}</td>
                    <td><span>{{ $user->Fname }}</span></td>
                    <td><span>{{ $user->Lname }}</span></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->institution }}</td>
                    <td >
                        @if($user->is_verified == 1)
                        <a href="#" class="btn btn-success "><i class="fa fa-check-circle "></i></a>
                        @else
                        <a href="#" class="btn btn-danger "><i class="fa fa-times-circle"></i></a>
                        @endif
                    </td>
                </tr>
               @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
