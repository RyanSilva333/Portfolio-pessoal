<?php 

function getChats($id_1, $id_2, $conn){
    // Consulta todas as mensagens entre dois usuários
    $sql = "SELECT * FROM chats
            WHERE (from_id=? AND to_id=?)
            OR    (to_id=? AND from_id=?)
            ORDER BY chat_id ASC";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($stmt->rowCount() > 0) {
        $chats = $stmt->fetchAll();
    	return $chats; // Retorna todos os chats encontrados
    } else {
        $chats = [];
        return $chats; // Retorna array vazio se não houver chats
    }
}
