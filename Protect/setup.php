<?php

/* 
 * @author GeovaneSouza
 * @copyright Criminal Team Web Developer's
 * @copyright HG Connect
 * @version 1.0
 */
#Iniciando sessões
session_start ();

#Configurações sobre o site e o servidor sql
$config = array(
    
    #Configurações web site
    "SITE"  =>  array(
        
        #Titulo do site
        "TITULO"  =>  "Criminal Team"
    ),
    
    #Configurações sql server
    "SQL"   =>  array(
        
        #Ip do servidor
        "HOST"  =>  "127.0.0.1",
        
        #Porta do servidor
        "PORTA" =>  "1433", /* Porta padrão */
        
        #Usuário do servidor 
        "USER"  =>  "sa", /* Usuário padrão */
        
        #Senha do servidor
        "SENHA" =>  "123",
        
        #Database a ser ultilizada
        "DATA"  =>  "GunzDB" /* Database padrão para o gunz */
    ),
    
    #Configurações do servidor
    "MATCH_SERVER"  =>  array(
        #Ip do Match Server
        "MATCH_IP"      =>  "127.0.0.1",
        
        #Porta do Match Server
        "MATCH_PORT"    =>  6000
    ),
    
    #Configurações do template
    "SMARTY"    =>  array(
        
        #Diretório do template
        "TEMPLATE_DIR"  =>  _CFONTE_ . "Template" . _DS_,
        
        #Diretório dos arquivos compilado
        "TEMPLATE_BUFF" =>  _CFONTE_ . "Public" . _DS_ . "Buff" . _DS_,
        
        #Diretório do cache dos arquivos
        "TEMPLATE_CACHE"=>  _CFONTE_ . "Public" . _DS_ . "Cache" . _DS_,
        
        #Depurar
        "DEBUG"         => false
    )
);

#Diretório dos models
defined ( _MODEL_ ) or define( "_MODEL_", _CFONTE_ . "Model" . _DS_ );

#Deretórios dos View
defined ( _VIEW_ ) or define( "_VIEW_", _CFONTE_ . "View" . _DS_ );

#Deretório dos Controllers
defined ( _CONTROLLER_ ) or define( "_CONTROLLER_", _CFONTE_ . "Controller" . _DS_ );

#Diretório do template
defined ( _TPL_ ) or define ( "_TPL_", _CFONTE_ . "Template" . _DS_ );

#Diretório das libs
defined ( _LIBRARY_ ) or define ( "_LIBRARY_", _CFONTE_ . "Library" . _DS_ );

/**
 * Funções
 */
require_once( _CFONTE_ . "Public" . _DS_ . "funcoes.php" );

/*
 * Sql Server Database Manager
 */
#Incluindo o Database Manager
require_once( _LIBRARY_ . "database.class.php" );

#Setando o Database Manager
$sql    =   new Database();

#Configurando
$sql->inicio($config["SQL"]["USER"], $config["SQL"]["PASS"], $config["SQL"]["HOST"], $config["SQL"]["DATA"], $config["SQL"]["PORTA"]);


/*
 * Smarty Template Engine
 */
#Incluindo o smarty
require_once( _LIBRARY_ . "Smarty" . _DS_ . "Smarty.class.php" );

#Setando a Smarty
$smarty =   new Smarty();

#Configurando
$smarty->template_dir = $config["SMARTY"]["TEMPLATE_DIR"];
$smarty->compile_dir  = $config["SMARTY"]["TEMPLATE_BUFF"];
$smarty->cache_dir    = $config["SMARTY"]["TEMPLATE_CACHE"];
$smarty->debugging    = $config["SMARTY"]["DEBUG"];


/**
 * Incluindo o MVC do box fixos da index
 */
require_once ( _MODEL_ . "indexBox.model.php" );
require_once ( _VIEW_ . "indexBox.view.php" );
require_once ( _CONTROLLER_ . "indexBox.controller.php" );

/**
 * Paginação
 */
require_once ( _LIBRARY_ . "paginacao.class.php");
?>