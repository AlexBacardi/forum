
@extends('cabinet.layouts.profile')
@section('title', 'Просмотр тем')
@section('profile')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <div class="row mb-4">
                <div class="col-12">
                    <p class="fs-4 fw-medium ms-2 mb-0">{{ __('Ответы') }}</p>
                </div>
            </div>
            @foreach ($userComments as $comment )
                <div class="comments">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex p-2 p-md-2 align-items-center">
                                <div class="me-3">
                                    <img class="avatar avatar-64 bg-light rounded-circle text-white p-1 ms-2" src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('icons/avatar.jpg') }}">
                                </div>
                                <div>
                                    <a href="{{ route('users.info', $comment->user->id) }}" class="nav-link fs-6">{{ $comment->user->name }}</a>
                                    <div class=" d-flex lign-items-center mt-1 mt-md-2">
                                        <div class="ms-1">
                                            <i class="far fa-calendar" style="color: #b8b799;"></i>
                                        </div>
                                        <p class="ms-2 mb-0 fs-6 text-muted">{{ $comment->created_at->isoFormat('Do MMMM HH:mm') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <p class="fs-5 p-2 fw-medium">
                                <span class="small">тема: </span><a href="{{route('categories.topics.show', ['category' => $comment->topic->category_id, 'topic' => $comment->topic->id ])}}" class="link-underline link-underline-opacity-0 text-dark">{{ $comment->topic->title }}</a>
                            </p>
                            <p class="p-2 mb-0">{{ $comment->message }}</p>
                        </div>
                    </div>
                    <div class="row">
                        @if (auth()->user() != null and $comment->user_id == auth()->user()->id)
                            <div class="col-6 col-md-3 col-lg-2">
                                <a href="{{ route('users.comments.edit', ['user'=> $comment->user_id, 'comment' => $comment->id])}}" class="btn btn-outline-secondary">{{__('Редактировать')}}</a>
                            </div>
                        @endif
                        @if (auth()->user() != null and ($comment->user_id == auth()->user()->id or auth()->user()->isAdmin()))
                            <div class="col-6 col-lg-2">
                                <form action="{{ route('users.comments.delete', ['user'=> $comment->user_id, 'comment' => $comment->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-secondary">{{__('Удалить')}}</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="row">
                <div class="col-12">
                    {{ $userComments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
