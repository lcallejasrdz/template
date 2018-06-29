<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('home') }}">
                <img src="{{ URL::to('assets/images/logo.svg') }}" alt="{{ env('APP_NAME') }}" class="navbar-logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{-- Products --}}
                <li class="{{ $active == 'search' ? 'active' : '' }}">
                    <a href="{{ URL::route('search') }}">
                        {{ trans('search.title') }}
                    </a>
                </li>
                {{-- Dropdown Menu Example --}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                {{-- Users --}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(Sentinel::guest())
                            {{ trans('auth.title.users') }} <span class="caret"></span>
                        @else
                            {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }} <span class="caret"></span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        {{-- Not Loged --}}
                        @if(Sentinel::guest())
                            <li>
                                <a href="{{ URL::route('front.customers.create') }}">
                                    {{ trans('auth.title.register') }} {{ trans('auth.title.as') }} {{ trans('module_customers.module_title_s') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::route('front.suppliers.create') }}">
                                    {{ trans('auth.title.register') }} {{ trans('auth.title.as') }} {{ trans('module_suppliers.module_title_s') }}
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ URL::route('login') }}">
                                    {{ trans('auth.title.login') }}
                                </a>
                            </li>
                        {{-- Loged --}}
                        @else
                            {{-- Supplier --}}
                            @if(Sentinel::getUser()->role_id == 4)
                                <li>
                                    <a href="{{ URL::route('suppliers.show', [Sentinel::getUser()->id]) }}">
                                        {{ trans('strings.user.profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('suppliers.edit', [Sentinel::getUser()->id]) }}">
                                        {{ trans('strings.user.settings') }}
                                    </a>
                                </li>
                            {{-- Customer --}}
                            @elseif(Sentinel::getUser()->role_id == 5)
                                <li>
                                    <a href="{{ URL::route('my-purchases') }}">
                                        {{ trans('my-purchases.title') }}
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ URL::route('my-account', [Sentinel::getUser()->slug]) }}">
                                        {{ trans('strings.user.profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('edit-my-account', [Sentinel::getUser()->slug]) }}">
                                        {{ trans('strings.user.settings') }}
                                    </a>
                                </li>
                            {{-- Admin --}}
                            @else
                                <li>
                                    <a href="{{ URL::route('users.show', [Sentinel::getUser()->id]) }}">
                                        {{ trans('strings.user.profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('users.edit', [Sentinel::getUser()->id]) }}">
                                        {{ trans('strings.user.settings') }}
                                    </a>
                                </li>
                            @endif
                            <li role="separator" class="divider"></li>
                            {{-- Logout --}}
                            <li>
                                <a href="{{ URL::route('logout') }}">
                                    {{ trans('auth.title.logout') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                {{-- Cart --}}
                <li>
                    <a href="{{ URL::route('cart') }}">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> {{ count($cart) > 0 ? count($cart) : '' }}
                    </a>
                </li>
                {{-- Lang --}}
                <li>
                    <a href="{{ url('lang', [\App::getLocale() == 'es' ? 'en' : 'es']) }}">
                        {{ \App::getLocale() == 'es' ? 'Eng' : 'Esp' }} <span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>