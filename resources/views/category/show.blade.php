@extends('layouts.main')
@section('title', 'темы форума: ' . $category->title)
@section('content')
    <section class="my-5 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="ms-2 ms-lg-5" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb py-2 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}">{{__('Главная')}}</a></li>
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
                            <div class="d-flex p-3">
                                <div class="col-5 p-2">
                                    <span class="fw-medium ms-2">{{__('Название темы')}}</span>
                                </div>
                                <div class="col-7 p-2">
                                    <ul class="d-md-flex d-none justify-content-around p-0 list-unstyled text-center mb-0">
                                        <li>
                                            {{__('Ответов')}}
                                        </li>
                                        <li>
                                            {{__('Автор')}}
                                        </li>
                                        <li class="text-wrap">
                                            {{__('Послендее сообщение')}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @foreach ($topics as $topic)
                            <div class="border border-top-0">
                                <div class="row align-items-center p-2">
                                    <div class="col-12 col-md-5 d-flex align-items-center p-sm-2 p-md-4 me-md-auto">
                                        <div class="me-auto ms-md-3">
                                            <a href="{{ route('categories.topics.show', ['category' => $category->id, 'topic' => $topic->id] )}}" class="nav-link fs-5 mb-0">{{ $topic->title}}</a>
                                            <div class="d-flex align-items-center mt-2 text-muted small">
                                                <i class="far fa-clock"></i>
                                                <p class="ms-2 mb-0 fs-6">{{ $topic->created_at->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <ul class="d-md-flex d-none justify-content-around p-0 list-unstyled">
                                            <li class="py-4">
                                                {{__('10')}}
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column flex-xl-row align-items-center py-3">
                                                    <div>
                                                        <a href="#">{{ $topic->user->name}}</a>
                                                    </div>
                                                    <div class="mt-lg-2">
                                                        <img class="avatar avatar-48 bg-light rounded-circle text-white p-1 ms-2" src="{{$topic->user->avatar ? asset('storage/' . $topic->user->avatar) : asset('icons/avatar.jpg') }}">
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <div>
                                                        <p>{{__('2 года, 2 мес назад')}}</p>
                                                    </div>
                                                    <div class="text-end">
                                                        <a href="#">{{__('Eh Jewel')}}</a>
                                                        <img class="avatar avatar-32 bg-light rounded-circle text-white p-1 ms-2" src="{{asset('icon/avatar.jpg')}}">
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
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
