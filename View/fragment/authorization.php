<?php
    if(empty($_SESSION)){
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=error&errorCode=401");
    }
?>