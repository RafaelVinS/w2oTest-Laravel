<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Colaboradores extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'nome', 
        'telefone',
        'email',
        'data_nascimento',
        'empresa_id'
    ];

    public $sortable = [
        'nome', 
        'telefone',
        'email',
        'data_nascimento',
        'empresa_id'
    ];
}
