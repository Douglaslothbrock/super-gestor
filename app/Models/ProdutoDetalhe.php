<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    use HasFactory;

    protected $fillable = [
        'produto_id',
        'unidade_id',
        'altura',
        'largura',
        'comprimento'
    ];

    public function Produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
