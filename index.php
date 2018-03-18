<?php

require_once ("config.php");


$teste = new SqlConfig();
//$array = array("Carlito Teves", "m", "Argentino");

$result = $teste->select("SELECT * FROM pessoas");

echo json_encode($result);

