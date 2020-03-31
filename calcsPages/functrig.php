<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Funções trigonométricas</title>
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
        <h1>Funções trigonométricas</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
                <p>
                    <label style="margin-left:20px;"></label>
                    As funções trigonométricas são funções relacionadas com o círculo trigonométrico. As principais delas e que serão
                    abordadas nessa página são as funções seno, cosseno e tangente.
                    <br><label style="margin-left:20px;"></label>
                    A função seno é uma função periódica (que seu comportamento se repete) com período de 360° ou 2π radianos. O valor de f(x)
                    é positivo quando x passa pelo primeiro e segundo quadrantes do círculo trigonométrico, enquanto ao passar pelo terceiro e quarto quadrantes
                    seu valor é negativo.
                    <br><label style="margin-left:20px;"></label>
                    A função cosseno, assim como a seno, também é periódica, com período de 360° ou 2π radianos. O valor de f(x)
                    é positivo quando x passa pelo primeiro e quarto quadrantes do círculo trigonométrico, enquanto ao passar pelo segundo e terceiro quadrantes
                    seu valor é negativo.
                    <br><label style="margin-left:20px;"></label>
                    Vale ressaltar que tanto para função seno quanto para a cosseno, os valores de f(x) estão contidos no intervalo entre -1 e 1, não
                    podendo assumir valores superiores ou inferiores a esses limites.
                    <br><label style="margin-left:20px;"></label>
                    Por último, temos a função tangente, que é o resultado da divisão entre seno e cosseno. Essa função também é periódica,
                    mas tendo um período maior que as duas últimas: 180° ou π radianos. O sinal de f(x) é positivo quando seno e cosseno possuem o mesmo
                    sinal, ou seja, no primeiro e terceiro quadrantes. Para o segundo e quarto quadrantes, onde seno e cosseno assumem sinais diferente, a tangente
                    é negativa.
                </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
            <form action="functrig.php" method="GET">
                <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
                <label>f(x)=</label>
                <input type="text" name="fx" class="ia"><br><br>
                <label>Função trigonométrica:</label>
                <select class="ia" name=func>
                    <option value="sen" >Seno</option>
                    <option value="cos">Cosseno</option>
                    <option value="tg">Tangente</option>
                </select><br><br>
                <label>x=</label>
                <input type="text" name="x" class="ia"><br><br>
                <input type="submit" value="Calcular" class="enviarb">
            </form>
        <?php
        if(!empty($_GET['fx'])or!empty($_GET['func'])or!empty($_GET['x'])){
        if(is_numeric($_GET['fx'])or is_numeric($_GET['x'])){
            $fx=$_GET['fx'];
        $func=$_GET['func'];
        $x=$_GET['x'];
        if($func=="sen"){
            if(is_numeric($fx) and empty($x)){
                if($fx<=1 and $fx>=-1){
                $arcsen= asin($fx);
                $multi=$arcsen*180;
                $div=$multi/pi();
                
                echo "Fórmula: "
            . "<div lang='latex'>f(x)=sen(x)</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=sen(x)</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>x=arcsen($fx)</div><br>"
                    . "<div lang='latex'>x=$div</div><br>"
                    ;
                }else{
                    echo "O valor de fx não é compativel";
                }
            }elseif(is_numeric($x) and empty($fx)){
                $multi=$x* pi();
                $div=$multi/180;
                $senx= sin($div);
                echo "Fórmula: "
            . "<div lang='latex'>f(x)=sen(x)</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>fx=sen($x)</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>fx=$senx</div><br>"
                    ;
            }
        }elseif($func=="cos"){
            if(is_numeric($fx) and empty($x)){
                if($fx<=1 and $fx>=-1){
                $arccos= acos($fx);
                $multi=$arccos*180;
                $div=$multi/pi();
                echo "Fórmula: "
            . "<div lang='latex'>f(x)=cos(x)</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=cos(x)</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>x=arccos($fx)</div><br>"
                    . "<div lang='latex'>x=$div</div><br>"
                    ;
                }else{
                    echo 'Valor de fx não é compativel';
                }
            }elseif(is_numeric($x) and empty($fx)){
                $multi=$x* pi();
                $div=$multi/180;
                $cosx= cos($div);
                echo "Fórmula: "
            . "<div lang='latex'>f(x)=cos(x)</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>fx=cos($x)</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>fx=$cosx</div><br>"
                    ;
            }
                }elseif($func=="tg"){
            if(is_numeric($fx) and empty($x)){
                $arctg= atan($fx);
                $multi=$arctg*180;
                $div=$multi/pi();
                echo "Fórmula: "
            . "<div lang='latex'>f(x)=tg(x)</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=tg(x)</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>x=arctg($fx)</div><br>"
                    . "<div lang='latex'>x=$div</div><br>"
                    ;
            }elseif(is_numeric($x) and empty($fx)){
                $multi=$x* pi();
                $div=$multi/180;
                $cosx= cos($div);
                $multi2=$x* pi();
                $div2=$multi/180;
                $senx= sin($div);
                $divu=$cosx/$senx;
                echo "Fórmula: "
            . "<div lang='latex'>f(x)=cos(x)</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>f(x)=tg($x)</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>f(x)=\dfrac{ cos($x)}{ sen($x)}</div><br>"
                    . "<div lang='latex'>f(x)=\dfrac{ $cosx}{ $senx}</div><br>"
                    . "<div lang='latex'>f(x)=$divu</div><br>"
                    ;
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
          
            lerPerg(14,"functrig.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "functrig.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "functrig.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>