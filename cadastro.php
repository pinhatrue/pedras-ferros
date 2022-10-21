<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: content-box;
}

input[type=text], select, textarea {
  width: 50%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
  resize: vertical;
}

label {
  padding: 10px 12px 12px 0px;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 10px;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  float: ;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  width: 50%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
  text-align: center;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 5px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
 
<h2>cadastre-se</h2>

<div class="container">
  <form action="/action_page.php">
  <div class="row">
    <div class="col-25">
      <label for="usuario">Nome</label>
    </div>
    <div class="col-75">
      <input type="text" id="usuario" name="usuario" placeholder="Crie seu usuario..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="senha">Senha</label>
    </div>
    <div class="col-75">
      <input type="text" id="senha" name="lastname" placeholder="Crie sua senha..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country">Estado</label>
    </div>
    <div class="col-75">
      <select id="country" name="country">
        <option value="Acre(AC)">Acre (AC)</option>
        <option value="Alagoas(AL)">Alagoas (AL)</option>
        <option value="Amapá(AP)">Amapa (AP)</option>
        <option value="Amazonas(AM)">Amazonas(AM)</option>
        <option value="Bahia(BA)">Bahia (BA)</option>
        <option value="Ceará(CE)">Ceara (CE)</option>
        <option value="EspíritoSanto(ES)">Espírito Santo (ES)</option>
        <option value="Goiàs(GO)">Goias (GO)</option>
        <option value="Maranhão(MA)">Maranhao (MA)</option>
        <option value="MatoGrosso(MT)">Mato Grosso (MT)</option>
        <option value="MatoGrossodoSul(MS)">Mato Grosso do Sul (MS)</option>
        <option value="MinasGerais(MG)">Minas Gerais (MG)</option>
        <option value="Pará(PA)">Para (PA)</option>
        <option value="Paraíba(PB)">Paraíba (PB)</option>
        <option value="Paraná(PR)">Parana (PR)</option>
        <option value="Pernambuco(PE)">Pernambuco (PE)</option>
        <option value="Piauí(PI)">Piauí (PI)</option>
        <option value="RiodeJaneiro(RJ)">Rio de Janeiro (RJ)</option>
        <option value="RioGrandedoNorte(RN)">Rio Grande do Norte (RN)</option>
        <option value="RioGrandedoSul(RS)">Rio Grande do Sul (RS)</option>
        <option value="Rondônia(RO)">Rondonia (RO)</option>
        <option value="Roraima(RR)">Roraima (RR)</option>
        <option value="SantaCatarina(SC)">Santa Catarina (SC)</option>
        <option value="SãoPaulo(SP)">Sao Paulo (SP)</option>
        <option value="Sergipe(SE)">Sergipe (SE)</option>
        <option value="Tocantins(TO)">Tocantins (TO)</option>
      </select>
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>

<?php

$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$connect = mysql_connect('nome_do_servidor','nome_de_usuario','senha');
$db = mysql_select_db('nome_do_banco_de_dados');
$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['login'];

  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";

    }else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.html';</script>";
        die();

      }else{
        $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
        $insert = mysql_query($query,$connect);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";
        }
      }
    }
?>
</body>
</html>
