<div class="cat_painel">
    <h3><img src="{$smarty.const._TPL_}images/list1_active.png" width="8" height="11" /> Rank de Personagem</h3></div>
<div class="cat_painel_sub">
    <ul id="cat_quadrados">
        {section name=rr loop=$playerTopRR}
            <li>
            <td width="100" align="left">
                <a href="{$playerTopRRCID[rr]}">{$playerTopRR[rr]}</a>
            </td>
            </li>
        {sectionelse}
            <td width="100">
               &bullet; Nada encontrado &bullet;
            </td>
        {/section}
    </ul>
</div>


<div class="cat_painel">
    <h3><img src="{$smarty.const._TPL_}images/list1_active.png" width="8" height="11" /> Rank de Clan</h3></div>
<div class="cat_painel_sub">
    <ul id="cat_quadrados">
        {section name=rc loop=$playerTopRRC}
            <li>
            <td width="100" align="left">
                <a href="{$playerTopRRCLID[rc]}">{$playerTopRRC[rc]}</a>
            </td>
            </li>
        {sectionelse}
            <td width="100">
               &bullet; Nada encontrado &bullet;
            </td>
       {/section}
    </ul>
</div>