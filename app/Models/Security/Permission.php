<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Permission extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'permission_id');
    }

    public function makeMenu()
    {
        $menu = [];

        $permissions = Permission::whereNull('permission_id')
            ->where('menu', 1)
            ->orderBy('position')
            ->get();

        foreach ($permissions as $permission) {
            $menu[] = $this->getMenu($permission);
        }

        return $menu;
    }

    public function getMenu($permission)
    {
        $retorno = (object)[
            'id' => $permission->id,
            'name' => $permission->name,
            'icon' => $permission->icon,
            'slug' => '',
            'url' => $permission->url
        ];

        $children = $this->getChildren($permission->id, 1);
        if (count($children) > 0) {
            $retorno->submenu = $children;
        }
        return $retorno;
    }

    public function getChildren($permission_id, $menu = null)
    {
        $permissions = Permission::where('permission_id', $permission_id)
            ->orderBy('position');
        if (!is_null($menu)) {
            $permissions->where('menu', 1);
        }
        $permissions = $permissions->get();
        $retorno = [];
        foreach ($permissions as $permission) {
            $item = (object)[
                'id' => $permission->id,
                'name' => $permission->name,
                'icon' => $permission->icon,
                'slug' => '',
                'url' => $permission->url
            ];
            $children = $this->getChildren($permission->id, $menu);
            if (count($children) > 0) {
                $item->submenu = $children;
            }
            $retorno[] = $item;
        }
        return $retorno;
    }
}
