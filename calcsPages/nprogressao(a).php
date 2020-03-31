<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PA - termo geral</title>
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
        <h1>PA - termo geral</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p><label style="margin-left:20px;"></label>
                Uma PA, ou progressão aritmética, é um tipo de sequência que cresce conforme uma razão <i>r</i>. Essa
                razão representa a diferença entre cada termo e seu anterior na sequência. Além de r, outros elementos em uma
                PA são o n (número de termos), o a<sub>1</sub> (termo inicial) e o a<sub>n</sub>, o termo geral. 
                 <br><label style="margin-left:20px;"></label>
                 Nessa página,
                 será abordado o cálculo do termo geral de uma PA, que nada mais é
                 do que o termo que a sequência assume quando <i>n</i> chegar a um valor específico.
                 
                 Esse cálculo é realizado pela seguinte fórmula: a<sub>n</sub> = a<sub>1</sub>+(n-1)r . 
                <br><label style="margin-left:20px;"></label>
                Observando a fórmula do termo geral de uma PA, pode-se observar sua relação com a fórmula de uma função afim.
                Essa relação resulta em um gráfico para a PA nos mesmos moldes de um gráfico de um função de primeiro grau, sendo
                representado por uma linha reta.
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            
        <form action="nprogressao(a).php" method="GET">
            <br><label>Deixe o campo que você quer descobrir em branco:</label><br><br>
            <label>a<sub>n</sub>=</label>
            <input type="text" name="an" class="ia"><br><br>
            <label>a<sub>1</sub>=</label>
            <input type="text" name="a1" class="ia"><br><br>
            <label>n=</label>
            <input type="text" name="n" class="ia"><br><br>
            <label>r=</label>
            <input type="text" name="r" class="ia"><br><br>
            <input type="submit" value="Calcular" class="enviarb">
        </form>
        <?php
        if(!empty($_GET['an'])or!empty($_GET['a1'])or!empty($_GET['n'])or!empty($_GET['r'])){
        if(is_numeric($_GET['an'])or is_numeric($_GET['a1'])or is_numeric($_GET['n'])or is_numeric($_GET['r'])){
        $an=$_GET['an'];
        $a1=$_GET['a1'];
        $n=$_GET['n'];
        $r=$_GET['r'];
        if(is_numeric($a1) and is_numeric($n) and is_numeric($r)and empty($an)){
            if(ctype_digit($n) and $n>0){
            $nsub1=$n-1;
            $multir=$nsub1*$r;
            $soma=$multir+$a1;
            echo "Fórmula do termo geral: "
            . "<div lang='latex'>a_{n}=a_{1}+(n-1)r</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>a_{ $n}=$a1+($n-1)$r</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>a_{ $n}=$a1+($nsub1)$r</div><br>"
                    . "<div lang='latex'>a_{ $n}=$a1+$multir</div><br>"
                    . "<div lang='latex'>a_{ $n}=$soma</div>";
            }else{
                echo 'N deve ser maior que 0';
            }
        }elseif (is_numeric($an)and is_numeric($n) and is_numeric($r)and empty($a1)) {
            if(ctype_digit($n) and $n>0){
                $nsub1=$n-1;
            $multir=$nsub1*$r;
            $sub=$an-$multir;
            echo "Fórmula do termo geral: "
            . "<div lang='latex'>a_{n}=a_{1}+(n-1)r</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$an=a1+($n-1)$r</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$an=a1+($nsub1)$r</div><br>"
                    . "<div lang='latex'>$an=a1+$multir</div><br>"
                    . "<div lang='latex'>$an-$multir=a1</div><br>"
                    . "<div lang='latex'>a1=$an-$multir</div><br>"
                    . "<div lang='latex'>a1=$sub</div>";
            } else {
            echo 'N deve ser maior que 0';    
            }
            } elseif (is_numeric($an)and is_numeric($a1)and is_numeric($r)and empty($n)) {
            if($r==0){
                echo 'Impossível realizar o calculo';
            }else{
                $a1subr=$a1-$r;
            $ansub=$an-$a1subr;
            $div=$ansub/$r;
            if($div<=0 or !is_int($div)){
                echo 'Não existe essa PA';
            }else{
            echo "Fórmula do termo geral: "
            . "<div lang='latex'>a_{n}=a_{1}+(n-1)r</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$an=$a1+(n-1)$r</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$an=$a1+($r n-$r)</div><br>"
                    . "<div lang='latex'>$an=$a1-$r+$r n</div><br>"
                    . "<div lang='latex'>$an=$a1subr+$r n</div><br>"
                    . "<div lang='latex'>$an-$a1subr=$r n</div><br>"
                    . "<div lang='latex'>$r n=$an-$a1subr</div><br>"
                    . "<div lang='latex'>$r n=$ansub</div><br>"
                    . "<div lang='latex'>n= \dfrac{ $ansub}{ $r}</div><br>"
                    . "<div lang='latex'>n=$div</div>";
            }
            }
            } elseif(is_numeric($an)and is_numeric($a1)and is_numeric($n) and empty($r)) {
                if(ctype_digit($n) and $n>0){
            $nsub1=$n-1;
            $ansuba1=$an-$a1;
            $div=$ansuba1/$nsub1;
            echo "Fórmula do termo geral: "
            . "<div lang='latex'>a_{n}=a_{1}+(n-1)r</div><br>"
                    . "Nesse caso, temos:"
                    . "<div lang='latex'>$an=$a1+($n-1)r</div><br>"
                    . "Assim, efetuando os cálculos, obtemos :"
                    . "<div lang='latex'>$an=$a1+($nsub1)r</div><br>"
                    . "<div lang='latex'>$an-$a1=$nsub1*r</div><br>"
                    . "<div lang='latex'>$ansuba1=$nsub1*r</div>"."<br>"
                    . "<div lang='latex'>\dfrac{ $ansuba1}{ $nsub1}=r</div><br>"
                    . "<div lang='latex'>r=\dfrac{ $ansuba1}{ $nsub1}</div>"."<br>"
                    . "<div lang='latex'>r=$div</div>";
                }else{
                echo 'N deve ser maior que 0';
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
          
            lerPerg(5,"nprogressao(a).php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "nprogressao(a).php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "nprogressao(a).php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>