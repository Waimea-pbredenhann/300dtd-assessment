<?php

require_once '_session.php';

session_unset();  
session_destroy();

header('location: ../site/index.php');


?>