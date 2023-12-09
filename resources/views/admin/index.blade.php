@extends('admin.layouts.adminPanel')
@section('title', 'Информация')
@section('adminContent')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row">
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="border rounded text-center py-4">
                        <img src="{{ asset('icons/p-icon-1.png') }}" alt="">
                        <p class="fs-5 fw-medium mt-2"><a href="{{ route('admin.users.index')}}" class="link-underline link-underline-opacity-0 text-dark">{{ __('Пользователи') }}</a></p>
                        <span class="badge bg-secondary fs-6">{{ $data['cntUser'] }}</span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="border rounded text-center py-4">
                        <img src="{{ asset('icons/p-icon-2.png') }}" alt="">
                        <p class="fs-5 fw-medium mt-2"><a href="" class="link-underline link-underline-opacity-0 text-dark">{{ __('Созданые темы') }}</a></p>
                        <span class="badge bg-secondary fs-6">{{ __('30') }}</span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="border rounded text-center py-4">
                        <img src="{{ asset('icons/p-icon-3.png') }}" alt="" style="max-height: 62px;">
                        <p class="fs-5 fw-medium mt-2"><a href="" class="link-underline link-underline-opacity-0 text-dark">{{ __('Ответы') }}</a></p>
                        <span class="badge bg-secondary fs-6">{{ __('150') }}</span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="border rounded text-center py-4">
                        <img src="{{ asset('icons/p-icon-4.png') }}" alt="" style="max-height: 62px;">
                        <p class="fs-5 fw-medium mt-2"><a href="{{ route('admin.categories.index')}}" class="link-underline link-underline-opacity-0 text-dark">{{ __('Категории') }}</a></p>
                        <span class="badge bg-secondary fs-6">{{ $data['cntCategory'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
