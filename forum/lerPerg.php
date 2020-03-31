<?php

function lerPerg($conteudo,$pagina){
    $ordem=1;
    //Verifico se o usuário está logado no sistema
    if ((!empty($_SESSION['logado'])) and $_SESSION['logado']==TRUE){
//formulario de pergunta
        date_default_timezone_set('America/Montevideo');
$data= date("Y-m-d H:i:s");

              
    echo "<h4>Escreva sua dúvida:</h4><fieldset><form method='GET' action='$pagina' id='formper'>
            <h4>Titulo:</h4><input type='text' class='titu' name='titu' id='tper' maxlength='40' onKeyup='verifica();'>
            <span class='caracterest'>40</span> Restantes <br><br>
            <h4>Duvida:</h4><textarea class='textarea' name='texto' maxlength='600' id='pper' onkeyup='verifica()'></textarea>
            <span class='caracteres'>600</span> Restantes <br><br>
            <select  name=conteudo style='display: none;'>
                <option value='$conteudo' ></option>
            </select>
            <input type='datetime' style='display: none;' name='data' value='$data'>
            <input type='submit' id='submitformper' disabled='true' class='enviarb'>
        </form></fieldset><br>";
    //javascript formulario
    echo "<script type='text/javascript'>
        
        

window.verifica = function() {
    document.getElementById('submitformper').disabled = !((tper.value.length !== 0) && (pper.value.length !== 0));
}



                $(document).on('input keyup', '#pper', function () {
            var caracteresRestantes = 600;
            var caracteresDigitados = parseInt($(this).val().length);
            var caracteresRestantes = caracteresRestantes - caracteresDigitados;
            
            $('.caracteres').text(caracteresRestantes);
            
        });     

 $(document).on('input keyup', '#tper', function () {
            var caracteresRestantest = 40;
            var caracteresDigitadost = parseInt($(this).val().length);
            var caracteresRestantest = caracteresRestantest - caracteresDigitadost;
            
            $('.caracterest').text(caracteresRestantest);
            
        }); 



        $(document).ready(function(){
            $('#formper').ajaxForm({
                success: function(){
                $('#tudo').load('../forum/lerperguntas.php?conteudo=$conteudo&pagina=$pagina&ordem=$ordem');
                $('#formper').resetForm();
                
                }
            });
            
        });
        


        </script>";
 } else {
     echo "<br>Faça login para realizar perguntas!";
 }
    
    echo '<h4>Perguntas:</h4>';
   include "../conexao.php";
    
    echo "<script type='text/javascript'>      

document.addEventListener('DOMContentLoaded', function() {
  $('#tudo').load('../forum/lerperguntas.php?conteudo=$conteudo&pagina=$pagina&ordem=$ordem');
});

</script>";
    echo "<div id='tudo'></div>";

}
?>

