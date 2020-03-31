<?php
session_start();
include '/conexao.php';
/*Esse trecho é responsavel por excluir um registro do bd*/
if(!empty($_SESSION['idUsuario'])){
    $idUsuario = $_SESSION['idUsuario'];
    
    
    
    $sqlDeletaC = "DELETE FROM curtidas WHERE idUsuario=$idUsuario";
    $deletaC = $db->prepare($sqlDeletaC);
    $deletaC->execute();
    
    
    
    $sqlDeletaR = "DELETE FROM resposta WHERE idUsuario=$idUsuario";
    $deletaR = $db->prepare($sqlDeletaR);
    $deletaR->execute();
    
    
    $sqlDeletaRP = "DELETE FROM resposta WHERE resposta.idPergunta IN (SELECT idPergunta FROM pergunta WHERE idUsuario=$idUsuario)";
    $deletaRP = $db->prepare($sqlDeletaRP);
    $deletaRP->execute();
    
    $sqlDeletaP = "DELETE FROM pergunta WHERE idUsuario=$idUsuario";
    $deletaP = $db->prepare($sqlDeletaP);
    $deletaP->execute();
    
    
    
    
    
    $sqlDeleta = "DELETE FROM usuario WHERE idUsuario=$idUsuario";
    $deletaID = $db->prepare($sqlDeleta);
    
    
    
    if($deletaID->execute()){
        session_destroy();
        echo '<script language= "JavaScript">
location.href="../pages/index.php";
alert("Cadastro deletado!!");
</script>';
    }else{
        echo '<script language= "JavaScript">
alert("Erro no delete!");
location.href="../pages/userpage.php";
</script>';
    }
    
    
    
}




