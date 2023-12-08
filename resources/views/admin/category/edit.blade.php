@extends('admin.layouts.adminPanel')
@section('title', 'Редактирование')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="me-2">{{__('Редактирование категории')}}</h4>
                </div>
            </div>
            <form action="{{  route('admin.categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Название категории форума" value="{{ old('title')?? $category->title}}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <textarea name="descr" class="form-control @error('descr') is-invalid @enderror" cols="30" rows="3" placeholder="Напишите небольшое описание">{{ old('descr')?? $category->descr }}</textarea>
                            @error('descr')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="file" class="form-control @error('preview_img') is-invalid @enderror" id="preview_img" name="preview_img" value="">
                            <label for="preview_img" class="form-label text-muted small ms-2">размер иконки 54х54</label>
                            @error('preview_img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-secondary" value="Обновить">
            </form>
        </div>
    </div>
@endsection
