<?php

$id = $_POST["id_recebido"];

$sql = $db->query("DELETE FROM subservico_descricao WHERE id_descricao = '$id'");

if ($sql) {
	header("location: backoffice.php?pagina=nPages/unhasDashboard.php&descricaoEliminada=success");
}else{
	header("location: backoffice.php?pagina=nPages/unhasDashboard.php&descricaoEliminada=failed");
}

?>