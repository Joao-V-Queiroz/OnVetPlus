<?php

namespace App\Models;

use App\Models\Security\Audit;
use App\Models\Security\Permission;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Auth;

use App\Models\Security\Role;

class User extends Authenticatable implements Auditable
{
    use HasFactory, Notifiable, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'redefinir_senha'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function auditLogs()
    {
        return $this->hasMany(Audit::class, 'user_id');
    }

    public function home()
    {
        return $this->belongsTo(Permission::class, 'home_id');
    }

    public function checkPermission($permissions)
    {
        $user = session('user');
        //dd($user);
        if ($user->role_id == 1) {
            return true;
        }

        foreach ($permissions as $permission) {
            if ($user->permissions->search($permission) !== false) {
                return true;    
            }
        }
        return false;
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            });
        }

        if (isset($request->active) && $request->active != "") {
            $query->where(function ($q) use ($request) {
                $q->where('active', $request->active);
            });
        }

        return $query;
    }

    public function scopeGerarSenha()
    {
        $senha = str_shuffle(base64_encode(date("Ymdisu")) . rand(0, 9999));
        $pedaco1 = substr($senha, -3, -1);
        $pedaco2 = substr($senha, 0, 4);
        $senha = $pedaco1 . $pedaco2;
        return $senha;
    }
}
