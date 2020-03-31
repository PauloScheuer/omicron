<?php
session_start();
function InserirCurt($pergunta){
    
    include '../conexao.php';
    
            $sql = "INSERT INTO curtidas (idCurt, idPergunta, idUsuario) VALUES (:idc, :idp, :idu)";
            $enviarbanco = $db->prepare($sql);
            $enviarbanco->bindValue(":idc", "", PDO::PARAM_STR);
            $enviarbanco->bindValue(":idp", $pergunta, PDO::PARAM_STR);
            $enviarbanco->bindValue(":idu", $_SESSION['idUsuario'], PDO::PARAM_STR);
            if ($enviarbanco->execute()) {
                
                } else {
                echo '<script language= "JavaScript">
alert("Erro ao Curtir!");
</script>';
            }
            
            $sqls= "SELECT numCurtPerg from pergunta WHERE idPergunta=$pergunta";
            $lers= $db->prepare($sqls);
            $lers->execute();
            $rssqls = $lers->fetch(PDO::FETCH_OBJ);
            $novoCurt=$rssqls->numCurtPerg+1;
            
            $sqlg= "UPDATE pergunta SET numCurtPerg = $novoCurt WHERE idPergunta=$pergunta";
            $enviarbancog=$db->prepare($sqlg);
            $enviarbancog->execute();
}
$pergunta=$_POST['pergunta'];
InserirCurt($pergunta);

