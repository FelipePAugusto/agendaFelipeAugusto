<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::namespace('Api')->name('api.')->group(function (){
    Route::prefix('contatos')->group(function (){
        Route::get('/', 'ContatoController@index')->name('contatos');
        Route::get('/adicionar', 'Admin\ContatoController@adicionar')->name('adicionar');
        Route::post('/salvar', 'Admin\ContatoController@salvar')->name('editar');
        Route::put('/atualizar/{id}', 'Admin\ContatoController@atualizar')->name('atualizar');
        Route::get('/mensagens/{id}', 'Admin\ContatoController@mensagens')->name('mensagens');
        Route::get('/deletar/{id}', 'Admin\ContatoController@deletar')->name('deletar');
    });


});



Route::get('/admin/mensagens', ['as' => 'admin.mensagens', 'uses' => 'Admin\MensagemController@index']);
Route::get('/admin/mensagens/adicionar', ['as' => 'admin.mensagens.adicionar', 'uses' => 'Admin\MensagemController@adicionar']);
Route::post('/admin/mensagens/salvar', ['as' => 'admin.mensagens.salvar', 'uses' => 'Admin\MensagemController@salvar']);
Route::get('/admin/mensagens/editar/{id}', ['as' => 'admin.mensagens.editar', 'uses' => 'Admin\MensagemController@editar']);
Route::put('/admin/mensagens/atualizar/{id}', ['as' => 'admin.mensagens.atualizar', 'uses' => 'Admin\MensagemController@atualizar']);
Route::get('/admin/mensagens/deletar/{id}', ['as' => 'admin.mensagens.deletar', 'uses' => 'Admin\MensagemController@deletar']);