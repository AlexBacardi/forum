@extends('cabinet.layouts.profile')
@section('title', 'Просмотр тем')
@section('profile')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <div class="col-12">
                    <p class="fs-4 fw-medium ms-2 mb-0">{{ __('Созданыне темы') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="border rounded-top bg-body-tertiary">
                        <div class="d-flex p-3">
                            <div class="col-12 col-md-7 p-2">
                                <span class="fw-medium ms-2">{{ __('Название темы') }}</span>
                            </div>
                            <div class="col-7 col-md-5 p-2">
                                <ul class="d-md-flex d-none p-0 list-unstyled text-center mb-0">
                                    <li class="me-auto">
                                        {{ __('Ответов') }}
                                    </li>
                                    <li class="text-center w-50">
                                        {{ __('Статус') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($topics) == 0)
                <h4 class="mt-3">Вы не создали не одной темы </h4>
            @else
                @foreach ($topics as $topic)
                    <div class="row">
                        <div class="col-12">
                            <div class="border border-top-0">
                                <div class="d-flex p-3">
                                    <div class="col-12 col-md-7 p-2">
                                        <a href="{{ route('categories.topics.show', ['category' => $topic->category_id, 'topic' => $topic->id])}}" class="nav-link fw-medium ms-2">{{ $topic->title }}</a>
                                    </div>
                                    <div class="col-7 col-md-5 p-2">
                                        <ul class="d-md-flex d-none p-0 list-unstyled text-center mb-0">
                                            <li class="me-auto">
                                                {{ $topic->comments->count() }}
                                            </li>
                                            <li class="text-wrap w-50 text-{{$topic->is_published? 'success' : 'danger'}}">
                                                {{ $isPublished[$topic->is_published] }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
