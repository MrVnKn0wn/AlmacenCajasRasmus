<!DOCTYPE html>
<?php  
                  session_start();
                  ?>
<html>
    <head>
        <title>Error</title>
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
                color: red;
                border: 4px red solid;
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
        <h1 id="titulo">Página de Errores</h1>
        <?php if($_REQUEST['Error']!='No se ha podido iniciar sesión, intentelo de nuevo' || $_REQUEST['Error']!='No se ha podido registrar el admin, intentelo de nuevo' ){ ?>
        <a href="./Home.html">Volver</a>
        <?php }else { ?>
        <a href="./Login.html">Volver</a>
        <?php }?>
        <h2 id="mensaje">
            <?php 
            echo $_REQUEST['Error']; 
            ?>
            </h2>
        <img src="./images/jo.jpg" class="imgs" width="37%" height="auto" style="display: inline-block;">
        <img src="./images/kill.jpg" class="imgs" width="25.5%" height="auto" style="display: inline-block;">     
    </body>
</html>