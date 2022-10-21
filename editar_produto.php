<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar produto</title>
	<link rel="stylesheet" href="css/estilo.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php 
	require_once("protege.php");
	require_once("nav.php");

	// verificação de nivel de acesso do usuario
	$nivel = $_SESSION["nivel"];
	if ($nivel == 1){
		header("location: nivel.php");
	}

	?>

	<?php 
		// primeiro é preciso buscar as informacoes do registro a ser editado
		$id_produto = $_GET['id_produto'];

		$conn = mysqli_connect("127.0.0.1", "root", "", "pedras");

		if ($conn) {
			$sql = "SELECT * FROM produtos WHERE id = $id_produto";

			$resultado = mysqli_query($conn, $sql);

			// a edicao vai retornar apenas uma linha, pois a busca é pela primary key da tabela
			if (mysqli_num_rows($resultado) == 1) {

				// pega os dados relativo a linha que retornou e armazenada na variável abaixo
				$produto = mysqli_fetch_array($resultado);

				// pegando o valor dos campos e salvando em variaveis para preencher o formulário
				$nome 	= $produto["nome"];
				$preco 	= $produto["preco"];
				$descricao = $produto["descricao"];
				$estoque = $produto["estoque"]; 
				$imagem = $produto["imagem"]; // necessário para pré-selecionar o grupo de um produto

			} else {
				echo ("produto não encontrado");
			}
		} else {
			die("Falha na conexão " . mysqli_connect_error() );
		}
	?>
	<form method="POST" >
		<fieldset>
			<!-- para preencher os campos do formulário, é necessario printar os valores dentro do elemento VALUE -->
			<legend>Editando produto de <b><?php echo ($nome); ?></b></legend>
			Nome: <input type="text" name="nome" value="<?php echo ($nome); ?>"> <br>
			preco: <input type="int" name="preco" value="<?php echo ($preco); ?>"> <br>
			descricao: <input type="text" name="descricao" value="<?php echo($descricao); ?>"> <br>
			estoque: <input type="int" name="estoque" value="<?php echo($estoque); ?>" > <br>
		    imagem: <input type="int" name="imagem" value="<?php echo($imagem); ?>" > <br>
			<input type="submit" name="enviar" value="Salvar">
		</fieldset>
	</form>
	<?php echo " <figure class='figure'>
  <img src='$imagem' class='figure-img img-fluid rounded' alt='imagem' width='400' 
  height='341'>
  <figcaption class='figure-caption'>A caption for the above image.</figcaption>
  </figure> "?>
	
	<?php
	// isset testa se uma variavel existe
	if (isset($_POST['enviar']) == true) {
		// codigo a ser executado se a variavel estiver definida

		// usando a funcao empty para saber se um campo foi preenchido
		if (empty($_POST["nome"]) == true) {
			echo ("Por favor preencha o campo <b>nome</b>");
		} else if (empty($_POST["preco"])){
			// exibindo a mesagem de erro com javascript
			//echo("<script>alert('Preencha a  preco');</script>");
			echo("Preencha o  <b>preco</b>");
		} else if (empty($_POST["descricao"])) {
			echo("Preencha a <b>descricao</b>");
		} else if(empty($_POST["estoque"])){
			echo("Preencha o <b>estoque</b>");
		} elseif (empty($_POST["imagem"])) {
			echo "Preencha a <b>imagem</br>";
		} else {
			// não é mais preciso abrir a conexão com o BD, pois isso foi feito anteriormente e também já foi testado se a conexao foi bem sucedida 
			$nome = $_POST["nome"];
			$preco = $_POST["preco"];
			$descricao = $_POST["descricao"];
			$estoque = $_POST["estoque"];
			$imagem = $_POST["imagem"];	// campo que contém o id do grupo selecionado

			// para editar o registro, usa-se o UPDATE
			$sql = "UPDATE produtos SET nome = '$nome', preco = '$preco', descricao = '$descricao', estoque = '$estoque', imagem = '$imagem' WHERE id = $id_produto";

			// echo para debugar a consulta sql gerada
			// echo ($sql);

			// mandando executar a consulta sql
			// a funcao mysqli_query retorna true se a consulta foi executada com sucesso
			if (mysqli_query($conn, $sql)){
				echo ("
					<script>
						alert('produto editado com sucesso');
						location.href = 'inicio.php';
					</script>
				");
			} else {
				// erro ao executar a consulta
				echo ("Erro: $sql <br>" . mysqli_error($conn) );
			}

			// encerrando a conexao
			mysqli_close($conn);

		}
	}
	?>
</body>
</html>
