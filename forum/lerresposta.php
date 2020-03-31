<?php
session_start();
include '../conexao.php';
$pergunta=$_GET['pergunta'];



echo "<script type='text/javascript'>
        $(function () {
  num_posts_show = 3;
  
    $('.resp$pergunta').slice(0, num_posts_show).show();
    $('#loadres$pergunta').on('click', function (e) {
        e.preventDefault();
        $('.resp$pergunta:hidden').slice(0, num_posts_show).slideDown();
        if ($('.resp$pergunta:hidden').length == 0) {
            $('#load').fadeOut('slow');
        }
    });
});
        </script>";

$sqlLerRespostas = "SELECT
*
FROM pergunta, resposta, usuario

WHERE pergunta.idPergunta = resposta.idPergunta and usuario.idUsuario = resposta.idUsuario and pergunta.idPergunta=$pergunta
               ORDER BY idResposta";
        $lerResposta = $db->prepare($sqlLerRespostas);
        $lerResposta->execute();
        
        if ($lerResposta->rowCount() > 0) {
            
            while ($rss = $lerResposta->fetch(PDO::FETCH_OBJ)) {
                
                echo "<div class='resp$pergunta' id='resp$rss->idResposta' style='display:none;'><fieldset class='fieldsetint'>"
                        . "<br><div class='usuarior'>".$rss->nomeUsuario . " diz: </div><br>"
                        . "<div class='resposta'>" . nl2br($rss->textoResposta) . 
                        "</div><div class='datar'> em: ".date('d/m/Y H:i', strtotime($rss->dataResposta));
               //excluir resposta
                if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
                    $usuario=$_SESSION['idUsuario'];
                if($rss->idUsuario==$usuario){
                    $sqlLerRpU = "SELECT
idResposta, idUsuario
FROM resposta
WHERE resposta.idUsuario = $usuario and resposta.idResposta=$rss->idResposta";
        $lerRpU = $db->prepare($sqlLerRpU);
        $lerRpU->execute();
        echo "<script type='text/javascript'>
       
            function confirmacaor$rss->idResposta(){
 if (confirm('tem certeza?')){
     $('#exclusaor$rss->idResposta').load('../forum/excluirR.php?resposta=$rss->idResposta');
         $('#resp$rss->idResposta').remove();
             }
     }
        
        </script><div id='exclusaor$rss->idResposta'></div>";
        if($lerRpU->rowcount() > 0){
              echo "
                <button value='excluirr$rss->idResposta' class='excluir' onclick='return confirmacaor$rss->idResposta();'>Excluir</button>"
                      . "";
          }  
                }else{
                    echo "<br>";
                }echo"";
                }echo '</fieldset><br></div></div>';
            }echo "<br><a href='' id='loadres$pergunta'>Mais respostas</a>";
        } else {
            echo "Sem respostas<br>";
        }

