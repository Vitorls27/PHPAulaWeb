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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="conteiner">
      <h1>Listagem de Usuários</h1>
      <form action="UsuarioList.php" method="post">
        <div class="row">
          <div class="col-2">
            <select name="campo">
              <option value="nome">Nome</option>
              <option value="telefone">Telefone</option>
            </select>
          </div>
          <div class="col-5">
            <input type="text" name="valor" class="form-control" Placeholder="Pesquisar"/>
          </div>
          <div class="col-2">
            <input type="submit" value="Buscar" class="btn btn-primary"/>
            <a href="UsuarioForm.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </form>
      <table class="table table-striped">
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
              <td><a href='./UsuarioForm.php?id=$item->id><i class='fa-solid fa-pen-to-square'></i></a></td>
              
              <td><a href='./UsuarioList.php?id=$item->id'
                      onclick='return confirm(\"Deseja Excluir?\")'
              >Excluir</a></td>
            </tr>";
      }
          ?>
      </table>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    </div>
  </body>
</html>