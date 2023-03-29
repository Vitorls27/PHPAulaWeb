<?php
include '../Util.php';
Util::verificar();
session_start();

if(!empty($_POST)){
    Util::logar($_POST);
}
  $_SESSION['login'] = null;
?>
<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
		<h3>Login Sistema Academico</h3>
		<form action="login.php" method="post">
			<?php
				if(isset($_GET["msg"])){
					echo "<b style='color:red;'>Login ou senha errado, por favor tente novamente!</b><br>";
				}
			?>
			<label>Login</label><br>
			<input type="text" name="login" placeholder="usuario"><br>
			<label>Senha</label><br>
			<input type="password" name="senha" placeholder="******"><br>
			<input type="submit" value="Logar"/>
		</form>
  </body>
</html>