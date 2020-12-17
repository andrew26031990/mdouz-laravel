{{--
<li class="treeview" style="height: auto;">
    <a href="#">
        <i class="fa fa-wrench"></i><span>Settings</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('country*') ? 'active' : '' }}">
            <a href="{{ route('country.index') }}"><i class="fa fa-thumb-tack"></i><span>Country</span></a>
        </li>

        <li class="{{ Request::is('region*') ? 'active' : '' }}">
            <a href="{{ route('region.index') }}"><i class="fa fa-thumb-tack"></i><span>Region</span></a>
        </li>

        <li class="{{ Request::is('city*') ? 'active' : '' }}">
            <a href="{{ route('city.index') }}"><i class="fa fa-thumb-tack"></i><span>City</span></a>
        </li>
    </ul>
</li>
--}}

<li class="treeview" style="height: auto;">
    <a href="#">
        <i class="fa fa-files-o"></i><span>Articles</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('articles*') ? 'active' : '' }}">
            <a href="{{ route('articles.index') }}"><i class="fa fa-file-o"></i><span>Articles</span></a>
        </li>

        <li class="{{ Request::is('articleCategories*') ? 'active' : '' }}">
            <a href="{{ route('articleCategories.index') }}"><i class="fa fa-folder-open-o"></i><span>Categories</span></a>
        </li>

        <li class="{{ Request::is('videos*') ? 'active' : '' }}">
            <a href="{{ route('videos.index') }}"><i class="fa fa-video-camera"></i><span>Videos</span></a>
        </li>
        {{--<li class="{{ Request::is('events*') ? 'active' : '' }}">
            <a href="{{ route('events.index') }}"><i class="fa fa-edit"></i><span>Мероприятия</span></a>
        </li>--}}
    </ul>
</li>

{{--<li class="{{ Request::is('lang*') ? 'active' : '' }}">
    <a href="{{ route('lang.index') }}"><i class="fa fa-language"></i><span>Languages</span></a>
</li>

<li class="{{ Request::is('social*') ? 'active' : '' }}">
    <a href="{{ route('social.index') }}"><i class="fa fa-facebook"></i><span>Social links</span></a>
</li>

<li class="{{ Request::is('currency*') ? 'active' : '' }}">
    <a href="{{ route('currency.index') }}"><i class="fa fa-dollar"></i><span>Currency</span></a>
</li>

<li class="{{ Request::is('staticPages*') ? 'active' : '' }}">
    <a href="{{ route('staticPages.index') }}"><i class="fa fa-thumb-tack"></i><span>Static Pages</span></a>
</li>

<li class="{{ Request::is('keyStorages*') ? 'active' : '' }}">
    <a href="{{ route('keyStorages.index') }}"><i class="fa fa-arrows-h"></i><span>Key Storages</span></a>
</li>

<li class="{{ Request::is('user*') ? 'active' : '' }}">
    <a href="{{ route('user.index') }}"><i class="fa fa-users"></i><span>Users</span></a>
</li>--}}




<li class="{{ Request::is('footerMenus*') ? 'active' : '' }}">
    <a href="{{ route('footerMenus.index') }}"><i class="fa fa-edit"></i><span>Footer Menus</span></a>
</li>

