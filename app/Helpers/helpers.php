<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class Helper
{
    public static function applClasses()
    {
        // Demo
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $data = config('custom.' . 'demo-' . $i);
                }
            }
        } else {
            $data = config('custom.custom');
        }

        // default data array
        $DefaultData = [
          'mainLayoutType' => 'vertical',
          'theme' => 'light',
          'sidebarCollapsed' => false,
          'navbarColor' => '',
          'horizontalMenuType' => 'floating',
          'verticalMenuNavbarType' => 'floating',
          'footerType' => 'static', //footer
          'layoutWidth' => 'full',
          'showMenu' => true,
          'bodyClass' => '',
          'bodyStyle' => '',
          'pageClass' => '',
          'pageHeader' => true,
          'contentLayout' => 'default',
          'blankPage' => false,
          'defaultLanguage'=>'en',
          'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
        ];

        // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
        $data = array_merge($DefaultData, $data ?? []);

        // All options available in the template
        $allOptions = [
            'mainLayoutType' => array('vertical', 'horizontal'),
            'theme' => array('light' => 'light', 'dark' => 'dark-layout', 'bordered' => 'bordered-layout', 'semi-dark' => 'semi-dark-layout'),
            'sidebarCollapsed' => array(true, false),
            'showMenu' => array(true, false),
            'layoutWidth' => array('full', 'boxed'),
            'navbarColor' => array('bg-primary', 'bg-info', 'bg-warning', 'bg-success', 'bg-danger', 'bg-dark'),
            'horizontalMenuType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky'),
            'horizontalMenuClass' => array('static' => '', 'sticky' => 'fixed-top', 'floating' => 'floating-nav'),
            'verticalMenuNavbarType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky', 'hidden' => 'navbar-hidden'),
            'navbarClass' => array('floating' => 'floating-nav', 'static' => 'navbar-static-top', 'sticky' => 'fixed-top', 'hidden' => 'd-none'),
            'footerType' => array('static' => 'footer-static', 'sticky' => 'footer-fixed', 'hidden' => 'footer-hidden'),
            'pageHeader' => array(true, false),
            'contentLayout' => array('default', 'content-left-sidebar', 'content-right-sidebar', 'content-detached-left-sidebar', 'content-detached-right-sidebar'),
            'blankPage' => array(false, true),
            'sidebarPositionClass' => array('content-left-sidebar' => 'sidebar-left', 'content-right-sidebar' => 'sidebar-right', 'content-detached-left-sidebar' => 'sidebar-detached sidebar-left', 'content-detached-right-sidebar' => 'sidebar-detached sidebar-right', 'default' => 'default-sidebar-position'),
            'contentsidebarClass' => array('content-left-sidebar' => 'content-right', 'content-right-sidebar' => 'content-left', 'content-detached-left-sidebar' => 'content-detached content-right', 'content-detached-right-sidebar' => 'content-detached content-left', 'default' => 'default-sidebar'),
            'defaultLanguage'=>array('pt_BR'=>'pt_BR', 'en'=>'en'),
            'direction' => array('ltr', 'rtl'),
        ];

        //if mainLayoutType value empty or not match with default options in custom.php config file then set a default value
        foreach ($allOptions as $key => $value) {
            if (array_key_exists($key, $DefaultData)) {
                if (gettype($DefaultData[$key]) === gettype($data[$key])) {
                    // data key should be string
                    if (is_string($data[$key])) {
                        // data key should not be empty
                        if (isset($data[$key]) && $data[$key] !== null) {
                            // data key should not be exist inside allOptions array's sub array
                            if (!array_key_exists($data[$key], $value)) {
                                // ensure that passed value should be match with any of allOptions array value
                                $result = array_search($data[$key], $value, 'strict');
                                if (empty($result) && $result !== 0) {
                                    $data[$key] = $DefaultData[$key];
                                }
                            }
                        } else {
                            // if data key not set or
                            $data[$key] = $DefaultData[$key];
                        }
                    }
                } else {
                    $data[$key] = $DefaultData[$key];
                }
            }
        }

        //layout classes
        $layoutClasses = [
            'theme' => $data['theme'],
            'layoutTheme' => $allOptions['theme'][$data['theme']],
            'sidebarCollapsed' => $data['sidebarCollapsed'],
            'showMenu' => $data['showMenu'],
            'layoutWidth' => $data['layoutWidth'],
            'verticalMenuNavbarType' => $allOptions['verticalMenuNavbarType'][$data['verticalMenuNavbarType']],
            'navbarClass' => $allOptions['navbarClass'][$data['verticalMenuNavbarType']],
            'navbarColor' => $data['navbarColor'],
            'horizontalMenuType' => $allOptions['horizontalMenuType'][$data['horizontalMenuType']],
            'horizontalMenuClass' => $allOptions['horizontalMenuClass'][$data['horizontalMenuType']],
            'footerType' => $allOptions['footerType'][$data['footerType']],
            'sidebarClass' => 'menu-expanded',
            'bodyClass' => $data['bodyClass'],
            'bodyStyle' => $data['bodyStyle'],
            'pageClass' => $data['pageClass'],
            'pageHeader' => $data['pageHeader'],
            'blankPage' => $data['blankPage'],
            'blankPageClass' => '',
            'contentLayout' => $data['contentLayout'],
            'sidebarPositionClass' => $allOptions['sidebarPositionClass'][$data['contentLayout']],
            'contentsidebarClass' => $allOptions['contentsidebarClass'][$data['contentLayout']],
            'mainLayoutType' => $data['mainLayoutType'],
            'defaultLanguage'=>$allOptions['defaultLanguage'][$data['defaultLanguage']],
            'direction' => $data['direction'],
        ];
        // set default language if session hasn't locale value the set default language
        if (!session()->has('locale')) {
            app()->setLocale($layoutClasses['defaultLanguage']);
        }

        // sidebar Collapsed
        if ($layoutClasses['sidebarCollapsed'] == 'true') {
            $layoutClasses['sidebarClass'] = "menu-collapsed";
        }

        // blank page class
        if ($layoutClasses['blankPage'] == 'true') {
            $layoutClasses['blankPageClass'] = "blank-page";
        }

        return $layoutClasses;
    }

    public static function updatePageConfig($pageConfigs)
    {
        $demo = 'custom';
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $demo = 'demo-' . $i;
                }
            }
        }
        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                    Config::set('custom.' . $demo . '.' . $config, $val);
                }
            }
        }
    }

    public static function buttonsCrudDatatable($idModal)
    {
        $columnDefs = <<<'EOT'
        {
            // Actions
            targets: -1,
            title: 'Ações',
            orderable: false,
            render: function (data, type, full, meta) {
                return (
                    '<div class="d-inline-flex">' +
                    '<a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown">' +
                    feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                    '</a>' +
                    '<div class="dropdown-menu dropdown-menu-right">' +
                    '<a href="javascript:;" title="Alterar este Item" data-toggle="modal" ' +
                    'data-target="#{$idModal}" data-id="' + full['id'] +
                    '" class="dropdown-item item-edit">' +
                    feather.icons['edit'].toSvg({ class: 'font-small-4 mr-50' }) +
                    'Editar</a>' +
                    '<a href="javascript:;" title="Apagar este Item" data-id="' + full['id'] +
                    '" class="dropdown-item delete-record">' +
                    feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
                    'Apagar</a>' +
                    '</div>' +
                    '</div>' +
                    '<a href="javascript:;" title="Visualizar" data-id="' + full['id'] + 
                    '" class="item-show">' +
                    feather.icons['search'].toSvg({ class: 'font-small-4' }) +
                    '</a>'
                );
            }
        }
EOT;
        $columnDefs = str_replace('{$idModal}', $idModal, $columnDefs);
        return $columnDefs;
    }

    public static function getAtivoInativo($status, $textOnly = false)
    {
        if ($textOnly) {
            return $status == 1 ? 'Ativo' : 'Inativo';
        }
        $resultStatus = [
            0 => [
                'icon' => 'square',
                'class' => 'secondary',
                'text' => 'Inativo'
            ],
            1 => [
                'icon' => 'check-square',
                'class' => 'primary',
                'text' => 'Ativo'
            ]
        ];
        
        $result = '
            <span class="d-block badge badge-light-' . $resultStatus[$status]['class'] . ' mr-1 p-50">
                <i data-feather="' . $resultStatus[$status]['icon'] . '"></i>
                ' . $resultStatus[$status]['text'] . '
            </span>
        ';
        return $result;
    }

    public static function getMameDesmame($status, $textOnly = false)
    {
        if ($textOnly) {
            return $status == 1 ? 'Mamando' : 'Desmame';
        }
        $resultStatus = [
            0 => [
                'icon' => 'square',
                'class' => 'secondary',
                'text' => 'Inativo'
            ],
            1 => [
                'icon' => 'check-square',
                'class' => 'primary',
                'text' => 'Desmame'
            ]
        ];
        
        $result = '
            <span class="d-block badge badge-light-' . $resultStatus[$status]['class'] . ' mr-1 p-50">
                <i data-feather="' . $resultStatus[$status]['icon'] . '"></i>
                ' . $resultStatus[$status]['text'] . '
            </span>
        ';
        return $result;
    }

    public static function getStatus($status, $textOnly = false)
    {
        if ($textOnly) {
            return $status->name;
        }
        
        $result = "
            <span class='d-block badge badge-light-{$status->class} mr-1 p-50'>
                <i data-feather='{$status->icon}'></i>
                {$status->name}
            </span>
        ";
        return $result;
    }

    public static function sendSMS($number, $message)
    {
        try {
            $data = [
                "login" => config('app.kingTelecomLogin'),
                "token" => config('app.kingTelecomToken'),
                "numero" => $number,
                "msg" => $message
            ];
            $queryString = http_build_query($data);
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->get("http://sms.kingtelecom.com.br/kingsms/api.php?acao=sendsms&{$queryString}");
            return $response->json();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }
}
