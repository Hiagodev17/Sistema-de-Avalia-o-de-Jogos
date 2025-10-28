<html>
    <head>
        <title>.: Sistema de Votação de Jogos :.</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
            // iniciar uma sessão
            session_start();

            echo '<div style="background-color: #34495e; padding: 20px; margin-bottom: 30px; text-align: center; border-radius: 8px;">
                    <h1 style="color: #3498db; margin: 0;">Sistema de Votação de Jogos</h1>
                    <p style="color: #ecf0f1; margin-top: 10px;">Bem-vindo, '.$_SESSION['nomeUsuarios'].'</p>
                  </div>';
            
            echo '<div style="text-align: center; margin-bottom: 30px;">
                    <a href="cadastrarJogo.php" style="background-color: #3498db; padding: 12px 25px; border-radius: 5px; color: white;">
                        Cadastrar Novo Jogo
                    </a>
                  </div>';
        
            $hostname = "127.0.0.1";
            $user = "root";
            $password = "root";
            $database = "avaliacaojogos";
       
            $conexao = new mysqli($hostname,$user,$password,$database);
            $sql="SELECT * FROM `avaliacaojogos`.`jogos`;";
            $resultado = $conexao->query($sql);
            
            echo '<div style="max-width: 1000px; margin: 0 auto;">';
               
            while($row = mysqli_fetch_array($resultado)){
                echo '<div class="jogo-container">';
                
                    // Título do jogo
                    echo '<h3>'.$row[1].'</h3>';
                    
                    // Galeria de imagens
                    echo '<div class="imagens-jogo">';
                        echo '<div class="imagem-wrapper">';
                            echo '<img src="'.$row[2].'" alt="Imagem do jogo">';
                            echo '<span class="imagem-label">Imagem 1</span>';
                        echo '</div>';
                        
                        echo '<div class="imagem-wrapper">';
                            echo '<img src="'.$row[3].'" alt="Imagem do jogo">';
                            echo '<span class="imagem-label">Imagem 2</span>';
                        echo '</div>';
                    echo '</div>';
                    
                    // Descrição
                    echo '<div style="background-color: #2c3e50; padding: 15px; margin: 15px 0; border-radius: 5px;">';
                        echo '<strong style="color: #3498db;">Descrição:</strong><br>';
                        echo $row[4];
                    echo '</div>';
                    
                    // Stats de likes/dislikes
                    echo '<div style="display: flex; gap: 15px; margin: 15px 0;">';
                        echo '<div style="background-color: #27ae60; padding: 10px 20px; border-radius: 5px; color: white; font-weight: bold;">';
                            echo 'Likes: '.$row[5];
                        echo '</div>';
                        echo '<div style="background-color: #e74c3c; padding: 10px 20px; border-radius: 5px; color: white; font-weight: bold;">';
                            echo 'Dislikes: '.$row[6];
                        echo '</div>';
                    echo '</div>';
                    
                    // Formulário de avaliação
                    echo '<form method="post" action="avaliarJogoBanco.php" style="background-color: #2c3e50; padding: 20px; border-radius: 5px; margin-top: 15px;">';
                        echo '<input type="hidden" name="idJogo" value="'.$row[0].'">';
                        
                        echo '<label style="color: #ecf0f1; font-weight: bold;">Deixe sua avaliação:</label><br>';
                        echo '<input type="text" name="descricaoAvaliacao" placeholder="Sua opinião sobre o jogo..." required style="width: 100%; margin: 10px 0;">';
                        
                        echo '<div style="margin-top: 10px;">';
                            echo '<label style="color: #ecf0f1; font-weight: bold;">Seu voto: </label>';
                            echo '<select name="avaliacao" required>';
                                echo '<option value="1">Like</option>';
                                echo '<option value="0">Dislike</option>';
                            echo '</select>';
                            
                            echo '<input type="submit" value="AVALIAR">';
                        echo '</div>';
                    echo '</form>';
                    
                echo '</div>';
            }
            
            echo '</div>';
            
            $conexao->close();
        ?>
        
        <div style="text-align: center; margin: 40px 0;">
            <a href="../sair.php" class="sair">Sair</a>
        </div>
    </body>
</html>