<?php

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['priv'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES) && $_GET["action"] == 'upload') {
        $images = $_FILES["files"];
        $images_dir = "UPLOAD/";
        $errors = 0;
        if (!empty($images)) {
            foreach ($images["name"] as $file => $name) {
                if ($images["error"][$file] > 0) {
                    $errors++;
                    continue;
                } else {
                    if (!move_uploaded_file($images["tmp_name"][$file], $images_dir . $name)) {
                        $errors++;
                    }
                }
            }
        }

        if ($errors > 0) {
        	$Files = new Files();

            echo json_encode(array(
                "error" => true,
                "message" => "Wystąpił błąd!"
            ));
        } else {
            echo json_encode(array(
                "error" => false,
                "message" => "Wysyłanie zakończone powodzeniem!"
            ));
        }
    }
}
?>