<?php
    if(!in_array("ROLE_USER", $_SESSION['role'])){
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=error&errorCode=401");
    }
?>