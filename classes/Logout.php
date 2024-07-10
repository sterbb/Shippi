<?php

session_start();
if(session_destroy()){
    session_unset();
    header("Location:../modules/login.php");
}   

?>