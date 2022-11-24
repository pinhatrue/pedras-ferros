<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flesch Pedras</title>
    <link rel="stylesheet" href="css/styles.css" />

  </head>
  <body>

  	<div>
  		<?php
  		require_once("nav.php");
  		require_once("conecta.php");
    	?>
    </div>

    <section class='catalog' id='catalog'>
      <div class='content'>
        <div class='title-wrapper-catalog'>
          <p>Encontre o que você precisa:</p>
          <h3>Catálogo</h3>
        </div>
        
        <!-- <div class='filter-card'>
          <input
          type='text'
          class='search-input'
          placeholder='Faça sua busca'
          />
          <button class='search-button'>Busca</button>
        </div> -->

            <?php


            //$sql = "SELECT * FROM contatos ORDER BY nome ASC";
            $sql = "SELECT * FROM PRODUTOS"; // consulta ligando as duas tabelas para exibir o nome do grupo
            // , IMAGENS WHERE produtos.id = imagens.id_produto

            $registros = mysqli_query($conn, $sql);

            if (mysqli_num_rows($registros) > 0){
              // codigo para mostrar os registros

              //echo ("<h1>Mostrando os contatos da agenda</h1>");
              
              //echo ("<a href='inserir_contato.php' class='btn btn_primary'>Inserir contato</a><br><br>");

              //echo ("<div class='dados'>");

              // abrindo a tabela
              //echo ("<table><tr><th>Nome</th><th>Email</th><th>Número</th><th>Grupo</th><th>Opções</th></tr>");
              echo ("<div class='card-wrapper'>");
              while ($registro = mysqli_fetch_array($registros) ){
                //echo ("Nome: " . $registro["nome"]);
                //echo ("<tr><td>" . $registro["nome"] . "</td><td>". $registro["email"] . "</td><td>" . $registro["numero"] . "</td></tr>");
                //echo ("<a scr='$registro[imagem]'");
                echo ("  
                    <div class='card-item'>
                      <img src='./fotos/$registro[imagem]' alt='$registro[nome]' />
                      <div class='card-content'>
                        <h3>$registro[nome]</h3>
                        <p>
                          $registro[descricao]
                        </p>
                      </div>
                      <button><a href='comprar_produto.php?id_produto=$registro[id]'>Comprar</a></button>
                    </div>
                ");
              }
              echo ("</div>");

              //echo ("</table>");
              //echo ("</div>");
            

              mysqli_close($conn); // fechando a conexao com o BD

            } else {
              echo ("Não foram encontrados nenhum resultado");
            }
        ?>
      </div>
      <script>
        <button onclick="window.location.href = 'http://pt.stackoverflow.com'">link</button>
        </script>
              <div class="whatsapp-fixo">
          <a href="https://api.whatsapp.com/send?phone=555135476048">
            <img src="./images/" width="LARGURA" height="ALTURA" alt="Fale Conosco pelo WhatsApp"/> 
          </a>
        </div>
    </section>
    <footer>
      <div class="main">
        <div class="content footer-links">
          <div class="footer-social">
            <h4>Redes Sociais</h4>
            <div class="social-icons">
              <a href="https://www.instagram.com/andrefleschpedras">
                <img src="images/instagram.png" alt="Instagram">
              </a>
              <a href="https://www.facebook.com/andrefleschPedras">
                <img src="images/facebook.png" alt="Facebook" />
              </a>
              <a href="https://wa.me/555135476048">
                <img src="images/whatsapp_white.png" alt="Whatsapp">
              </a>
            </div>
          </div>
          <div class="footer-contact">
            <h4>Contato</h4>
            <h6>(51) 3547-6048</h6>
            <h6>contato@gmail.com</h6>
            <h6>Rua Aguedina Dapper 4450 Alto Rolantinho Rolante - RS
            95500-000 Brasil</h6>
          </div>
        </div>
    </footer>
  </body>
</html>