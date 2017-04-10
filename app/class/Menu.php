<?php

class Menu {

    private $privMenuArray = 'priv_array.php';
    private $menuArray = 'menu_array.php';
    private $linksMenuArray;

    public function __construct() {
        
    }

    private function menuGenerate($type) {
        switch ($type) {
            case 'priv':
                return privMenu();
                break;

            default:
                break;
        }
    }

    private function privMenu() {
        
    }

    private function includeFile($file) {
        
    }

}
