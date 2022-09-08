<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário PHP com anexo</title>
 
    <!-- Layout -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
     
    <!-- JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <?php
      //require_once("header.php");
    ?>

  </head>
 
  <body>
 <div class="container">
 <br>
   
 <form class="form-horizontal" method="POST" action="envia.php" enctype="multipart/form-data">
   <fieldset>
 
 <!-- Título do formulário -->
 <legend>Formulário PHP com envio de anexo</legend>
 
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
 
 <!-- Campo: anexo --> 
 <div class="form-group">
   <label class="col-md-4 control-label" for="arquivo">Anexo</label>
 <div class="col-md-4">
   <input id="arquivo" name="arquivo" class="input-file" type="file">
     <span class="help-block">2MB por mensagem</span>
 </div>
 </div> 
 
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
   <button type="submit" class="btn btn-inverse">Enviar</button>
 </div>
 </div>
 
   </fieldset>
 </form>
 
 </div>
  </body>
</html>