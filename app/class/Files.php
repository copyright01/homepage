<?php

class Files {

    private $file;
    private $folder;

    public function __construct($folderPath) {
        $this->folder = $folderPath;
    }

    public function listing($folderListing = FALSE) {
        if ($folderListing) {
            $katalog = $folderListing;
        } else {
            $katalog = $this->folder;
        }
        $kat = opendir($katalog);
        $list = '<ul>';
        while (false != ($plik = readdir($kat)))
            if (($plik != '.') && ($plik != '..')) {
                $list .= '<li><a href="' . $this->folder . $plik . '" download="' . $plik . '">' . $plik . '</a></li>';
            }
        $list .= '</ul>';
        closedir($kat);
        return $list;
    }

    public function upload($fileNameInput) {
        $this->file = $fileNameInput;
        $check = $this->checkError();
        if ($check != '1') {
            $echo = '<span class="error">Problem: ' . $check . '</span><br>';
        } else {
            $check = $this->copy();
            if ($check != '1') {
                $echo = '<span class="error">Problem: ' . $check . '</span><br>';
            } else {
                $echo = '<span class="success">Sukces: Plik został wysłany.</span>';
            }
        }
        return $echo;
    }

    private function checkError() {
        if ($_FILES[$this->file]['error']) {
            switch ($_FILES[$this->file]['error']) {
                case 1 :
                    return 'Przekroczono upload_max_filesize.';
                    break;
                case 2 :
                    return 'Przekroczono max_file_size.';
                    break;
                case 3 :
                    return 'Plik wysłany tylko częściowo.';
                    break;
                case 4 :
                    return 'Nie wysłano żadnego pliku.';
                    break;
                case 6 :
                    return 'Nie wybrano katalogu tymczasowego.';
                    break;
                case 7 :
                    return 'Nie zapisano pliku na dysku.';
                    break;
            }
        }
        return '1';
    }

    private function copy() {
        $path = $this->folder . $_FILES[$this->file]['name'];
        if (is_uploaded_file($_FILES[$this->file]['tmp_name'])) {
            if (!move_uploaded_file($_FILES[$this->file]['tmp_name'], $path)) {
                return 'Plik nie może być skopiowany do pożądanego katalogu.';
            }
        } else {
            return 'Możliwy atak podczas wysyłania pliku.';
        }
        return '1';
    }

}
