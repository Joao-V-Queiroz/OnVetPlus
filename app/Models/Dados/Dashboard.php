<?php

namespace App\Models\Dados;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Dashboard extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    
    // public function scopeFiltros($query, $request)
    // {
    //     if (isset($request->search) && $request->search != "") {
    //         $query->where(function ($q) use ($request) {
    //             $q->where('name', 'like', "%{$request->search}%");
    //         });
    //     }

    //     if (isset($request->active) && $request->active != "") {
    //         $query->where(function ($q) use ($request) {
    //             $q->where('active', $request->active);
    //         });
    //     }

    //     return $query; 
    // }
}
