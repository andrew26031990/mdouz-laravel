@foreach($items as $item)
    <li class="header-submenu-item {{ (URL::current() == $item->url()) ? "active" : '' }}">
        <a class="header-submenu-link" href="{{ $item->url() }}">{{ $item->title }}</a>
    </li>
@endforeach
