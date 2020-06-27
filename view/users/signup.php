<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../signup.css">
    <title>Sarvalap - Cadastro</title>
</head>
<body>
    <header>
        <nav id="main-nav">
            <ul>
                <li><a href="Handler.php?action=home">Sarvalap[LOGO AQUI]</a></li>
                <li><a href="Handler.php?action=home">Home</a></li>
                <li><a href="#">Cartegorias</a></li>
            </ul>
        </nav>
        <nav id="login">
            <form method="POST">
                <ul>
                    <li><a href="Handler.php?action=login">Login</a></li>
                    <li><a href="#">|</a></li>
                    <li><a href="Handler.php?action=cadastrar">Cadastre-se</a></li>
                </ul>
            </form>
        </nav>
    </header>

    <form method="POST">
        <div class="card">
            <div class="name">
                <label for="name">
                    Nome
                </label>
                <input type="text" id="name" name="name" placeholder="Seu nome" pattern=".{4.}" required>
            </div>
            
            <div class="nickname">
                <label for="nickname">
                    Nome de usuário
                </label>
                <input type="text" id="nickname" name="nickname" placeholder="Nome de usuario" pattern=".{4.}" required>
            </div>

            <div class="email">
                <label for="email">
                    Email
                </label>
            <input type="email" id="email" name="email" placeholder="meu@email.com" required>
            </div>

            <div class="password">
                <label for="password">
                    Senha
                </label>
                <input type="password" id="password" name="password" pattern=".{4.}" required>
            </div>

            <div class="submit">
                <a href="Handler.php?action=login">Possui cadastro? Entre</a>
                <button type="submit">
                    Cadastrar
                </button>
            </div>
        </div>
    </form>
</body>
</html>