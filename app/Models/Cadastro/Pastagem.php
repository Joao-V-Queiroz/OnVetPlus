<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Pastagem extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = "pastagem";
    protected $tipos = [
        'ANUAL' => 'Pastagem Anual',
        'NATURAL' => 'Pastagem Natural',
        'PERENE' => 'Pastagem Perene',
    ];

    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', "%{$request->search}%");
            });
        }

        if (isset($request->ativo) && $request->ativo != "") {
            $query->where(function ($q) use ($request) {
                $q->where('ativo', $request->ativo);
            });
        }


        return $query;
    }

    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }

    public function getTipo()
    {
        return $this->tipos[$this->tipo];
    }

    public function getTipos()
    {
        return $this->tipos;
    }
}