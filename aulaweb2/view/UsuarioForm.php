<?php 
include "../controller/UsuarioController.php";
include '../Util.php';
Util::verificar();

$usuario = new UsuarioController();

  if(!empty($_POST['id'])){
    $usuario->update($_POST);
    header("location: UsuarioList.php");

  } elseif(!empty($_POST)) {
    $usuario->salvar($_POST);
    header("location: UsuarioList.php");

  }

  if(!empty($_GET['id'])){
    $data = $usuario->buscar($_GET['id']);
  }
?>
<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
      <h1>Formulário Usuário</h1>
        <form action="UsuarioForm.php" method="POST">
            <input type="hidden" name="id" value="<?php echo !empty($data->id) ? $data->id : "" ?>"/><br>
            <label>Nome</label><br>
            <input type="text" name="nome" value="<?php echo !empty($data->nome) ? $data->nome : "" ?>"/><br>
            <label>Telefone</label><br>
            <input type="text" name="telefone" value="<?php echo !empty($data->telefone) ? $data->telefone : "" ?>"/><br>

            <input type="submit" value="Salvar"/>
            <button><a href="UsuarioList.php">Voltar</a></button>
        </form>
	</body>
</html>