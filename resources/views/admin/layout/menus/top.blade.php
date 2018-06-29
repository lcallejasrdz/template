<ul class="nav navbar-top-links navbar-right">
    {{-- /.dropdown --}}
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }} <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            @if(Sentinel::getUser()->role_id == 4)
                <li><a href="{{ URL::route('suppliers.show', [Sentinel::getUser()->id]) }}"><i class="fa fa-user fa-fw"></i> {{ trans('strings.user.profile') }}</a>
                </li>
                <li><a href="{{ URL::route('suppliers.edit', [Sentinel::getUser()->id]) }}"><i class="fa fa-gear fa-fw"></i> {{ trans('strings.user.settings') }}</a>
                </li>
            @else
                <li><a href="{{ URL::route('users.show', [Sentinel::getUser()->id]) }}"><i class="fa fa-user fa-fw"></i> {{ trans('strings.user.profile') }}</a>
                </li>
                <li><a href="{{ URL::route('users.edit', [Sentinel::getUser()->id]) }}"><i class="fa fa-gear fa-fw"></i> {{ trans('strings.user.settings') }}</a>
                </li>
            @endif
            <li class="divider"></li>
            <li><a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> {{ trans('auth.title.logout') }}</a>
            </li>
        </ul>
        {{-- /.dropdown-user --}}
    </li>
    {{-- /.dropdown --}}
    <li>
        <a href="{{ url('lang', [\App::getLocale() == 'es' ? 'en' : 'es']) }}">
            {{ \App::getLocale() == 'es' ? 'Eng' : 'Esp' }} <i class="fa fa-flag fa-fw"></i>
        </a>
    </li>
</ul>