<?php

class paginacao
{
    
    /**
     *
     * @var string
     */
    protected $tpl;
    
    /**
     * Método construtor
     */
    public function __construct ()
    {
        global $smarty;
        
        $this->tpl = $smarty;
        
        $this->paginerQueryString();
    }
    
    public function paginerQueryString ()
    {
        if (isset ($_GET['do']))
        {
            
            $err = 0;
            
            $_ARQUIVO_ = $_GET['do'];
            define (__EXT, ".php");
            define ( _MODEL_EXT_, ".model" . __EXT );
            define ( _VIEW_EXT_, ".view" . __EXT );
            define ( _CONTROLLER_EXT_, ".controller" . __EXT );
            
            if (!file_exists (_MODEL_ . $_ARQUIVO_ . _MODEL_EXT_))
            {
                (int)$err++;
            }
            
            if (!file_exists (_VIEW_ . $_ARQUIVO_ . _VIEW_EXT_))
            {
                (int)$err++;
            }
            
            if (!file_exists (_CONTROLLER_ . $_ARQUIVO_ . _CONTROLLER_EXT_))
            {
                (int)$err++;
            }
            
            if ($err <> 0)
            {
                $this->tpl->assign ('inc_file_query_string', "404.tpl");               
            }
            else
            {
                require_once (_MODEL_ . $_ARQUIVO_ . _MODEL_EXT_);
                require_once (_VIEW_ . $_ARQUIVO_ . _VIEW_EXT_);
                require_once (_CONTROLLER_ . $_ARQUIVO_ . _CONTROLLER_EXT_);
                $this->tpl->assign ('inc_file_query_string', $_ARQUIVO_ . ".tpl");
            }
        }
        else
        {
            $this->tpl->assign ('inc_file_query_string', "inc_index.tpl");
        }
    }
}

new paginacao ();