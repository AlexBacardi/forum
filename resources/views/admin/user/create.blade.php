@extends('admin.layouts.adminPanel')
@section('title', 'Добавить пользователя')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-3">
                <p class="fs-4">Добавление пользователя</p>
            </div>
            <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label class="text-muted small mb-1">Имя</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Введите имя" value="{{ old('name')}}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="text-muted small mb-1">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Введите email" value="{{ old('email')}}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="text-muted small mb-1">Роль</label>
                            <select class="form-select" name="role">
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="text-muted small mb-1">Пароль</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Введите пароль">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-secondary" value="Добавить">
            </form>
        </div>
    </div>
@endsection
