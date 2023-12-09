@extends('admin.layouts.adminPanel')
@section('title', 'Пользователи')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <p class="fs-4">Пользователи</p>
                <div class="col-3">
                    <a href="#" class="btn btn-outline-secondary">Добавить</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8">
                    @if(count($users) == 0)
                        <h4>Пользователей нет</h4>
                    @else
                    <table class="table table-hover table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Имя</th>
                            <th scope="col">E-mail</th>
                            <th scope="col" colspan="3" class="text-center">Действия</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="text-end"><a href="#" class="text-primary"><i class="far fa-eye"></i></a></td>
                                    <td class="text-center"><a href="#" class="text-success"><i class="fas fa-pen"></i></a></td>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
