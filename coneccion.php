<?php

$tabla = "empleo";

$conexion=mysqli_connect('localhost','root','','web_scraping');
if (mysqli_connect_errno()) 
{ 
    echo "Error al conectar: " . mysqli_connect_errno();
    exit();
}
?>