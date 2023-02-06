@extends('admin.layouts.master')

@section('title', 'Article Categories')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Article Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Article Categories</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <a class="btn btn-success mb-3" href="{{ route('admin.article_categories.create') }}">
                        Add New Category
                    </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($article_categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->articles->count() }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('admin.article_categories.edit',$category->id)}}">Edit</a>
                                        <a class="btn btn-warning" href="{{route('admin.article_categories.show',$category->id)}}">Show</a>

                                         
                                        <form style="display: inline;" action="{{route('admin.article_categories.destroy',$category->id)}}" method="post">
                                            @method('delete')
                                            @csrf

                                            <button class="btn m-1 btn-danger" 
                                            onclick="return confirm('Are you Sure to Delete ?')"
                                            type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>
@endsection
