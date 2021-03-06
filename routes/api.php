<?php

Route::group(['prefix' => '/location', 'as' => 'api.'], function () {
    Route::get('/states', 'Api\LocationApiController@states')->name('states.index');
    Route::get('/cities', 'Api\LocationApiController@cities')->name('cities.index');
    Route::get('/{state}/cities', 'Api\LocationApiController@citiesByState')->name('cities.filter');
});

Route::group(['prefix' => '/categories', 'as' => 'api.categories.'], function () {
    Route::get('/', 'Api\CategoriesApiController@index')->name('index');
    Route::post('/', 'Api\CategoriesApiController@store')->name('store');
    Route::get('/{category}', 'Api\CategoriesApiController@show')->name('show');
    Route::put('/{category}', 'Api\CategoriesApiController@update')->name('update');
    Route::delete('/{category}', 'Api\CategoriesApiController@destroy')->name('destroy');
});

Route::group(['prefix' => '/products', 'as' => 'api.products.'], function () {
    Route::get('/', 'Api\ProductsApiController@index')->name('index');
    Route::post('/', 'Api\ProductsApiController@store')->name('store');
    Route::get('/{product}', 'Api\ProductsApiController@show')->name('show');
    Route::put('/{product}', 'Api\ProductsApiController@update')->name('update');
    Route::delete('/{product}', 'Api\ProductsApiController@destroy')->name('destroy');
});

Route::group(['prefix' => '/access-roles', 'as' => 'api.roles.'], function () {
    Route::get('/', 'Api\AccessRolesApiController@index')->name('index');
    Route::post('/', 'Api\AccessRolesApiController@store')->name('store');
    Route::get('/{role}', 'Api\AccessRolesApiController@show')->name('show');
    Route::put('/{role}', 'Api\AccessRolesApiController@update')->name('update');
    Route::delete('/{role}', 'Api\AccessRolesApiController@destroy')->name('destroy');
});

Route::group(['prefix' => '/users', 'as' => 'api.users.'], function () {
    Route::get('/', 'Api\UsersApiController@index')->name('index');
    Route::post('/', 'Api\UsersApiController@store')->name('store');
    Route::get('/{user}', 'Api\UsersApiController@show')->name('show');
    Route::put('/{user}', 'Api\UsersApiController@updateData')->name('update_data');
    Route::patch('/{user}', 'Api\UsersApiController@udpatePassword')->name('update_password');
    Route::delete('/{user}', 'Api\UsersApiController@destroy')->name('destroy');
});

Route::group(['prefix' => '/ticket-status', 'as' => 'api.ticket_status.'], function () {
    Route::get('/', 'Api\TicketStatusApiController@index')->name('index');
    Route::post('/', 'Api\TicketStatusApiController@store')->name('store');
    Route::get('/{status}', 'Api\TicketStatusApiController@show')->name('show');
    Route::put('/{status}', 'Api\TicketStatusApiController@update')->name('update');
    Route::delete('/{status}', 'Api\TicketStatusApiController@destroy')->name('destroy');
});

Route::group(['prefix' => '/ticket-types', 'as' => 'api.ticket_types.'], function () {
    Route::get('/', 'Api\TicketTypesApiController@index')->name('index');
    Route::post('/', 'Api\TicketTypesApiController@store')->name('store');
    Route::get('/{type}', 'Api\TicketTypesApiController@show')->name('show');
    Route::put('/{type}', 'Api\TicketTypesApiController@update')->name('update');
    Route::delete('/{type}', 'Api\TicketTypesApiController@destroy')->name('destroy');
});

Route::group(['prefix' => '/tickets', 'as' => 'api.tickets.'], function () {
    Route::get('/', 'Api\TicketsApiController@index')->name('index');
    Route::post('/', 'Api\TicketsApiController@store')->name('store');
    Route::get('/{ticket}', 'Api\TicketsApiController@show')->name('show');
    Route::put('/{ticket}', 'Api\TicketsApiController@update')->name('update');
    Route::patch('/{ticket}', 'Api\TicketsApiController@close')->name('close');
});
