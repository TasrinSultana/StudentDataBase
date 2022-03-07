@extends('layout', ['title'=> 'Home'])

@section('page-content')
<h1> Eita Index mane HomePage </h1>
    <div class="row">
        <div class="col-lg-10">
            <form action="{{ route('students.index') }}" method="GET" >
                <div class="form-row">
                    <div class="col-8">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search"
                               value="{{ request('search') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-default">Search</button>

                    </div>
                </div>
            </form>

        </div>

        <div class="col-lg-2">
            <p class="text-right"><a href="{{route('students.create')}}" class="btn btn-primary">New Student</a></p>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <th>Student ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Address</th>
        <th> Phone </th>
        <th colspan="3" class="text-center">Action</th>
        @foreach($students as $student)
            <tr>
                <td>{{$student->s_id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->dept}}</td>
                <td>{{$student->address}}</td>
                <td>{{$student->phone}}</td>
                <td>
                    <a href="{{route('students.show',$student->id)}}">View</a>
                </td>
                <td>
                    <a href="{{route('students.edit',$student->id)}}">Edit</a>
                </td>

                <td>
                    <form method="post" action="{{route('students.destroy',$student)}}" onsubmit="return confirm('Sure?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-link text-danger"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>

    {{ $students->withQueryString()->links() }}

@endsection
