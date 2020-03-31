<?php
include '../conexao.php';
$pergunta=$_GET['p'];
$sqlLerCurtidas = "SELECT
idCurt
FROM curtidas

WHERE $pergunta = curtidas.idPergunta ";
        $lerCurtidas = $db->prepare($sqlLerCurtidas);
        $lerCurtidas->execute();
        if ($lerCurtidas->rowCount() > 0) {
            $a=0;
            while ($rsc = $lerCurtidas->fetch(PDO::FETCH_OBJ)) {
                $a++;
            }
            echo "Curtidas:".$a;
        } else {
            echo "Sem curtidas<br>";
        }
            echo "</div>";

