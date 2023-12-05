@extends('admin.layouts.adminPanel')
@section('title', 'Категории')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <p class="fs-4">Категории</p>
                <div class="col-3">
                    <a href="{{ route('admin.categoies.create') }}" class="btn btn-outline-secondary">Добавить</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8">
                    <table class="table table-hover table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Название</th>
                            <th scope="col">Действия</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>@mdo</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
