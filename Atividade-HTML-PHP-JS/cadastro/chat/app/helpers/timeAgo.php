<?php

// Define o fuso horário conforme sua localização
define('TIMEZONE', 'America/Sao_Paulo');
date_default_timezone_set(TIMEZONE);

function last_seen($date_time) {
    $timestamp = strtotime($date_time);	

    $strTime = array("segundo", "minuto", "hora", "dia", "mês", "ano");
    $length = array(60, 60, 24, 30, 12, 10);

    $currentTime = time();
    if ($currentTime >= $timestamp) {
        $diff = $currentTime - $timestamp;

        for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
            $diff /= $length[$i];
        }

        $diff = round($diff);

        if ($diff < 59 && $strTime[$i] == "segundo") {
            return 'Ativo agora';
        } else {
            return "Visto há {$diff} {$strTime[$i]}" . ($diff > 1 ? "s" : "");
        }
    }
}
