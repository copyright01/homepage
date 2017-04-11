<?php

class Pages {

    private $pages = array(
        'index' => array(
            'title' => 'Witam serdecznie',
            'content' => 'views/home.php'
        ),
        'logout' => array(
            'title' => 'Trwa wylogowywanie...',
            'content' => 'views/logout.php'
        ),
        'upload' => array(
            'title' => 'Upload plików',
            'content' => 'views/upload.php'
        ),
        'wykres_silowy' => array(
            'title' => 'Wykres siłowy',
            'content' => 'views/wykres_silowy.php'
        ),
        'phpterminal' => array(
            'title' => 'PHPterminal',
            'content' => 'views/phpterminal.php'
        )
    );

    public function getTitle($page) {
        return $this->pages[$page]['title'];
    }

    public function getContent($page) {
        return $this->pages[$page]['content'];
    }

}
