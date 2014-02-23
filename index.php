<?php

/* 
 * @author GeovaneSouza
 * @copyright Criminal Team Web Developer's
 * @copyright HG Connect
 * @version 1.0
 */

#Separador de diretorios
defined( '_DS_' ) or define( '_DS_', DIRECTORY_SEPARATOR );

#Diretório raiz
defined ( _CFONTE_ ) or define ( "_CFONTE_", dirname (dirname (_FILE_)) . _DS_ );

#Incluindo o arquivo de configuração
require_once ( "Protect" . _DS_ . "setup.php" );

#Exibindo o template final
$smarty->display ("index.tpl");

#limpando sessão de alerta
if (isset ($_SESSION['alert']))
{
    $_SESSION['alert'] = null;
}

/**
 * Finalizando o script
 */
exit();

?>