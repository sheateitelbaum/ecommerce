<?php
   
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
        $url = 'https://';
        $url .= $_SERVER['HTTP_HOST'];
        $url .= $_SERVER['REQUEST_URI'];
        header("Location: $url");
        exit;
    }
    
?>