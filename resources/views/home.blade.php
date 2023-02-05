@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary mb-4" href="{{route('students.create')}}">Add New Student</a>

                    @if(session('success'))
                       <div class="alert alert-success">{{session('success')}}</div> 
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            @foreach ($students as $index => $student)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>
                                        <a class="btn m-1 btn-info" href="{{route('students.edit',$student->id)}}">Edit</a>

                                        <a class="btn m-1 btn-success" href="{{route('students.show',$student->id)}}">Show</a>

                                        <form action="{{route('students.destroy',$student->id)}}" method="post">
                                            @method('delete')
                                            @csrf

                                            <button class="btn m-1 btn-danger" 
                                            onclick="return confirm('Are you Sure ?')"
                                            type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
