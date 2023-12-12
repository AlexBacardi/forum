@extends('admin.layouts.adminPanel')
@section('title', 'Просмотр')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <div class="col-12 d-flex align-items-center">
                    <h4 class="me-2">{{ $user->name }}</h4>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ route('admin.users.delete', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border-0 bg-transparent">
                            <i class="fas fa-trash text-danger" role="button"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Имя')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{ $user->name }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Возраст')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{ $user->age }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Email')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{ $user->email }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3 py-3">
                    <p class="fw-medium m-0 ps-2">{{__('Аватар')}}</p>
                </div>
                <div class="col-6">
                    <img class="avatar avatar-64 bg-light rounded-circle text-white p-1" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('icons/avatar.jpg') }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Город')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0">{{ $user->city }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Пол')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0">{{ $gender[$user->gender]?? '' }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Информация')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0">{{ $user->info }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Роль')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0">{{ $roles[$user->role] }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Дата регистрации')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0">{{ $user->created_at->format('d-m-Y') }}г.</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Статус')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0 text-{{status($user->banned_until)? 'success' : 'danger'}}">{{status($user->banned_until)? 'Активен' : 'Заблокирован до ' . $user->banned_until->format('d-m-Y')}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
