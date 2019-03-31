<?php
// Puxar dados do db_projeto
require_once 'db_projeto.php';
// Sessão
session_start();

if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }
 
$logado = $_SESSION['email'];
//Dados do Usuario
$id = $_SESSION['id_users'];
$sql = "SELECT * FROM users WHERE id = '$id' ";
$resultado = mysqli_query($connect, $sql);
$date = mysqli_fetch_array($resultado)
?>
<html>
<head>
	<title>Feed de Noticias</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <div class="container">
  	<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
      <a class="navbar-brand" href="home.php"><img src="image/logo.png" width="30" height="30" alt="">Alicerce</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navSite" aria-controls="navSite" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-item nav-link" href="editarperfil.php">Perfil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="logout.php">Sair</a>
            </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="container my-2">
    <div class="row">
      <div class="col mb-4">
        <div class="card " style="width: 18rem;">
          <img src="image/perfil.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo $date['nome']; ?></h5>
            <p class="card-text"><?php echo $date['email']; ?></p>
            <a href="editarperfil.php" class="btn btn-primary btn-block rounded-pill">Editar Dados</a>
          </div>
        </div>
      </div>
      <div class="col md-4 ">
        <div class="form-group">
          <form class="form-group"action="postagens.php" method="POST">
            <div class="form-group">
              <label><h3>O que você está pensando?</h3></label>
              <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            </div>
            <div>
              <input type="file" class="form-control-file" id="imagem" value="" name="imagem">
            </div>
            <button type="submit" class="btn btn-primary btn-postar my-2">Postar</button>
          </form>
          <div class="media border">
          <?php
          if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
          }
          $sql = "SELECT * FROM postagens";
          $date = mysqli_query($connect, $sql);
          ?>

            <img src="image/postperfil.png" class="align-self-start mr-3 mx-1" alt="...">

            <div class="media-body">
              <h5 class="mt-1">Post</h5>
              <?php
                while($row_users = mysqli_fetch_assoc($date)){
              ?>
                <p><?php echo $row_users['descricao'] ?>
                </p>
                <?php
              }
              ?>
                <p>
                  <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#postcoment" role="button" aria-expanded="false" aria-controls="postcoment">Comentarios
                  </a>
                  <a href="apagarpostagens.php" class="mb-2">X</a>
                </p>
                <div class="collapse" id="postcoment">
                  <div class="form-group">
                    <input class="form-control form-control-sm" type="text" placeholder="Comente">
                    <button class="btn btn-outline-success btn-sm my-1" type="submmit">Enviar</button>  
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="jumbotron">
          <h2 class="display-5">Acesse, Alicerce!</h2>
          <p class="lead">Não importa o lugar em que você mora, com o apoio dos nossos investidores, nós estamos preparados para abrir salas de aula em todo o Brasil. Assim que tivermos um número mínimo de alunos no seu bairro ou na sua cidade, nós abriremos muito rapidamente uma sala perto de você para que o seu jovem comece as aulas presenciais, que são a parte mais importante do Alicerce.</p>
          <hr class="my-4">
          <p>Nós temos mais de 50 mil salas planejadas no Brasil. Clique no botão abaixo e saiba</p>
          <a class="btn btn-primary btn-lg" href="https://alicerceedu.com.br/contratar?fbclid=IwAR0f5jPHHXCyBM9_Ql0RkeF0YzjMRDoxgHQ7fKRLgjjo3_m-FzwDHbfbSZc" role="button">Descubra mais</a>
        </div>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>