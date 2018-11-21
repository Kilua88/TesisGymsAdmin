
    <style>
    .bg-item {
        background-color: #273746;
    }
    .bg-sub-item {
        color: #ecf0f1;
    }
    .bg-sub-item:hover {
        background-color: #5dade2;
        color: black;
    }
</style>

    @if ($item['submenu'] == [])
        <li class="nav-item text-white">
            <a class="nav-link" href="{{ url($item['pagina']) }}">{{ $item['etiqueta'] }} </a>
        </li>
    @else
        <li class="nav-item dropdown text-white">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item['etiqueta'] }} <span class="caret"></span></a>
            <div class="dropdown-menu bg-primary text-white bg-item" aria-labelledby="navbarDropdown">
                @foreach ($item['submenu'] as $submenu)
                    @if ($submenu['submenu'] == [])
                        <a class="dropdown-item text-white bg-sub-item" href="{{ url($submenu['pagina']) }}">{{ $submenu['etiqueta'] }}</a>
                    @else
                        @include('shared.menu-item', [ 'item' =>$submenu ])
                    @endif
                @endforeach
            </div>
        </li>
    @endif

