<?php

class modelIndexBox
{

    private $db;

    public function __construct ()
    {
        #Globalizando a variavel sql
        global $sql;
        $this->db = $sql;
    }

    ############## Login                ###############    
    /**
     * 
     * @param string $chave
     * @param string $senha
     * @return string|boolean
     */

    protected function boxLogin ($chave, $senha)
    {
        $erros = array (
            1 => "Preencha todos os campos corretamente.",
            2 => "UserID muito longo, o máximo permitido 12 character's.",
            3 => "Email muito longo, o máximo permitido 60 chatacter's.",
            4 => "UserID muito curto, o mínimo permitido 4 character's.",
            5 => "Email muito curto, o mínimo permitido 10 character's.",
            6 => "UserID ou senha estão incorretos.",
            7 => "Email ou senha incorretos.",
            8 => "Senha muito curta, minímo 6 character's.",
            9 => "Senha muito longa, o máximo permitido é de 20 character's"
        );
        
        if (filter_var ($chave, FILTER_VALIDATE_EMAIL))
        {
            $is_Userid = false;
        }
        else
        {
            $is_Userid = true;
        }

        if (empty ($chave) || empty ($senha))
        {
            return $erros[1];
        }
        
        if (strlen($senha) < 6)
        {
            return $erros[8];
        }
        
        if (strlen($senha) > 20)
        {
            return $erros[9];
        }
        
        if ($is_Userid)
        {

            if (strlen ($chave) > 12)
            {
                return $erros[2];
            }

            if (strlen ($chave) < 4)
            {
                return $erros[4];
            }
        }
        else
        {
            if (strlen ($chave) > 60)
            {
                return $erros[3];
            }

            if (strlen ($chave) < 10)
            {
                return $erros[5];
            }
        }

        if ($is_Userid)
        {
            $Login = $this->db->select ("Login", array ("UserID", "Password"), 1, sprintf ("UserID = '%s' AND Password = '%s'", $this->db->sqlSanitize ($chave), $this->db->sqlSanitize ($senha)));
            if ($this->db->fetch_row ($Login) <> 0)
            {
                logLogIn ($chave);
                $_SESSION['logado'] = 1;
                return 1;
            }
            else
            {
                return $erros[6];
            }
        }
        else
        {
            $getUserID = $this->db->select ("Account", array (), 1, sprintf ("Email = '%s'", $this->db->sqlSanitize ($chave)));
            if ($getUserID)
            {
                $result = $this->db->fetch_array ($getUserID);

                $Login = $this->db->select ("Login", array ("UserID", "Password"), 1, sprintf ("UserID = '%s' AND Password = '%s'", $this->db->sqlSanitize ($result['UserID']), $this->db->sqlSanitize ($senha)));
                if ($this->db->fetch_row ($Login) <> 0)
                {
                    logLogIn ($result['UserID']);
                    $_SESSION['logado'] = 1;
                    return 1;
                }
                else
                {
                    return $erros[6];
                }
            }
            else
            {
                return $erros[7];
            }
        }
    }

    ############### ESTATUS DO SERVIDOR ###############    
    /**
     * 
     * @param string $ip
     * @param int $porta
     * @return bool
     */

    protected function estadoServidor ($ip, $porta)
    {
        if (@fsockopen ($ip, $porta, $errno, $errstr, (float) 0.5))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function total ($tab, $cond = NULL, $format = 0)
    {
        $sql = $this->db->query ("SELECT COUNT(*) AS total FROM " . $tab . (($cond != NULL) ? " " . $cond : ""));
        $c = $this->db->fetch_array ($sql);

        if ($format)
        {
            return number_format ($c['total'], 0, '', '.');
        }
        else
        {
            return $c['total'];
        }
    }

    /**
     * 
     * @return int
     */
    protected function jogadoresOnline ()
    {
        $szQuery = $this->db->select ("ServerStatus", array (), 1, "Opened = '1'", null);
        $total = $this->db->fetch_array ($szQuery);
        return $total['CurrPlayer'];
    }

    /**
     * 
     * @return int
     */
    protected function totalContas ()
    {
        return $this->total ("Login");
    }

    /**
     * 
     * @return int
     */
    protected function totalPersonagem ()
    {
        return $this->total ("Character");
    }

    /**
     * 
     * @return int
     */
    protected function recordOnline ()
    {
        $select = $this->db->select ("ServerLog", array ("PlayerCount"), 1, NULL, "PlayerCount DESC");
        $recorde = $this->db->fetch_array ($select);
        return $recorde['PlayerCount'];
    }

    ###################### /Status do servidor ###################
    ###################### Ranking de personagem #################

    /**
     * 
     * @return array
     */
    protected function topPlayerRanking ()
    {
        $Query = $this->db->select ("Character", array (), 5, "DeleteFlag = 0 OR DeleteFlag = NULL", "XP Desc");
        while ($result = $this->db->fetch_array ($Query))
        {
            $resNome[] = $result['Name'];
            $resLevel[] = $result['CID'];
        }

        $retorno = array ($resNome, $resLevel);

        return $retorno;
    }

    ####################### /Ranking de personagens ##############
    ####################### Ranking de clan ######################
    /**
     * 
     * @return array
     */

    protected function topClanRanking ()
    {
        $Query = $this->db->select ("Clan", array (), 5, "DeleteFlag = 0 OR DeleteFlag = NULL", "Point Desc");
        while ($result = $this->db->fetch_array ($Query))
        {
            $resNome[] = $result['Name'];
            $resLevel[] = $result['CLID'];
        }

        $retorno = array ($resNome, $resLevel);

        return $retorno;
    }

}

?>