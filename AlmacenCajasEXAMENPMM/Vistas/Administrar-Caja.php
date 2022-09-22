<!DOCTYPE html>
<?php
    include_once '../Modelo/Caja.php';
    include_once '../Modelo/CajaUbicacion.php';
    session_start();
    $Cajas=$_SESSION['TodasCajas'];
    $Localizadores=array();
    if($Cajas!=null){
    foreach($Cajas as $Caja){
        $Loca=$Caja->getLocalizador();
        $Localizadores[]=$Loca;
    }}
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Administrar Caja</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Administrar-Caja.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.7.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,990i|Roboto+Slab:100,300,400,700">
    <script type="text/javascript" src="../JavaScript/ControlAJAX.js"></script>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Almacén de Cajas",
		"url": "index.html"
}</script>
    
    <style>
        button{
            display: inline-block;
            margin: auto;
            border-right: 2px black dashed;
            border-left: 2px black dashed;
            color: blue;
            font-size: 134.4%;
            background-color: #DCB471;
        }
        
        button:hover{
            color: white;
        }
        
        #autocomple{
            border: #000 solid 2px; 
            margin: auto; 
            margin-right: 10%;
            margin-top: 5px; 
            width: 50%;
        }
        
        #botonOK{
            visibility: hidden;
        }
        
    </style>
    
    <meta property="og:title" content="Administrar Caja">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  </head>
  <body class="u-body"> 
    <section class="u-align-left u-clearfix u-custom-color-2 u-section-1" id="sec-b09f">
      <div class="u-clearfix u-sheet u-sheet-1">
        <?php if($_REQUEST['opcion']=="baja"){ ?>  
        <h2 class="u-align-center u-custom-font u-font-merriweather u-text u-text-body-color u-text-1" data-animation-name="slideIn" data-animation-duration="1500" data-animation-delay="0" data-animation-direction="Down"><span class="u-icon u-icon-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" style="width: 1em; height: 1em;"><g id="Filled_stroke_cut_Ex"><g><path d="m400 312 54.426 54.426a60 60 0 0 1 17.574 42.427v49.147a30 30 0 0 1 -30 30h-26v-56h-16z" fill="#fa5d3f"></path><path d="m120 464v-160l88-56h96l88 56v160z" fill="#fa5d3f"></path><path d="m304 248-48 48-48-48 8-32h80z" fill="#ffd4cf"></path><path d="m299.035 228.142-3.035-12.142h-80l-3.086 12.345 26.93 13.465a36 36 0 0 0 32.363-.082z" fill="#fbb8b0"></path><path d="m332 120h-12v-32h-128v32h-12a20 20 0 0 0 -20 20v8a20 20 0 0 0 20 20h12v13.459a30 30 0 0 0 16.583 26.833l38.417 19.208a20 20 0 0 0 17.979-.045l38.575-19.534a30 30 0 0 0 16.446-26.765v-13.156h12a20 20 0 0 0 20-20v-8a20 20 0 0 0 -20-20z" fill="#ffd4cf"></path><g><path d="m216 128h16v16h-16z"></path><path d="m280 128h16v16h-16z"></path>
</g><path d="m256 200c-13.458 0-24-8.785-24-20h16c0 1.41 3.037 4 8 4s8-2.59 8-4h16c0 11.215-10.542 20-24 20z"></path><path d="m234 24h44a50 50 0 0 1 50 50v14a0 0 0 0 1 0 0h-144a0 0 0 0 1 0 0v-14a50 50 0 0 1 50-50z" fill="#fa5d3f"></path><path d="m296.906 115.271-18.718-12.479a40 40 0 0 0 -44.376 0l-18.718 12.479a20 20 0 0 1 -31.094-16.641v-10.63l33.149-18.416a80 80 0 0 1 77.7 0l33.151 18.416v10.63a20 20 0 0 1 -31.094 16.641z" fill="#fac850"></path><path d="m112 280h288v208h-288z" fill="#fac850"></path><path d="m128 432h-32v56h88a56 56 0 0 0 -56-56z" fill="#ffd4cf"></path><path d="m224 280h64v72h-64z" fill="#fa7d29"></path><path d="m224 440h64v48h-64z" fill="#fa7d29"></path><path d="m112 312-54.426 54.426a60 60 0 0 0 -17.574 42.427v49.147a30 30 0 0 0 30 30h26v-56h16z" fill="#fa5d3f"></path><path d="m384 432h32v56h-88a56 56 0 0 1 56-56z" fill="#ffd4cf"></path><path d="m136 304h16v16h-16z"></path><path d="m168 304h32v16h-32z"></path><path d="m136 336h64v16h-64z"></path><path d="m340 312h28a0 0 0 0 1 0 0v20a20 20 0 0 1 -20 20h-28a0 0 0 0 1 0 0v-20a20 20 0 0 1 20-20z" fill="#fffffe"></path><path d="m348 360h-28a8 8 0 0 1 -8-8v-20a28.032 28.032 0 0 1 28-28h28a8 8 0 0 1 8 8v20a28.032 28.032 0 0 1 -28 28zm-20-16h20a12.013 12.013 0 0 0 12-12v-12h-20a12.013 12.013 0 0 0 -12 12z"></path><path d="m460.084 360.77-30.427-30.427-11.314 11.314 30.427 30.426a51.663 51.663 0 0 1 15.23 36.77v49.147a22.025 22.025 0 0 1 -22 22h-18v-40h16v-16h-32v-144a8 8 0 0 0 -8-8h-43.384l-45.629-29.037-6.622-26.487 2.8-1.419a37.818 37.818 0 0 0 20.835-33.901v-5.156h4a28.032 28.032 0 0 0 28-28v-8a28.033 28.033 0 0 0 -27.395-27.993 27.972 27.972 0 0 0 3.395-13.377v-24.63a58.066 58.066 0 0 0 -58-58h-44a58.066 58.066 0 0 0 -58 58v24.63a27.972 27.972 0 0 0 3.4 13.377 28.033 28.033 0 0 0 -27.4 27.993v8a28.032 28.032 0 0 0 28 28h4v5.459a37.792 37.792 0 0 0 21.006 33.988l2.566 1.283-6.559 26.233-45.629 29.037h-43.384a8 8 0 0 0 -8 8v28.686l-29.657 29.657 11.314 11.314 18.343-18.343v92.686h-32v16h16v40h-18a22.025 22.025 0 0 1 -22-22v-49.147a51.666 51.666 0 0 1 15.229-36.77l6.427-6.426-11.312-11.314-6.428 6.427a67.554 67.554 0 0 0 -19.916 48.083v49.147a38.043 38.043 0 0 0 38 38h372a38.043 38.043 0 0 0 38-38v-49.147a67.554 67.554 0 0 0 -19.916-48.083zm-228.084-72.77h48v56h-48zm59.314-16 13.805-13.8 21.694 13.8zm-92.976-162.79a11.827 11.827 0 0 1 -6.338-10.58v-5.923l29.033-16.13a71.581 71.581 0 0 1 69.934 0l29.033 16.13v5.923a12 12 0 0 1 -18.656 9.984l-18.718-12.478a47.871 47.871 0 0 0 -53.252 0l-18.718 12.478a11.828 11.828 0 0 1 -12.318.596zm145.662 30.79v8a12.013 12.013 0 0 1 -12 12h-4v-32h4a12.013 12.013 0 0 1 12 12zm-110-108h44a42.047 42.047 0 0 1 42 42v.4l-21.264-11.809a87.481 87.481 0 0 0 -85.472 0l-21.264 11.809v-.4a42.047 42.047 0 0 1 42-42zm-54 128a12.013 12.013 0 0 1 -12-12v-8a12.013 12.013 0 0 1 12-12h4v32zm20 21.459v-55.111a27.935 27.935 0 0 0 19.531-4.421l18.718-12.479a31.918 31.918 0 0 1 35.5 0l18.718 12.479a27.952 27.952 0 0 0 19.533 4.42v54.809a21.894 21.894 0 0 1 -12.062 19.627l-38.573 19.533a12.051 12.051 0 0 1 -10.788.028l-38.415-19.207a21.881 21.881 0 0 1 -12.162-19.678zm43.421 53.2a28.12 28.12 0 0 0 25.172-.064l21.133-10.7 5.415 21.657-26.455 26.448h-25.372l-26.455-26.454 5.372-21.486zm-36.54 23.54 13.805 13.801h-35.5zm-86.881 29.801h96v64a8 8 0 0 0 8 8h64a8 8 0 0 0 8-8v-64h96v136h-8a64.1 64.1 0 0 0 -63.5 56h-24.5v-40a8 8 0 0 0 -8-8h-64a8 8 0 0 0 -8 8v40h-24.5a64.1 64.1 0 0 0 -63.5-56h-8zm-16 192v-40h24a48.078 48.078 0 0 1 47.333 40zm128 0v-32h48v32zm176 0h-71.333a48.078 48.078 0 0 1 47.333-40h24z"></path>
</g>
</g></svg><img></span>&nbsp;Salida
        </h2> 
<a href="Cajas.html" data-page-id="76941059" class="u-active-custom-color-1 u-border-2 u-border-grey-75 u-btn u-btn-round u-button-style u-custom-color-1 u-hover-custom-color-1 u-radius-12 u-text-active-palette-2-dark-2 u-text-body-color u-text-hover-palette-2-dark-1 u-btn-1" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">Volver</a>        
        <?php } else if($_REQUEST['opcion']=="devol"){ ?>
        
          
        <h2 class="u-align-center u-custom-font u-font-merriweather u-text u-text-body-color u-text-1" data-animation-name="slideIn" data-animation-duration="1500" data-animation-delay="0" data-animation-direction="Down"><span class="u-icon u-icon-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" style="width: 1em; height: 1em;"><g id="Filled_stroke_cut_Ex"><g><path d="m400 312 54.426 54.426a60 60 0 0 1 17.574 42.427v49.147a30 30 0 0 1 -30 30h-26v-56h-16z" fill="#fa5d3f"></path><path d="m120 464v-160l88-56h96l88 56v160z" fill="#fa5d3f"></path><path d="m304 248-48 48-48-48 8-32h80z" fill="#ffd4cf"></path><path d="m299.035 228.142-3.035-12.142h-80l-3.086 12.345 26.93 13.465a36 36 0 0 0 32.363-.082z" fill="#fbb8b0"></path><path d="m332 120h-12v-32h-128v32h-12a20 20 0 0 0 -20 20v8a20 20 0 0 0 20 20h12v13.459a30 30 0 0 0 16.583 26.833l38.417 19.208a20 20 0 0 0 17.979-.045l38.575-19.534a30 30 0 0 0 16.446-26.765v-13.156h12a20 20 0 0 0 20-20v-8a20 20 0 0 0 -20-20z" fill="#ffd4cf"></path><g><path d="m216 128h16v16h-16z"></path><path d="m280 128h16v16h-16z"></path>
</g><path d="m256 200c-13.458 0-24-8.785-24-20h16c0 1.41 3.037 4 8 4s8-2.59 8-4h16c0 11.215-10.542 20-24 20z"></path><path d="m234 24h44a50 50 0 0 1 50 50v14a0 0 0 0 1 0 0h-144a0 0 0 0 1 0 0v-14a50 50 0 0 1 50-50z" fill="#fa5d3f"></path><path d="m296.906 115.271-18.718-12.479a40 40 0 0 0 -44.376 0l-18.718 12.479a20 20 0 0 1 -31.094-16.641v-10.63l33.149-18.416a80 80 0 0 1 77.7 0l33.151 18.416v10.63a20 20 0 0 1 -31.094 16.641z" fill="#fac850"></path><path d="m112 280h288v208h-288z" fill="#fac850"></path><path d="m128 432h-32v56h88a56 56 0 0 0 -56-56z" fill="#ffd4cf"></path><path d="m224 280h64v72h-64z" fill="#fa7d29"></path><path d="m224 440h64v48h-64z" fill="#fa7d29"></path><path d="m112 312-54.426 54.426a60 60 0 0 0 -17.574 42.427v49.147a30 30 0 0 0 30 30h26v-56h16z" fill="#fa5d3f"></path><path d="m384 432h32v56h-88a56 56 0 0 1 56-56z" fill="#ffd4cf"></path><path d="m136 304h16v16h-16z"></path><path d="m168 304h32v16h-32z"></path><path d="m136 336h64v16h-64z"></path><path d="m340 312h28a0 0 0 0 1 0 0v20a20 20 0 0 1 -20 20h-28a0 0 0 0 1 0 0v-20a20 20 0 0 1 20-20z" fill="#fffffe"></path><path d="m348 360h-28a8 8 0 0 1 -8-8v-20a28.032 28.032 0 0 1 28-28h28a8 8 0 0 1 8 8v20a28.032 28.032 0 0 1 -28 28zm-20-16h20a12.013 12.013 0 0 0 12-12v-12h-20a12.013 12.013 0 0 0 -12 12z"></path><path d="m460.084 360.77-30.427-30.427-11.314 11.314 30.427 30.426a51.663 51.663 0 0 1 15.23 36.77v49.147a22.025 22.025 0 0 1 -22 22h-18v-40h16v-16h-32v-144a8 8 0 0 0 -8-8h-43.384l-45.629-29.037-6.622-26.487 2.8-1.419a37.818 37.818 0 0 0 20.835-33.901v-5.156h4a28.032 28.032 0 0 0 28-28v-8a28.033 28.033 0 0 0 -27.395-27.993 27.972 27.972 0 0 0 3.395-13.377v-24.63a58.066 58.066 0 0 0 -58-58h-44a58.066 58.066 0 0 0 -58 58v24.63a27.972 27.972 0 0 0 3.4 13.377 28.033 28.033 0 0 0 -27.4 27.993v8a28.032 28.032 0 0 0 28 28h4v5.459a37.792 37.792 0 0 0 21.006 33.988l2.566 1.283-6.559 26.233-45.629 29.037h-43.384a8 8 0 0 0 -8 8v28.686l-29.657 29.657 11.314 11.314 18.343-18.343v92.686h-32v16h16v40h-18a22.025 22.025 0 0 1 -22-22v-49.147a51.666 51.666 0 0 1 15.229-36.77l6.427-6.426-11.312-11.314-6.428 6.427a67.554 67.554 0 0 0 -19.916 48.083v49.147a38.043 38.043 0 0 0 38 38h372a38.043 38.043 0 0 0 38-38v-49.147a67.554 67.554 0 0 0 -19.916-48.083zm-228.084-72.77h48v56h-48zm59.314-16 13.805-13.8 21.694 13.8zm-92.976-162.79a11.827 11.827 0 0 1 -6.338-10.58v-5.923l29.033-16.13a71.581 71.581 0 0 1 69.934 0l29.033 16.13v5.923a12 12 0 0 1 -18.656 9.984l-18.718-12.478a47.871 47.871 0 0 0 -53.252 0l-18.718 12.478a11.828 11.828 0 0 1 -12.318.596zm145.662 30.79v8a12.013 12.013 0 0 1 -12 12h-4v-32h4a12.013 12.013 0 0 1 12 12zm-110-108h44a42.047 42.047 0 0 1 42 42v.4l-21.264-11.809a87.481 87.481 0 0 0 -85.472 0l-21.264 11.809v-.4a42.047 42.047 0 0 1 42-42zm-54 128a12.013 12.013 0 0 1 -12-12v-8a12.013 12.013 0 0 1 12-12h4v32zm20 21.459v-55.111a27.935 27.935 0 0 0 19.531-4.421l18.718-12.479a31.918 31.918 0 0 1 35.5 0l18.718 12.479a27.952 27.952 0 0 0 19.533 4.42v54.809a21.894 21.894 0 0 1 -12.062 19.627l-38.573 19.533a12.051 12.051 0 0 1 -10.788.028l-38.415-19.207a21.881 21.881 0 0 1 -12.162-19.678zm43.421 53.2a28.12 28.12 0 0 0 25.172-.064l21.133-10.7 5.415 21.657-26.455 26.448h-25.372l-26.455-26.454 5.372-21.486zm-36.54 23.54 13.805 13.801h-35.5zm-86.881 29.801h96v64a8 8 0 0 0 8 8h64a8 8 0 0 0 8-8v-64h96v136h-8a64.1 64.1 0 0 0 -63.5 56h-24.5v-40a8 8 0 0 0 -8-8h-64a8 8 0 0 0 -8 8v40h-24.5a64.1 64.1 0 0 0 -63.5-56h-8zm-16 192v-40h24a48.078 48.078 0 0 1 47.333 40zm128 0v-32h48v32zm176 0h-71.333a48.078 48.078 0 0 1 47.333-40h24z"></path>
</g>
</g></svg><img></span>&nbsp;Devolución
        </h2>
<a href="Cajas.html" data-page-id="76941059" class="u-active-custom-color-1 u-border-2 u-border-grey-75 u-btn u-btn-round u-button-style u-custom-color-1 u-hover-custom-color-1 u-radius-12 u-text-active-palette-2-dark-2 u-text-body-color u-text-hover-palette-2-dark-1 u-btn-1" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">Volver</a>
        <?php } ?>
        <div class="u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
          
            <div class="u-form-group u-form-name">
              <label for="name-edff" class="u-custom-font u-font-roboto-slab u-label u-text-black u-label-1">Localizador de la Caja</label>
    <script> 
        var data = <?php echo json_encode($Localizadores) ?>;
    </script>
              <input type="text" onkeyup="autocompletado(data)" pattern="[C]{1}[A]{1}[0-9]{3}" placeholder="Busque aquí para mostrar autocompletado [CA y 3 números]" id="name-edff" name="code" class="u-border-2 u-border-black u-custom-color-1 u-custom-font u-font-roboto-slab u-input u-input-rectangle u-radius-12 u-text-black u-input-1" required="" maxlength="5">
              <div id="autocomple">
                  
              </div>
            </div>


        </div>
        <div class="u-table u-table-responsive u-table-1">
          <table class="u-table-entity">
            <colgroup>
              <col width="12.4%">
              <col width="12.4%">
              <col width="12.4%">
              <col width="12.4%">
              <col width="12.4%">
              <col width="12.1%">
              <col width="12.900000000000011%">
              <col width="13.300000000000011%">
            </colgroup>
            <thead class="u-align-center u-custom-color-3 u-custom-font u-font-roboto-slab u-table-header u-text-black u-table-header-1">
              <tr style="height: 48px;">
                <th class="u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-1">Localizador</th>
                <th class="u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-2">Datos</th>

              </tr>
            </thead>
                
            <tbody class="u-align-center u-custom-color-1 u-custom-font u-font-roboto-slab u-table-body u-text-black u-table-body-1">
              <tr style="height: 65px;">
                <td id="localizador" class="u-border-5 u-border-grey-dark-1 u-custom-font u-first-column u-font-roboto-slab u-gradient u-table-cell u-table-cell-9"></td>
                <td id="datos" class="u-border-5 u-border-black u-table-cell u-table-cell-10"></td>
                
              </tr>
            </tbody>
          </table>
        </div>

        <?php if($_REQUEST['opcion']=="devol"){ ?>
</br>
<form action="../Controladores/ControladorRecuperarCaja.php" class="u-clearfix u-form-custom-backend u-form-spacing-5 u-form-vertical u-inner-form" style="padding: 10px;" source="custom" name="form" redirect="true">
    <select id="select-199b" name="estanteria" onchange="mostrarHuecos(this.value,'caja')" class="u-border-2 u-border-black u-custom-color-1 u-custom-font u-font-roboto-slab u-input u-input-rectangle u-radius-12 u-text-black u-input-7" required="required">
                    <option value="">Seleccione la estantería</option>
                    <?php  
                  
                  $ArrayEst=$_SESSION['ArrayEstanteriasDisponibles'];
                  foreach($ArrayEst as $Object){ 
                  ?>
                        <option value=<?php echo $Object->id ?>><?php echo $Object->localizador ?> </option>
                  <?php
                     }
                    ?>
    </select>        
        <select id="select-7615" name="posicion" class="u-border-2 u-border-black u-custom-color-1 u-custom-font u-font-roboto-slab u-input u-input-rectangle u-radius-12 u-text-black u-input-8" required="required">

        </select>
    <input type="submit" value="Hacer Devolución" id="botonOK" style="background-color: #DCB471; color:black; margin:auto; font-size: 20px;">
</form>
        <?php } ?> 

        <?php if($_REQUEST['opcion']=="baja"){ ?>
        <a href="../Controladores/ControladorBajaCaja.php" id="botonOK" class="u-active-palette-2-dark-2 u-border-4 u-border-grey-75 u-btn u-btn-round u-button-style u-custom-font u-font-roboto-slab u-hover-black u-none u-radius-50 u-btn-3" data-animation-name="rubberBand" data-animation-duration="1750" data-animation-delay="0" data-animation-direction="">
            Dar de Baja 

            <?php } ?> 
        </a>
      </div>
    </section>
    
    
    
  </body>
</html>