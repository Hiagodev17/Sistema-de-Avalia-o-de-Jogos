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
    $target_dir = "../imagensJogos/";
$target_file = $target_dir . basename($_FILES["imagem1"]["name"]);
$target_file2 = $target_dir . basename($_FILES["imagem2"]["name"]);
$uploadOk = 1;
$uploadOk2 = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

$nome = $conexao->real_escape_string($_POST['nome']);
$descricao = $conexao->real_escape_string($_POST['descricao']);
$dataAtual = date("Y-m-d");
$numeroAleatorio1 = rand(1000, 5554);
$numeroAleatorio2 = rand(5555, 9999);
$nomeFormatado = preg_replace("/[^a-zA-Z0-9]/", "", $nome); // remove caracteres especiais
$novoNome = "{$nomeFormatado}_{$dataAtual}_{$numeroAleatorio1}.{$imageFileType}";
$novoNome2 = "{$nomeFormatado}_{$dataAtual}_{$numeroAleatorio2}_2.{$imageFileType2}";

$caminhoFinal = $target_dir . $novoNome;
$caminhoFinal2 = $target_dir . $novoNome2;

if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $caminhoFinal)) {

        echo "Imagem enviada com sucesso: $novoNome<br>";
}
if (move_uploaded_file($_FILES['imagem2']['tmp_name'], $caminhoFinal2)) {
        echo "Imagem enviada com sucesso: $novoNome<br>";
}

    $sql = "INSERT INTO jogos (`nome`, `imagemUm`, `imagemDois`, `descricao`, `nLikes`, `nDislikes`)
            VALUES ('".$nome."', '".$caminhoFinal."' , '".$caminhoFinal2."', '".$descricao."', 0,0 );";
   
    $resultado = $conexao->query($sql);
    $conexao->close();
    header('Location: usuarios.php', true, 301);
}

?>