    <?php
        if(isset($_POST['submitProduto'])){
    include_once('../database/conexaop.php');

    $nome = mysqli_real_escape_string($conexao, $_POST['nome-produto']);
    $categoria = mysqli_real_escape_string($conexao, $_POST['categoria-produto']);
    $preco = floatval($_POST['preco']);

    //TRATAMENTO DA IMAGEM

    $pasta = "../assets/img/produtos/";
    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $nomeImagem = $_FILES['imagem']['name'];
    $tmp = $_FILES['imagem']['tmp_name'];

    $caminhoFinal = $pasta . $nomeImagem;

    move_uploaded_file($tmp, $caminhoFinal);

    //SALVANDO NO BANCO

    $sql = "INSERT INTO produtos (nome, categoria, preco, imagem)
        VALUES ('$nome', '$categoria', '$preco', '$nomeImagem')";

    mysqli_query($conexao, $sql);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
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
           <form action="cadProdutos.php" method="post" enctype="multipart/form-data">


            <h2>Cadastre o produto</h2>
            <label for="">Nome do produto</label> <br>
            <input type="text" name="nome-produto" id=""><br>

            <label for="">Categoria Produto</label> <br>
            <input type="text" name="categoria-produto" id=""><br> 

            <label for="">Preço do produto</label> <br>
            <input type="number" name="preco" id=""> <br> <br>

            <label>Imagem do produto</label> <br>
            <input type="file" name="imagem"><br><br>


            <button class="btn" type="submit" name="submitProduto">cadastrar produto</button>
        </form>
        </div>
    </div>
</body>
</html>