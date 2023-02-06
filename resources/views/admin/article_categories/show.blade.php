@extends('admin.layouts.master')

@section('title', 'Article Category | Show ' . $article_category->name)

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show {{ $article_category->name }}</h1>
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
                    <h3 class="card-title">Show {{ $article_category->name }}</h3>
                </div>
                <!-- /.card-header -->

                @forelse ($article_category->articles()->paginate(10) as $article)
                    <div class="container">

                        <div>

                            <img src="{{ asset('storage/' . $article->image) }}" class="img-thumbnail" alt=""
                                width="400">
                        </div>

                        <div>
                            <h3>{{ $article->title }}</h3>
                            <h6>{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</h6>
                            <h6>{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('LLLL') }}</h6>
                        </div>

                        <div>
                            <p>{{ $article->content }}</p>
                        </div>

                    </div>

                @empty
                    <div class="alert alert-warning">No Articles Here !</div>
                @endforelse

                {{ $article_category->articles()->paginate(10)->links() }}
            </div>

        </div>
    </section>
@endsection
