<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
</head>
<body>
    <?php
    include_once '../Controller/AtendController.php';

     if(isset($_GET['id'])) {
        $idUsuario = $_GET['id'];

        $controller = new AtendController();
        $usuario = $controller->buscarPorId($idUsuario);

        if(isset($usuario)) : ?>
            <form action="../Controller/processaAlteracao.php" method="POST">
                <input type="hidden" name="idUsuario" value="<?php echo $usuario->idUsuario; ?>">
                <table>
                <td>
                <label for="nomeUsuario">Nome</label><br>
                <input type="text" id="nomeUsuario" name="nomeUsuario" value="<?php echo $usuario->nomeUsuario; ?>"><br>
                </td><td>
                <label for="emailUsuario">Email</label><br>
                <input type="email" id="emailUsuario" name="emailUsuario" value="<?php echo $usuario->emailUsuario; ?>"><br>
                </td><td>
                <label for="telefoneCelular">Telefone</label><br>
                <input type="text" id="telefoneCelular" name="telefoneCelular" value="<?php echo $usuario->telefoneCelular; ?>"><br>
                </td><td>
                <label for="idPerfil">Tipo perfil</label><br>
                <select id="idPerfil" name="idPerfil">
                    <option value="1" <?php if($usuario->idPerfil == 1) echo 'selected'; ?>>Perfil administrativo</option>
                    <option value="2" <?php if($usuario->idPerfil == 2) echo 'selected'; ?>>Perfil funcionario</option>
                </select><br></td><td>
                <input type="submit" value="Salvar Alterações">
        </td></table>
            </form>
        <?php else : ?>
            <p>Usuário não encontrado.</p>
        <?php endif; }?>
        
</body>
</html>