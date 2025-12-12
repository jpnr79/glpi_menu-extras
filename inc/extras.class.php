<?php
class PluginExtrasMenu extends CommonGLPI {
    // Array de IDs de perfis permitidos
    private static $allowed_profiles = [4, 24, 28, 30, 31, 33, 34, 35, 36, 37, 38, 39, 172, 176, 180];

    static function getMenuName() {
        return 'Extras';
    }

    static function getTypeName($nb = 0) {
        return 'Extras';
    }

    static function canView() {
        // Check if user has an allowed profile
        if (!isset($_SESSION['glpiactiveprofile']['id'])) {
            return false;
        }
        return in_array($_SESSION['glpiactiveprofile']['id'], self::$allowed_profiles);
    }

    static function getMenuContent() {
        if (!static::canView()) {
            return [];
        }

        $menu = [];
        $menu['title'] = self::getTypeName();
        $menu['page']  = '/plugins/extras/front/menu1.php';
        return $menu;
    }
}