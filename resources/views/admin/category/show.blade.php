@extends('admin.layouts.adminPanel')
@section('title', 'Просмотр')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <div class="col-12 d-flex align-items-center">
                    <h4 class="me-2">{{$category->title}}</h4>
                    <a href="{{ route('admin.categories.edit', $category->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ route('admin.categories.delete', $category->id)}}" method="post">
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
                    <p class="fw-medium m-0 ps-2">{{__('Название')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{$category->title}}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3">
                    <p class="fw-medium m-0 ps-2">{{__('Описание')}}</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ps-2">{{$category->descr}}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6 col-md-3 py-3">
                    <p class="fw-medium m-0 ps-2">{{__('Иконка')}}</p>
                </div>
                <div class="col-6">
                    <img src="{{ asset('storage/' . $category->preview_img)}}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
