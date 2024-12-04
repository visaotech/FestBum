<?php
    
    session_start();
    
    if(!isset($_SESSION['nome']) == true) {
        session_destroy();
        header('Location: ../visao/index.php');
    }

?>