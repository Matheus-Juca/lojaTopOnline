    <?php
    if(isset($_POST['submit'])){
        include_once('./database/conexao.php');


        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO login (nome, email, password) VALUES ('$nome', '$email', '$pass')";
        $result = mysqli_query($conexao, $sql);    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../asset/styles/cad.css">
</head>
<body>

<nav class="menu">
    <ul>
        <li><a href="../ecomerce/index.php">Loja</a></li>
        <li><a href="#">Meus produtos</a></li>
        <li><a href="#">logout</a></li>
    </ul>
</nav>
    <div class="content">
        <div class="cadastro">
            <form action="cadastro.php" method="POST">

                <h2>Realize seu cadastro</h2>
                <label for="">Nome</label> <br>
                <input type="text" name="nome" id="" placeholder="nome completo"> <br>
                

                <label for="">Email</label> <br>
                <input type="text" name="email" placeholder="exemplo@gmail.com"><br>

                <label for="">Senha</label><br>
                <input type="password" name="password" id="" placeholder="password"><br> <br>

                <button type="submit" name="submit" class="btn">login</button>
            </form>
        </div>
    </div>
</body>
</html>