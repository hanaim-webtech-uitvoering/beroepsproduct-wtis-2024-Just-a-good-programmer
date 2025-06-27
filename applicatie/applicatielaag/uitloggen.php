<?php
session_unset(); 
session_destroy(); 


header("Location: applicatie/presentielaag/hoofdpagina_klanten.php"); 
exit(); 
?>
