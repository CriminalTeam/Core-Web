<?php

class Database
{
    /**
     * UsuÃ¡rio usado para conexÃ£o com o banco de dados
     * @access public
     * @name $usuario
     */
    public $usuario;

    /**
     * Senha para conexÃ£o com o banco de dados
     * @access public
     * @name $senha
     */
    public $senha;

    /**
     * Servidor de hospedagem do banco de dados
     * @access public
     * @name $servidor
     */
    public $servidor;

    /**
     * Nome do banco de dados
     * @access public
     * @name $banco
     */
    public $banco;
    
    /**
     * Porta do sql server
     * @access public
     * @name $porta
     */
    public $porta = null;

    /**
     * QueryID
     * @access private
     * @name $query_id
     */
    private $query_id = 0;

    /**
     * NÃºmero de querries executadas
     * @access private
     * @name $num_queries
     */
    private $num_queries = 0;

    /**
     * Link da conexÃ£o mssql
     * @access private
     * @name $num_queries
     */
    private $link_id = 0;

    /**
     * Persistent conecton
     * @access private
     * @name $persistent
     */
    private $persistent = 0;

    /**
     * Limit offset para simulaÃ§Ã£o do LIMIT do mysql
     * @acess puclic
     * @name limit_offset
     */
    public $limit_offset;

    /**
     * Construct function
     * @name inicio
     */
    function inicio($usuario, $senha, $servidor, $banco, $porta)
    {
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->banco = $banco;
        $this->porta = $porta;

        $this->conectar();
    }

    /**
     * Faz a conexÃ£o com o servidor
     * @name conectar
     * @return boolean
     */
    function conectar()
    {
        if ($this->porta == null)
        {
            $hhost = $this->servidor;
        }
        else
        {
            $hhost = $this->servidor . "," . $this->porta;
        }
        
        if ($this->persistent == 0)
        {
            $this->link_id = mssql_connect($hhost, $this->usuario, $this->senha);
        } //$this->persistent == 0
        else
        {
            $this->link_id = mssql_pconnect($hhost, $this->usuario, $this->senha);
        }

        if (!$this->link_id)
        {
            $this->error("Conex&atilde;o com o banco " . $this->banco . " falhou");
        } //!$this->link_id

        if (!@mssql_select_db($this->banco, $this->link_id))
        {
            $this->error("O banco de dados (" . $this->banco . ") n&atilde;o pode ser usado");
        } //!@mssql_select_db($this->banco, $this->link_id)

        unset($this->senha);
    }
    
    function sqlSanitize ($string)
    {
        $remover = array(
            "'",
            '"',
            "+",
            "-",
            ";"
        );
        
        for($i= 0; $i < 10; $i++)
        {
            $string = str_ireplace( $remover, "", $string );
            $string = trim( $string );            
        }
        
        return $string;
    }

    function query($string)
    {
        $query = trim($string);

        $this->counter++;
		
        if (preg_match('#^SELECT(.*?)(LIMIT ([0-9]+)[, ]*([0-9]+)*)?$#s', $query, $limits))
        {
            $query = $limits[1];
            $row_offset = "";

            if (!empty($limits[2]))
            {
                $row_offset = ($limits[4]) ? $limits[3] : "";
                $num_rows = ($limits[4]) ? $limits[4] : $limits[3];

                $query = 'TOP ' . ($row_offset + $num_rows) . $query;
            }

            $this->result = @mssql_query("SELECT " . $query, $this->link_id);

            if ($this->result)
            {
                $this->limit_offset[$this->result] = (!empty($row_offset)) ? $row_offset : 0;

                if ($row_offset > 0)
                {
                    @mssql_data_seek($this->result, $row_offset);
                }
            }
        }
        else if (preg_match('#^INSERT #i', $query))
        {
            if (@mssql_query($query, $this->link_id))
            {
                $this->result = time() + microtime();

                $result_id = @mssql_query('SELECT @@IDENTITY AS id, @@ROWCOUNT as affected', $this->link_id);
                if ($result_id)
                {
                    if ($row = @mssql_fetch_array($result_id))
                    {
                        $this->next_id[$this->link_id] = $row['id'];
                        $this->affected_rows[$this->link_id] = $row['affected'];
                    }
                }
            }
        }
        else
        {
            if (@mssql_query($query, $this->link_id))
            {
                $this->result = time() + microtime();

                $result_id = @mssql_query('SELECT @@ROWCOUNT as affected', $this->link_id);
                if ($result_id)
                {
                    if ($row = @mssql_fetch_array($result_id))
                    {
                        $this->affected_rows[$this->link_id] = $row['affected'];
                    }
                }
            }
        }

        if (!$this->result)
        {
            $this->error("Erro na query : " . $query);

            return false;
        }
		
        return $this->result;
    }

    function num_rows($string = '')
    {
        $this->result = @mssql_num_rows($string);

        return $this->result;
    }

