<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Modules included

1. Users
2. Suppliers
3. Customers
4. Countries
5. States
6. Cities
7. Categories
8. Subcategories
9. Memberships

## Catalogs included

1. Genders
2. Person Types
3. Statuses

## Seeders included

1. Users
2. Suppliers
3. Cutomers
4. Countries
5. States
6. Cities
7. Memberships
8. Genders
9. Person Types
10. Statuses

## Plugins included

1. cartalyst/sentinel
2. paypal/rest-api-sdk-php
3. phpmailer/phpmailer
4. yajra/laravel-datatables-oracle

## PayPal Sandbox credentials

1. Facilitator: facilitator-test@fabricadesoluciones.com
2. Buyer: buyer-test@fabricadesoluciones.com
3. Pass: abcd1234

## Steps to Create New Modules

1. php artisan make:model Singular -m
2. php artisan make:controller PluralController
3. php artisan make:middleware PermissionsSingularMiddleware
4. php artisan make:request PluralRequest
5. php artisan make:model ViewSingular -m
6. php artisan make:model ViewDeletedSingular -m
7. Configure migrations (views' migrations and models should have all fields to view show)
8. Create language file, name should be resources/lang/{lang}/module_{table}.php
9. Create form and show view in resources/views/admin/modules/{table}/{files}
10. Create validations an javascripts in public/assets/modules/{table}/{create_{lang}.js and edit_{lang}.js}
11. Create routes

## Considerations

1. Table's name should be plural
1. Key's fields in DB should be {table_singular}_id
2. Add middleware to app/Http/Kernel.php
3. Set Request to true
4. Date's field only put datepicker class
5. Follow structure of exists modules
