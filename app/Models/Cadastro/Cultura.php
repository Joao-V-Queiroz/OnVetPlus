<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Cultura extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = "culturas";
    protected $tipos = [
        'ALFAFA' => 'Alfafa',
        'AVEIA/AZEVEM' => 'Aveia/Azevem',
        'FENO ANUAL' => 'Campo de Feno Anual',
        'FENO PERENE' => 'Campo de Feno Perene',
        'CANAVIAL' => 'Canavial',
        'CAPINEIRA' => 'Capineira',
        'OUTRAS FORRAGEIRAS ANUAIS' => 'Outras Forrageiras Anuais',
        'MILHO' => 'Produção de Grãos - Milho grão',
        'SOJA' => 'Produção de Grãos - Soja',
        'SORGO' => 'Produção de Grãos - Sorgo',
        'CANA DE AÇÚCAR' => 'Silagem de Cana de Açúcar',
        'CAPIM' => 'Silagem de Capim',
        'GIRASSOL' => 'Silagem de Cana de Girassol',
        'SILAGEM MILHO' => 'Silagem de Milho',
        'SILAGEM SORGO' => 'Silagem de Sorgo',
        'TRIGO' => 'Trigo',
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
