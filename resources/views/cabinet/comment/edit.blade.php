@extends('cabinet.layouts.profile')
@section('title', 'Редактирование комментария')
@section('profile')
    <div class="col-12 col-lg-9">
        <div class="border rounded shadow p-3">
            <h6 class="mb-0">Редактировать</h4>
                <form action="{{ route('users.comments.update',['user' => $user->id, 'comment' => $comment->id ])}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="row mt-3 align-items-center">
                        <div class="col-4 col-md-2">
                            <label class="mb-0 ms-1 form-label fw-medium">{{ __('Комментарий') }}</label>
                        </div>
                        <div class="col-8 col-lg-6">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" cols="30" rows="5" placeholder="Описание">{{ $comment->message }}</textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-5 mb-3">
                        <div class="col-8 col-lg-6">
                            <input type="submit" class="btn btn-outline-secondary" value="Сохранить">
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection
