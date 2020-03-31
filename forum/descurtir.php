<?php
session_start();
function RetirarCurt($pergunta){
    
    include '../conexao.php';
    $usuario=$_SESSION['idUsuario'];
            $sql = "DELETE FROM `curtidas` WHERE idPergunta=$pergunta and idUsuario=$usuario";
            $enviarbanco = $db->prepare($sql);
            if ($enviarbanco->execute()) {
                unset($_POST);
            } else {
                echo '<script language= "JavaScript">
alert("Erro ao descurtir!");
</script>';
            }
            $sqls= "SELECT numCurtPerg from pergunta WHERE idPergunta=$pergunta";
            $lers= $db->prepare($sqls);
            $lers->execute();
            $rssqls = $lers->fetch(PDO::FETCH_OBJ);
            $novoCurt=$rssqls->numCurtPerg-1;
            
            $sqlg= "UPDATE pergunta SET numCurtPerg = $novoCurt WHERE idPergunta=$pergunta";
            $enviarbancog=$db->prepare($sqlg);
            $enviarbancog->execute();
            
}
$pergunta=$_POST['pergunta'];
RetirarCurt($pergunta);

