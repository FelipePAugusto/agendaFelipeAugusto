<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    /**  */
    protected $table = 'mensagens';

    /**  */
    protected $fillable = [
        'titulo', 'descricao', 'contato_id',
    ];

    /**  */
    public function contatos(){
        return $this->hasOne(Contato::class, 'contato_id');
    }
}
