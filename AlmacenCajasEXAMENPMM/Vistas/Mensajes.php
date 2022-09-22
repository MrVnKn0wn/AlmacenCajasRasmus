<!DOCTYPE html>
<?php  
                  session_start();
                  ?>
<html>
    <head>
        <title>Mensaje</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            *{background-color: #dcb471;}
            
            #titulo{
                font-size: 70px; 
                text-align: center;
                font-family: sans-serif;
                border-bottom: 2px black solid;
            }
            
            #mensaje{
                font-size: 50px;
                text-align: center;
                color: forestgreen;
                border: 4px forestgreen solid;
                display: block;
                margin:auto;
            }
            
            a{
                display: block;
                margin: auto;
                font-size: 35px;
                text-align: center;
            }

            .imgs{
                margin:auto;
            }
        </style>
    </head>
    <body>
        <h1 id="titulo">Página de Mensajes</h1>
        <a href="./Home.html">Volver</a>
        
            
        <h2 id="mensaje">
            <?php 
            echo $_REQUEST['Mensaje']; 
            ?>
            </h2>
        <img src="./images/good.jpg" class="imgs" width="30%" height="auto" style="display: inline-block;">
        <img src="./images/kol..jpg" class="imgs" width="30%" height="auto" style="display: inline-block;">     
    </body>
</html>
