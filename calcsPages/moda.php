<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Moda</title>
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
        <h1>Moda</h1>
            </center>
                <div class="texto"><h3>Conceito:</h3>
            <fieldset>
                
            <p>
                <label style="margin-left:20px;"></label>
                A estatística é a ciência responsável por, principalmente, analisar dados, 
                sendo considerada até mesmo uma área separada da matemática.
                É utilizada para descobrir alguma tendência ou característica de um agrupamento de 
                indivíduos ou eventos. Suas principais medidas vistas no ensino médio são a média, moda e mediana.
                <br><label style="margin-left:20px;"></label>
                A moda é uma medida de tendência central 
                que representa o número que mais vezes se repete no conjunto de elementos analisado.
            </p>
             </fieldset>
        </div>
        <div class="calc"><h3>Calculadora:</h3>
        <fieldset>
            <form action="moda.php" method="GET">
            <label>Nº de elementos=</label>
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
            echo '<form action="moda.php" method="GET">';
            $c=$_GET['num'];
            $i=1;
            while ($i<=$c){?>
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
            
            
            $controle2=1;
            $paraModa=[];
            while ($controle2<=$c){
                $controle1=1;
            $paraModa[$controle2]=0;
            while ($controle1<=$c){
                if($array[$controle2]==$array[$controle1]){
                    $paraModa[$controle2]++;
                }
                $controle1++;
            }
            $controle2++;
            }
            $max= max($paraModa);
            $moda= array_search($max, array_keys($paraModa));
            if($moda==0){
                echo "Nesse caso, temos que essa amostra é amodal";
            }else{
                $r=$array[$moda+1];
                echo " A moda desse conjunto é $r ";
                
            echo "<p style='font-size:10px;'>*Em caso de mais de uma moda, o sistema identifica apenas uma</p>";
            
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
          
            lerPerg(21,"moda.php");
            if (!empty($_GET['titu'])) {
            $titu = $_GET['titu'];
            $texto = $_GET['texto'];
            $conteudo = $_GET['conteudo'];
            $data=$_GET['data'];
            InserirPerg($titu, $texto, $conteudo, $data, "moda.php");
            }
            
            
            
            if (!empty($_GET['txtr'])) {
                $pergunta=$_GET['pergunta'];
                $resposta=$_GET['txtr'];
                $data=$_GET['data'];
                InserirResp($resposta, $pergunta, $data, "moda.php");
            }
            ?>
            </fieldset>
            </div>
        </div>
            <?php include '../commons/rodape.php'; ?>
        </div>
      </body>
</html>