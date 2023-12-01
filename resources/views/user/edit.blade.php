@extends('layouts.profile')
@section('title', 'Редактирование' )
@section('profile')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <h6 class="mb-0">Редактирование данных </h4>
            <form action="{{ route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row mt-4 align-items-center">
                    <div class="col-4 col-md-2">
                        <label class="mb-0 ms-1 form-label fw-medium">{{__('Имя')}}</label>
                    </div>
                    <div class="col-8 col-lg-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Укажите свое имя" value="{{ old('name')?? $user->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3 align-items-center">
                    <div class="col-4 col-md-2">
                        <label class="mb-0 ms-1 form-label fw-medium">{{__('Возраст')}}</label>
                    </div>
                    <div class="col-8 col-lg-6">
                        <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="Укажите возраст" value="{{ old('age')?? $user->age }}">
                        @error('age')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3 align-items-center">
                    <div class="col-4 col-md-2">
                        <label class="mb-0 ms-1 form-label fw-medium">{{__('Пол')}}</label>
                    </div>
                    <div class="col-8 col-lg-6">
                        <select class="form-select" name="gender">
                            <option value="male" {{$user->gender == 'male'? ' selected' : ''}}>{{__('Мужской')}}</option>
                            <option value="female" {{$user->gender == 'female'? ' selected' : ''}}>{{__('Женский')}}</option>
                        </select>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3 align-items-center">
                    <div class="col-4 col-md-2">
                        <label class="mb-0 ms-1 form-label fw-medium">{{__('Город')}}</label>
                    </div>
                    <div class="col-8 col-lg-6">
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="Укажите город" value="{{ $user->city }}">
                        @error('city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3 align-items-center">
                    <div class="col-4 col-md-2">
                        <label class="mb-0 ms-1 form-label fw-medium">{{__('О себе')}}</label>
                    </div>
                    <div class="col-8 col-lg-6">
                        <textarea name="info" class="form-control @error('info') is-invalid @enderror" cols="30" rows="3" placeholder="Укажите информацию о себе">{{$user->info}}</textarea>
                        @error('info')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3 align-items-center">
                    <div class="col-4 col-md-2">
                        <label class="mb-0 ms-1 form-label fw-medium">{{__('Web-сайт')}}</label>
                    </div>
                    <div class="col-8 col-lg-6">
                        <input type="text" class="form-control @error('web_site') is-invalid @enderror" name="web_site" placeholder="Укажите свой сайт" value="{{ $user->web_site }}">
                        @error('web_site')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3 align-items-center">
                    <div class="col-4 col-md-2">
                        <label class="mb-0 ms-1 form-label fw-medium">{{__('Аватар')}}</label>
                    </div>
                    <div class="col-8 col-lg-6">
                        <input type="file" class="form-control @error('file') is-invalid @enderror" name="avatar" placeholder="Укажите свой сайт" value="{{ $user->web_site }}">
                        @error('avatar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-5 mb-3">
                    <div class="col-8 col-lg-6">
                        <input type="submit" class="btn btn-outline-secondary" value="Обновить">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
