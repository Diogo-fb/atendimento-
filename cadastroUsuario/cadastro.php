<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro Usuário</title>
</head>
<body><?php  
    if (isset($_GET['erro']) && $_GET['erro'] == 'senhas'):
         echo' <p class="erro">As senhas não coincidem. Por favor, tente novamente.</p>';
    endif;
    if (isset($_GET['erro']) && $_GET['erro'] == 'email'):
        echo' <p class="erro">Email já cadastrado</p>';
   endif;
    $operacao = "incluir";
    print '<form action="../Controller/processaUsuario.php" method="post">';
    print '<div class="box-Cadastro">
        <h1>Cadastro Usuário FGTAS</h1>
        <div class="form">
            <label for="nomeUsuario">Nome</label>
            <input type="text" name="nomeUsuario" placeholder="digite seu nome" required>
        </div>
        <div class="form">
            <label for="idPerfil">Selecione o tipo perfil </label>
            <select name="idPerfil" id="idPerfil" required>
                 <option value="1">Perfil administrativo</option>
                 <option value="2">Perfil funcionario</option>
            </select>
        </div>
        <div class="form">
            <label for="telefoneCeluar">Telefone</label>
            <input type="phone" name="telefoneCelular" placeholder="digite seu telefone"required>
        </div>
        <div class="form">
            <label for="emailUsuario">E-mail</label>
            <input type="email" name="emailUsuario" placeholder="digite seu e-mail" required>
        </div>
        <div class="form">
            <label for="senhaUsuario">Senha</label>
            <input type="password" name="senhaUsuario" placeholder="digite sua senha"required>
        </div>
        <div class="form">
            <label for="confirmaSenha">Confirmar Senha</label>
            <input type="password" name="confirmaSenha" placeholder="digite sua senha"required>
        </div>
        <div>
            <input type="hidden" name="op" value="'.$operacao.'">
            <input type="submit" class="enter" value="Cadastrar-se">
        </div>
    </div>
    </form>';
    ?>
</body>
</html>