<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style.css">

    <title>Document</title>

</head>

<body>
<?php
   session_start();

    echo '<table border= 1px solid black;><tr><th>CADASTRAR JOGO</th></tr>
               
                <form action="cadastrarJogoBanco.php" method="post" enctype="multipart/form-data">

                <tr><td><label for="nome">Nome do Jogo:</label></td></tr>
                <tr><td><input type="text" id="nome" name="nome" required></td></tr>
                <tr><td><label for="descricao">Descrição:</label></td></tr>
                <tr><td><input type="text" id="descricao" name="descricao" required></td></tr>

                <tr><td><label for="img1">Selecione duas imagens do jogo:</label></td></tr>
                <tr><td><input type="file" name="imagem1" id="imagem2"></td></tr>
                <tr><td><input type="file" name="imagem2" id="imagem2"></td></tr>
                <tr><td><input type="submit" value="CADASTRAR" name="submit"></td></tr>
                </form>
                </table>';
      
    exit();
?>
</body>
</html>