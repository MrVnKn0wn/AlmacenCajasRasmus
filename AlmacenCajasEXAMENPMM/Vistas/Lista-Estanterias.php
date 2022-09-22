<!DOCTYPE html>
<?php
 include_once '../Modelo/EstanteriaUbicacion.php';
    session_start();
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Lista Estanterías</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Lista-Estanterias.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.7.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,990i|Roboto+Slab:100,300,400,700">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Almacén de Cajas",
		"url": "index.html"
}</script>
    <meta property="og:title" content="Lista Estanterias">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  </head>
  <body class="u-body"> 
    <section class="u-align-left u-clearfix u-custom-color-2 u-section-1" id="sec-b09f">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-custom-font u-font-merriweather u-text u-text-body-color u-text-1" data-animation-name="slideIn" data-animation-duration="1500" data-animation-delay="0" data-animation-direction="Down"><span class="u-icon u-icon-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" style="width: 1em; height: 1em;"><g id="Filledoutline"><path d="m456 80v408h-416v-408l208-48z" fill="#0093b9"></path><path d="m104 168h288v320h-288z" fill="#e3e4e2"></path><path d="m456 80v34.67l-208-50.21-208 50.21v-34.67l208-48z" fill="#0884a9"></path><rect fill="#57c3c1" height="32" rx="16" transform="matrix(-1 0 0 -1 496 224)" width="64" x="216" y="96"></rect><path d="m480 72-232-56-232 56v32l232-56 232 56z" fill="#e3e4e2"></path><path d="m104 168h288v136h-288z" fill="#c9c9c8"></path><path d="m304 488v-128h-144v-128h-144v256z" fill="#f8bc1e"></path><path d="m208 360h48v48h-48z" fill="#f9da62"></path><path d="m304 368h-12a12 12 0 0 0 -12 12v20.305a63.7 63.7 0 0 1 -63.695 63.695h-36.305a12 12 0 0 0 -12 12v12h136z" fill="#f5a922"></path><path d="m64 360h48v48h-48z" fill="#f9da62"></path><path d="m160 368h-12a12 12 0 0 0 -12 12v20.305a63.7 63.7 0 0 1 -63.695 63.695h-36.305a12 12 0 0 0 -12 12v12h136z" fill="#f5a922"></path><path d="m64 232h48v48h-48z" fill="#f9da62"></path><path d="m160 240h-12a12 12 0 0 0 -12 12v20.305a63.7 63.7 0 0 1 -63.695 63.695h-36.305a12 12 0 0 0 -12 12v12h136z" fill="#f5a922"></path><path d="m120 448h16v16h-16z"></path><path d="m304 352h-136v-120a8 8 0 0 0 -8-8h-144a8 8 0 0 0 -8 8v256a8 8 0 0 0 8 8h288a8 8 0 0 0 8-8v-128a8 8 0 0 0 -8-8zm-88 16h32v32h-32zm-144-128h32v32h-32zm-48 0h32v40a8 8 0 0 0 8 8h48a8 8 0 0 0 8-8v-40h32v112h-128zm48 128h32v32h-32zm-48 0h32v40a8 8 0 0 0 8 8h48a8 8 0 0 0 8-8v-40h32v112h-128zm272 112h-128v-112h32v40a8 8 0 0 0 8 8h48a8 8 0 0 0 8-8v-40h32z"></path><path d="m264 448h16v16h-16z"></path><path d="m120 320h16v16h-16z"></path><path d="m478.123 111.776a7.941 7.941 0 0 0 1.877.224 8.023 8.023 0 0 0 6.926-3.984 8.237 8.237 0 0 0 1.074-4.2v-31.816a8 8 0 0 0 -6.123-7.776l-232-56a7.967 7.967 0 0 0 -3.754 0l-232 56a8 8 0 0 0 -6.123 7.776v31.773a8.322 8.322 0 0 0 1.374 4.718 8.013 8.013 0 0 0 8.5 3.285l14.126-3.409v99.633h16v-103.495l200-48.276 200 48.276v375.495h-48v-312a8 8 0 0 0 -8-8h-288a8 8 0 0 0 -8 8v32a8 8 0 0 0 8 8h280v16h-200v16h200v16h-200v16h200v16h-200v16h200v176h-56v16h160v-16h-24v-371.633zm-366.123 80.224v-16h272v16zm136-152a7.943 7.943 0 0 0 -1.877.224l-222.123 53.615v-15.539l224-54.07 224 54.07v15.54l-222.123-53.616a7.943 7.943 0 0 0 -1.877-.224z"></path><path d="m264 136a24 24 0 0 0 0-48h-32a24 24 0 0 0 0 48zm-40-24a8.009 8.009 0 0 1 8-8h32a8 8 0 0 1 0 16h-32a8.009 8.009 0 0 1 -8-8z"></path>
