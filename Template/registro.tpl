<div class="right_page">
    <!-- Lado central -->
    <div class="central_cat">
        <div class="all_central">
            <div class="central_tit">
                <!-- Isto &#195;&#169; o Titulo do Quadrado -->
                <div class="float"><img src="{$smarty.const._TPL_}images/list1_active.png" width="8" height="11" /></div><div>
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
                                <font size="2">{html_radios options=["Masculino", "Feminino"] separator=' '}
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
                                <img src="{$smarty.const._CFILE_}Protect/captcha.php" />
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
</div>