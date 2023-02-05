@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-3">
                     
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" disabled value="{{$student->name}}" id="" class="form-control">

                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" disabled value="{{$student->email}}" id="" class="form-control">
                            @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" disabled value="{{$student->phone}}" id="" class="form-control">
                            @error('phone')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Age</label>
                            <input type="text" name="age" disabled value="{{$student->age}}" id="" class="form-control">
                            @error('age')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" disabled value="{{$student->address}}" id="" class="form-control">
                            @error('address')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
 
                </div>
            </div>
        </div>
    </div>
@endsection
