<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;


Route::middleware([InitializeTenancyByDomain::class, PreventAccessFromCentralDomains::class])
    ->get('/', function () {
        //dd(tenant());  // Muestra el tenant actual
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });