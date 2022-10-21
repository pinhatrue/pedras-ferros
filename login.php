<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		body {
		    padding: 0;
		    margin: 0;
		    background-color: #ededed;
		}
		#login {
		    display: flex;
		    align-items: center;
		    justify-content: center;
		    height: 100vh;
		    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
		}

		.card {
		    background-color: white;
		    padding: 40px;
		    border-radius: 2px;
		    width:280px;
		}

		.card-header {
		    padding-bottom: 50px;
		    opacity: 0.8;
		    color: black;
		}

		.card-header {
		    content: "";
		    width: 0px;
		    height: 1px;
		    background-color: black;
		    display: black;
		    margin-top: -17px;
		    margin-left: -5px;
		}

		.card-content label {
		    color: black;
		    font-size: 12px;
		    opacity: 0.8;
		}

		.card-content-area {
		    display: flex;
		    flex-direction: column;
		    padding:10px 0;
		}

		.card-content-area input {
		    margin-top: 10px;
		    padding:0 5px;
		    background-color: transparent;
		    border:none;
		    border-bottom: 1px solid #e1e1e1;
		    outline: none;
		    color: black;
		}

		.card-footer {
		    display: flex;
		    flex-direction: column;
		}

		.card-footer .submit{
		    width: 100%;
		    height: 40px;
		    background-color: black;
		    border:none;
		    color:white;
		    margin: 10px 0;
		}

		.card-footer a {
		    text-align: center;
		    font-size: 12px;
		    opacity: 0.8;
		    color: white;
		    text-decoration: none;
		}
	</style>
</head>
<body>
	<div id="login">
		<form method="POST" class="card">
			<div class="card-header">
				<h2>Login</h2>
			</div>
			<div class="card-content">
				<div class="card-content-area">
					<label for="usuario">Usuário</label>
					<input type="text" name="usuario" autocomplete="off">
				</div>
				<div class="card-content-area">
					<label for="password">Senha</label>
					<input type="password" id="password" name="senha" autocomplete="off">
				</div>
				<div class="card-footer">
					<input type="submit" value="Login" class="submit" name="enviar">
					<a href="#" class="recuperar_senha">Esqueci a minha senha</a>
				</div>

				<div class="card-footer">
					<input type="submit" value="Cadastrar" class="submit" name="enviar">
					<a href="#" class="Cadastrar">Cadastra-se agora</a>
				</div>

			</div>
		</form>
	</div>
                
	<?php

		session_start();
		if (isset($_POST["enviar"])) {
			$usuario = $_POST["usuario"];
			$senha = $_POST["senha"];

			// usuario preencheu os dois campos
			if (!empty($usuario) && !empty($senha)) {

				require_once("conecta.php");

				$sql = "SELECT * FROM `usuarios` WHERE (login='$usuario' OR email='$usuario') AND senha='$senha' ";

				$resultado = mysqli_query($conn, $sql);

				if (mysqli_num_rows($resultado) == 1) {
					$usuario = mysqli_fetch_array($resultado);

					$_SESSION["usuario"] = $usuario["login"];
					$_SESSION["nivel"] = $usuario["nivel"];
					//echo "Nivel de Acesso: $_SESSION['nivel']";
					header("location: inicio.php");

				} else {
					echo ("Usuário ou senha incorreto");
				}
			} else {
				echo ("Preencha todos os dados corretamente antes de continuar");
			}
		}
	?>
</body>
</html>