<?php

class Pages {

    private $pages = array(
        'index' => array(
            'title' => 'Witam serdecznie',
            'content' => 'views/home.php'
        )
    );

    public function getTitle($page) {
        return $this->pages[$page]['title'];
    }

    public function getContent($page) {
        
    }

}
