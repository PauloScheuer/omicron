<?php

function InserirPerg($titu,$texto,$conteudo, $data,$local){
include '../conexao.php';
            $sql = "INSERT INTO pergunta (textoPergunta, tituloPergunta, dataPergunta, idConteudo, idUsuario, idPergunta) VALUES (:texto, :titu, :data, :idc, :idu, :id)";
            $enviarbanco = $db->prepare($sql);
            $enviarbanco->bindValue(":texto", $texto, PDO::PARAM_STR);
            $enviarbanco->bindValue(":titu", $titu, PDO::PARAM_STR);
            $enviarbanco->bindValue(":data", $data, PDO::PARAM_STR);
            $enviarbanco->bindValue(":idc", $conteudo, PDO::PARAM_STR);
            $enviarbanco->bindValue(":idu", $_SESSION['idUsuario'], PDO::PARAM_STR);
            $enviarbanco->bindValue(":id", "", PDO::PARAM_STR);
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
            $sql = "INSERT INTO resposta (textoResposta, idResposta, dataResposta, idUsuario, idPergunta) VALUES (:texto, :idr, :data, :idu, :id)";
            $enviarbanco = $db->prepare($sql);
            $enviarbanco->bindValue(":texto", $resposta, PDO::PARAM_STR);
            $enviarbanco->bindValue(":idr", "", PDO::PARAM_STR);
            $enviarbanco->bindValue(":data", $data, PDO::PARAM_STR);
            $enviarbanco->bindValue(":idu", $_SESSION['idUsuario'], PDO::PARAM_STR);
            $enviarbanco->bindValue(":id", "$pergunta", PDO::PARAM_STR);
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




