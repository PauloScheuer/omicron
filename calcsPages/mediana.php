<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mediana</title>
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
        <h1>Mediana</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <label style="margin-left:20px;"></label>
                A estatística é a ciência responsável por, principalmente, analisar dados, 
                sendo considerada até mesmo uma área separada da matemática.
                É utilizada para descobrir alguma tendência ou característica de um agrupamento de 
                indivíduos ou eventos. Suas principais medidas vistas no ensino médio são a média, moda e mediana.
                <br><label style="margin-left:20px;"></label>
                A mediana é uma medida de tendência central que representa o termo central do conjunto quando em ordem 
                crescente. Em caso de conjuntos com quantidade de números pares, a mediana é a média entre os dois termos centrais.
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            <form action="mediana.php" method="GET">
                <br><label>Nº de elementos=</label>
            <select class="ia" name="num">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                
            </select>
            <input type="submit" value="Enviar" class="enviarb">
        </form>
            
        <?php
        
        if(!empty($_GET['num'])){
            $c=$_GET['num'];
            $i=1;
            while ($i<=$c){
                echo '<form action="mediana.php" method="GET">';
                ?>
            
            <input type="text" class="ia" name="n<?php echo $i; ?>" >
            <input type="hidden" value="<?php echo $c ?>" name="cont">
            <?php 
            $i++;
            }echo "<br><input type='submit' value='Calcular' name='enviar' class='enviarb'></form>";
        } ?>
        <?php
        if(!empty($_GET['enviar'])){
        if(is_numeric($_GET['n1'])){
            $j=1;
            $c=$_GET['cont'];
            $array=[];
            
            while ($j<=$c){
                
            if(empty($_GET["n$j"])){
                $array[$j]=0;
            }else{
                $array[$j]=$_GET["n$j"];
            }
                $j++;
            }
            sort($array);
             if(($c % 2)==0){
                 $a=($c/2)-1;
                 $b=$a+1;
                 $med=($array[$a]+$array[$b])/2;
                 echo "Fórmula da mediana:<br>(Par) "
            . "<div lang='latex'>M_e=\dfrac{ (a_{ n/2} + a_{ n/2+1})}{ 2}</div><br>"
             . "Nesse caso, temos:"
             ."<div lang='latex'>M_e=\dfrac{ ($array[$a] + $array[$b])}{ 2}</div><br>"
                  ."<div lang='latex'>M_e=$med</div><br>";
             }else{
                 $d=($c/2);
                 $med=$array[$d];
                  echo "Fórmula da mediana:<br>(Ímpar) "
            . "<div lang='latex'>M_e= a_{ n/2+1}</div><br>"
             . "Nesse caso, temos:"
             ."<div lang='latex'>M_e=$med</div><br>";
             }
               
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
          
            lerPerg(22,"mediana.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "mediana.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "mediana.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>