@extends('layouts.main')
@section('title', 'Главная')
@section('content')
    <section class="my-5 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="ms-2 ms-lg-5" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb py-2 mb-0">
                            <li class="breadcrumb-item">{{ __('Главная') }}</li>
                            <li class="breadcrumb-item active" aria-current="page"></li>
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
                    <div class="mb-5 shadow">
                        <div class="border rounded-top bg-body-tertiary">
                            <div class="d-flex p-3">
                                <div class="col-5 me-auto">
                                    <span class="fw-medium">{{ __('Форум') }}</span>
                                </div>
                                <div class="col-7">
                                    <ul class="d-md-flex d-none justify-content-around p-0 list-unstyled">
                                        <li>
                                            {{ __('Темы') }}
                                        </li>
                                        <li>
                                            {{ __('Сообщения') }}
                                        </li>
                                        <li class="text-wrap">
                                            {{ __('Послендее сообщение') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if (count($categories) == 0)
                            <h1 class="h3 fw-bold text-center py-5">{{ _('Нет не одной категории') }}</h1>
                        @else
                            @foreach ($categories as $category)
                                <div class="border border-top-0">
                                    <div class="row align-items-center p-2">
                                        <div class="col-12 col-md-5 d-flex align-items-center p-sm-2 p-md-4 me-md-auto">
                                            <div class="mx-3">
                                                <img src="{{ asset('storage/' . $category->preview_img)}}" alt="">
                                            </div>
                                            <div class="me-auto ms-md-3">
                                                <a href="#" class="nav-link">
                                                    <p class="fs-4 mb-0">{{ $category->title }}</p>
                                                </a>
                                                <p class="mb-0 fs-6">{{ $category->descr }}</p>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <ul
                                                class="d-md-flex d-none justify-content-around align-items-center p-0 list-unstyled">
                                                <li>
                                                    {{ __('10') }}
                                                </li>
                                                <li>
                                                    {{ __('34') }}
                                                </li>
                                                <li>
                                                    <div>
                                                        <div>
                                                            <p>{{ __('2 года, 2 мес назад') }}</p>
                                                        </div>
                                                        <div class="text-end">
                                                            <a href="#">{{ __('Eh Jewel') }}</a>
                                                            <img class="avatar avatar-48 bg-light rounded-circle text-white p-1 ms-2"
                                                                src="{{ asset('icon/avatar.jpg') }}">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="sidebar">
                        @include('includes.info')
                        <hr>
                        <div class="ticket_widget">
                            <h2 class="h4 my-4">{{ __('Популярные темы') }}</h2>
                            <ul class="list-unstyled">
                                <li class="border-bottom py-3 d-flex justify-content-around">
                                    <a href="#" class="nav-link">{{ __('Популярная тема № 1') }}</a>
                                    <span class="badge text-bg-secondary">{{ __('40') }}</span>
                                </li>
                                <li class="border-bottom py-3 d-flex justify-content-around">
                                    <a href="#" class="nav-link">{{ __('Популярная тема № 2') }}</a>
                                    <span class="badge text-bg-secondary">{{ __('23') }}</span>
                                </li>
                                <li class="border-bottom py-3 d-flex justify-content-around">
                                    <a href="#" class="nav-link">{{ __('Популярная тема № 3') }}</a>
                                    <span class="badge text-bg-secondary">{{ __('56') }}</span>
                                </li>
                                <li class="border-bottom py-3 d-flex justify-content-around">
                                    <a href="#" class="nav-link">{{ __('Популярная тема № 4') }}</a>
                                    <span class="badge text-bg-secondary">{{ __('155') }}</span>
                                </li>
                                <li class="border-bottom py-3 d-flex justify-content-around">
                                    <a href="#" class="nav-link">{{ __('Популярная тема № 5') }}</a>
                                    <span class="badge text-bg-secondary">{{ __('62') }}</span>
                                </li>
                                <li class="border-bottom py-3 d-flex justify-content-around">
                                    <a href="#" class="nav-link">{{ __('Популярная тема № 6') }}</a>
                                    <span class="badge text-bg-secondary">{{ __('33') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
