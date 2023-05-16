<?php
session_start();
if (($_SESSION['authenticatedC'] == false) and ($_SESSION['authenticatedA'] == false)) {
    header("Location: login.html");
} elseif (($_SESSION['authenticatedC'] == true)){
    header("Location: parcelas.html");
}


?>