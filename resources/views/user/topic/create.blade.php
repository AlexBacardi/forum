@extends('user.layouts.profile')
@section('title', 'Созданые темы')
@section('profile')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <h6 class="mb-0">Создать</h4>
                <form action="{{ route('users.topics.store', $user->id) }}" method="POST">
                    @csrf
                    <div class="row mt-4 align-items-center">
                        <div class="col-4 col-md-2">
                            <label class="mb-0 ms-1 form-label fw-medium">{{ __('Название') }}</label>
                        </div>
                        <div class="col-8 col-lg-6">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Укажите название" value="{{ old('title')}}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-4 col-md-2">
                            <label class="mb-0 ms-1 form-label fw-medium">{{ __('Описание') }}</label>
                        </div>
                        <div class="col-8 col-lg-6">
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="5" placeholder="Описание">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3 align-items-center">
                        <div class="col-4 col-md-2">
                            <label class="mb-0 ms-1 form-label fw-medium">{{ __('Категория') }}</label>
                        </div>
                        <div class="col-8 col-lg-6">
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-5 mb-3">
                        <div class="col-8 col-lg-6">
                            <input type="submit" class="btn btn-outline-secondary" value="Создать">
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection
