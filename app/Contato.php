<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'contatos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'sobrenome', 'email', 'telefone',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function mensagens(){
        return $this->hasMany(Mensagem::class);
    }
}
