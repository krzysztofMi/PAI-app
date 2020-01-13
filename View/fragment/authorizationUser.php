<?php
    if(!USER::checkIfUser($_SESSION['role'])){
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=error&errorCode=401");}
