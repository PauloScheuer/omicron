<?php
include '../conexao.php';
$pergunta=$_GET['pergunta'];

$sqlDeletaC = "DELETE FROM curtidas WHERE idPergunta=$pergunta";
$deletaC = $db->prepare($sqlDeletaC);
$deletaC->execute();


$sqlDeletaR = "DELETE FROM resposta WHERE idPergunta=$pergunta";
$deletaR = $db->prepare($sqlDeletaR);
$deletaR->execute();


$sqlDeleta = "DELETE FROM pergunta WHERE idPergunta=$pergunta";
    $deletaP = $db->prepare($sqlDeleta);
    if($deletaP->execute()){
        echo '<script language= "JavaScript">
</script>';
    }else{
        echo '<script language= "JavaScript">
alert("erro no delete!");
</script>';
    }

