<?php
session_unset(); 
session_destroy(); 


header("Location: ../presentielaag/hoofdpagina_klanten.php"); 
exit(); 
?>
