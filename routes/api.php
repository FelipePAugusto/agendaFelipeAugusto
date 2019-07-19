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
Route::prefix('contatos')->group(function (){
    /**  */
    Route::get('/{id?}', 'Api\ContatoController@index')->name('contatos');
    Route::post('/salvar', 'Api\ContatoController@salvar')->name('salvar');
    Route::get('/editar/{id?}', 'Api\ContatoController@editar')->name('editar');
    Route::put('/atualizar/{id?}', 'Api\ContatoController@atualizar')->name('atualizar');
    Route::delete('/deletar/{id?}', 'Api\ContatoController@deletar')->name('deletar');

    /**  */
    Route::get('/mensagem/listar/{id?}', 'Api\MensagemController@listar')->name('listar');
    Route::post('/mensagem/adicionar/{id?}', 'Api\MensagemController@adicionar')->name('adicionar');
    Route::put('/mensagem/modificar/{id?}/{idmensagem?}', 'Api\MensagemController@modificar')->name('modificar');
    Route::delete('/mensagem/excluir/{id?}/{idmensagem?}', 'Api\MensagemController@excluir')->name('excluir');
});