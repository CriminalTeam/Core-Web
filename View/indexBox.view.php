<?php
class viewIndexBox
{
    
    protected $tpl;
    /**
     * 
     * @param string $nome
     * @param string $valor
     */
    function __construct()
    {
        #Globalizando a variável de referencia do smarty
        global $smarty;
        
        #setanto como private nesta classe
        $this->tpl = $smarty;
    }
    
    /**
     * 
     * @param string $nome
     * @param string $valor
     * @return void $smarty->assign( param nome, param valor );
     */
    public function nVar ($nome, $valor)
    {
        return $this->tpl->assign($nome, $valor);
    }
}

?>