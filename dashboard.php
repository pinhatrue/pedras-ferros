
  <?php
    session_start();

    // verifica se existe uma sessao
    if (isset($_SESSION["usuario"])){
      //header("location: login.php");
      $nivel = $_SESSION["nivel"];
  }
  ?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<?php
		require_once("nivel.php");
		require_once("nav.php");
		require_once("conecta.php");
		require_once("protege.php");
	?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<section>
		<p class="text-start">Bem-vindo! <?php echo("$_SESSION[usuario]"); ?></p>
		<div class="d-grid gap-2 col-6 mx-auto">
			<h3>Administradores</h3>
			<a href="#" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Usuários</a>
		</div>
		<div class="d-grid gap-2 col-6 mx-auto">
			<h3>Produtos</h3>
			<a href="inicio.php" target="_blank" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Catálogo</a>
			<a href="form.php" target="_blank" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Adicionar Produtos</a>
			<a href="inicio_admin.php" target="_blank" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Atualizar Produtos</a>
		</div>
	</section>
</body>
</html>
</style>