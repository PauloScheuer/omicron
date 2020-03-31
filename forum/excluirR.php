<?php
include '../conexao.php';
$resposta=$_GET['resposta'];
$sqlDeletaR = "DELETE FROM resposta WHERE idResposta=$resposta";
$deletaR = $db->prepare($sqlDeletaR);
$deletaR->execute();

