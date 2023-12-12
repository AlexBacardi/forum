@extends('admin.layouts.adminPanel')
@section('title', 'Редактирование')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="me-2">{{__('Редактирование пользователя')}}</h4>
                </div>
            </div>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="text-muted small mb-2">Имя</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Введите имя" value="{{ old('name')?? $user->name}}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="text-muted small mb-2">Возраст</label>
                            <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="Введите возраст" value="{{ old('age')?? $user->age}}">
                            @error('age')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="text-muted small mb-2">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" disabled>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="text-muted small mb-2">Город</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="Введите город" value="{{ old('city')?? $user->city}}">
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="text-muted small mb-2">Информация</label>
                            <textarea name="info"cols="30" rows="4" class="form-control  @error('info') is-invalid @enderror" placeholder="Краткая информация">{{ old('info')?? $user->info}}</textarea>
                            @error('info')
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
                                    <option value="{{ $id }}" {{$id == $user->role? ' selected' : ''}}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="text-muted small mb-2">Заблокировать до</label>
                            <input type="date" class="form-control" name="banned_until">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-secondary" value="Обновить">
            </form>
        </div>
    </div>
@endsection
