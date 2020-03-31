<?php
session_start();

include '../conexao.php';
$conteudo=$_GET['conteudo'];
$pagina=$_GET['pagina'];
$ordemrecebida=$_GET['ordem'];
if($ordemrecebida==1){
    $ordem="idPergunta DESC";
}elseif($ordemrecebida==2){
    $ordem="numCurtPerg DESC";
}


  

//leitura de pergunta
echo "<script type='text/javascript'>
        $(function () {
  num_posts_show = 3;
  
    $('.post').slice(0, num_posts_show).show();
    $('#loadmore').on('click', function (e) {
        e.preventDefault();
        $('.post:hidden').slice(0, num_posts_show).slideDown();
        if ($('.post:hidden').length == 0) {
            $('#load').fadeOut('slow');
        }
    });
});

 $(document).ready(function(){
            $('#tipoVisual1').ajaxForm({
                success: function(){
                $('#tudo').load('../forum/lerperguntas.php?conteudo=$conteudo&pagina=$pagina&ordem=1');
                
                }
            });
        });
        
 $(document).ready(function(){
            $('#tipoVisual2').ajaxForm({
                success: function(){
                $('#tudo').load('../forum/lerperguntas.php?conteudo=$conteudo&pagina=$pagina&ordem=2');
                
                }
            });
        });
        </script>";



$sqlLerTudo = "SELECT
*
FROM usuario, pergunta

