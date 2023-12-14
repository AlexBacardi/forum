<div class="info">
    <div class="widget mb-5">
        <h2 class="h4 mb-5">{{__('Информация')}}</h2>
        <p class="">{{__('Поддержка')}}  <span class=" border border-warning px-3 py-2 rounded-2 text-warning">{{__('Offline')}}</span></p>
    </div>
    <div class="mb-4">
        <ul class="list-unstyled">
            <li>
                <p class="h5">
                    {{__('Время')}}
                </p>
                <p>
                    {{ now()->format('H:m:i')}}
                </p>
            </li>
        </ul>
    </div>
</div>
