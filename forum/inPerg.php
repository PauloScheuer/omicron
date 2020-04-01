<?php

function InserirPerg($titu,$texto,$conteudo, $data,$local){
include '../conexao.php';
$idu = $_SESSION['idUsuario'];
            $sql = "INSERT INTO pergunta (textoPergunta, tituloPergunta, dataPergunta, idConteudo, idUsuario) VALUES ('$texto', '$titu', '$data', '$conteudo', '$idu')";
            $enviarbanco = $db->prepare($sql);
            if ($enviarbanco->execute()) {
                echo "<script language= 'JavaScript'>
location.href='$local';
</script>";
            } else {
                echo '<script language= "JavaScript">
alert("Erro ao cadastrar!");
</script>';
            }
}
function InserirResp($resposta,$pergunta, $data, $local){
    include '../conexao.php';
    $idu = $_SESSION['idUsuario'];
            $sql = "INSERT INTO resposta (textoResposta, dataResposta, idUsuario, idPergunta) VALUES ('$resposta', '$data', '$idu', '$pergunta')";
            $enviarbanco = $db->prepare($sql);
            if ($enviarbanco->execute()) {
                echo "<script language= 'JavaScript'>
location.href='$local'
</script>";
            } else {
                echo '<script language= "JavaScript">
alert("Erro ao responder!");
</script>';
            }
        
}




