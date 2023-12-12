@extends('admin.layouts.adminPanel')
@section('title', 'Пользователи')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <p class="fs-4">Пользователи</p>
                <div class="col-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-outline-secondary">Добавить</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Имя</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Дата регистрации</th>
                            <th scope="col">Роль</th>
                            <th scope="col">Статус</th>
                            <th scope="col" colspan="3" class="text-center">Действия</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->format('d-m-Y')}}</td>
                                    <td class="text-{{$user->role? 'warning' : 'info' }}"">{{$roles[$user->role]}}</td>
                                    <td class="text-{{status($user->banned_until) ? 'success' : 'danger'}}">{{status($user->banned_until) ? 'Активен' : 'Заблокирован'}}</td>
                                    <td class="text-end"><a href="{{ route('admin.users.show', $user->id) }}" class="text-primary"><i class="far fa-eye"></i></a></td>
                                    <td class="text-center"><a href="{{ route('admin.users.edit', $user->id) }}" class="text-success"><i class="fas fa-pen"></i></a></td>
                                    <td>
                                        <form action="#" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fas fa-trash text-danger" role="button"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
