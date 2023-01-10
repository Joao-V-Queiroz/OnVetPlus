<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Tanque extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    
    protected $table = 'tanques';

    public function itens()
    {
        return $this->hasMany(Tanquetem::class, 'tanque_id');
    }

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

    /* função relacionada ao botão ativo, não utilizada nesse crud
    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }
 */   
}
