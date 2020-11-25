<li class="treeview" style="height: auto;">
    <a href="#">
        <i class="fa fa-wrench"></i><span>Геолокация</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('country*') ? 'active' : '' }}">
            <a href="{{ route('country.index') }}"><i class="fa fa-edit"></i><span>Country</span></a>
        </li>

        <li class="{{ Request::is('region*') ? 'active' : '' }}">
            <a href="{{ route('region.index') }}"><i class="fa fa-edit"></i><span>Region</span></a>
        </li>

        <li class="{{ Request::is('city*') ? 'active' : '' }}">
            <a href="{{ route('city.index') }}"><i class="fa fa-edit"></i><span>City</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('lang*') ? 'active' : '' }}">
    <a href="{{ route('lang.index') }}"><i class="fa fa-edit"></i><span>Lang</span></a>
</li>

<li class="{{ Request::is('social*') ? 'active' : '' }}">
    <a href="{{ route('social.index') }}"><i class="fa fa-edit"></i><span>Social</span></a>
</li>

<li class="{{ Request::is('currency*') ? 'active' : '' }}">
    <a href="{{ route('currency.index') }}"><i class="fa fa-edit"></i><span>Currency</span></a>
</li>

<li class="{{ Request::is('user*') ? 'active' : '' }}">
    <a href="{{ route('user.index') }}"><i class="fa fa-edit"></i><span>User</span></a>
</li>

<li class="{{ Request::is('timelineEvent*') ? 'active' : '' }}">
    <a href="{{ route('timelineEvent.index') }}"><i class="fa fa-edit"></i><span>Timeline Event</span></a>
</li>

<li class="{{ Request::is('staticPages*') ? 'active' : '' }}">
    <a href="{{ route('staticPages.index') }}"><i class="fa fa-edit"></i><span>Static Pages</span></a>
</li>

<li class="treeview" style="height: auto;">
    <a href="#">
        <i class="fa fa-wrench"></i><span>Статьи</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('articleCategories*') ? 'active' : '' }}">
            <a href="{{ route('articleCategories.index') }}"><i class="fa fa-edit"></i><span>Категории</span></a>
        </li>
        <li class="{{ Request::is('events*') ? 'active' : '' }}">
            <a href="{{ route('events.index') }}"><i class="fa fa-edit"></i><span>Мероприятия</span></a>
        </li>
    </ul>
</li>





<li class="{{ Request::is('keyStorages*') ? 'active' : '' }}">
    <a href="{{ route('keyStorages.index') }}"><i class="fa fa-edit"></i><span>Key Storages</span></a>
</li>

