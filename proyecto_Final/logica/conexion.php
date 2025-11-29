<?php
$host = 'sql105.infinityfree.com';
$user = 'if0_40233490';
$pass = 'eazGXAi5Cbp';
$db = 'if0_40233490_tarea_web';

$conn = new mysqli($host,$user,$pass,$db);

if( $conn ->connect_error ){
    die("Conexion con error". $conn->connect_error);
}
?>