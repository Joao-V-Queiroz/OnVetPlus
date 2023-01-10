<?php

namespace App\Models\Duvida;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Faq extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $table = "faqs";
    
    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('pergunta', 'like', "%{$request->search}%");
            });
        }
        
        return $query;
    }

    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }
}
