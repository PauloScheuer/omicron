<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Função exponencial</title>
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
        <h1>Função exponencial</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p>
                <label style="margin-left:20px;"></label>Uma função exponencial é aquela onde o x, que representa a variável, está
                no expoente, e não na base. Na calculadora encontrada nessa página, usa-se o formato f(x)=a<sup>x</sup>+b,
                pelo <i>b</i> permitir a existência de um valor inicial, o que é útil em certos casos que a função exponencial
                engloba.
                <br><label style="margin-left:20px;"></label>Para ser uma função exponencial, há certas restrições de valores. Para <i>
                    a</i>, não são possíveis valores negativos, o 0 e o 1. A restrição aos números negativos se deve
                    a possibilidade do expoente representar uma raíz que não possua valores reais em caso de números negativos.
                    Para o 0, a explicação vem da exponenciação: se x for 0 e tivermos então 0<sup>0</sup>, teria-se um valor indeterminado.
                    Quanto ao 1, o motivo é que ele, elevado a qualquer número, é igual a 1, então teria-se uma função constante.
                <br><label style="margin-left:20px;"></label>Por fim, uma função exponencial pode ser classificada, assim como a afim, 
                como crescente ou decrescente. Para saber qual a classificação, basta observar o valor de <i>a</i>. Quando a>1, a função
                é crescente, enquanto a<1 gera uma função decrescente.
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="funcexp.php" method="GET">
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
        if(!empty($_GET['fx'])or!empty($_GET['a'])or!empty($_GET['x'])or!empty($_GET['b'])){
        if(is_numeric($_GET['fx'])or is_numeric($_GET['a'])or is_numeric($_GET['x'])or is_numeric($_GET['b'])){
            $fx=$_GET['fx'];
        $a=$_GET['a'];
        $x=$_GET['x'];
        $b=$_GET['b'];
            if(is_numeric($fx) and is_numeric($a) and is_numeric($b) and empty($x)){
                if($a==1 or $a<=0 or $fx<=0 or (($fx-b)<=0)){
                    echo "Os valores não são compativeis";
                }else{
                    $sub=$fx-$b;
                    $log= log($sub,$a);
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=a^{x}+b</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=$a^{x}+$b</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$fx-$b=$a^{x}</div><br>"
                    . "<div lang='latex'>$sub=$a^{x}</div><br>"
                    . "<div lang='latex'>x=\log_{ $a}{ $sub}</div><br>"
                    . "<div lang='latex'>x=$log</div>";
                }
            }elseif (is_numeric($x) and is_numeric($a) and is_numeric($b) and empty($fx)) {
                if($a==1 or $a<=0 ){
                    echo "Os valores não são compativeis";
                }else{
                    $pot= pow($a, $x);
                    $soma= $pot+$b;
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=a^{x}+b</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>f(x)=$a^{ $x}+$b</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>f(x)=$pot+$b</div>"
               . "<div lang='latex'>f(x)=$soma</div>";
                }
                }elseif(is_numeric($fx) and is_numeric($x) and is_numeric($b) and empty($a)){
                    
                    $sub=$fx-$b;
                    $sqrt= pow($sub, 1/$x);
                    if(($fx-$b )>0){
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=a^{x}+b</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=a^{ $x}+$b</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    ."<div lang='latex'>$fx-$b=a^{ $x}</div><br>"
                    ."<div lang='latex'>$sub=a^{ $x}</div><br>"
                       . "<div lang='latex'>a^{ $x}=$sub</div><br>"
                       . "<div lang='latex'>a=\sqrt[ $x]{ $sub}</div><br>"
                       . "<div lang='latex'>a=$sqrt</div>";
                    }else{
                        echo 'Os valores não são compativeis';
                    }
                }elseif(is_numeric($fx) and is_numeric($x) and is_numeric($a) and empty($b)){
                    if($a==1 or $a<=0 or $fx<=0){
                        echo 'Os valores não são compativeis';
                    }else{
                    $pot= pow($a, $x);
                    $sub=$fx-$pot;
               echo "Fórmula: "
            . "<div lang='latex'>f(x)=a^{x}+b</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$fx=$a^{ $x}+b</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    ."<div lang='latex'>$fx=$pot+b</div><br>"
                    ."<div lang='latex'>$fx-$pot=b</div><br>"
                       . "<div lang='latex'>b=$fx-$pot</div><br>"
                       . "<div lang='latex'>b=$sub</div><br>";
                    }
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
          
            lerPerg(3,"funcexp.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "funcexp.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "funcexp.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>

