<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Login</title>

</head>

<body>

   

    <div class="divLogin">

        <form method="post" action="verificaLogin.php" id="formlogin" name="formlogin">
            <label>Tipo: </label>
            <select name="tipo" id="tipo">
                <option value="1">Usuario</option>
                <option value="0">Admin</option>
            </select><br>

            <label>>E-mail: </label>

            <input type="text" name="email" id="email" size="20"><br>


            <label>>Senha: </label>

            <input type="password" name="senha" id="senha" size="20"><br>

            <center>

                <input type="submit" value="LOGAR">

            </center>

        </form>

    </div>




   



</body>

</html>