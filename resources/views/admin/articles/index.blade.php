@extends('admin.layouts.master')

@section('title', 'Articles')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Articles</h1>
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
                    <h3 class="card-title">Articles</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <a class="btn btn-success mb-3" href="{{ route('admin.articles.create') }}">
                        Add New Article
                    </a>
                    @if ($articles->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $index => $article)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $article->image) }}" class="img-thumbnail"
                                                alt="" width="100">
                                        </td>
                                        <td>{{ $article->content }}</td>
                                        <td> {{ $article->article_category->name }} </td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="{{ route('admin.articles.edit', $article->id) }}">Edit</a>

                                                <a class="btn btn-warning"
                                                href="{{ route('admin.articles.show', $article->id) }}">Show</a>

                                            <form style="display: inline;"
                                                action="{{ route('admin.articles.destroy', $article->id) }}" method="post">
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
                    @else
                        <div class="alert alert-warning">No Articles Here !</div>
                    @endif

                </div>

            </div>

        </div>
    </section>
@endsection
