<?php
	require("soporte.php");

	$repoUsuarios = $repo->getRepositorioUsuarios();

	$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);


?>

    <header class="headerIndex">

      <nav>
        <div class="barra-navegacion">
          <ul class="navegacion">

            <?php if ($auth->estaLogueado()) { ?>
          		<li class="bienvenido"> Bienvenido, <?= $usuarioLogueado->getNombre() ?></li>
              <li class="bienvenido"><a href="log-out.php">log-out</a></li>
          	<?php } else { ?>
              <li><a href="registro.php">Registrate</a></li>
              <li><a href="log-in.php">Ingresar</a></li>
          	<?php } ?>

            <li><a href="#">Vender</a></li>
            <li><a href="FAQ.php"><i class="fa fa-question-circle" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </nav>

    </header>
