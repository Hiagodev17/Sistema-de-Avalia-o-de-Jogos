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

    echo '<table border= 1px solid black;><tr><th>CADASTRAR USUÁRIO</th></tr>
                <form method="post" action="cadastrarUsuarioBanco.php" id="cadastrarUsuarioBanco" name="cadastrarUsuarioBanco" >
                    <tr><td><label>Nome</label></td><td><input type="text" name="nome"></td></tr>
                    <tr><td><label>Email</label></td><td><input type="email" name="email"></td></tr>
                    <tr><td><label>Senha</label></td><td><input type="password" name="senha"></td></tr>
                    <tr><td><input type="submit" value="CADASTRAR"></td></tr>
                    </form>
                </table>';
      
    exit();
?>
</body>
</html>