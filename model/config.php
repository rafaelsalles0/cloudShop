<?php
    $dir = str_replace("\\", "/", substr(__DIR__, 0, strripos(__DIR__, "\\")));
    define("ROOT", $dir ."/");
?>