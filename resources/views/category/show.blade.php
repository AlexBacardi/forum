@extends('layouts.main')
@section('title', 'темы форума: ' . $category->title)
@section('content')
    <section class="my-5 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="ms-2 ms-lg-5" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb py-2 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{__('Главная')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $category->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="container-xl">
            <div class="row">
                <div class="col-12 col-lg-9">
                    @include('includes.question')
                    <div class="mb-5 shadow">
                        <div class="border rounded-top bg-body-tertiary">
                            <div class="row p-3">
                                <div class="col-6 col-xl-5 p-2">
                                    <p class="ms-3 small m-0">{{__('Название темы')}}</p>
                                </div>
                                <div class="col-md-3 col-xl-2 d-none d-md-block p-2">
                                    <p class="text-center small m-0">{{__('Ответов')}}</p>
                                </div>
                                <div class="col-6 col-md-3 col-xl-2 p-2">
                                    <p class="text-center small m-0">{{__('Автор')}}</p>
                                </div>
                                <div class="col-xl-3 d-none d-none d-xl-block p-2">
                                    <p class="text-center small m-0">{{__('Послендее сообщение')}}</p>
                                </div>
                            </div>
                        </div>
                        @foreach ($topics as $topic)
                            <div class="row align-items-center border border-top-0 m-0">
                                <div class="col-6 col-xl-5 p-3">
                                    <div class="row my-2">
                                        <div class="col-12">
                                            <a href="{{ route('categories.topics.show', ['category' => $category->id, 'topic' => $topic->id] )}}" class="nav-link fw-medium mb-0 ms-md-2">{{ $topic->title}}</a>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-1 px-1 px-md-0">
                                            <p class="small text-muted text-end m-0"><i class="far fa-clock"></i></p>
                                        </div>
                                        <div class="col-10 px-0 px-md-1 offset-1 offset-md-0">
                                            <p class="small text-muted m-0">{{ $topic->created_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xl-2 d-none d-md-block p-2">
                                    <p class="text-center">{{ $topic->comments->count()}}</p>
                                </div>
                                <div class="col-6 col-md-3 col-xl-2 p-2">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-6 p-0">
                                            <p class="text-center mb-0"><a href="#">{{ $topic->user->name}}</a></p>
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 text-center text-lg-start">
                                            <img class="avatar avatar-48 bg-light rounded-circle text-white p-1" src="{{$topic->user->avatar ? asset('storage/' . $topic->user->avatar) : asset('icons/avatar.jpg') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 d-none d-none d-xl-block p-2">
                                    <div class="row m-0">
                                        <div>
                                            <p class="text-center">{{$lstCmt[$topic->id] ? $lstCmt[$topic->id]->created_at->isoFormat('Do MMMM HH:mm') : ''}}</p>
                                        </div>
                                        <div class="text-center">
                                            <a href="#">{{$lstCmt[$topic->id]->user->name ?? ''}}</a>
                                            {{-- <img class="avatar avatar-32 bg-light rounded-circle text-white p-1 ms-2" src="{{$lstCmt[$topic->id]->user->avatar ? asset('storage/' . $lstCmt[$topic->id]->user->avatar) : asset('icons/avatar.jpg') }}"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="sidebar">
                        @include('includes.info')
                        <hr>
                        <div class="ticket_widget">
                            <div class="border rounded-top bg-body-tertiary">
                                <div class="row p-3">
                                    <div class="col-8 col-lg-7 p-lg-0 ms-lg-1">
                                        <p class="fs-6 fw-medium mb-0 text-lg-center">{{__('Больше всего ответов')}}</p>
                                    </div>
                                    <div class="col-4 p-lg-0">
                                        <p class="fs-6 fw-medium mb-0 text-xl-end">{{__('за 30 дн')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded-bottom p-3">
                                <ul class="list-unstyled">
                                    <li class="py-3 border-bottom">
                                        <div class="row ms-2 align-items-center">
                                            <img class="col-1 avatar avatar-24 bg-light rounded-circle text-white p-1 ms-2" src="{{asset('icon/avatar.jpg')}}">
                                            <a href="#" class="col-8">{{__('Eh Jewel')}}</a>
                                            <div class="col-2 p-0">
                                                <span class="badge text-bg-secondary">{{__('40')}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-3 border-bottom">
                                        <div class="row ms-2 align-items-center">
                                            <img class="col-1 avatar avatar-24 bg-light rounded-circle text-white p-1 ms-2" src="{{asset('icon/avatar.jpg')}}">
                                            <a href="#" class="col-8">{{__('Eh Jewel')}}</a>
                                            <div class="col-2 p-0">
                                                <span class="badge text-bg-secondary">{{__('40')}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-3 border-bottom">
                                        <div class="row ms-2 align-items-center">
                                            <img class="col-1 avatar avatar-24 bg-light rounded-circle text-white p-1 ms-2" src="{{asset('icon/avatar.jpg')}}">
                                            <a href="#" class="col-8">{{__('Eh Jewel')}}</a>
                                            <div class="col-2 p-0">
                                                <span class="badge text-bg-secondary">{{__('40')}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-3 border-bottom">
                                        <div class="row ms-2 align-items-center">
                                            <img class="col-1 avatar avatar-24 bg-light rounded-circle text-white p-1 ms-2" src="{{asset('icon/avatar.jpg')}}">
                                            <a href="#" class="col-8">{{__('Eh Jewel')}}</a>
                                            <div class="col-2 p-0">
                                                <span class="badge text-bg-secondary">{{__('40')}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-3 border-bottom">
                                        <div class="row ms-2 align-items-center">
                                            <img class="col-1 avatar avatar-24 bg-light rounded-circle text-white p-1 ms-2" src="{{asset('icon/avatar.jpg')}}">
                                            <a href="#" class="col-8">{{__('Eh Jewel')}}</a>
                                            <div class="col-2 p-0">
                                                <span class="badge text-bg-secondary">{{__('40')}}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
