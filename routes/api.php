<?php

// $this->get('customers','Api\CustomerController@index');
// $this->post('customers','Api\CustomerController@store');
// $this->put('customers/{id}','Api\CustomerController@update');
// $this->delete('customers/{id}','Api\CustomerController@delete');

$this->post('auth', 'Auth\AuthApiController@authenticate');
$this->get('me', 'Auth\AuthApiController@getAuthenticatedUser');

$this->group([
    //'middleware' => 'auth:api'
], function () {
    $this->apiResource('customers', 'Api\CustomerController'); //resume todas as outras rotas acima em apenas uma
});
