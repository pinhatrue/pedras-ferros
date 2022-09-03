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
    <header>
      <div class="content">
        <nav>
          <p class="brand">André Flesch <strong>Pedras</strong></p>
          <ul>
            <li><a href="#catalog">Catálogo</a></li>
            <li><a href="#about">Sobre</a></li>
            <li><a href="#features">Contato</a></li>
            <button>Login</button>
          </ul>
        </nav>
        <div class="header-block">
          <div class="text">
            <h2>André Flesch Pedras</h2>
            <p>
              paragrafo paragrafo 
            </p>
          </div>
          <img src="images/logo.jpeg" alt="André Flesch Pedras" />
        </div>
      </div>
    </header>
    <section class='catalog' id='catalog'>
      <div class='content'>
        <div class='title-wrapper-catalog'>
          <p>Encontre o que você precisa</p>
          <h3>Catálogo</h3>
        </div>
        <div class='filter-card'>
          <input
          type='text'
          class='search-input'
          placeholder='Faça sua busca'
          />
          <button class='search-button'>Busca</button>
        </div>

            <?php
            $conn = mysqli_connect("127.0.0.1", "root", "", "pedras"); // abre a conexão com o banco de dados
            if ($conn == false){
              die("Houve um erro ao conectar com o banco de dados");
            }


            //$sql = "SELECT * FROM contatos ORDER BY nome ASC";
            $sql = "SELECT * FROM PRODUTOS, IMAGENS WHERE produtos.id = imagens.id_produto"; // consulta ligando as duas tabelas para exibir o nome do grupo

            $registros = mysqli_query($conn, $sql);

            if (mysqli_num_rows($registros) > 0){
              // codigo para mostrar os registros

              //echo ("<h1>Mostrando os contatos da agenda</h1>");
              
              //echo ("<a href='inserir_contato.php' class='btn btn_primary'>Inserir contato</a><br><br>");

              //echo ("<div class='dados'>");

              // abrindo a tabela
              //echo ("<table><tr><th>Nome</th><th>Email</th><th>Número</th><th>Grupo</th><th>Opções</th></tr>");
              
              while ($registro = mysqli_fetch_array($registros) ){
                //echo ("Nome: " . $registro["nome"]);
                //echo ("<tr><td>" . $registro["nome"] . "</td><td>". $registro["email"] . "</td><td>" . $registro["numero"] . "</td></tr>");
                //echo ("<a scr='$registro[imagem]'");
                echo ("
                <div class=''>  
                  <div class='card-wrapper'>
                    <div class='card-item'>
                      <img src='$registro[imagem]' alt='Car' />
                      <div class='card-content'>
                        <h3>$registro[nome]</h3>
                        <p>
                          $registro[descricao]
                        </p>
                        <button type='button'>Comprar</button>
                      </div>
                    </div>
                   </div> 
                </div>
                  ");
              }

              //echo ("</table>");
              //echo ("</div>");
            

              mysqli_close($conn); // fechando a conexao com o BD

            } else {
              echo ("Houve um erro ao conectar com o banco de dados");
            }
        ?>
      </div>
    </section>
    <section class="about" id="about">
      <div class="content">
        <div class="title-wrapper-about">
          <p>Quem Somos</p>
          <h3>Sobre</h3>
        </div>
        <div class="about-content">
          <div class="left">
            <img src="https://lh3.googleusercontent.com/p/AF1QipMQ0xBT3usP17nj4WmbfxGrD93CWuQutPqRe_Gp=w960-h960-n-o-v1" alt="About" />
          </div>
          <div class="right">
            <h3>PEDRA FERRO</h3>
            <p>
              Pedra ferro ferrugem e basalto preto
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="features" id="features">
      <div class="content">
        <div class="title-wrapper-features">
          <p>Contato</p>
          <h3>Fechar Pedido</h3>
        </div>
        <div class="feature-card-block">
          <div class="feature-card-item">
            <img src="images/whatsapp.png" alt="Feature" />
            <div class="feature-text-content">
              <h3>Whatsapp</h3>
              <p>Para orçamento estamos disponíveis através do WhatsApp no Link abaixo</p>
              <p>Atendemos todo Brasil diretamente pela fábrica ou através de parceiros.</p>
            </div>
          </div>
          <div class="feature-card-item">
            <img src="images/whatsapp.png" alt="Feature" />
            <div class="feature-text-content">
              <h3>Whatsapp</h3>
              <p>Para orçamento estamos disponíveis através do WhatsApp no Link abaixo</p>
              <p>Atendemos todo Brasil diretamente pela fábrica ou através de parceiros.</p>
            </div>
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
      </div>
      <div class="last">Copyright 2022</div>
    </footer>
  </body>
</html>
