<?php /* Smarty version Smarty-3.1.16, created on 2014-02-23 01:35:51
         compiled from ".\Template\registro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2556553096c50753ad9-92263767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e820bce957acf67a9a993db3f0d987d0778301dc' => 
    array (
      0 => '.\\Template\\registro.tpl',
      1 => 1393130149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2556553096c50753ad9-92263767',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53096c5075a659_00939244',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53096c5075a659_00939244')) {function content_53096c5075a659_00939244($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include 'C:\\AppServ\\www\\Library\\Smarty\\plugins\\function.html_radios.php';
?><div class="right_page">
    <!-- Lado central -->
    <div class="central_cat">
        <div class="all_central">
            <div class="central_tit">
                <!-- Isto &#195;&#169; o Titulo do Quadrado -->
                <div class="float"><img src="<?php echo @constant('_TPL_');?>
images/list1_active.png" width="8" height="11" /></div><div>
                    <h5>Criar uma Nova conta</h5></div>
            </div>
            <div class="central_sub_tit">
                <div class="d_cadastro"><span id="obrigatorio">Dados pessoais.</span></div>
                <div class="registro_left">
                    <div id="formulario">
                        <form name="reg" method="POST" action="">
                            <div class="reg_left_div">
                                <input placeholder="Nome completo" type="text" class="box_registro" maxlength="25" />
                            </div>
                            <div class="reg_left_div">
                                <input placeholder="Email" type="text" class="box_registro" />
                            </div>
                            <div class="reg_left_div">
                                <input placeholder="Repita o seu Email" type="text" class="box_registro" />
                            </div>
                            <!-- Titulo -->
                            <div class="reg_left_div">
                                <h6 style="display: inline;">Idade :</h6> 
                                <select style="width: 80px;" class="box_registro">
                                    <option>1</option>
                                </select>
                                
                                <h6 style="display: inline; margin-left: 45px;"></h6> 
                                <font size="2"><?php echo smarty_function_html_radios(array('options'=>array("Masculino","Feminino"),'separator'=>' '),$_smarty_tpl);?>

                                </font>
                            </div>
                            
                            <div style="margin: 15px 0px 15px 0px;" class="reg_left_div">
                                <div class="d_cadastro"><span id="obrigatorio">Dados usados para entrar no jogo.</span></div>
                            </div>
                            
                            <div class="reg_left_div">
                                <input placeholder="UserID" type="text" class="box_registro" maxlength="16" />
                            </div>
                            <div class="reg_left_div">
                                <input placeholder="Senha" type="password" class="box_registro" maxlength="20" />
                            </div>
                            <div class="reg_left_div">
                                <input placeholder="Repita a sua senha" type="password" class="box_registro" maxlength="20" />
                            </div>
                            
                            <div style="margin: 15px 0px 15px 0px;" class="reg_left_div">
                                <div class="d_cadastro"><span id="obrigatorio">Confirme este código digitando-o no campo a baixo.</span></div>
                            </div>
                            
                            <div class="reg_left_div"><h6>Código de segurança <span id="obrigatorio">*</span></h6></div><!-- Titulo -->
                            <div class="reg_left_div">
                                <!-- CODIGO AQUI -->
                                <img src="<?php echo @constant('_CFILE_');?>
Protect/captcha.php" />
                            </div>
                            <div class="reg_left_div">
                                <input type="text" maxlength="9" placeholder="Digite aqui o código de segurança" class="box_registro" />
                            </div>
                            
                            <input class="go" type="submit" value="Criar Conta" /> 

                        </form>
                    </div>
                    <div class="break"></div>               
                </div>
                <div class="registro_right"><h6>
                    Preencha todos o campos com atenção, use dados verdadeiros,
                    assim, caso esqueça a sua senha, poderá recupera-lá com sucesso.
                    </h6></div>
                <div class="break"></div>
            </div>
            <div class="d_cadastro">Regras básicas</div>
            <div class="central_sub_tit">
                Minhas regras!
            </div>
            <div class="break"></div>
        </div>
    </div>
</div><?php }} ?>
