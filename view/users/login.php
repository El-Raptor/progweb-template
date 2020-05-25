<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../login.css">
    <title>Sarvalap - Login</title>
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

    <div class="card">
        <form class="login" method="POST">
            <div class="email">
                <label class="email_label" for="email">
                    Email
                </label>
                <input type="email" id="email" placeholder="exemplo@email.com" name='email' required>   
            </div>
            <div class="password">
                <label class="password_label" for="password">
                    Senha
                </label>
                <input id="password" type="password" name="password" pattern=".{4,}" required>
            </div>
            <div class="submit">
                <button type="submit">
                    Entrar
                </button>
                <a href="Handler.php?action=cadastrar">Novo por aqui? Cadastre-se!</a>
            </div>
        </form>
    </div>
</body>
</html>