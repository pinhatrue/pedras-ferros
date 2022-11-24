<!DOCTYPE html>
<html>
<head>
	<title>ACESSO NEGADO!!</title>
</head>
<body>
	<?php 
		//session_start();
		$nivel = $_SESSION["nivel"];
		if ($nivel == 1){
			echo "
			<script>
			window.alert('Você não possui permissão para essa ação!');
			location.href = 'inicio.php';
			</script>
			";
		}
	 ?>
</body>
</html>