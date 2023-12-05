@extends('admin.layouts.adminPanel')
@section('title', 'Добавить категорию')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <p class="fs-4">Добавление категории</p>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Название категории форума" value="{{ old('title')}}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <textarea name="descr" class="form-control @error('descr') is-invalid @enderror" cols="30" rows="3" placeholder="Напишите небольшое описание">{{ old('descr') }}</textarea>
                            @error('descr')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="file" class="form-control @error('preview_img') is-invalid @enderror" name="preview_img" value="{{ old('preview_img')}}">
                            @error('preview_img')
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
