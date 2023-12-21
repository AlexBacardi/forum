@extends('layouts.main')
@section('content')
    <section class="my-5 bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="ms-2 ms-lg-5" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb py-2 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('categories.index')}}">{{ __('Главная') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Профиль') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row justify-content-center">
            <div class="col-10 col-md-6">
                @if ($message = session()->pull('message'))
                    <div class="alert alert-success mb-3 text-center">{{ $message }}</div>
                @endif
                @if ($message = session()->pull('error'))
                    <div class="alert alert-danger mb-3 text-center">{{ $message }}</div>
                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3 offset-lg-0 col-lg-3 mb-3">
                    <div class="text-center border rounded shadow p-md-3">
                        <div class="mt-3 mt-md-0">
                            <img class="avatar avatar-128 bg-light rounded-circle text-white p-2"
                                src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('icons/avatar.jpg') }}">
                        </div>
                        <div class="mt-3">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <a href="{{ route('users.info', $user->id) }}"
                                        class="btn btn-outline-secondary w-75">{{ __('Профиль') }}</a>
                                </li>
                                <li class="mb-3">
                                    <a href="{{ route('users.topics.index', $user->id)}}" class="btn btn-outline-secondary w-75">{{ __('Темы') }}</a>
                                </li>
                                <li class="mb-3">
                                    <a href="#" class="btn btn-outline-secondary w-75">{{ __('Ответы') }}</a>
                                </li>
                                @can('create', $user)
                                    <li class="mb-3">
                                        <a href="{{ route('users.topics.create', $user->id)}}" class="btn btn-outline-secondary w-75">{{ __('Создать тему') }}</a>
                                    </li>
                                @endcan
                                @can('update', $user)
                                    <li class="mb-3">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-outline-secondary w-75">{{ __('Редактировать') }}</a>
                                    </li>
                                @endcan
                                @if (auth()->user()->isAdmin() and auth()->user()->id == $user->id)
                                    <li class="mb-3">
                                        <a href="{{route('admin.index')}}" class="btn btn-outline-secondary w-75">{{ __('Управление') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @yield('profile')
            </div>
        </div>
    </section>
@endsection
