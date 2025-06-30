<?php
session_unset(); 
session_destroy(); 


header("Location: ../presentielaag/inloggen.php"); 
exit(); 
?>
