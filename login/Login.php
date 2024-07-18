<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php  if (isset($_GET['erro']) && $_GET['erro'] == 'login'):
         echo' <p class="erro">Email ou senha incorreto</p>'; endif;?>
    <div class="logo"> <img src="logo1.png"></div>
        <form action="../Controller/processaLogin.php" name="login" class="box-login" method="post">
            <h2>LOGIN FGTAS</h2>
            <div class="form">
                <label for="emailUsuario">E-mail</label>
                <input type="email" name="emailUsuario" placeholder="Digite seu e-mail" required>
            </div>
            <div class="form">
                <label for="senhaUsuario">Senha</label>
                <input type="password" name="senhaUsuario" placeholder="Digite sua senha" required>
            </div>
            <div class="btn">
                <input type="submit" class="btn" name="entrar" value="Entrar">
            </div>
            <div class="txt">
                <span>Não possui conta?</span>
                <a href="../cadastroUsuario/cadastro.php">Crie agora</a>
            </div>
        </form>
</body>
</html>