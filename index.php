<?php

include 'app/init.php';

$url = new Url();
$pageName = $url->getPage();

$pages = new Pages();

$title = $pages->getTitle($pageName);
$content = $pages->getContent($pageName);

try {
    $priv = new Priv();
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

$privAreaFile = $priv->getAreaPath();

include 'app/template.php';


