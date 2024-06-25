<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'PHP Web App with HTMX';
const SITE_OWNER = 'Waimea College';


//-------------------------------------------------------------
// Setup a session
session_name('PBDueDateManager');
session_start();


//-------------------------------------------------------------
// Check which type of user we
$userName   = $_SESSION['user']['name']     ?? 'Guest';
$isLoggedIn = $_SESSION['user']['loggedIn'] ?? false;
