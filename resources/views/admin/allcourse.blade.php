@extends('layouts.admin')
@section('content')

<div class="row teachers_table">
    <div class="col-md">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Course Teacher</th>
                    <th>Teacher Email</th>
                    <th>Course Key</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course as $item)
                <tr>
                    <td>{{ $item->Course_name }}</td>
                    <td><span>{{ $item->Course_code }}</span></td>
                    <td><span>{{ $item->Fname }} {{ $item->Lname }}</span></td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->Course_key }}</td>
                </tr>
               @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
