<?php 
session_start();

if (isset($_SESSION['login'])) {
    # Conexão com banco
    include 'conexao.php';

    include 'app/helpers/user.php';
    include 'app/helpers/chat.php';
    include 'app/helpers/opened.php';
    include 'app/helpers/timeAgo.php';

    if (!isset($_GET['user'])) {
        header("Location: home.php");
        exit;
    }

    # Obtém os dados do usuário com quem vai conversar
    $chatWith = getUser($_GET['user'], $conn);

    if (empty($chatWith)) {
        header("Location: home.php");
        exit;
    }

    $chats = getChats($_SESSION['codigo'], $chatWith['codigo'], $conn);

    opened($chatWith['codigo'], $conn, $chats);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Chat App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-400 shadow p-4 rounded">
        <a href="home.php" class="fs-4 link-dark">&#8592;</a>

        <div class="d-flex align-items-center">
            
            <h3 class="display-4 fs-sm m-2">
                <?=$chatWith['nomeUsuario']?><br />
                
            </h3>
        </div>

        <div id="chatBox" class="shadow p-4 rounded d-flex flex-column mt-2 chat-box">
            <?php 
            if (!empty($chats)) {
                foreach ($chats as $chat) {
                    if ($chat['from_id'] == $_SESSION['codigo']) { ?>
                        <p class="rtext align-self-end border rounded p-2 mb-1">
                            <?=htmlspecialchars($chat['message'])?> 
                            <small class="d-block"><?=$chat['created_at']?></small>
                        </p>
                    <?php } else { ?>
                        <p class="ltext border rounded p-2 mb-1">
                            <?=htmlspecialchars($chat['message'])?>
                            <small class="d-block"><?=$chat['created_at']?></small>
                        </p>
                    <?php }
                }
            } else { ?>
                <div class="alert alert-info text-center">
                    <i class="fa fa-comments d-block fs-big"></i>
                    No messages yet, Start the conversation
                </div>
            <?php } ?>
        </div>

        <div class="input-group mb-3">
            <textarea id="message" cols="3" class="form-control"></textarea>
            <button id="sendBtn" class="btn btn-primary">
                <i class="fa fa-paper-plane"></i>
            </button>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
    }
    scrollDown();

    $(document).ready(function(){
        $("#sendBtn").on('click', function(){
            let message = $("#message").val();
            if (message == "") return;

            $.post("app/ajax/insert.php",
            {
                message: message,
                to_id: <?=$chatWith['codigo']?>
            },
            function(data, status){
                $("#message").val("");
                $("#chatBox").append(data);
                scrollDown();
            });
        });

        // Atualiza last seen do usuário logado a cada 10s
        let lastSeenUpdate = function(){
            $.get("app/ajax/update_last_seen.php");
        }
        lastSeenUpdate();
        setInterval(lastSeenUpdate, 10000);

        // Atualiza mensagens a cada 0.5s
        let fetchData = function(){
            $.post("app/ajax/getMessage.php",
            {
                id_2: <?=$chatWith['codigo']?>
            },
            function(data, status){
                $("#chatBox").append(data);
                if (data != "") scrollDown();
            });
        }
        fetchData();
        setInterval(fetchData, 500);
    });
</script>
</body>
</html>

<?php
} else {
    header("Location: index.php");
    exit;
}
?>
