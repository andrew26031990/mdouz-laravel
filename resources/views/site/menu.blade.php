@foreach($items as $item)
    <li class="header-menu-item {{ (URL::current() == $item->url()) ? "active" : '' }}">
        <a class="header-menu-link" href="{{ $item->url() }}">{{ $item->title }}</a>
        @if($item->hasChildren())
            <ul class="header-submenu">
                @include(env('THEME').'site.menu', ['items'=>$item->children()])
            </ul>
        @endif
    </li>
@endforeach

