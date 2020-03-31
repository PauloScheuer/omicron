<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pitágoras</title>
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
        
        <div class="geral"><?php
    include '../commons/header.php';
    include '../commons/menu.php'; ?>
    
        <div class="corpo">
            <center>
        <h1>Pitágoras</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p>
                <label style="margin-left:20px;"></label>
                Em um triângulo retângulo, chamamos os dois lados adjacentes ao ângulo reto (de 90°) de catetos e o lado
                oposto a esse ângulo de hipotenusa. A fórmula de Pitágoras se trata de uma relação entre esses três lados.
                Tal relação se dá de maneira que a soma dos quadrados dos catetos é igual ao quadrado da hipotenusa.
                <br><label style="margin-left:20px;"></label>
                Chamando a hipotenusa de c e os dois de catetos de a e b, temos que a<sup>2</sup>+b<sup>2</sup> = c<sup>2</sup>. 
                Para exemplificar essa fórmula, uma das relações mais famosa é a entre os números 3,4, e 5. Sendo 3 e 4 os valores 
                dos catetos, temos que 3<sup>2</sup>+4<sup>2</sup>=5<sup>2</sup>. Usando dois desses valores na calculadora dessa
                página, você poderá observar essa relação.
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="pitagoras.php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>A(cateto):</label>
            <input type="text" name="a" class="ia"><br><br>
            <label>B(cateto):</label>
            <input type="text" name="b" class="ia"><br><br>
            <label>C(hipotenusa):</label>
            <input type="text" name="c" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        if(!empty($_GET['a'])or!empty($_GET['b'])or!empty($_GET['c'])){
        $a=$_GET['a'];
        $b=$_GET['b'];
        $c=$_GET['c'];
        if(is_numeric($b) and is_numeric($c)and empty($a)){
            $b2=$b*$b;
            $c2=$c*$c;
            $sub=$c2-$b2;
            $raiz= sqrt($sub);
            echo "Fórmula de pitágoras: "
            . "<div lang='latex'>a^2+b^2=c^2</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>a^2+$b^2=$c^2</div><br>"
                    . "Assim, efetuando as potências, ficamos com:"
                    . "<div lang='latex'>a^2+$b2=$c2</div><br>"
                    . "<div lang='latex'>a^2=$c2-$b2</div><br>"
                    . "<div lang='latex'>a^2=$sub</div><br>"
                    . "<div lang='latex'>a=\sqrt{$sub}</div><br>"
                    . "<div lang='latex'>a=$raiz</div>";
        }elseif (is_numeric($a)and is_numeric($c)and empty($b)) {
                $a2=$a*$a;
            $c2=$c*$c;
            $sub=$c2-$a2;
            $raiz= sqrt($sub);
            echo "Fórmula de pitágoras: "
            . "<div lang='latex'>a^2+b^2=c^2</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$a^2+b^2=$c^2</div><br>"
                    . "Assim, efetuando as potências, ficamos com:"
                    . "<div lang='latex'>$a2+b^2=$c2</div><br>"
                    . "<div lang='latex'>b^2=$c2-$a2</div><br>"
                    . "<div lang='latex'>b^2=$sub</div><br>"
                    . "<div lang='latex'>b=\sqrt{$sub}</div><br>"
                    . "<div lang='latex'>b=$raiz</div>";
            } elseif(is_numeric($a)and is_numeric($b)and empty($c)) {
                $a2=$a*$a;
            $b2=$b*$b;
            $soma=$a2+$b2;
            $raiz= sqrt($soma);
            echo "Fórmula de pitágoras: "
            . "<div lang='latex'>a^2+b^2=c^2</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$a^2+$b^2=c^2</div><br>"
                    . "Assim, efetuando as potências, ficamos com:"
                    . "<div lang='latex'>$a2+$b2=c^2</div><br>"
                    . "<div lang='latex'>$soma=c^2</div><br>"
                    . "<div lang='latex'>c^2=$soma</div><br>"
                    . "<div lang='latex'>c=\sqrt{$soma}</div><br>"
                    . "<div lang='latex'>c=$raiz</div>";
            } else{
                echo 'Você deve preencher dois campos com números e deixar o outro vazio!'; 
            }
        }else{
          echo '';  
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
          
            lerPerg(13,"pitagoras.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "pitagoras.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "pitagoras.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>