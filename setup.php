<?php
define('PLUGIN_EXTRAS_VERSION', '1.0.0');

function plugin_init_extras() {
    global $PLUGIN_HOOKS;
    
    $PLUGIN_HOOKS['csrf_compliant']['extras'] = true;
    
    // Hook para redefine_menus
    $PLUGIN_HOOKS['redefine_menus']['extras'] = 'plugin_extras_redefine_menus';
}

// Função que adiciona o menu principal
function plugin_extras_redefine_menus($menu) {
    // Array de IDs de perfis permitidos
    $allowed_profiles = [4, 24, 28, 30, 31, 33, 34, 35, 36, 37, 38, 39, 172, 176, 180];
    
    // Check if user has an allowed profile
    if (!isset($_SESSION['glpiactiveprofile']['id']) || 
        !in_array($_SESSION['glpiactiveprofile']['id'], $allowed_profiles)) {
        return $menu;
    }

    $menu['extras'] = [
        'title' => 'Extras',
        'icon'  => 'ti ti-brain',
        'types' => [],
        'content' => [
            'submenu1' => [
                'title' => 'Submenu1',
                'page'  => '/plugins/extras/front/menu1.php',
            ],
            'submenu2' => [
                'title' => 'Submenu2',
                'page'  => '/plugins/extras/front/menu2.php',
            ]
        ]
    ];
    return $menu;
}

function plugin_version_extras() {
    return [
        'name'           => 'Extras',
        'version'        => PLUGIN_EXTRAS_VERSION,
        'author'         => 'Adriano Marinho',
        'license'        => 'GPLv3+',
        'homepage'       => 'https://github.com/malakaygames',
        'requirements'   => [
            'glpi' => [
                'min' => '10.0.0',
                'max' => '10.1.0',
            ]
        ]
    ];
}

function plugin_extras_check_prerequisites() {
    return true;
}

function plugin_extras_check_config() {
    return true;
}