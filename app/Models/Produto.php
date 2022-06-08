<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'fornecedor_id',
        'nome',
        'descricao',
        'peso',
        'unidade_id',
    ];

    public function ProdutoDetalhe()
    {
        return $this->hasOne(ProdutoDetalhe::class);
    }

    public function Fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
