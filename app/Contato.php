<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    /**  */
    protected $table = 'contatos';

    /**  */
    protected $fillable = [
        'nome', 'sobrenome', 'email', 'telefone', 'imagem', 'mensagem',
    ];

    /**  */
    public function mensagens(){
        return $this->hasMany(Mensagem::class, 'contato_id');
    }
}
