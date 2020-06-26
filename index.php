<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarvalap Caça Palavras</title>
    <link type="text/css" rel="stylesheet" href="estilo.css">
</head>

<body>
    <header>
        <nav id="main-nav">
            <ul>
                <li><a href="controller/Handler.php?action=home">Sarvalap[LOGO AQUI]</a></li>
                <li><a href="controller/Handler.php?action=home">Home</a></li>
                <li><a href="#">Cartegorias</a></li>
            </ul>
        </nav>
        <nav id="login">
            <form method="POST">
                <?php 
                    session_start();
                    if (isset($_SESSION['users'])) {
                        echo "<ul>";
                        echo "<li><a href=controller/Handler.php?action=info>Perfil</a></li>";
                        echo "<li><a href=controller/Handler.php?actuib=logout>Sair</a></li>";
                        echo "</ul>";
                    } else {
                        echo "<ul>";
                        echo "<li><a href=controller/Handler.php?action=login>Login</a></li>";
                        echo "<li><a href=>|</a></li>";
                        echo "<li><a href=controller/Handler.php?action=cadastrar>Cadastre-se</a></li>";
                        echo "</ul>";
                    }
                ?>
                
            </form>
        </nav>
    </header>

    <section id="row">
        <section id="column">
            <div>
                <img src="trabalho/res/caca-palavras.png" alt="caça-palavras a implementar">
            </div>
        </section>
        <button>Categorias</button>
    </section>

</body>

</html>