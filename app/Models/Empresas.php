<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Empresas extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'nome', 
        'cnpj',
        'telefone',
        'email',
        'endereco',
    ];

    public $sortable = [
        'nome', 
        'cnpj',
        'telefone',
        'email',
        'endereco',
    ];
}
