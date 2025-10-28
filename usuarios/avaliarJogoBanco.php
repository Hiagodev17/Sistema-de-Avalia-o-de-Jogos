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
    $idJogo = $_POST['idJogo'];
    $descricaoAvaliacao = $conexao->real_escape_string($_POST['descricaoAvaliacao']);
    $avaliacao = $_POST['avaliacao'];

    if($avaliacao == '1'){
        $sql = "INSERT INTO avaliacoes (`jogos_jogosID`, `descricao`, `tipoVoto`)
                VALUES (".$idJogo.", '".$descricaoAvaliacao."', 1 );";
        $conexao->query($sql);

        $sqlUpdate = "UPDATE jogos SET nLikes = nLikes + 1 WHERE jogosID = ".$idJogo.";";
        $conexao->query($sqlUpdate);
    } else{
        $sql = "INSERT INTO avaliacoes (`jogos_jogosID`, `descricao`, `tipoVoto`)
                VALUES (".$idJogo.", '".$descricaoAvaliacao."', 0 );";
        $conexao->query($sql);

        $sqlUpdate = "UPDATE jogos SET nDislikes = nDislikes + 1 WHERE jogosID = ".$idJogo.";";
        $conexao->query($sqlUpdate);

    }
   
    $conexao->close();
    header('Location: usuarios.php', true, 301);
}

?>