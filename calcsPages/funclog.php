<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Função logarítmica</title>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/calcs.css" />
        <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    </head>
    <body>
        
        <div class="geral">
            <?php
            include '../commons/header.php';
            include '../commons/menu.php';
            ?>
    
        <div class="corpo">
            <center>
        <h1>Função logarítmica</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p>
                <label style="margin-left:20px;"></label>Uma função logarítmica é uma função do tipo f(x)
                =log<sub>a</sub>x, com <i>a</i> sendo sempre maior que 0 e diferente de 1 e x também maior que 0. Essas
                restrições se devem ao fato de não existirem raízes de certos índices (como 2) para números
                negativos, além 0<sup>0</sup> ser uma indeterminação. Para o valor do logaritmo, admite-se qualque número real.
                <br><label style="margin-left:20px;"></label>
                O logaritmo é uma ferramenta utilizada para se encontrar o expoente de uma base <i>a</i>. Isso significa que
                a base <i>a</i>, quando elevada <i>f(x)</i>, resulta em <i>x</i>. A semelhança notável entre essa função e a 
                função exponencial pode ser explicada pelo fato de uma ser a função inversa da outra.
                <br><label style="margin-left:20px;"></label>
                Esse tipo de função, assim como uma função afim ou exponencial,
                pode ser classificado em crescente, com a>1, ou decrescente, com a<1. 
                
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="funclog.php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br>
            <br><label>f(x)=</label>
            <input type="text" name="fx" class="ia"><br><br>
            <label>a=</label>
            <input type="text" name="a" class="ia"><br><br>
            <label>x=</label>
            <input type="text" name="x" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        if(!empty($_GET['fx'])or!empty($_GET['a'])or!empty($_GET['x'])){
        if(is_numeric($_GET['fx'])or is_numeric($_GET['a'])or is_numeric($_GET['x'])){
            $fx=$_GET['fx'];
        $a=$_GET['a'];
        $x=$_GET['x'];
            if(is_numeric($fx) and is_numeric($a) and empty($x)){
                if($a==1 or $a<=0){
                    echo "Os valores não são compativeis";
                }else{
                    $pot= pow($a,$fx);
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=\log_{ a}{ x}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=\log_{ $a}{ x}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$a^{ $fx}=x</div><br>"
                    . "<div lang='latex'>x=$a^{ $fx}</div><br>"
                    . "<div lang='latex'>x=$pot</div>";
                }
            }elseif (is_numeric($x) and is_numeric($a) and empty($fx)) {
                if($a<=0 or $a==1 or $x<=0){
                    echo "Os valores não são compativeis";
                }else{
                    $log= log($x, $a);
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=\log_{ a}{ x}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>f(x)=\log_{ $a}{ $x}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>f(x)=$log</div><br>";
                }
                }elseif(is_numeric($fx) and is_numeric($x)  and empty($a)){
                    $sqrt= pow($x, 1/$fx);
                    if($x>=0){
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=\log_{ a}{ x}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=\log_{ a}{ $x}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    ."<div lang='latex'>$x=a^{ $fx}</div><br>"
                    ."<div lang='latex'>a^{ $fx}=$x</div><br>"
                       . "<div lang='latex'>a=\sqrt[ $fx]{ $x}</div><br>"
                       . "<div lang='latex'>a=$sqrt</div>";
                    }else{
                        echo 'Os valores não são compativeis';
                    }
                }else{
                    echo "Você deve deixar um campo vazio e preencher os outros dois";
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
          
            lerPerg(4,"funclog.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "funclog.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "funclog.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>
