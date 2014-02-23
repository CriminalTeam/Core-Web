<?php /* Smarty version Smarty-3.1.16, created on 2014-02-22 03:41:44
         compiled from ".\Template\inc_boxRanking.tpl" */ ?>
<?php /*%%SmartyHeaderCode:283345304308219f5d6-43793593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '380317d3a153fcd7c60189810e0fb4633a897261' => 
    array (
      0 => '.\\Template\\inc_boxRanking.tpl',
      1 => 1393051296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283345304308219f5d6-43793593',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_530430821b3965_78917146',
  'variables' => 
  array (
    'playerTopRR' => 0,
    'playerTopRRCID' => 0,
    'playerTopRRC' => 0,
    'playerTopRRCLID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530430821b3965_78917146')) {function content_530430821b3965_78917146($_smarty_tpl) {?><div class="cat_painel">
    <h3><img src="<?php echo @constant('_TPL_');?>
images/list1_active.png" width="8" height="11" /> Rank de Personagem</h3></div>
<div class="cat_painel_sub">
    <ul id="cat_quadrados">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['rr'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['rr']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['name'] = 'rr';
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['playerTopRR']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['rr']['total']);
?>
            <li>
            <td width="100" align="left">
                <a href="<?php echo $_smarty_tpl->tpl_vars['playerTopRRCID']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rr']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['playerTopRR']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rr']['index']];?>
</a>
            </td>
            </li>
        <?php endfor; else: ?>
            <td width="100">
               &bullet; Nada encontrado &bullet;
            </td>
        <?php endif; ?>
    </ul>
</div>


<div class="cat_painel">
    <h3><img src="<?php echo @constant('_TPL_');?>
images/list1_active.png" width="8" height="11" /> Rank de Clan</h3></div>
<div class="cat_painel_sub">
    <ul id="cat_quadrados">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['rc'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['rc']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['name'] = 'rc';
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['playerTopRRC']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['rc']['total']);
?>
            <li>
            <td width="100" align="left">
                <a href="<?php echo $_smarty_tpl->tpl_vars['playerTopRRCLID']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rc']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['playerTopRRC']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rc']['index']];?>
</a>
            </td>
            </li>
        <?php endfor; else: ?>
            <td width="100">
               &bullet; Nada encontrado &bullet;
            </td>
       <?php endif; ?>
    </ul>
</div><?php }} ?>
