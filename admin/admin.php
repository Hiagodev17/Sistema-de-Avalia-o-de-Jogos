<html>

    <head>

        <title>.: Meu lindo site :.</title>
        <link rel="stylesheet" href="../style.css">

        <style>


            .sair:link, .sair:visited {

            background-color: white;

            color: black;

            border: 2px solid green;

            padding: 10px 20px;

            text-align: center;

            text-decoration: none;

            display: inline-block;

            }


            .sair:hover, .sair:active {

            background-color: green;

            color: white;

            }

        </style>
    </head>
    <body>

        <?php
            // iniciar uma sessão
            session_start();

                echo '<table>
                    <tr>
                        <td width=50%>

                            <center>

                            <span >Bem vindo, '.$_SESSION['nomeAdmin'].'!</span>
                            <br>
                           
                            </center>
                        </td>
                        </tr>
                       
                </table>';
                echo '<a href="cadastrarUsuario.php">Cadastrar novo usuário</a>';
                echo '<a href="cadastrarJogo.php">Cadastrar novo jogo</a>';
        
            $hostname = "127.0.0.1";
            $user = "root";
            $password = "root";
            $database = "avaliacaojogos";
       
            $conexao = new mysqli($hostname,$user,$password,$database);

           
            $conexao -> close();

        ?>
        <br>
        <a href="../sair.php" class='sair'>Sair</a>
    </body>
</html>