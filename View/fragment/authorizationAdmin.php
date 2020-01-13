<?php

if(!USER::checkIfAdmin($_SESSION['role'])){
    $url = "http://$_SERVER[HTTP_HOST]/";
    header("Location: {$url}?page=error&errorCode=401");
}

