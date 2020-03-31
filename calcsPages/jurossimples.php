<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Juros simples</title>
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
        <h1>Juros simples</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
                <p>
                    <label style="margin-left:20px;"></label>
                    O juro (J) é um valor cobrado como remuneração ou compensação em cima de uma compra ou empréstimo, ou seja, operações
                    que envolvam dinheiro no geral. Outros conceitos importantes de se saber ao ter um primeiro contato com esse contéudo
                    são o de capital inicial (C), o valor empregado inicialmente na operação, o de montante (M), a soma do capital com os juros,
                    e o de taxa (i),
                    a parte do capital que se transformará em juros. Além desses valores, temos o tempo (t), que deve estar sempre proporcional
                    a taxa (por exemplo, se a taxa é cobrada ao mês, o tempo estará em meses).
                    <br><label style="margin-left:20px;"></label>
                    No caso de juros simples, temos que a taxa é cobrada sempre em cima do valor inicial, de C, tendo então
                    sua fórmula como
                    J = C*i*t. O montante de uma operação a juros simples é de M = C + C.i.t, uma fórmula que possui o formato de
                    uma função afim, e portanto, seu gráfico é linear.
                    
                </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            <form action="jurossimples.php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>J=</label>
            <input type="text" name="j" class="ia"><br><br>
            <label>C=</label>
            <input type="text" name="c" class="ia"><br><br>
            <label>i(decimal)=</label>
            <input type="text" name="i" class="ia"><br><br>
            <label>t=</label>
            <input type="text" name="t" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        
        <?php
        if(!empty($_GET['j'])or!empty($_GET['c'])or!empty($_GET['i'])or!empty($_GET['t'])){
        if(is_numeric($_GET['j'])or is_numeric($_GET['c'])or is_numeric($_GET['i'])or is_numeric($_GET['t'])){
            $j=$_GET['j'];
        $c=$_GET['c'];
        $i=$_GET['i'];
        $t=$_GET['t'];
            if(is_numeric($j) and is_numeric($c) and is_numeric($i) and empty($t)){
                $multi=$c*$i;
                $div=$j/$multi;
               echo "Fórmula: "
            . "<div lang='latex'>J=C*i*t</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$j=$c*$i*t</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$j=$multi*t</div><br>"
                    . "<div lang='latex'>\dfrac{ $j}{ $multi}=t</div><br>"
                    . "<div lang='latex'>t=\dfrac{ $j}{ $multi}</div><br>"
                    . "<div lang='latex'>t=$div</div><br>";
            }elseif (is_numeric($j) and is_numeric($c) and is_numeric($t) and empty($i)) {
                    $multi=$c*$t;
                $div=$j/$multi;
               echo "Fórmula: "
            . "<div lang='latex'>J=C*i*t</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$j=$c*i*$t</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$j=$multi*i</div><br>"
                    . "<div lang='latex'>\dfrac{ $j}{ $multi}=i</div><br>"
                    . "<div lang='latex'>i=\dfrac{ $j}{ $multi}</div><br>"
                    . "<div lang='latex'>i=$div</div><br>";
                }elseif(is_numeric($j) and is_numeric($i) and is_numeric($t) and empty($c)){
                    $multi=$t*$i;
                $div=$j/$multi;
               echo "Fórmula: "
            . "<div lang='latex'>J=C*i*t</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$j=c*$i*$t</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$j=$multi*c</div><br>"
                    . "<div lang='latex'>\dfrac{ $j}{ $multi}=c</div><br>"
                    . "<div lang='latex'>c=\dfrac{ $j}{ $multi}</div><br>"
                    . "<div lang='latex'>c=$div</div><br>";
                }elseif(is_numeric($c) and is_numeric($i) and is_numeric($t) and empty($j)){
                    $multi=$c*$i*$t;
               echo "Fórmula: "
            . "<div lang='latex'>J=C*i*t</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>J=$c*$i*$t</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>J=$multi</div><br>";
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
          
            lerPerg(16,"jurossimples.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "jurossimples.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "jurossimples.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>