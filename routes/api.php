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

//Route::namespace('Api')->name('api.')->group(function (){
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


//});
/*
Route::get('/admin/mensagens', ['as' => 'admin.mensagens', 'uses' => 'Admin\MensagemController@index']);
Route::get('/admin/mensagens/adicionar', ['as' => 'admin.mensagens.adicionar', 'uses' => 'Admin\MensagemController@adicionar']);
Route::post('/admin/mensagens/salvar', ['as' => 'admin.mensagens.salvar', 'uses' => 'Admin\MensagemController@salvar']);
Route::get('/admin/mensagens/editar/{id}', ['as' => 'admin.mensagens.editar', 'uses' => 'Admin\MensagemController@editar']);
Route::put('/admin/mensagens/atualizar/{id}', ['as' => 'admin.mensagens.atualizar', 'uses' => 'Admin\MensagemController@atualizar']);
Route::get('/admin/mensagens/deletar/{id}', ['as' => 'admin.mensagens.deletar', 'uses' => 'Admin\MensagemController@deletar']);*/
/*
Desenvolver a API RESTful de uma agenda com as seguintes tecnologias PHP + LARAVEL.

+ Permitir cadastrar mensagem (contato (fk), descrição).
+ Permitir alterar e excluir uma mensagem.





+ Permitir cadastrar contato (nome, sobrenome, e-mail e telefone).

+ Listar todas as mensagens por contato.
+ Permitir alterar os dados de um contato.
+ Validar os campos postados.
+ Permitir excluir um contato.
+ Criar um repositório no GitHub.


Desenvolver a API RESTful de uma agenda com as seguintes tecnologias PHP + LARAVEL.

+ Permitir cadastrar contato (nome, sobrenome, e-mail e telefone).
+ Permitir cadastrar mensagem (contato (fk), descrição).
+ Listar todas as mensagens por contato.
+ Permitir alterar e excluir uma mensagem.
+ Permitir alterar os dados de um contato.
+ Validar os campos postados.
+ Permitir excluir um contato.
+ Criar um repositório no GitHub.*/