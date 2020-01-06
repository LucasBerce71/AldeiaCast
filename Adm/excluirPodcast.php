<?php

include_once 'conexao.php';

$idPodcast = $_GET["idPodcast"];

$result_consulta = "UPDATE grupos SET Ativo = 'I' WHERE idGrupo = '$idPodcast'";

$resultado_consulta = mysqli_query($conn, $result_consulta);

echo "<script> alert('O áudio foi excluido da plataforma com sucesso!');javascript:window.location='editAdm.php';</script>";
?>