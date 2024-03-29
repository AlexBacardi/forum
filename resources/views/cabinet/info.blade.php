@extends('cabinet.layouts.profile')
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
                        <p class="fs-5 fw-medium mt-2"><a href="{{ route('users.topics.index', $user->id)}}" class="link-underline link-underline-opacity-0 text-dark">{{ __('Созданые темы') }}</a></p>
                        <span class="badge bg-secondary fs-6">{{ $data['cntTopics']}}</span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="border rounded text-center py-4">
                        <img src="{{ asset('icons/p-icon-3.png') }}" alt="" style="max-height: 62px;">
                        <p class="fs-5 fw-medium mt-2"><a href="{{ route('users.comments.index', $user->id )}}" class="link-underline link-underline-opacity-0 text-dark">{{ __('Ответы') }}</a></p>
                        <span class="badge bg-secondary fs-6">{{ $data['cntComment'] }}</span>
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
            @if (!status($user->banned_until))
                <div class="row mb-3">
                    <div class="col-6 col-md-3">
                        <p class="fw-medium m-0 ps-2">Статус</p>
                    </div>
                    <div class="col-6">
                        <p class="m-0 ps-2 text-danger">Заблокирован</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
