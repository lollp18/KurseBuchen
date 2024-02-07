<?php

include './dbAbfragenInit.php';

$Db= new DB();
   
$Name= $_GET['Name'];
$Stufe=$_GET['Stufe'];
$Email= $_GET['Email'];
$Passwort= $_GET['Passwort'];
$Db->Registriren($Name,$Stufe,$Email,$Passwort);




?>