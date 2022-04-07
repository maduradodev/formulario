<?php

define("BASE_URL", "https://madurado.tech/MD/BAYERINDEXv14/");
// Starts session on every page
session_start();

if(!isset($_SESSION['is_logged'])){
    // User is not currently logged
    $_SESSION['is_logged'] = FALSE;
}