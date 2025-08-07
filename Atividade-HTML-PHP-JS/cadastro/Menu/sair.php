<?php

//inicia a sessão
session_start();

// remove variáveis de sessão
session_unset();

// destroi a sessão
session_destroy();

header('Location:../index.html');

?>