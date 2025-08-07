<?php 
session_start();

# Verifica se o usuário está logado
if (isset($_SESSION['login'])) {

    if (isset($_POST['message']) && isset($_POST['to_id'])) {

        # Conexão com o banco de dados
        include 'conexao.php';

        # Pega os dados do formulário
        $message = $_POST['message'];
        $to_id   = $_POST['to_id'];

        # ID do usuário logado (tabela usuario -> campo 'codigo')
        $from_id = $_SESSION['codigo'];

        # Inserir a mensagem na tabela chats
        $sql  = "INSERT INTO chats (from_id, to_id, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $res  = $stmt->execute([$from_id, $to_id, $message]);

        if ($res) {
            # Verifica se já existe conversa entre esses usuários
            $sql2  = "SELECT * FROM conversations
                      WHERE (user_1=? AND user_2=?) OR (user_2=? AND user_1=?)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$from_id, $to_id, $from_id, $to_id]);

            # Define o fuso horário
            define('TIMEZONE', 'America/Sao_Paulo');
            date_default_timezone_set(TIMEZONE);

            $time = date("H:i:s");

            # Se não existe conversa, insere
            if ($stmt2->rowCount() == 0) {
                $sql3 = "INSERT INTO conversations(user_1, user_2) VALUES (?, ?)";
                $stmt3 = $conn->prepare($sql3);
                $stmt3->execute([$from_id, $to_id]);
            }
            ?>
            <!-- Mensagem HTML de retorno -->
            <p class="rtext align-self-end border rounded p-2 mb-1">
                <?=htmlspecialchars($message)?>  
                <small class="d-block"><?=$time?></small>      	
            </p>
            <?php
        }
    }

} else {
    header("Location: ../../index.php");
    exit;
}
