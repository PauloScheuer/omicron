<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Juros compostos</title>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/calcs.css" />
        <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    </head>
    <body>
        
        <div class="geral"><?php
    include '../commons/header.php';
    include '../commons/menu.php'; ?>
    
        <div class="corpo">
            <center>
        <h1>Juros compostos</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <label style="margin-left:20px;"></label>
                    O juro (J) é um valor cobrado como remuneração ou compensação em cima de uma compra ou empréstimo, ou seja, operações
                    que envolvam dinheiro no geral. Outros conceitos importantes de se saber ao ter um primeiro contato com esse contéudo
                    são o de capital inicial (C), o valor empregado inicialmente na operação, o de montante (M), a soma do capital com os juros,
                    e o de taxa (i),
                    a parte do capital que se transformará em juros. Além desses valores, temos o tempo (t), que deve estar sempre proporcional
                    a taxa (por exemplo, se a taxa é cobrada ao mês, o tempo estará em meses).
                    <br><label style="margin-left:20px;"></label>
                    No caso de juros compostos, temos que a taxa é cobrada sempre em cima do valor atual da aplicação, ou seja, é um tipo 
                    de operação onde há juros sobre juros. A fórmula do montante de uma operação a juros compostos é de M = C*(1+i)<sup>t</sup>, que
                    por possuir o formato de uma função exponencial, tem seu gráfico dessa maneira.
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            <form action="juroscomposto.php" method="GET">
                <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>M=</label>
            <input type="text" name="m" class="ia"><br><br>
            <label>C=</label>
            <input type="text" name="c" class="ia"><br><br>
            <label>i=</label>
            <input type="text" name="i" class="ia"><br><br>
            <label>t=</label>
            <input type="text" name="t" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        
        <?php
        if(!empty($_GET['m'])or!empty($_GET['c'])or!empty($_GET['i'])or!empty($_GET['t'])){
        if(is_numeric($_GET['m'])or is_numeric($_GET['c'])or is_numeric($_GET['i'])or is_numeric($_GET['t'])){
            $m=$_GET['m'];
        $c=$_GET['c'];
        $i=$_GET['i'];
        $t=$_GET['t'];
            if(is_numeric($m) and is_numeric($c) and is_numeric($i) and empty($t)){
                $soma=$i+1;
                $div=$m/$c;
                $log= log($div, $soma);
               echo "Fórmula: "
            . "<div lang='latex'>M=C*(1+i)^{ t}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$m=$c*(1+$i)^{ t}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$m=$c*($soma)^{ t}</div><br>"
                    . "<div lang='latex'>\dfrac{ $m}{ $c}=$soma^{ t}</div><br>"
                    . "<div lang='latex'>$div=$soma^{ t}</div><br>"
                    . "<div lang='latex'>t=\log_{ $soma}{ $div}</div><br>"
                    . "<div lang='latex'>t=$log</div><br>";
            }elseif (is_numeric($m) and is_numeric($c) and is_numeric($t) and empty($i)) {
                $div=$m/$c;
                $raiz= pow($div, (1/$t));
                $sub=$raiz-1;
               echo "Fórmula: "
            . "<div lang='latex'>M=C*(1+i)^{ t}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$m=$c*(1+i)^{ $t}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>\dfrac{ $m}{ $c}=(1+i)^{ $t}</div><br>"
                    . "<div lang='latex'>$div=(1+i)^{ $t}</div><br>"
                    . "<div lang='latex'>\sqrt[ $t]{ $div}=1+i</div><br>"
                    . "<div lang='latex'>1+i=\sqrt[ $t]{ $div}</div><br>"
                    . "<div lang='latex'>1+i=$raiz</div><br>"
                    . "<div lang='latex'>i=$raiz-1</div><br>"
                    . "<div lang='latex'>i=$sub</div><br>";
                }elseif(is_numeric($m) and is_numeric($i) and is_numeric($t) and empty($c)){
                    $soma=$i+1;
                $pot= pow($soma, $t);
                $div=$m/$pot;
               echo "Fórmula: "
            . "<div lang='latex'>M=C*(1+i)^{ t}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$m=c*(1+$i)^{ $t}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$m=c*($soma)^{ $t}</div><br>"
                    . "<div lang='latex'>$m=c*$pot</div><br>"
                    . "<div lang='latex'>\dfrac{ $m}{ $pot}=c</div><br>"
                    . "<div lang='latex'>c=\dfrac{ $m}{ $pot}</div><br>"
                    . "<div lang='latex'>c=$div</div><br>";
                }elseif(is_numeric($c) and is_numeric($i) and is_numeric($t) and empty($m)){
                    $soma=$i+1;
                $pot= pow($soma, $t);
                $multi=$c*$pot;
               echo "Fórmula: "
            . "<div lang='latex'>M=C*(1+i)^{ t}</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>M=$c*(1+$i)^{ $t}</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>M=$c*($soma)^{ $t}</div><br>"
                    . "<div lang='latex'>M=$c*$pot</div><br>"
                    . "<div lang='latex'>M=$multi</div><br>";
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
          
            lerPerg(17,"juroscomposto.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "juroscomposto.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "juroscomposto.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>