</g></svg><img></span>&nbsp;Lista Estanterías
        </h2>
        <a href="Estanterias.html" data-page-id="353010474" class="u-active-custom-color-1 u-border-2 u-border-grey-75 u-btn u-btn-round u-button-style u-custom-color-1 u-hover-custom-color-1 u-radius-12 u-text-active-palette-2-dark-2 u-text-body-color u-text-hover-palette-2-dark-1 u-btn-1" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">Volver</a>
        <div class="u-table u-table-responsive u-table-1">
          <table class="u-table-entity">
            <colgroup>
              <col width="16.6%">
              <col width="16.6%">
              <col width="16.6%">
              <col width="16.6%">
              <col width="16.6%">
              <col width="17%">
            </colgroup>
            <thead class="u-align-center u-custom-color-3 u-custom-font u-font-roboto-slab u-table-header u-text-black u-table-header-1">
              <tr style="height: 48px;">
                <th class="u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-1">Localizador</th>
                <th class="u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-2">Material</th>
                <th class="u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-3">Lejas Totales</th>
                <th class="u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-4">Lejas Libres</th>
                <th class="u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-5">Fecha Alta</th>
                <th class="u-border-3 u-border-grey-dark-1 u-table-cell u-table-cell-6">Posición</th>
              </tr>
            </thead>
            <tbody class="u-align-center u-custom-color-1 u-custom-font u-font-roboto-slab u-table-body u-text-black u-table-body-1">
              <tr style="height: 65px;">
                <td class="u-border-5 u-border-grey-dark-1 u-custom-font u-first-column u-font-roboto-slab u-gradient u-table-cell u-table-cell-7">-</td>
                <td class="u-border-5 u-border-black u-table-cell u-table-cell-8">-</td>
                <td class="u-border-5 u-border-black u-table-cell u-table-cell-9">-</td>
                <td class="u-border-5 u-border-black u-table-cell u-table-cell-10">-</td>
                <td class="u-border-5 u-border-black u-table-cell u-table-cell-11">-</td>
                <td class="u-border-5 u-border-black u-table-cell u-table-cell-12">-</td>
              </tr>
              </tbody>
              <?php  
                  $ListaEstanterias=$_SESSION['ListaEstanterias'];
                  foreach($ListaEstanterias as $Object){ 
                      ?>
                      <tbody class="u-align-center u-custom-color-1 u-custom-font u-font-roboto-slab u-table-body u-text-black u-table-body-1">
                          <tr style="height: 65px;">
                             <td class="u-border-5 u-border-grey-dark-1 u-custom-font u-first-column u-font-roboto-slab u-gradient u-table-cell u-table-cell-7"><?php echo $Object->getLocalizador() ?></td>
                             <td class="u-border-5 u-border-black u-table-cell u-table-cell-8"><?php echo $Object->getMaterial() ?></td>
                             <td class="u-border-5 u-border-black u-table-cell u-table-cell-9"><?php echo $Object->getNumLejas() ?></td>
                             <td class="u-border-5 u-border-black u-table-cell u-table-cell-10"><?php echo $Object->getLejasLibres() ?></td>
                             <td class="u-border-5 u-border-black u-table-cell u-table-cell-11"><?php echo $Object->getFechaAlta() ?></td>
                             <td class="u-border-5 u-border-black u-table-cell u-table-cell-12"><?php echo $Object->getPasillo() ?>-<?php echo $Object->getHueco() ?></td>
                          </tr>
                      </tbody>    
              <?php
                 }
              ?>
          </table>
        </div>
      </div>
    </section>
    
    
    
  </body>
</html>