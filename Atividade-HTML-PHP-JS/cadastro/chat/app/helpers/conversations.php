<?php 

function getConversation($user_id, $conn){
    // Obtém todas as conversas do usuário logado
    $sql = "SELECT * FROM conversations
            WHERE user_1 = ? OR user_2 = ?
            ORDER BY conversation_id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id, $user_id]);

    if ($stmt->rowCount() > 0) {
        $conversations = $stmt->fetchAll();
        $user_data = [];

        // Para cada conversa, buscar o outro usuário
        foreach ($conversations as $conversation) {
            if ($conversation['user_1'] == $user_id) {
                $sql2 = "SELECT * FROM usuario WHERE codigo = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute([$conversation['user_2']]);
            } else {
                $sql2 = "SELECT * FROM usuario WHERE codigo = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute([$conversation['user_1']]);
            }

            $otherUser = $stmt2->fetch(PDO::FETCH_ASSOC);
            if ($otherUser) {
                $user_data[] = $otherUser;
            }
        }

        return $user_data;

    } else {
        return [];
    }
}
