<!-- Perform the logout, e.g. session_destroy(); -->

<?php

    require_once '../_config.php';

    session_destroy();
    header('HX-Redirect: index.php');
?>

