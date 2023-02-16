<?php

# QUERY
$users = $conn->query("SELECT n_marcacao, mensagem, dataHora_confirmada, cliente FROM v_completa_marcacao WHERE estado = 'confirmada';");

while ($row = mysqli_fetch_array($users)) {
	$nome = $row["cliente"];
	if ($nome == null)
		$nome = "Cliente";

	echo "{";
	echo "id: '" .$row["n_marcacao"]. "',";
	echo "title: '" .$nome. " - " .$row["mensagem"]. "',";
	echo "start: '" .$row["dataHora_confirmada"]. "'";
	echo "},";
}

?>