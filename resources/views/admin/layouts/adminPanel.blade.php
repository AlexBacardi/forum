@push('css')
    <link rel="stylesheet" href="{{asset('css/plugins/fontawesome-free/css/all.min.css')}}">
@endpush
@extends('layouts.main')
@section('content')
    <section>
        <div class="row justify-content-center">
            <div class="col-10 col-md-6">
                @if ($message = session()->pull('message'))
                    <div class="alert alert-success mb-3 text-center">{{ $message }}</div>
                @endif
                @if ($message = session()->pull('error'))
                    <div class="alert alert-danger mb-3 text-center">{{ $message }}</div>
                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3 offset-lg-0 col-lg-3 mb-3">
                    <div class="text-center border rounded shadow p-md-3">
                        <div class="mt-3">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <a href="{{ route('admin.index')}}" class="btn btn-outline-secondary w-75">{{ __('Информация') }}</a>
                                </li>
                                <li class="mb-3">
                                    <a href="{{ route('admin.categories.index')}}" class="btn btn-outline-secondary w-75">{{ __('Категории') }}</a>
                                </li>
                                <li class="mb-3">
                                    <a href="{{ route('admin.users.index')}}" class="btn btn-outline-secondary w-75">{{ __('Пользователи') }}</a>
                                </li>
                                <li class="mb-3">
                                    <a href="#" class="btn btn-outline-secondary w-75">{{ __('Темы') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @yield('adminContent')
            </div>
        </div>
    </section>
@endsection
