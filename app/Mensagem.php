<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'mensagens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contato', 'descricao',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function contatos(){
        return $this->belongsToMany(Contato::class);
    }
}
