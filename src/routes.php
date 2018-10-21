<?php

/*
 |--------------------------------------------------------------------------
 | Tjventurini\Tags Routes
 |--------------------------------------------------------------------------
 |
 | In this file you will find all routes needed for this package to work in
 | in the backpack backend as well as the frontend.
 |
 */

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'Tjventurini\Tags\App\Http\Controllers\Admin',
], function () {

	CRUD::resource('tag', 'TagCrudController');

});