@extends('admin.layouts.master')

@section('title', 'Article | Show ' . $article->title)

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show {{ $article->title }}</h1>
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
                    <h3 class="card-title">Show {{ $article->title }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="container">

                    <div>

                        <img src="{{ asset('storage/' . $article->image) }}" class="img-thumbnail" alt=""
                            width="400">
                    </div>

                    <div>
                        <h3>{{ $article->title }}</h3>
                        <h6>{{\Carbon\Carbon::parse($article->created_at)->diffForHumans();}}</h6>
                        <h6>{{\Carbon\Carbon::parse($article->created_at)->isoFormat('LLLL');}}</h6>
                    </div>

                    <div>
                        <p>{{$article->content}}</p>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
