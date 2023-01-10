<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use stdClass;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // get all data from menu.json file
        $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/verticalMenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);
        $horizontalMenuJson = file_get_contents(base_path('resources/data/menu-data/horizontalMenu.json'));
        $horizontalMenuData = json_decode($horizontalMenuJson);

        // Share all menuData to all the views
        // dd($verticalMenuData);

        /*
        menu Será construido na Sessão do Usuário.
        $verticalMenuData = new stdClass();
        $verticalMenuData->menu[] = (object)[
            'name' => 'menu.cadastro',
            'icon' => 'home',
            'slug' => '',
            'submenu' => [
                (object)[
                    'url' => 'cadastro/cliente',
                    'name' => 'menu.cadastro.cliente',
                    'icon' => 'mail',
                    'slug' => 'menu.cadastro.cliente'
                ],
                (object)[
                    'url' => '',
                    'name' => 'menu.cadastro.relatorios',
                    'icon' => 'circle',
                    'slug' => '',
                    'submenu' => [
                        (object)[
                            'url' => 'cadastro/cliente',
                            'name' => 'menu.cadastro.relatorios.clientes',
                            'icon' => 'circle',
                            'slug' => 'menu.cadastro.relatorios.clientes'
                        ]
                    ]
                ]
            ]
        ];
        */

        // dd($verticalMenuData, $horizontalMenuData);
        \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
    }
}
