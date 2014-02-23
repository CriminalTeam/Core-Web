{if !isset ($smarty.session.logado)}
<form name="login" method="POST" action="">
    <!-- isto � uma caixa de categoria -->
    <div class="cat_painel">
        <h3><img src="{$smarty.const._TPL_}images/list1_active.png" width="8" height="11" /> Painel de controle</h3></div>
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
    
{else}
    
<div class="cat_painel">
    <h3><img src="{$smarty.const._TPL_}images/list1_active.png" width="8" height="11" /> Ol&aacute;, </h3></div>
<div class="cat_painel_sub">
    <ul id="cat_quadrados">
        <li><a href="?sair=1">Sair</a></li>
    </ul>
    <div class="break"></div>
</div>

{/if}