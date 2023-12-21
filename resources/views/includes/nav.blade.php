<nav class="bg-body-tertiary">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md">
                    <div class="container-fluid">
                      <a class="navbar-brand ms-md-3" href="{{ route('categories.index')}}">{{__('FORUM')}}</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-md-auto me-md-3">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.info', auth()->user()->id )}}">{{__('Личный кабинет')}}</a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="nav-link">{{__('Выход')}}</button>
                                    </form>
                                </li>
                            @endauth
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('register')}}">{{__('Регистрация')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login')}}">{{__('Вход')}}</a>
                                </li>
                            @endguest
                        </ul>
                      </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</nav>
