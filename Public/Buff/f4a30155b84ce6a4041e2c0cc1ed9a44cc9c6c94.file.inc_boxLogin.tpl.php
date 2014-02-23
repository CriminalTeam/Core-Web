<?php /* Smarty version Smarty-3.1.16, created on 2014-02-22 03:56:45
         compiled from ".\Template\inc_boxLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2763553042f48e2f7b7-08121803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4a30155b84ce6a4041e2c0cc1ed9a44cc9c6c94' => 
    array (
      0 => '.\\Template\\inc_boxLogin.tpl',
      1 => 1393052202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2763553042f48e2f7b7-08121803',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53042f4902c2d4_26091351',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53042f4902c2d4_26091351')) {function content_53042f4902c2d4_26091351($_smarty_tpl) {?><?php if (!isset($_SESSION['logado'])) {?>
<form name="login" method="POST" action="">
    <!-- isto � uma caixa de categoria -->
    <div class="cat_painel">
        <h3><img src="<?php echo @constant('_TPL_');?>
images/list1_active.png" width="8" height="11" /> Painel de controle</h3></div>
    <div class="cat_painel_sub">
        <div class="login_div">
            <label for="id"></label>
            <input  required="true" class="logar" name="userid" type="text" id="login" placeholder="Userid ou Email..." />
        </div>
        <div class="login_div">
            <label for="passw"></label>
            <input required="true" name="pasw" class="logar" type="password" id="pasw" placeholder="Senha..." />
        </div>
        <div class="login_div">
            <input class="go" style="border: none; margin-left: 50px;" type="submit" name="submit" id="logar" value="Logar-se" />
        </div>
</form>
    <div class="login_div" style="margin-top: 20px;"><h4><a href="#">Esqueceu sua senha?</a></h4></div>
    <div class="login_div"><h4><a href="#">Não tenho uma conta?</a></h4></div>

    <div class="break"></div>
</div>
    
<?php } else { ?>
    
<div class="cat_painel">
    <h3><img src="<?php echo @constant('_TPL_');?>
images/list1_active.png" width="8" height="11" /> Ol&aacute;, </h3></div>
<div class="cat_painel_sub">
    <ul id="cat_quadrados">
        <li><a href="?sair=1">Sair</a></li>
    </ul>
    <div class="break"></div>
</div>

<?php }?><?php }} ?>
