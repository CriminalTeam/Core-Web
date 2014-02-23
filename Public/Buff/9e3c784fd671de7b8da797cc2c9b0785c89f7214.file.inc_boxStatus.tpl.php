<?php /* Smarty version Smarty-3.1.16, created on 2014-02-21 07:37:08
         compiled from ".\Template\inc_boxStatus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:398553042e5dd41220-05579930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e3c784fd671de7b8da797cc2c9b0785c89f7214' => 
    array (
      0 => '.\\Template\\inc_boxStatus.tpl',
      1 => 1392979025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '398553042e5dd41220-05579930',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53042e5dd54eb8_72608457',
  'variables' => 
  array (
    'serverStatus' => 0,
    'onlinePlayers' => 0,
    'contasTotal' => 0,
    'personagensTotal' => 0,
    'recordeOnline' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53042e5dd54eb8_72608457')) {function content_53042e5dd54eb8_72608457($_smarty_tpl) {?><div class="cat_painel">
    <h3><img src="<?php echo @constant('_TPL_');?>
images/list1_active.png" width="8" height="11" /> Estat&iacute;sticas</h3>
</div>
<div class="cat_painel_sub">
    <ul id="cat_quadrados">
        <?php echo $_smarty_tpl->tpl_vars['serverStatus']->value;?>

        <?php echo $_smarty_tpl->tpl_vars['onlinePlayers']->value;?>

        <?php echo $_smarty_tpl->tpl_vars['contasTotal']->value;?>
 
        <?php echo $_smarty_tpl->tpl_vars['personagensTotal']->value;?>

        <?php echo $_smarty_tpl->tpl_vars['recordeOnline']->value;?>

    </ul>
</div><?php }} ?>
