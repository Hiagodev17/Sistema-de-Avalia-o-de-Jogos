<?php
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
    $nome = $conexao->real_escape_string($_POST['nome']);
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $conexao->real_escape_string($_POST['senha']);

    $senhaHash = hash('sha256', $senha);

    $sql = "INSERT INTO usuarios (`nome`, `senha`, `email`)
            VALUES ('".$nome."', '".$senhaHash."' , '".$email."');";
   
    $resultado = $conexao->query($sql);
    $conexao->close();
    header('Location: admin.php', true, 301);
}

?>