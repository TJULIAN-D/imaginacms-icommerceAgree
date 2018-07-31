<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/icommerceagree'], function (Router $router) {
    $router->bind('configagree', function ($id) {
        return app('Modules\IcommerceAgree\Repositories\ConfigagreeRepository')->find($id);
    });
    $router->get('configagrees', [
        'as' => 'admin.icommerceagree.configagree.index',
        'uses' => 'ConfigagreeController@index',
        'middleware' => 'can:icommerceagree.configagrees.index'
    ]);
    $router->get('configagrees/create', [
        'as' => 'admin.icommerceagree.configagree.create',
        'uses' => 'ConfigagreeController@create',
        'middleware' => 'can:icommerceagree.configagrees.create'
    ]);
    $router->post('configagrees', [
        'as' => 'admin.icommerceagree.configagree.store',
        'uses' => 'ConfigagreeController@store',
        'middleware' => 'can:icommerceagree.configagrees.create'
    ]);
    $router->get('configagrees/{configagree}/edit', [
        'as' => 'admin.icommerceagree.configagree.edit',
        'uses' => 'ConfigagreeController@edit',
        'middleware' => 'can:icommerceagree.configagrees.edit'
    ]);
    $router->put('configagrees/', [
        'as' => 'admin.icommerceagree.configagree.update',
        'uses' => 'ConfigagreeController@update',
        'middleware' => 'can:icommerceagree.configagrees.edit'
    ]);
    $router->delete('configagrees/{configagree}', [
        'as' => 'admin.icommerceagree.configagree.destroy',
        'uses' => 'ConfigagreeController@destroy',
        'middleware' => 'can:icommerceagree.configagrees.destroy'
    ]);
// append

});
