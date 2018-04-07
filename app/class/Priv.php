<?php

class Priv {

    private $secureFile = 'app/secure/secure.php';
    private $form = 'app/lib/priv_area_form.php';
    private $list = 'app/lib/priv_area_list.php';

    public function __construct() {
        if (isset($_POST['pass'])) {
            if (!file_exists($this->secureFile)) {
                echo 'Nie dolaczono pliku secure!!!';
            }
            include $this->secureFile;
            $passHash = md5($_POST['pass']);
            unset($_POST['pass']);
            if ($passHash == PASS) {
                $_SESSION['priv'] = true;
            }
        }
    }

    public function getAreaPath() {
        return (isset($_SESSION['priv']) && $_SESSION['priv'] == TRUE) ? $this->list : $this->form;
    }

    public function weryfikuj() {
        if (!$_SESSION['priv']) {
            echo 'Dostęp zabroniony!!!';
            exit;
        }
    }

}