    function select($table, $array, $total = 0, $cond = NULL, $order = NULL)
    {
        $query = "SELECT ";

        if (is_numeric($total) && $total > 0)
        {
            $query .= "TOP " . $total . " ";
        }

        if (empty($array) || count($array) == 0)
        {
            $query .= "*";
        }
        else
        {
            while (@list($key, $value) = @each($array))
            {
                $campo[] = $value;
            }

            $query .= @implode(", ", $campo);
        }

        $query .= " FROM " . $table;

        if ($cond != NULL)
        {
            if (strpos(strtolower($cond), "where ") !== false)
            {
                $query .= " " . $cond;
            }
            else
            {
                $query .= " WHERE " . $cond;
            }
        }

        if ($order != NULL)
        {
            if (strpos(strtolower($order), "order by ") !== false)
            {
                $query .= " " . $order;
            }
            else
            {
                $query .= " ORDER BY " . $order;
            }
        }

        //echo $query . "<br>";

        $this->query_id = $this->query($query);

        if (!$this->query_id)
        {
            $this->error("Erro no select: " . $query);
            return false;
        }
        else
        {
            return $this->query_id;
        }
    }

    function inserir($tabela, $dados)
    {
        if ($tabela && (is_array($dados)))
        {
            $array_func = array(
                "GETDATE()",
                "NULL"
            );

            $query = "INSERT INTO [" . $tabela . "] (";

            while (@list($key, $value) = @each($dados))
            {
                $colunas[] = $key;
                $valores[] = (in_array($value, $array_func)) ? $value : "'" . $this->sqlSanitize($value) . "'";
            }

            $query .= implode(", ", $colunas);

            $query .= ") VALUES (" . implode(", ", $valores) . ")";

            $this->query_id = $this->query($query);

            if (!$this->query_id)
            {
                $this->error("Erro no insert: " . $query);
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    function update($tabela, $dados, $cond = NULL)
    {
        if ($tabela && (is_array($dados)))
        {
            $array_func = array(
                "GETDATE()",
                "NULL"
            );

            $query = "UPDATE " . $tabela . " SET ";

            while (@list($key, $value) = @each($dados))
            {
                $campo[] = $key . " = " . ((in_array($value, $array_func)) ? $value : "'" . $this->sqlSanitize($value) . "'");
            } //@list($key, $value) = @each($dados)

            $query .= @implode(", ", $campo);

            if ($cond != NULL)
            {
                if (strpos(strtolower($cond), "where ") !== false)
                {
                    $query .= " " . $cond;
                } //strpos(strtolower($cond), "where ") !== false
                else
                {
                    $query .= " WHERE " . $cond;
                }
            } //$cond != NULL

            $this->query_id = $this->query($query);

            if (!$this->query_id)
            {
                $this->error("Erro no update: " . $query);
                return false;
            } //!$this->query_id
            else
            {
                return true;
            }
        } //$tabela && (is_array($dados))
    }

    function delete($tabela, $cond = NULL)
    {
        if ($tabela && $cond == NULL)
        {
            $query = "TRUNCATE TABLE " . $tabela;
            $this->query_counter++;
            $this->query_id = $this->query($query);
        } //trim($string != "")

        if ($tabela && $cond != NULL)
        {
            $query = "DELETE FROM " . $tabela;

            if ($cond != NULL)
            {
                if (!strpos(strtolower($cond), "where"))
                {
                    $query .= " " . $cond;
                } //!strpos(strtolower($cond), "where")
                else
                {
                    $query .= " WHERE " . $cond;
                }
            } //$cond != NULL

            $this->query_counter++;
            $this->query_id = $this->query($query);
        } //trim($string != "")		

        if (!$this->query_id)
        {
            $this->error("Erro ao deletar : " . $query);
        } //!$this->query_id

        return $this->query_id;
    }

    function fetch_array($query_id = -1)
    {
        if ($query_id != -1)
        {
            $this->query_id = $query_id;
        } //$query_id != -1

        $this->query_counter++;
        $this->result = @mssql_fetch_array($this->query_id);

        if (!$this->query_id)
        {
            $this->error("Erro fetch_array: " . $this->query_id);
        } //!$this->query_id
        else
        {
            return $this->result;
        }
    }

    function fetch_row($query_id = -1)
    {
        if ($query_id != -1)
        {
            $this->query_id = $query_id;
        } //$query_id != -1

        $this->query_counter++;
        $this->result = @mssql_fetch_row($this->query_id);

        if (!$this->query_id)
        {
            $this->error("Erro fetch_row: " . $this->query_id);
        } //!$this->query_id
        else
        {
            return $this->result;
        }
    }

    function close()
    {
        @mssql_close($this->link_id);
    }

    function error($msg)
    {
        $this->error_desc = @mssql_get_last_message();

        $erro = "<title>Erro no banco de dados</title>";
        $erro .= "<b>CUIDADO!</b>";
        $erro .= "<p>&nbsp;<p>";
        $erro .= "Erro no banco de dados " . $this->banco;
        $erro .= "<p>&nbsp;<p>";
        $erro .= "<b>" . $msg . "</b>";
        $erro .= "<p>&nbsp;<p>";
        $erro .= "Algumas informa&ccedil;&otilde;es sobre o erro encontram-se abaixo:";
        $erro .= "<p>&nbsp;<p>";
        $erro .= ($this->error_desc == "") ? "" : "<li> <strong>Erro no MSSQL</strong> :" . $this->error_desc;
        $erro .= "<li> <strong>Data</strong> : " . date("d/m/Y H:m:s");
        $erro .= ($_SERVER['HTTP_REFERER'] == "") ? "" : "<li> <strong>Refer&ecirc;ncia:</strong> " . $_SERVER['HTTP_REFERER'];
        $erro .= "<li> <strong>Script:</strong> " . $_SERVER['REQUEST_URI'];

        echo $erro;
        die();
    }

}
?>
