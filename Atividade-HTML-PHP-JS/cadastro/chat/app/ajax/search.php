<?php

session_start();
# Verifica se o usuário está logado
if (isset($_SESSION['login']))  {
    # Verifica se a chave de busca foi enviada
    if(isset($_POST['key'])) {
        # Conexão com banco de dados
        include 'conexao.php';
		
        # Algoritmo de busca simples
        $key = "%{$_POST['key']}%";

        $sql = "SELECT * FROM usuario
                WHERE nomeUsuario LIKE ? OR funcionario LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$key, $key]);

        if($stmt->rowCount() > 0){ 
            $usuarios = $stmt->fetchAll();

            foreach ($usuarios as $usuario) {
                if (isset($_SESSION['codigo']) && $usuario['codigo'] == $_SESSION['codigo']) continue;
        ?>
            <li class="list-group-item">
                <a href="chat.php?user=<?=$usuario['nomeUsuario']?>"
                   class="d-flex
                          justify-content-between
                          align-items-center p-2">
                    <div class="d-flex
                                align-items-center">

                        <img src="uploads/user-default.png"
                             class="w-10 rounded-circle">

                        <h3 class="fs-xs m-2">
                            <?=$usuario['nomeUsuario']?>
                        </h3>            	
                    </div>
                </a>
            </li>
        <?php 
            } 
        } else { ?>
            <div class="alert alert-info text-center">
                <i class="fa fa-user-times d-block fs-big"></i>
                O usuário "<?=htmlspecialchars($_POST['key'])?>"
                não foi encontrado.
            </div>
        <?php }
    }

} else {
    header("Location: ../../index.php");
    exit;
}
