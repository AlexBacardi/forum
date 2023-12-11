@extends('user.layouts.profile')
@section('title', 'Профиль')
@section('profile')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-5">
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="border rounded text-center py-4">
                        <img src="{{ asset('icons/p-icon-1.png') }}" alt="">
                        <p class="fs-5 fw-medium mt-2">{{ __('Роль') }}</p>
                        <span class="badge bg-secondary fs-6">{{$roles[$user->role]}}</span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="border rounded text-center py-4">
                        <img src="{{ asset('icons/p-icon-2.png') }}" alt="">
                        <p class="fs-5 fw-medium mt-2">{{ __('Созданые темы') }}</p>
                        <span class="badge bg-secondary fs-6">{{ __('30') }}</span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="border rounded text-center py-4">
                        <img src="{{ asset('icons/p-icon-3.png') }}" alt="" style="max-height: 62px;">
                        <p class="fs-5 fw-medium mt-2">{{ __('Ответы') }}</p>
                        <span class="badge bg-secondary fs-6">{{ __('150') }}</span>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">Имя</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{$user->name}}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">Возраст</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{$user->age}}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">Пол</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{$gender[$user->gender]?? ''}}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">Город</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{$user->city}}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">О себе</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{$user->info}}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">Web-site</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{$user->web_site}}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">Регистрация</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{$user->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
