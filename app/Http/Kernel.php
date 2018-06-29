<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'sentinelAdmin' => \App\Http\Middleware\SentinelAdmin::class,
        'sentinelCustomer' => \App\Http\Middleware\SentinelCustomer::class,
        'sentinelAuth' => \App\Http\Middleware\SentinelAuth::class,

        'langMiddleware' => \App\Http\Middleware\LangMiddleware::class,

        'permissionsUser' => \App\Http\Middleware\PermissionsUserMiddleware::class,
        'permissionsSupplier' => \App\Http\Middleware\PermissionsSupplierMiddleware::class,
        'permissionsCustomer' => \App\Http\Middleware\PermissionsCustomerMiddleware::class,
        'permissionsCountry' => \App\Http\Middleware\PermissionsCountryMiddleware::class,
        'permissionsState' => \App\Http\Middleware\PermissionsStateMiddleware::class,
        'permissionsCity' => \App\Http\Middleware\PermissionsCityMiddleware::class,
        'permissionsCategory' => \App\Http\Middleware\PermissionsCategoryMiddleware::class,
        'permissionsSubcategory' => \App\Http\Middleware\PermissionsSubcategoryMiddleware::class,
        'permissionsMembership' => \App\Http\Middleware\PermissionsMembershipMiddleware::class,
        'permissionsProduct' => \App\Http\Middleware\PermissionsProductMiddleware::class,
        'permissionsService' => \App\Http\Middleware\PermissionsServiceMiddleware::class,
        'permissionsSale' => \App\Http\Middleware\PermissionsSaleMiddleware::class,
        'permissionsWebContact' => \App\Http\Middleware\PermissionsWebContactMiddleware::class,
    ];
}
