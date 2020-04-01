<?php
session_start();
function InserirCurt($pergunta){
    
    include '../conexao.php';
    $idu = $_SESSION['idUsuario'];
            $sql = "INSERT INTO curtidas ( idPergunta, idUsuario) VALUES ('$pergunta', '$idu')";
            $enviarbanco = $db->prepare($sql);
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

