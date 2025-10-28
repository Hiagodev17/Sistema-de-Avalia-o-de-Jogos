<?php

    //Iniciar uma sessão

    session_start();


    $hostname = "127.0.0.1";

    $user = "root";

    $password = "root";

    $database = "avaliacaojogos";


    $conexao = new mysqli($hostname, $user, $password, $database);


    if($conexao->connect_errno) {

        echo "Failed to connect to MySQL: " . $conexao->connect_error;

        exit();

    } else{

        // Evita caracteres especiais (SQL Inject)

        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);
        $tipo = $conexao->real_escape_string($_POST['tipo']);


        if($tipo == 0){

            $sql = "SELECT `email`, `senha`, `adminID`, `nome` FROM `admin`

                WHERE `email` = '".$email."'

                AND `senha` = '".hash('sha256', $senha)."'

                ;";

            $resultado = $conexao->query($sql);

            if($resultado->num_rows != 0){

                $row = $resultado-> fetch_array();

                $_SESSION['adminID'] = $row[2];

                $_SESSION['nomeAdmin'] = $row[3];

                $conexao->close();

                header('Location: admin/admin.php', true, 301);

                exit();

            } else{

                $conexao->close();

                header('Location: index.php', true, 301);

            }


        } else if($tipo == 1){

            $sql = "SELECT `email`, `senha`, `usuariosID`, `nome` FROM `usuarios`

                WHERE `email` = '".$email."'

                AND `senha` = '".hash('sha256', $senha)."'

                ;";
            $resultado = $conexao->query($sql);
            if($resultado->num_rows != 0){

                $row = $resultado-> fetch_array();

                $_SESSION['usuariosID'] = $row[2];

                $_SESSION['nomeUsuarios'] = $row[3];

                $conexao->close();

                header('Location: usuarios/usuarios.php', true, 301);

                exit();

            } else{

                $conexao->close();

                header('Location: index.php', true, 301);

            }


        } else{

            header('Location: index.php', true, 301);

            exit();

        }


        


        if($resultado->num_rows != 0){

            $row = $resultado-> fetch_array();

            $_SESSION['idUsuario'] = $row[0];

            $_SESSION['nomeUsuario'] = $row[1];

            $conexao->close();

            header('Location: site.php', true, 301);

            exit();

        } else{

            $conexao->close();

            header('Location: index.php', true, 301);

        }


       


    }




?>