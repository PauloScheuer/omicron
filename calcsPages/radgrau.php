<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Radiano e grau</title>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
        
        <style>
            <?php            
            include '../styles/calcs.css';
            ?>        
        </style>
        <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    </head>
    <body>
       
        <div class="geral"> <?php
    include '../commons/header.php';
    include '../commons/menu.php'; ?>
    
        <div class="corpo">
            <center>
        <h1>Radiano e grau</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
                <p>
                    <label style="margin-left:20px;"></label>
                    Em um círculo trigonométrico, podemos representar o
                    um valor por seu ângulo, medindo então em graus, ou pelo seu arco, este medido em radianos.
                    Para evitar erros em cálculos, é necessário converter corretamente de uma medida para a outra. 
                    Para isso, basta saber que 180° equivalem a 1π radiano.
                </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
            <form action="radgrau.php" method="GET">
                <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>Radianos (*π)=</label>
            <input type="text" name="r" class="ia"><br><br>
            <label>Graus =</label>
            <input type="text" name="g" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        if(!empty($_GET['r'])or!empty($_GET['g'])){
        if(is_numeric($_GET['r'])or is_numeric($_GET['g'])){
            $r=$_GET['r'];
        $g=$_GET['g'];
            if(is_numeric($r) and empty($g)){
                $multi=$r*180;
                $div=$multi/pi();
               echo "Fórmula: "
            . "<div lang='latex'>x=\dfrac{ \alpha}{ 180}*\pi</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$r\pi=\dfrac{ \alpha}{ 180}*\pi</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$r\pi*180= \alpha*\pi</div><br>"
                    . "<div lang='latex'>$multi= \alpha</div><br>"
               . "<div lang='latex'>\alpha=$multi</div>";
                }elseif (is_numeric($g) and empty($r)) {
                $multi=$g* pi();
                $div=$g/180;
               echo "Fórmula: "
            . "<div lang='latex'>x=\dfrac{ \alpha}{ 180}*\pi</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>x=\dfrac{ $g}{ 180}*\pi</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>x=\dfrac{ $g}{ 180}*\pi</div><br><br>"
                    . "<div lang='latex'>x=$div \pi</div><br><br>";
                }else{
                    echo "Você deve deixar um campo vazio e preencher o outro";
                }
        } else {
           echo "Os valores devem ser numéricos" ;
        }
        }else{
            echo "Insira os valores";
        }
        ?>
        </fieldset><br><br><br><br>
        </div>
            <div class="forum"><h3>Perguntas e respostas:</h3>
                <fieldset class="fieldsetex"> 
           <?php
            include "../conexao.php";
            include '../forum/lerPerg.php';
            include '../forum/inPerg.php';
          
            lerPerg(15,"radgrau.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "radgrau.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "radgrau.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>