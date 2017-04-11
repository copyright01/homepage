<?php

class Url {

    private $default_page = 'index';
    private $page;

    private function sanitize($string) {
        return strip_tags($string);
    }

    public function __construct() {
        if (isset($_GET['page'])) {
            $this->page = $this->sanitize($_GET['page']);
            unset($_GET['page']);
        } else {
            $this->page = $this->default_page;
        }
    }

    public function getPage() {
        return $this->page;
    }

}
