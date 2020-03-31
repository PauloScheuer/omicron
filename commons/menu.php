<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                margin: inherit;
            }
            .navi {
                background-color: #418BC0;
                height: 80px;
font-family: sans-serif;
            }
            .label{
                float: left;
                padding-top: 15px;
                padding-left:  15px;
                padding-bottom:  15px;
                width: 10%;
            }
            .links{
                height: 100%;
                float: right;
                width: 90%;
                margin-top: -82px;
                text-align: right;
                
            }
            .dropbtn {
                background-color: #418BC0;
                color: white;
                padding-left: 25px;
                padding-right: 25px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                height: 100%;
                width: 100%;
                letter-spacing: 0px;
            }
            
            .dropdown {
                position: relative;
                display: inline-block;
                
            }
            .dropdown-content {
                display: none;
                position: absolute;
                min-width: 160px;
                z-index: 1;
                text-align: center;
                
            }
            .dropdown-content a {
                background-color: #418BC0;
                color: white;
                padding-left: 30px;
                 padding-right: 30px;
                padding-bottom: 0px;
                padding-top: 20px;
                text-decoration: none;
                display: block;
                height: 40px;
                font-size: 18px;
            }
            .dropdown-content a:hover {background-color:#2B5C80}

        
            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: #2B5C80;
            }

            

            /*se a tela for menor*/
            .minimenu{
                display: none;
                height: 100%;
                float: right;
                width: 200px;
                margin-top: 0px;
                text-align: right;

            }
            @media screen and (max-width: 650px) {
                .links {
                    display: none;
                }
                .minimenu{
                    display: block;
                }
                .dropdown-content {
                    right:0;
                }
            }   
            @media only screen and (max-device-width: 900px) {
                .links {
                    display: none;
                }
                .minimenu{
                    display: block;
                    width: 30%;
                }
                .dropdown-content {
                    right:0;
                }
                .dropbtn img{
                min-width: 40px;
            }
            .dropdown-content a {
                background-color: #418BC0;
                color: white;
                padding-left: 30px;
                 padding-right: 30px;
                padding-bottom: 10px;
                padding-top: 50px;
                text-decoration: none;
                display: block;
                height: 100px;
                font-size: 40px;
            }
                
            }
        </style>
    </head>
    <body class="body">
        <nav class="navi">
            <label class="label"><img src="../imagens/math.png"></label>
            <div class="links">
                <?php
            if ((!empty($_SESSION['logado']))and$_SESSION['logado'] == TRUE) {
                ?>
                <div class="dropdown">
                    <a href="../pages/index.php"><button class="dropbtn" >Home</button></a>
                </div>
                <div class="dropdown">
                    <a href="../pages/descubra.php"><button class="dropbtn" >Descubra+</button></a>
                </div>
                <div class="dropdown">
                    <a href="../pages/calculadoras.php"><button class="dropbtn" >Calculadoras</button></a>
                </div>
                <div class="dropdown">
                    <a href="../pages/userpage.php"><button class="dropbtn" >Userpage</button></a>
                </div>
<?php }else{
                ?>
                <div class="dropdown">
                    <a href="../pages/index.php"><button class="dropbtn" >Home</button></a>
                </div>
                <div class="dropdown">
                    <a href="../pages/descubra.php"><button class="dropbtn" >Descubra+</button></a>
                </div>
                <div class="dropdown">
                    <a href="../pages/calculadoras.php"><button class="dropbtn" >Calculadoras</button></a>
                </div>
                <div class="dropdown">
                    <a href="../pages/login.php"><button class="dropbtn" >Login</button></a>
                </div>
<?php } ?>
            </div>
            <?php
            if ((!empty($_SESSION['logado']))and$_SESSION['logado'] == TRUE) {
                ?>
            <div class="minimenu">
                <div class="dropdown">
                    <button class="dropbtn"><img src="https://img.icons8.com/metro/26/ffffff/menu.png"></button>
                    <div class="dropdown-content">
                        <a href="../pages/index.php" >Home</a>
                    <a href="../pages/descubra.php">Descubra+</a>
                        <a href="../pages/calculadoras.php" >Calculadoras</a>
                        <a href="../pages/userpage.php">Userpage</a>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="minimenu">
                <div class="dropdown">
                    <button class="dropbtn"><img src="https://img.icons8.com/metro/26/ffffff/menu.png"></button>
                    <div class="dropdown-content">
                        <a href="../pages/index.php" >Home</a>
                    <a href="../pages/descubra.php">Descubra+</a>
                        <a href="../pages/calculadoras.php" >Calculadoras</a>
                        <a href="../pages/login.php">Login</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </nav>
    </body>
</html>

