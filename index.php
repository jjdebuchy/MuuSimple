<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MuuSimple</title>
    <link rel="stylesheet" href="css/style.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAj3hvA3mVPWQKC7ZG8Gy1iw6F36FMKbP4"></script>

    <script type="text/javascript" src="mapa.js"></script>

    <script type="text/javascript">
    var icono = document.getElementsByClassName('hide');
    var navegacion = document.getElementsByClassName('navegacion');
    window.onload = function(){
      icono.onclick = function(){
        if(navegacion.style.display == 'block') {
           navegacion.style.display = 'none';
        } else {
           navegacion.style.display = 'block';
        }
      }
    }
    </script>
  </head>
  <body>

    <?php require_once "header.php" ?>

    <!--Texto principal-->
    <section class="main-text">
      <div class="video-bg">

        <video autoplay muted loop poster="cows.png">
          <source src="imagenes/cows-1280.mp4" type="video/mp4">
        </video>
        <img src="imagenes/cows.png" alt="vacas" />
      </div>
      <div class="texto-central">
        <h1>MuuSimple</h1>
        <p>Comprá y vendé tu ganado vacuno</p>
        <a href="log-in.php" class="btn-st">Comenzar</a>
      </div>
    </section>

    <section class="informacion">

      <!--Categorias-->

      <div class="info-info">
        <h2>Categorias</h2>
        <p>Esta web se trata sobre , consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
      </div>

      <div class="opciones">

        <div class="opcion">
        <p>Vaquillona </p>
        <a href="#"><img src="imagenes/vaquillona.jpg" alt="vaquillo" /></a>
      </div>

        <div class="opcion">
        <p>
          Vaquillonas Preñadas
        </p>
        <a href="#"><img src="imagenes/vaquillona-prenada.jpg" alt="vaquillo" /></a>
      </div>

        <div class="opcion">
        <p>
          Vacas
        </p>
        <a href="#"><img src="imagenes/vaca.jpg" alt="vaquillo" /></a>
      </div>

        <div class="opcion">
        <p>
          vacas preñadas
        </p>
        <a href="#"><img src="imagenes/vaca-prenada.jpg" alt="vaquillo" /></a>
      </div>

      </div>

    <div class="opciones">

      <div class="opcion">
        <p>
          Terneros
        </p>
        <a href="#"><img src="imagenes/ternero.jpg" alt="vaquillo" /></a>
      </div>

      <div class="opcion">
        <p>
          Terneras
        </p>
        <a href="#"><img src="imagenes/ternera.jpg" alt="vaquillo" /></a>
      </div>

      <div class="opcion">
        <p>
          Toros
        </p>
        <a href="#"><img src="imagenes/toro.jpg" alt="vaquillo" /></a>
      </div>

      <div class="opcion">
        <p>
          Otros
        </p>
        <a href="#">  <img src="imagenes/otros.jpg" alt="vaquillo" /></a>
      </div>
    </div>

    </section>

    <!-- Mapa -->
    <section class="informacion" id="mapa">
      <div class="info-info">
        <h2>Mapa</h2>
        <p>
         consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
        </p>
      </div>
      <div id="googleMap" style="width:900px;height:600px;"></div>
    </section>

    <?php require_once "footer.php" ?>

  </body>
</html>
