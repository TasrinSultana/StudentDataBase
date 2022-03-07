<h1> eikhane new student entry hobe </h1>

@extends('layout', ['title'=> 'Home'])

@section('page-content')
    <legend>Create Student</legend>
    <form method="post" action="{{route('students.store')}}">
        @csrf
        <div class="form-group">
            <label for="s_id" class="col-sm-2 control-label">Student ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('s_id') is-invalid @enderror" value="{{old('s_id')}}" id="s_id" name="s_id" placeholder="Student ID">
                <div class="invalid-feedback">{{$errors->first('s_id')}}</div>
            </div>

        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" name="name" placeholder="Name">
                <div class="invalid-feedback">{{$errors->first('name')}}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="dept" class="col-sm-2 control-label">Department</label>
            <div class="col-sm-10">
                <input type="dept" class="form-control @error('dept') is-invalid @enderror" value="{{old('dept')}}" id="dept" name="dept" placeholder="Department">
                <div class="invalid-feedback">{{$errors->first('dept')}}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
                <input type="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" id="address" name="address" placeholder="Address">
                <div class="invalid-feedback">{{$errors->first('address')}}</div>
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-10">
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" id="phone" name="phone" placeholder="Phone">
                <div class="invalid-feedback">{{$errors->first('phone')}}</div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


@endsection



