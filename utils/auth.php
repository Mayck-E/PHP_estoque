<?php
//auth.php

if (isset($_SESSION) == false) {
    session_start();
}

function checkLogin() {
    if (isset($_SESSION['usuario_id']) == false) {
        header('Location: ./index.php?action=login');
        exit();
    }; 

}
