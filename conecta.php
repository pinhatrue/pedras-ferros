<?php
  $conn = mysqli_connect("127.0.0.1", "root", "", "pedras"); // abre a conexão com o banco de dados
  if ($conn == false){
    die("Houve um erro ao conectar com o banco de dados");
}
