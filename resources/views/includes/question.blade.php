<div class="row align-items-center justify-content-between border rounded-2 shadow p-4 mb-5 mx-0">
    <div class="col-2 d-none d-md-block">
        <img src="{{ asset('icons/answer.png')}}" alt="answer">
    </div>
    <div class="col-md-6 col-xl-5 d-none d-md-block">
        <p class="h5 ms-md-2">{{__('Не можете найти ответ?')}}</p>
        <p class="mb-0 ms-md-2 fs-5">{{__('Тогда задайте свой вопрос')}}</p>
    </div>
    <div class="col-md-4 col-xl-5 text-center text-xl-end">
        @if (auth()->check())
            <a href="{{ route('users.topics.create', auth()->user()->id )}}" class="btn btn-outline-secondary btn-lg">{{__('Задать вопрос')}}</a>
        @else
            <a href="{{ route('login')}}" class="btn btn-outline-secondary btn-lg">{{__('Задать вопрос')}}</a>
        @endif
    </div>
</div>
