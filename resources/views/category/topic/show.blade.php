@extends('layouts.main')
@section('title', 'показать вопрос')
@section('content')
    <section class="my-5 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="ms-2 ms-lg-5" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb py-2 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('categories.index')}}">{{__('Главная')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categorioes.show', $category->id) }}">{{ $category->title }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $topic->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    @include('includes.question')
                    <div class="border rounded mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex p-2 p-md-3 align-items-center">
                                    <div class="me-3">
                                        <img class="avatar avatar-64 bg-light rounded-circle text-white p-1 ms-2" src="{{$topic->user->avatar ? asset('storage/' . $topic->user->avatar) : asset('icons/avatar.jpg') }}">
                                    </div>
                                    <div>
                                        <a href="{{ route('users.info', $topic->user->id )}}" class="nav-link fs-5">{{ $topic->user->name}}</a>
                                        <div class=" d-flex lign-items-center mt-1 mt-md-2">
                                            <div class="ms-1">
                                                <i class="far fa-calendar" style="color: #b8b799;"></i>
                                            </div>
                                            <p class="ms-2 mb-0 fs-6 text-muted">{{ $topic->created_at->isoFormat('Do MMMM HH:mm')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 my-4">
                                <h3 class="h5 ms-4">
                                    {{ $topic->title}}
                                </h3>
                                <p class="p-4 mb-0">{{ $topic->content}}</p>
                            </div>
                        </div>
                    </div>
                        <div class="row mb-5">
                            <div class="col-12">
                                <form class="pb-2" action="{{ route('categories.topics.comments.store', ['category' => $category->id, 'topic' => $topic->id])}}" method="POST">
                                    @csrf
                                    <label class="fs-5 ms-3 mb-3">Комментарий</label>
                                    <textarea class="form-control mb-3" name="message" cols="30" rows="6"></textarea>
                                    <button class="btn btn-outline-secondary" type="submit">Ответить</button>
                                </form>
                            </div>
                        </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <p class="fs-5 mb-5 fw-medium">Все ответы</p>
                            <hr>
                        </div>
                    </div>
                    @foreach ($comments as $comment)
                        <div class="comments">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex p-2 p-md-2 align-items-center">
                                        <div class="me-3">
                                            <img class="avatar avatar-64 bg-light rounded-circle text-white p-1 ms-2" src="{{$comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('icons/avatar.jpg') }}">
                                        </div>
                                        <div>
                                            <a href="{{ route('users.info', $comment->user->id)}}" class="nav-link fs-6">{{ $comment->user->name}}</a>
                                            <div class=" d-flex lign-items-center mt-1 mt-md-2">
                                                <div class="ms-1">
                                                    <i class="far fa-calendar" style="color: #b8b799;"></i>
                                                </div>
                                                <p class="ms-2 mb-0 fs-6 text-muted">{{$comment->created_at->isoFormat('Do MMMM HH:mm')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-5">
                                    <p class="p-2 mb-0">{{$comment->message}}</p>
                                </div>
                                <hr>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="sidebar">
                        @include('includes.info')
                        <hr>
                        <div class="ticket_widget">
                            <h2 class="h4 mt-4 bg-body-tertiary p-3 text-center">{{__('Популярные темы')}}</h2>
                            @foreach ($popularTopics as $topic)
                                <div class="row border-bottom py-3 align-items-center">
                                    <div class="col-lg-10">
                                        <a href="{{ route('categories.topics.show', ['category' => $topic->category_id, 'topic' => $topic->id])}}" class="nav-link fw-medium">{{ $topic->title }}</a>
                                    </div>
                                    <div class="col-lg-2">
                                        <p class="m-0"><span class="badge text-bg-secondary">{{ $topic->comments_count }}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
