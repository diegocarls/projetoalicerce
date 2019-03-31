<?php
// Puxar dados do db_projeto
require_once 'db_projeto.php';
// Sessão
session_start();
//Dados do Usuario
$id = $_SESSION['id_users'];
$sql = "SELECT * FROM users WHERE id = '$id' ";
$resultado = mysqli_query($connect, $sql);
$date = mysqli_fetch_assoc($resultado);
?>
<html>
<head>
	<title>Editar Perfil</title>
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
    <div class="row justify-content-between">
      <div class="col-4">
        <div class="card" style="width: 18rem;">
          <img src="image/perfil.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo $date['nome']; ?></h5>
            <p class="card-text"><?php echo $date['email']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-4">
        <form class="form-group" method="POST" action="editarperfildate.php">
          <input type="hidden" name="id" value="<?php echo $date['id'];?>">
          <div class="form-group">
            <label>Nome</label>
              <input type="text" name="nome" value="<?php echo $date['nome'];?>" >
          </div>
          <div class="form-group">  
            <label>Email</label>
              <input type="text" name="email" value="<?php echo $date['email'];?>">
          </div>  
            <label>Senha</label>
              <input type="password" name="senha" value="<?php echo $date['senha'];?>">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>