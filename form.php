<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário PHP com anexo</title>
    <link rel="stylesheet" href="css/estilo.css" />
 
    <!-- Layout -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
     
    <!-- JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


  </head>
  
    <div>
    <?php

      require_once("protege.php");
      require_once("nav.php");
      require_once("conecta.php");

      // verificação de nivel de acesso do usuario
      $nivel = $_SESSION["nivel"];
      if ($nivel == 1){
        header("location: nivel.php");
      }

    ?>
    </div>

 
  <body>
 <div class="container">
 <br>
   
 <form class="form-horizontal" method="POST">
   <fieldset>
 
 <!-- Título do formulário -->
 <legend>Envio de Produto:</legend>
 
 <!-- Campo: Nome -->
 <div class="form-group">
   <label class="col-md-4 control-label" for="nome">Nome</label>  
 <div class="col-md-4">
   <input id="nome" name="nome" placeholder="Informe o nome do produto" class="form-control input-md" required="" type="text">
 </div>
 </div>
 
 <!-- Campo: Preço -->
 <div class="form-group">
   <label class="col-md-4 control-label" for="nome">Preço</label>  
 <div class="col-md-4">
   <input id="preco" name="preco" placeholder="Informe o preço do produto R$" class="form-control input-md" required="" type="text">
 </div>
 </div>
 
 <!-- Campo: Descrição -->
 <div class="form-group">
   <label class="col-md-4 control-label" for="nome">Descrição</label>  
 <div class="col-md-4">
   <input id="descricao" name="descricao" placeholder="Informe a descrição do produto" class="form-control input-md" required="" type="text">
 </div>
 </div> 

 <!-- Campo: Estoque -->
 <div class="form-group">
   <label class="col-md-4 control-label" for="nome">Estoque</label>  
 <div class="col-md-4">
   <input id="estoque" name="estoque" placeholder="Informe o estoque do produto" class="form-control input-md" required="" type="text">
 </div>
 </div>
 
 <!-- Campo: anexo -->
<!--  
 <div class="form-group">
   <label class="col-md-4 control-label" for="arquivo">Anexo</label>
 <div class="col-md-4">
   <input id="arquivo" name="arquivo" class="input-file" type="file">
     <span class="help-block">2MB por mensagem</span>
 </div>
 </div> 
-->
 <!-- Campo: Link da Mensagem -->
 <div class="form-group">
   <label class="col-md-4 control-label" for="mensagem">Link da Imagem</label>
 <div class="col-md-4">                     
   <textarea class="form-control" id="link_imagem" name="link_imagem"></textarea>
 </div>
 </div>
 
 <!-- Botão Enviar -->
 <center>
 <div class="form-group">
   <label class="col-md-4 control-label" for="submit"></label>
 <div class="col-md-4">
   <button type="submit" name="enviar" class="btn btn-inverse">Enviar</button>
 </div>
 </div>
 
   </fieldset>
 </form>
 
 </div>
  </body>
  <?php

require_once("conecta.php");

/* Valores recebidos do formulário  */
//$arquivo = $_FILES['arquivo'];


// isset testa se uma variavel existe
if (isset($_POST["enviar"]) == true) {
 // codigo a ser executado se a variavel estiver definida

 // usando a funcao empty para saber se um campo foi preenchido
 if (empty($_POST["nome"]) == true) {
   echo ("Por favor preencha o campo <b>nome</b>");
 } else if (empty($_POST["preco"])){
   // exibindo a mesagem de erro com javascript
   //echo("<script>alert('Preencha a data de nascimento');</script>");
   echo("Preencha o <b>preco</b>");
 } else if (empty($_POST["descricao"])) {
   echo("Preencha a <b>descricao</b>");
 } else if(empty($_POST["link_imagem"])){
   echo("Preencha o <b>link_imagem</b>");
 } else {    
   $nome = $_POST["nome"];
   $preco = $_POST["preco"];
   $descricao = $_POST["descricao"];
   $estoque = $_POST["estoque"];
   $link_imagem = $_POST["link_imagem"];

   // INSERT INTO produtos (nome, preco, descricao, estoque) VALUES ('teste', '40', 'description', '40'); 
   $sql = "INSERT INTO produtos (nome, preco, descricao, estoque, imagem) VALUES ('$nome', '$preco', '$descricao', '$estoque', '$link_imagem')";


  // INSERT INTO produtos (nome, preco, descricao, estoque) VALUES ('teste', '50', 'teste', '50');
// INSERT INTO imagens (id_produto, imagem) VALUES ((SELECT LAST_INSERT_ID()),'https://lh3.googleusercontent.com/p/AF1QipO74PEJkE4XiWni5xKHmzz6ub_hTwptFDbcG0Ec=s1280-p-no-v1');
   
   // echo para debugar a consulta sql gerada
    echo ($sql);

   // mandando executar a consulta sql
   // a funcao mysqli_query retorna true se a consulta foi executada com sucesso
   if (mysqli_query($conn, $sql)){
     echo ("Produto adicionado com sucesso!<br>");
   } else {
     // erro ao executar a consulta
     echo ("Erro: $sql <br>" . mysqli_error($conn) );
   }

   // encerrando a conexao
   mysqli_close($conn);
   
 }
}

?>
</html>