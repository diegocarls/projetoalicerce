<?php
// Puxar dados do db_projeto
require_once 'db_projeto.php';
// Sessão
session_start();
// Botão entrar e verificação de login 
if(isset($_POST['btn-logar'])):
	$erroslogin = array();
	$email = mysqli_escape_string($connect, $_POST['email']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
	//Caso campo estiver vazio
	if(empty($email) or empty($senha)):
		$erroslogin[] = "<script language='javascript' type='text/javascript'>alert('O campo email e/ou senha está vazio');window.location.href='#';</script>";
	//Caso esteja preenchido
	else:
		$sql = "SELECT email FROM users WHERE email = '$email'";
		$resultado = mysqli_query($connect, $sql);
		if(mysqli_num_rows($resultado) > 0):
		$senha = md5($senha);       
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$resultado = mysqli_query($connect, $sql);
			if(mysqli_num_rows($resultado) == 1):
				$date = mysqli_fetch_array($resultado);
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_users'] = $date['id'];
				header('Location: home.php');
			else:
				$erroslogin[] = "<script language='javascript' type='text/javascript'>alert('Usuário e/ou senha errado');window.location.href='#';</script>";
			endif;
		else:
			$erroslogin[] = "<script language='javascript' type='text/javascript'>alert('Usuário inexistente');window.location.href='#';</script>";
		endif;
	endif;
endif;
?>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
?>
<?php 
if(!empty($erroslogin)):
	foreach($erroslogin as $erro):
		echo $erro;
	endforeach;
endif;
?>
<section class="container-fluid bg">
	<section class="row justify-content-center">
		<section class="col-12 col-sm-6 col-md-3">
			<form class="form-container" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="form-group">
					<label for="inputEmail">Email:</label>  
					<input type="email" name="email" value="" placeholder="exemplo@email.com">
				</div>
				<div class="form-group">
					<label for="-inputPassword">Senha:</label>  
					<input type="password" name="senha" value="" placeholder="********">
				</div>
				<button type="submit" class="btn btn-success btn-block rounded-pill" name="btn-logar">Entrar</button>
				<button type="submit" class="btn btn-primary btn-block rounded-pill">Entrar com Facebook</button>
				<button class="btn btn-warning btn-block rounded-pill"><a href="cadastro.php">Cadastre-se</a></button>
			</form>
		</section>
	</section>
</section>


</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>