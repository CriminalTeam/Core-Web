<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>GunzCore v1.0</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="GeovaneSouza" />
        <meta name="keywords" content="Jogos , Jogos Online, Fps online , Action Fps , Online fps action , Gunz , Gunz the Duel , the duel , Servidor pirata , The Duel , Gunz Online , online gunz , Online jogos , play Game , gz online , Br Gunz" />
        <link rel="shortcut icon" href="{$smarty.const._TPL_}images/favicon.png" />


        <link rel="stylesheet" href="{$smarty.const._TPL_}css/estilo.css" type="text/css" />
        <link rel="stylesheet" href="{$smarty.const._TPL_}css/formularios.css" type="text/css" />
        <link rel="stylesheet" href="{$smarty.const._TPL_}css/tipTip.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{$smarty.const._TPL_}javascript/slider/themes/carbono/jquery.slider.css" />
        <!--[if IE 6]>
            <link rel="stylesheet" type="text/css" href="javascript/slider/themes/carbono/jquery.slider.ie6.css" />
        <![endif]-->
        <script type="text/javascript" src="{$smarty.const._TPL_}javascript/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="{$smarty.const._TPL_}javascript/jquery.min.js"></script>
        <script type="text/javascript" src="{$smarty.const._TPL_}javascript/jquery.tipTip.js"></script>
        <script type="text/javascript" src="{$smarty.const._TPL_}javascript/jquery.tipTip.minified.js"></script>
        <script type="text/javascript" src="{$smarty.const._TPL_}javascript/slider/jquery.slider.min.js"></script>
        <script type="text/javascript" src="{$smarty.const._TPL_}javascript/slide.js"></script>
        <script type="text/javascript" src="{$smarty.const._TPL_}javascript/jsFuncoes.js"></script>
    </head>
    <body onload="MM_preloadImages('{$smarty.const._TPL_}images/hover.png')">
        <div class="principal">
            <div class="sub_principal">
                <div class="header">
                    <div class="banner2">
                        <div style="width:900px; height:auto; margin-left:10px; padding:20px;">
                            <Div style="float:left;">
                                <img src="{$smarty.const._TPL_}images/logo_tipo.png" width="290" height="160" />
                            </Div>
                            <Div style="float:right; width:300px;">
                                <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('hover_jogue', '', 'Template/images/hover.png', 1)">
                                    <img src="{$smarty.const._TPL_}images/jogue_graca.png" alt="Jogue grátis" name="hover_jogue" width="200" height="160" border="0" id="hover_jogue" />
                                </a>
                            </Div>
                            <div class="break"></div>
                        </div>
                    </div>
                    <div class="break"></div>
                </div>
                <div class="menu_bg">
                    <ul id="menu">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="index.php?do=registro">Registro</a></li>
                        <li><a href="index.php?do=download">Download</a></li>
                        <li><a href="index.php?do=loja">Loja</a></li>
                        <li><a href="#">Ranking</a>
                            <ul>
                                <li><a href="index.php?do=ranking#player">Player</a></li>
                                <li><a href="index.php?do=ranking#clan">Clan</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?do=suporte">Suporte</a></li>
                        <li><a href="#">Fórum</a></li>
                    </ul>
                    <div class="break"></div>
                </div>    

 <!-- tela de alertar/mensagem para o usário -->
{if isset($smarty.session.alert) && $smarty.session.alert neq null}
    {$smarty.session.alert}
{/if}
 <!-- FIM -->
 
                <div class="estrutura_page">
                    <Div class="left_page">
                        {include file='inc_boxLogin.tpl'}
                        {include file='inc_boxStatus.tpl'}
                        {include file='inc_boxRanking.tpl'}
                        {include file='inc_boxRedesSociais.tpl'}
                    </Div>
                    
                        {include file={$inc_file_query_string}}
                   
                    <div class="break"></div>
                </div>
                <div style="width:890px; height:auto; padding:5px; text-align:center; font-size:12px;">
                    <h4>&copy; GunzCore - Criminal Team Web Developer's & Welliton gervickas</h4></div>    
            </div>
        </div>
    </body>
</html>