WHERE usuario.idUsuario = pergunta.idUsuario and idConteudo = $conteudo
ORDER BY $ordem";
$lerTudo = $db->prepare($sqlLerTudo);
$lerTudo->execute();
if ($lerTudo->rowCount() > 0) {
    echo "<form action='$pagina' method='GET' id='tipoVisual1' >
<input type='submit' value='Mais recentes' class='filtro'>
             </form>";
    echo "<form action='$pagina' method='GET' id='tipoVisual2'>
<input type='submit' value='Mais curtidas' class='filtro'>
             </form>";
    while ($rs = $lerTudo->fetch(PDO::FETCH_OBJ)) {
       
        echo "<div id='per$rs->idPergunta' class='post' >";
         echo "<fieldset>";
         
         echo "<label class='titulop'>" . $rs->tituloPergunta . "</label><br>";
        echo "<label class='usuariop'>Por " . $rs->nomeUsuario . ", </label>";
        echo "<label class='datap'>em " . date('d/m/Y H:i', strtotime($rs->dataPergunta)) . "</label><br><br>";
        echo "<div class='pergunta'>" . nl2br($rs->textoPergunta) . "</div>";
        if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
            $usuario=$_SESSION['idUsuario'];
            //botao excluir
            $sqlLerPpU = "SELECT
idPergunta, idUsuario
FROM pergunta

WHERE pergunta.idUsuario = $usuario and pergunta.idPergunta=$rs->idPergunta";
        $lerPpU = $db->prepare($sqlLerPpU);
        $lerPpU->execute();
        
        echo "<script type='text/javascript'>
        
        function confirmacao$rs->idPergunta(){
 if (confirm('tem certeza?')){
 
     $('#exclusao$rs->idPergunta').load('../forum/excluirP.php?pergunta=$rs->idPergunta');
         $('#per$rs->idPergunta').remove();
             }
}

        </script>";
        
        
          if($lerPpU->rowcount() > 0){
              echo "
                <button value='excluir$rs->idPergunta' class='excluir' onclick='return confirmacao$rs->idPergunta();'>Excluir</button>"
                      . "<div id='exclusao$rs->idPergunta'></div>";
          }  
          echo "<br>";
        }
          
           //leitura de curtidas e respostas automatica
         
            
            echo "<div id='contador$rs->idPergunta' >
                <script type='text/javascript'>
                $('#contador$rs->idPergunta').load('../forum/contar.php?p=$rs->idPergunta');
</script>
                    </div>";
          
          
            
        
        //botoes curtir e descurtir
            if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
            $sqlLerCpU = "SELECT
idCurt
FROM curtidas,pergunta

WHERE curtidas.idUsuario = $usuario and curtidas.idPergunta = $rs->idPergunta";
        $lerCpU = $db->prepare($sqlLerCpU);
        $lerCpU->execute();
        echo "<script type='text/javascript'>
        $(document).ready(function(){
            $('#meufrm2$rs->idPergunta').hide();
            $('#meufrm$rs->idPergunta').ajaxForm({
                success: function(){
                    $('#meufrm2$rs->idPergunta').show();
                    $('#meufrm$rs->idPergunta').hide();
                        $('#contador$rs->idPergunta').load('../forum/contar.php?p=$rs->idPergunta');
                }
            });
            $('#meufrm2$rs->idPergunta').ajaxForm({
                success: function(){
                    $('#meufrm2$rs->idPergunta').hide();
                    $('#meufrm$rs->idPergunta').show();
                        $('#contador$rs->idPergunta').load('../forum/contar.php?p=$rs->idPergunta');
                }
            });
        });
        </script>";
        
        if ($lerCpU->rowCount() > 0) {
            echo "
                <form method='POST' action='../forum/descurtir.php' id='meufrm$rs->idPergunta'>
                <input type='hidden' name='pergunta' value='$rs->idPergunta'>
                <input type='image' src='../imagens/liked.png' name='unlike' class='l-d'>
        </form>";
            echo "<form method='POST' action='../forum/curtir.php' id='meufrm2$rs->idPergunta'>
                <input type='hidden' name='pergunta' value='$rs->idPergunta'>
                <input type='image' src='../imagens/liken.png' name='like' class='l-d'>
            </form>
            ";
        } else {
            echo "
                <form method='POST' action='../forum/descurtir.php' id='meufrm2$rs->idPergunta'>
                <input type='hidden' name='pergunta' value='$rs->idPergunta'>
                <input type='image' src='../imagens/liked.png' name='unlike' class='l-d'>
        </form>";
            echo "<form method='POST' action='../forum/curtir.php' id='meufrm$rs->idPergunta'>
                <input type='hidden' name='pergunta' value='$rs->idPergunta'>
                <input type='image' src='../imagens/liken.png' name='like' class='l-d'>
            </form>";
        } 
        
            }
        
        
        //formulario resposta
        echo "<script type='text/javascript'>
        $(document).on('input keyup', '#txtr$rs->idPergunta', function () {
            var caracteresRestantesr$rs->idPergunta = 300;
            var caracteresDigitadosr$rs->idPergunta = parseInt($(this).val().length);
            var caracteresRestantesr$rs->idPergunta = caracteresRestantesr$rs->idPergunta - caracteresDigitadosr$rs->idPergunta;
            
            $('.caracteresr$rs->idPergunta').text(caracteresRestantesr$rs->idPergunta);
            
        });



     window.verificaR$rs->idPergunta = function() {
    document.getElementById('submitformres$rs->idPergunta').disabled = (txtr$rs->idPergunta.value.length === 0);
}

        $(document).ready(function(){
            $('#formres$rs->idPergunta').ajaxForm({
                success: function(){
                
                $('#lendoresp$rs->idPergunta').load('../forum/lerresposta.php?pergunta=$rs->idPergunta');
                  $('#formres$rs->idPergunta').resetForm();
                }
            });
        });
        </script>";
        
        if ((!empty($_SESSION['logado']))and$_SESSION['logado']==TRUE){
date_default_timezone_set('America/Montevideo');
$data= date("Y-m-d H:i:s");
    echo "<h4>Resposta:</h4><form method='GET' action='$pagina' id='formres$rs->idPergunta'>
        
        <textarea class='textarea' name='txtr' maxlength='300' id='txtr$rs->idPergunta' onkeyup='verificaR$rs->idPergunta()'></textarea>
        <span class='caracteresr$rs->idPergunta'>300</span> Restantes <br>
        <select  name='pergunta' style='display: none;'>
<option value='$rs->idPergunta' >Pergunta</option>
</select>
<input type='datetime' style='display: none;' name='data' value='$data'>
        <input type='submit' id='submitformres$rs->idPergunta' disabled='true' class='enviarb'>
    </form><br>";
        
 } else {
            echo "<br>Faça login para responder!<br><br>";
        }
 //leitura de resposta p/pergunta
        
 echo "<h4>Respostas:</h4>"
        . "<div id='lendoresp$rs->idPergunta'>
 <script type='text/javascript'>
                $('#lendoresp$rs->idPergunta').load('../forum/lerresposta.php?pergunta=$rs->idPergunta');
</script>
 </div>";

        
        
        echo "</fieldset></div><br>";
        
    }
    
echo "<a href='#' id='loadmore'>Mais perguntas</a>";
} else {
    echo "Sem perguntas";
}
