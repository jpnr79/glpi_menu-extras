<?php
include ("../../../inc/includes.php");

Session::checkLoginUser();

// Array de IDs de perfis permitidos
$allowed_profiles = [4, 24, 28, 30, 31, 33, 34, 35, 36, 37, 38, 39, 172, 176, 180];

// Check if user has an allowed profile
if (!isset($_SESSION['glpiactiveprofile']['id']) || 
    !in_array($_SESSION['glpiactiveprofile']['id'], $allowed_profiles)) {
    Html::displayRightError();
    exit();
}

Html::header('Extras', $_SERVER['PHP_SELF'], "extras", "pluginextrasmenu");
echo "<div class='center'><br><br><h1>Bem-vindo ao Submenu1</h1></div>";
Html::footer();