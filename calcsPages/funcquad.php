<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Função quadrática</title>
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
        
        <div class="geral">
            <?php
            include '../commons/header.php';
            include '../commons/menu.php';
            ?>
    
        <div class="corpo">
            <center>
        <h1>Função quadrática</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p>
                <label style="margin-left:20px;"></label>Uma função quadrática é uma função polinomial de grau 2 com formato de
                f(x)=ax²+bx+c, tendo seu gráfico no formato de parábola.
                <br><label style="margin-left:20px;"></label>
                Para se caracterizar verdadeiramente como uma função quadrática, <i>a</i> deve ser diferente de 0, pois com esse valor 
                teriamos f(x)=bc+c, que representa uma função afim. Além disso, a,b e c devem ser números naturais.
                <br><label style="margin-left:20px;"></label>
                O método mais utilizado para resoluções desse tipo de função é a <i>baskara</i> (usado em nossa
                calculadora). Por ela, é possível encontrar as raízes da função, ou seja, os valores de x quando a parábola corta
                o eixo x.
                <br><label style="margin-left:20px;"></label>
                Quanto ao gráfico da função, pode-se dividir entre dois tipos: Os com a concavidade voltada para cima e aqueles com
                ela voltada para baixo. Se a>0, temos a concavidade para cima, enquanto a<0 gera uma para baixo. Assim, há outro ponto
                interessante no gráfico: o vértice da parábola, seu valor mínimo ou máximo. Esse valor, junto as raízes da função, é necessário
                para o esboço do gráfico (em nossa calculadora, é ensinado como chegar nesse valor).
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="funcquad.php" method="GET">
<br><label>Preencha os três campos:</label><br>            
            <br><label>a=</label>
            <input type="text" name="a" class="ia"><br><br>
            <label>b=</label>
            <input type="text" name="b" class="ia"><br><br>
            <label>c=</label>
            <input type="text" name="c" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb" >
        </form>
        <?php
        if (!empty($_GET['a'])) {

            $a = $_GET['a'];
            $b = $_GET['b'];
            $c = $_GET['c'];
            if (is_numeric($a)and is_numeric($b) and is_numeric($c)) {
                $d = (($b) * ($b)) - (4 * $a * $c);
                if ($d > 0) {
                    echo "Fórmula: <br><div lang='latex'>\Delta = b^2-4.a.c</div><br>"
                    . "Nesse caso temos:<br><div lang='latex'>\Delta = $b^2-4.$a.$c</div><br>";
                    echo "<div lang='latex'>\Delta = $d</div><br>";
                    echo "Agora para termos o valor das raízes, temos <div lang='latex'>x= {-b \pm \sqrt{\Delta} \over 2.a}</div>";
                    echo "<br><div lang='latex'>x={-($b) \pm \sqrt{$d} \over 2.$a}</div><br>";
                    $x1 = ((-$b) + (sqrt($d))) / (2 * $a);
                    $x2 = ((-$b) - (sqrt($d))) / (2 * $a);
                    echo "<div lang='latex'>x'=$x1</div><br><div lang='latex'>x''=$x2</div>";
                    $vx = -$b / (2 * $a);
                    $vy = -$d / (4 * $a);
                    if ($a > 0) {
                        echo "<br>A concavidade da parábola está voltada para cima." . "<br>";
                    } else {
                        echo "A concavidade da parábola está voltada para baixo." . "<br>";
                    }
                    echo "As coordenadas do vertíce são:"
                    . "<div lang='latex'>Vx=\dfrac{-(b)}{2a}</div><br>"
                    . "<div lang='latex'>Vx=\dfrac{-($b)}{2.$a}</div><br>"
                    . "<div lang='latex'>Vx=$vx</div>" . "<br><br>"
                    . "<div lang='latex'>Vy=\dfrac{-\Delta}{4a}</div><br>"
                    . "<div lang='latex'>Vy=\dfrac{-$d}{4.$a}</div><br>"
                    . "<div lang='latex'>Vy=$vy</div>";
                } elseif ($d == 0) {
                    echo "Fórmula: <br><div lang='latex'>\Delta = b^2-4.a.c</div><br>"
                    . "Nesse caso temos:<br><div lang='latex'>\Delta = $b^2-4.$a.$c</div><br>";
                    echo "<div lang='latex'>\Delta = $d</div><br>";
                    echo "Agora para termos o valor das raízes, temos <div lang='latex'>x= {-b \pm \sqrt{\Delta} \over 2.a}</div>";
                    echo "<br><div lang='latex'>x={-($b) \pm \sqrt{$d} \over 2.$a}</div><br>";
                    $x = ((-$b) + (sqrt($d))) / (2 * $a);
                    echo "<div lang='latex'>x'=x''=$x</div>";
                } else {
                    echo "Fórmula:<br><div lang='latex'>\Delta = b^2-4.a.c</div><br>"
                    . "Assim temos:<br><div lang='latex'>\Delta = $b^2-4.$a.$c</div>" . "<br>";
                    echo "<div lang='latex'>\Delta = $d</div>" . "<br>";
                    echo "Como delta é negativo, não há raízes reais";
                }
            }
        } else {
            echo "Insira valores numéricos";
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
          
            lerPerg(2,"funcquad.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "funcquad.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "funcquad.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>



        