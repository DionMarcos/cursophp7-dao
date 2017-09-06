<?php 


require_once("config.php");

$sql = new sql();

$sql->select("SELECT * FROM tb_usuario");

echo json_encode($usuarios);


 ?>