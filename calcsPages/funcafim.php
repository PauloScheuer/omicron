<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Função afim</title>
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
        <h1>Função afim</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p>
                <label style="margin-left:20px;"></label>Uma função afim, ou função linear, é uma função polinomial de grau 1 com formato de f(x)=ax+b.
                O nome de função linear vem do formato de seu gráfico, que corresponde a uma linha
                reta. 
                <br><label style="margin-left:20px;"></label>A variável <i>a</i> representa o coeficiente angular dessa reta, ou seja, determina o ângulo dessa reta
                referente ao eixo x. Em caso de valor zero, temos uma equação contante, significando que para qualquer valor
                de x, y sempre será igual.
                <br><label style="margin-left:20px;"></label>Enquanto isso, <i>b</i> é o coeficiente linear, representando o ponto onde a reta
                corta o eixo y. Se seu valor for igual a zero, a função passará pela origem, ou seja, pelo
                ponto (0,0) do plano cartesiano.
                <br><label style="margin-left:20px;"></label>
                Pode-se dividir uma função afim em dois tipos: crescente e decrescente. Como cada nome diz, uma função crescente
                é aquela em que quanto maior o valor de x usado, maior será o valor de f(x), enquanto na decrescente temos o contrário,
                 com f(x) diminuindo conforme o valor de x aumenta.
                 
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="funcafim.php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br>
            <br><label>f(x)=</label>
            <input type="text" name="fx" class="ia"><br><br>
            <label>a=</label>
            <input type="text" name="a" class="ia"><br><br>
            <label>x=</label>
            <input type="text" name="x" class="ia"><br><br>
            <label>b=</label>
            <input type="text" name="b" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        
        <?php
        if(!empty($_GET['fx'])or!empty($_GET['a'])or!empty($_GET['b'])or!empty($_GET['x'])){
        if(is_numeric($_GET['fx'])or is_numeric($_GET['a'])or is_numeric($_GET['b'])or is_numeric($_GET['x'])){
            $fx=$_GET['fx'];
        $a=$_GET['a'];
        $b=$_GET['b'];
        $x=$_GET['x'];
            if(is_numeric($fx) and is_numeric($a) and is_numeric($b) and empty($x)){
                $sub=$fx-$b;
                $div=$sub/$a;
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=ax+b</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=$a*x+$b</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$fx-$b=$a*x</div><br>"
                    . "<div lang='latex'>$sub=$a*x</div><br>"
                    . "<div lang='latex'>$a*x=$sub</div><br>"
                    . "<div lang='latex'>x=\dfrac{ $sub}{ $a}</div><br>"
                    . "<div lang='latex'>x=$div</div>";
            }elseif (is_numeric($x) and is_numeric($a) and is_numeric($b) and empty($fx)) {
                    $multi=$a*$x;
                $soma=$multi+$b;
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=ax+b</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>f(x)=$a*$x+$b</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>f(x)=$multi+$b</div><br>"
                       . "<div lang='latex'>f(x)=$soma</div><br>";
                }elseif(is_numeric($fx) and is_numeric($x) and is_numeric($b) and empty($a)){
                    $sub=$fx-$b;
                $div=$sub/$x;
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=ax+b</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=a*$x+$b</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$fx-$b=a*$x</div><br>"
                    . "<div lang='latex'>$sub=a*$x</div><br>"
                    . "<div lang='latex'>a*$x=$sub</div><br>"
                    . "<div lang='latex'>a=\dfrac{ $sub}{ $x}</div><br>"
                    . "<div lang='latex'>a=$div</div>";
                }elseif(is_numeric($fx) and is_numeric($x) and is_numeric($a) and empty($b)){
                    $multi=$a*$x;
                $sub=$fx-$multi;
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=ax+b</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=$a*$x+b</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$fx=$multi+b</div><br>"
                    . "<div lang='latex'>$fx-$multi=b</div><br>"
                    . "<div lang='latex'>b=$fx-$multi</div><br>"
                    . "<div lang='latex'>b=$sub</div><br>";
                }else{
                    echo "Você deve deixar um campo vazio e preencher os outros três";
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
          
            lerPerg(1,"funcafim.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "funcafim.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "funcafim.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>


