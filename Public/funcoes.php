<?php

function showMsg ($titulo, $msg)
{
    $box = '<div id="msgAlert" style="margin-top: 15px; width: 100%; height: 120px;">';
    $box .= '<div class="central_cat" style="margin-left: 10%;">';
    $box .= '<div class="all_central">';
    $box .= '<div class="central_tit">';
    $box .= '<div class="float">';
    $box .= '<img src="' . _CFONTE_ . 'Template/images/list1_active.png" width="8" height="11" />';
    $box .= '</div>';
    $box .= '<div style="float: left;">';
    $box .= '<h5>' . $titulo . '</h5>';
    $box .= '</div>';
    $box .= '<div style="float: right;">';
    $box .= '<img id="close_alerta" src="' . _CFONTE_ . 'Template/images/close.png" />';
    $box .= '</div>';
    $box .= '</div>';
    $box .= '<div class="central_sub_tit">';
    $box .= $msg;
    $box .= '<div class="break"></div>';
    $box .= '</div>';
    $box .= '<div class="break"></div>';
    $box .= '</div>';
    $box .= '</div>';
    $box .= '</div>';
    
    #SESSAO ALERTA
    $_SESSION['alert'] = $box;
}

function redir ($url)
{
    echo "<script>document.location = '" . $url . "';</script>";
}

function logLogIn ($userid)
{
    $arquivo = fopen ("Protect/Logs/Login/LogInLog.txt", "a+");
    if ($arquivo)
    {
        $escrever = sprintf ("<%s> - Logado ás %s em %s \r\n", $userid, date("H : i"), date ("d/m/Y"));
        $escrever .= sprintf ("Ip : %s \r\n", $_SERVER['REMOTE_ADDR']);
        $escrever .= "================================================ \r\n";
        $escrever .= "\r\n";
        fputs ($arquivo, $escrever);
        fclose ($arquivo);
    }
}