<?php 
include "../controller/UsuarioController.php";
include '../Util.php';
Util::verificar();

   $usuario = new UsuarioController();

  if(!empty($_GET['id'])){
    $usuario->deletar($_GET['id']);
    header("location: UsuarioList.php");
  }
  if(!empty($_POST)){
    $load = $usuario->pesquisar($_POST);

  }else{
    $load = $usuario->carregar();

  }
   //var_dump($load);
  // exit;
?>

<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <h1>Listagem de Usuários</h1>
    <form action="UsuarioList.php" method="post">
      <select name="campo">
        <option value="nome">Nome</option>
        <option value="telefone">Telefone</option>
      </select>
      <input type="text" name="valor" />
      <input type="submit" value="Buscar"/>
      <button><a href="UsuarioForm.php">Cadastrar</a></button>
  </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
        </tr>
    <?php 
    foreach($load as $item){
      echo"<tr>
            <td>$item->id</td>
            <td>$item->nome</td>
            <td>$item->telefone</td>
            <td><a href='./UsuarioForm.php?id=$item->id'>Editar</a></td>
            <td><a href='./UsuarioList.php?id=$item->id'
                    onclick='return confirm(\"Deseja Excluir?\")'
            >Excluir</a></td>
           </tr>";
    }
        ?>
    </table>
	</body>
</html>